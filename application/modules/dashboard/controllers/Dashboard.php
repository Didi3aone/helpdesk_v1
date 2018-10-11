<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $_title_page = 'Dashboard';
	private $_title_form = '';
	protected $_view = 'dashboard/';
	protected $_header;
	protected $_footer;

	public function __construct() {
		parent::__construct();
		$this->load->model('menu/Menu_model');

		if( $this->session->userdata(USER_IS_LOGIN) == FALSE )
		{
			redirect("Auth");
		}
	}

	public function index()
	{
		//get id by user login
		$session_id = $this->session->userdata("LEVEL_ID");
		//get menu by session login
		$get_menu  = $this->Menu_model->get_menu_by_user($session_id);

		$this->_header = array(
			"title"		 => $this->_title_page,
			"title_form" => $this->_title_form,
			"menu"       => $get_menu
		);

		$this->_footer = array();

		$this->load->view(LAYOUT_HEADER, $this->_header);
		$this->load->view($this->_view. "index");
		$this->load->view(LAYOUT_FOOTER, $this->_footer);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */