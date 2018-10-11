<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	private $_title_page = 'Menu';
	private $_title_form = 'List all menu';
	private $_active_page = 'menu';
	private $_breadcrumb = "menu";
	protected $_header;
	protected $_footer;
	private $_view = 'menu/';
	private $_view_js_folder = 'menu/javascript/';

	public function __construct() {
		parent::__construct();
		$this->load->model('Menu_model');
	}

	public function index()
	{
		$this->_header = array(
			"plugin_css" => array(
				"assets/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css"
			),
			"title"		  => $this->_title_page,
			"breadcrumb"  => $this->_breadcrumb,
			"title_form"  => $this->_title_form,
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

	public function create ()
	{	
		$this->_header = array(
			// "plugin_css" => array(
			// 	"assets/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css"
			// ),
			"title"		 => $this->_title_page,
			"title_form" => $this->_title_form,
			"active_page" => $this->_active_page
		);

		$this->_footer = array(
			// "plugins_js" => array(
				// "assets/plugin/datatables.net/js/jquery.dataTables.min.js"
			// ),
			"script_js" => $this->_view_js_folder ."list_all_js"
		);

		$this->load->view(LAYOUT_HEADER, $this->_header);
		$this->load->view($this->_view . "create");
		$this->load->view(LAYOUT_FOOTER, $this->_footer);
	}

}

/* End of file Menu.php */
/* Location: ./application/modules/menu/controllers/Menu.php */