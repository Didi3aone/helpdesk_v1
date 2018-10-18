<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	//set variable private
	private $_title_page  = 'Menu';
	private $_title_form  = 'Menu';
	private $_active_page = 'menu';
	private $_breadcrumb  = "menu";
	private $_view = 'menu/';
	private $_view_js_folder = 'menu/javascript/';
	//set protected variable header footer
	protected $_header;
	protected $_footer;

	protected $_data;
	protected $_msg;

	public function __construct() {
		parent::__construct();
		//load model and library
		$this->load->model('Menu_model');
		$this->load->library("form_validation");
	}

	/*
	* function index
	* @param 
	* @return array all data menu
	*/
	public function index()
	{
		$this->_header = array(
			"plugin_css" => array(
				"assets/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css"
			),
			"title"		  => $this->_title_page,
			"breadcrumb"  => $this->_breadcrumb,
			"title_form"  => "List all ".$this->_title_form,
			"active_page" => $this->_active_page
		);

		$data['datas'] = $this->Menu_model->get_all_menu();
 
		$this->_footer = array(
			"plugins_js" => array(
				"assets/plugin/datatables.net/js/jquery.dataTables.min.js"
			),
			"script_js" => $this->_view_js_folder ."list_all_js"
		);

		$this->load->view(LAYOUT_HEADER, $this->_header);
		$this->load->view($this->_view . "index", $data);
		$this->load->view(LAYOUT_FOOTER, $this->_footer);
	}

	/*
	* function create menu
	* @param 
	* @return array all data menu
	*/
	public function create ()
	{	
		$this->_header = array(
			// "plugin_css" => array(
			"breadcrumb"  	=> $this->_breadcrumb ." create",
			"title"		 	=> $this->_title_page,
			"title_form" 	=> "Create ".$this->_title_form,
			"active_page" 	=> $this->_active_page
		);

		$this->_data['group'] = $this->Menu_model->get_all_group();

		$this->_footer = array(
			"script_js" => $this->_view_js_folder ."create_js"
		);

		$this->load->view(LAYOUT_HEADER, $this->_header);
		$this->load->view($this->_view . "create", $this->_data);
		$this->load->view(LAYOUT_FOOTER, $this->_footer);
	}

	/*
	* function process save menu 
	* @param 
	* @return json array
	*/
	public function process_form()
	{
		if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
			exit('No direct script access allowed');
		}

		//initials alert
		$this->_msg['alert_error'] = true;
		$this->_msg['alert_msg']   = "";
		$this->_msg['redirect']	   = "";

		//set post
		$id 		= $this->input->post('id');
		$name 		= $this->input->post('name');
		$url 		= $this->input->post('url');
		$icon 		= $this->input->post('icon');
		$controller = $this->input->post('controller');
		$action 	= $this->input->post('action');
		$group 		= $this->input->post('group');
		$user_id	= $this->session->userdata("ID");
		$now 		= date('Y-m-d H:i:s');

		$action = ($action == 1) ? "CRUD" : "EXPORT/IMPORT";
		//print_r($this->input->post());exit;

		// $this->form_validation->set_rules("icon","Icon Menu","required");
		$this->form_validation->set_rules("controller","Controller Menu","required");
		$this->form_validation->set_rules("group","Group Menu","required");

		if( $this->form_validation->run() == FALSE) {
			$this->_msg['alert_msg'] = validation_errors();
		} else {

			//begin transaction
			$this->db->trans_begin();

			//prepare insert array to database;
			$_insert = array(
				"menu_name" 	  		=> $name,
				"menu_icon"		  		=> $icon,
				"menu_url"		  		=> $url,
				"menu_controller_name" 	=> $controller,
				"menu_group_id"   		=> $group,
				"menu_action"			=> $action
			);
			// print_r($this->input->post());exit;

			//cek id if null then insert
			if( $id == "" )
			{	
				//set insert created date and created by
				$_insert['menu_created_date'] = $now;
				$_insert['menu_created_by']	  = $user_id;

				$result = $this->Menu_model->insert($_insert);

				//end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $this->_msg['alert_msg'] = 'database operation failed.';

                } else {
                    $this->db->trans_commit();

                    $this->_msg['alert_error'] = false;
                    //success.
                    //growler.
                    $this->_msg['alert_title'] = "Good!";
                    $this->_msg['alert_msg']   = "New Menu has been added.";
                    $this->_msg['redirect'] = site_url("menu");
                }
			} else {
				//conditions update

				$conditions = array("menu_id" => $id);
				//set updateed date and updated by
				$_insert['menu_updated_date'] = $now;
				$_insert['menu_updated_by']	  = $user_id;

				$result = $this->Menu_model->update($_insert, $conditions);

				//end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $this->_msg['alert_msg'] = 'database operation failed.';

                } else {
                    $this->db->trans_commit();

                    $this->_msg['alert_error'] = false;
                    //success.
                    //growler.
                    $this->_msg['alert_title'] = "Good!";
                    $this->_msg['alert_msg']   = "Menu has been updated.";
                    $this->_msg['redirect'] = site_url("menu");
                }
			}
			//set output to  json array
			$this->output->set_content_type('application/json');
			echo json_encode($this->_msg);
			exit;
		}
	}
}

/* End of file Menu.php */
/* Location: ./application/modules/menu/controllers/Menu.php */