<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	//set variable private
	private $_title_page  = 'User';
	private $_title_form  = 'User';
	private $_active_page = 'user';
	private $_breadcrumb  = "user";
	private $_view = 'user/';
	private $_view_js_folder = 'user/javascript/';
	//set protected variable header footer
	protected $_header;
	protected $_footer;

	protected $_data;
	protected $_msg;

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		//set header
		$this->_header = array(
			"plugin_css" => array(
				"assets/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css"
			),
			"title"		  => $this->_title_page,
			"breadcrumb"  => $this->_breadcrumb,
			"title_form"  => "List all ".$this->_title_form,
			"active_page" => $this->_active_page ."-list"
		);

		//get all data user
		$this->_data['datas'] = $this->User_model->get_all_data();
 		
 		//set footer
		$this->_footer = array(
			"plugins_js" => array(
				"assets/plugin/datatables.net/js/jquery.dataTables.min.js"
			),
			"script_js" => $this->_view_js_folder ."list_all_js"
		);

		$this->load->view(LAYOUT_HEADER, $this->_header);
		$this->load->view($this->_view . "index", $this->_data);
		$this->load->view(LAYOUT_FOOTER, $this->_footer);
	}
}

/* End of file User.php */
/* Location: ./application/modules/user/controllers/User.php */