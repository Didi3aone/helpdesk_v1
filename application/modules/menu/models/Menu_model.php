<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * @package	Menu model
 * @author	Didi threeaone
 * @link	it-underground.web.id
 * @since
 */
class Menu_model extends CI_Model {
	//init variable private 
	private static $Instance = null;
	/* get table menu*/	
	private $_table = 'mst_menu';
	/*set alias*/
	private $_alias = 'mm';
	/*get id primary key tbl menu*/
	private $_id    = 'menu_id';

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}	

	//debug all query()
	// $this->output->enable_profiler(TRUE);

	/*
	* get instance 
	* string
	*/
	public static function &Instance()
	{
	 
	 	if( is_null(self::$Instance) ) {
			self::$Instance = new self();
	 	}
	 	return self::$Instance;
	}

	/*
	* function for get all menu
	* @param NO
	* @return array
	*/
	public function get_all_menu()
	{
		$this->db->select($this->_alias.".*,mgm.*");
		$this->db->from($this->_table." ".$this->_alias);
		$this->db->join("mst_group_menu mgm","mgm.menu_group_id = ".$this->_alias.".menu_group_id");

		$this->_res = $this->db->get();

		return $this->_res->result_array();
	}

	/*
	* get menu by user login
	* @param user role
	* @return array 
	*/
	public function get_menu_by_user()
	{
		//get param user login
		$this->_get_menu = $this->_show_menu_by_user();

		
		// //explode
		// $this->_get_menu = implode(",", $this->_get_menu);
		// $this->_get_menu = explode(",", $this->_get_menu);
		// // print_r($this->_get_menu);exit;

		// $this->_group_menu = $this->_get_menu['menu_group'];

		// $this->db->select($this->_alias.".*,mgm.*");
		// $this->db->from($this->_table." ".$this->_alias);
		// $this->db->join("mst_group_menu mgm","mgm.menu_group_id=".$this->_alias.".menu_group_id");
		// $this->db->where("(mm.menu_id IN (".$this->_get_menu.") AND mm.menu_group_id IN(".$this->_group_menu.") )");	
		// $this->_result = $this->db->get();

		// return $this->_result->result_array();
	}

	/*
	* show menu by level user
	* @param user role
	* @return array
	*/
	private function _show_menu_by_user()
	{
		$this->_profile_id = $this->session->userdata("LEVEL_ID");

		$this->db->select("mp.*");
		$this->db->from("mst_user_profile mp");
		$this->db->join("trs_user_role tur","tur.role_id = mp.role_id");
		$this->db->where("mp.role_id", $this->_profile_id);
		$this->_result = $this->db->get();

		return $this->_result->row_array();
	}

	/*
	* get all group menu
	* @param NO
	* @return array
	*/
	public function get_all_group()
	{
		$this->db->select();
		$this->db->from("mst_group_menu mgm");

		$this->_result = $this->db->get()->result_array();
		return $this->_result;
	}

	/*
	* insert new menu
	* @param data
	* @return array to database
	*/
	public function insert( $data )
	{
		$this->db->insert($this->_table, $data);
		return $this->db->insert_id();
	}
}

/* End of file Menu_model.php */
/* Location: ./application/modules/menu/models/Menu_model.php */