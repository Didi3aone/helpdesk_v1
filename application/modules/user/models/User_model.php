<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * @package	User model
 * @author	Didi threeaone
 * @link	it-underground.web.id
 * @since
 */
class User_model extends CI_Model {

	//init variable private 
	private static $Instance = null;
	/* get table menu*/	
	protected $_table 	  = 'mst_user';
	/*set alias*/
	protected $_tbl_alias = 'mu';
	/*get id primary key tbl menu*/
	protected $_pk_id	  = 'UserId';

	public function __construct() {
		parent::__construct();
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

	/**
	* function for get all data 
	* return  default no paramater all data
	* @param  $id @return ROW_ARRAY
	* @author DIdi threeaone
	*/
	public function get_all_data( $params = array())
	{
		if( isset($params['UserId']) ) {
			$this->db->where($this->_tbl_alias.'.UserId', $params['UserId']);
		}

		$this->db->select(
			$this->_tbl_alias.".*, 
			tur.*,
			mup.menu_id,
			IF(mu.UserIsState = 1,'Login','Logout') as State
		");
		$this->db->from($this->_table." ".$this->_tbl_alias);
		$this->db->join("trs_user_role tur","tur.role_id = ".$this->_tbl_alias.".UserRoleId");
		$this->db->join("mst_user_profile mup","mup.profile_id = ".$this->_tbl_alias.".UserProfileId");
		$this->db->where($this->_tbl_alias.".UserIsActive",STATUS_ACTIVE);

		$this->_result = $this->db->get();

		if( isset($params['UserId']) && $params['UserId'] != '' )
		{
			return $this->_result->row_array();
		} else {
			return $this->_result->result_array();
		}
	}

	/**
	* function insert 
	* @param $data 
	* @author DIdi threeaone
	*/
	public function insert( $data )
	{
		$this->db->insert($this->_table, $data);
		return $this->db->insert_id();
	}

	/**
	* function update
	* @param $data, $condition 
	* @author DIdi threeaone
	*/
	public function update( $data , $condition )
	{
		return $this->db->update($this->_table, $data, $condition);
	}

	/**
	* function check login 
	* @param $username, $password 
	* @return ROW_ARRAY
	* @author DIdi threeaone
	*/
	public function delete( $permanent = true, $condition )
	{
		$data = array(
			"UserIsActive" => STATUS_NOT_ACTIVE
		);

		if( $permanent )
		{
			return $this->db->delete($this->_table, $condition);
		} else {
			return $this->db->update($this->_table, $data, $condition);
		}
	}

	/**
	* function check login 
	* @param $username, $password 
	* @return ROW_ARRAY
	* @author DIdi threeaone
	*/
	public function check_login( $username, $password )
	{
		$this->db->select($this->_tbl_alias.".*, tur.*");
		$this->db->from($this->_table." ".$this->_tbl_alias);
		$this->db->join("trs_user_role tur","tur.role_id = ".$this->_tbl_alias.".UserRoleId");
		$this->db->where($this->_tbl_alias.".UserName", $username);
		$this->db->where($this->_tbl_alias.".UserPassword", $password);

		return $this->db->get($this->_table)->row_array();
	}
}
/* End of file User_model.php */
/* Location: ./application/modules/user/models/User_model.php */