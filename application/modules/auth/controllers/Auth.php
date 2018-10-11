<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	private $_sets_session;
	private $_title_page = '-- Login --';
	private $_title_form = 'User Login';
	protected $_header;
	protected $_footer;
	private $_view = 'auth/';
	private $_view_js_folder = 'auth/javascript/';

	public function __construct() {
		parent::__construct();
		$this->load->model('user/User_model');

		$this->_header = array();
		$this->_footer = array();
		$this->_set_session = array();
	}

	/*
	* function index ( default url class auth)
	* 
	*/
	public function index()
	{
		//set header
		$this->_header = array(
			"title"		 => $this->_title_page,
			"title_form" => $this->_title_form
		);

		//set_footer
		$this->_footer   = array(
			//load view javascript
			"script_js" => $this->_view_js_folder . "login_js"
		);

		$this->load->view(LAYOUT_HEADER_SIGN, $this->_header);
		$this->load->view($this->_view . "login");
		$this->load->view(LAYOUT_FOOTER_SIGN, $this->_footer);
	}

	/*
	* function login ajax prosess
	* @param $username, $password
	* @return json
	*/
	public function process_login ()
	{
		if( !$this->input->is_ajax_request() ) {
			exit('No direct script access allowed');
		}

		//initial notification
		$notif['alert_error'] = true;
		$notif['alert_msg']	  = "";
		$notif['redirect']    = "";
		//load library
		$this->load->library('form_validation');
		//server side validation
		$this->form_validation->set_rules("username","Username","required");
		$this->form_validation->set_rules("password","Password","required");
		//post username and password
		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));
		
		//cek di database apakah user dan password cocok
		$_datas = $this->User_model->check_login($username, $password);

		if( $_datas )
		{
			//set session user login
			$this->_sets_session = array(
				"USER_IS_LOGIN" => TRUE,
				"ID"   			=> $_datas['UserId'],
				"NAME" 			=> $_datas['UserFullName'],
				"LEVEL_NAME"    => $_datas['role_name'],
				"LEVEL_ID" 		=> $_datas['role_id']
			);

			$this->session->set_userdata($this->_sets_session);
			//update status login 
			$this->User_model->update(array(
				"UserLoginTime" => date('Y-m-d H:i:s'),
				"UserIsState"   => STATUS_LOGIN,
				"UserIpAddress" => get_client_ip()
			),array("UserId" => $_datas['UserId']));
			$notif['alert_error'] = false;
			$notif['alert_msg']   = "Login Success";
			$notif['redirect']    = site_url("dashboard");
		} else {
			$notif['alert_error'] = true;
			$notif['alert_msg']   = "Username Or password does not match";
			$notif['redirect']    = "";
		}
		//set output json
		$this->output->set_content_type('application/json');
		echo json_encode($notif);
		exit;
	}

	public function logout()
	{
		$id = $this->session->userdata('ID');
		
		$this->User_model->update(array(
			"UserLogoutTime" => date('Y-m-d H:i:s')
		),array("UserId" => $id));

		$this->session->sess_destroy();
		redirect('Auth');
	}
}

/* End of file Auth.php */
/* Location: ./application/modules/auth/controllers/Auth.php */