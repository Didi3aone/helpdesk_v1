<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	private $_table = 'mst_group_menu';
	private $_alias = 'mgm';
	private $_id    = 'menu_group_id';

	public function __construct() {
		parent::__construct();
	}	

	public function get_all_menu()
	{
		$this->db->select($this->_alias.".*,mm.*");
		$this->db->from($this->_table." ".$this->_alias);
		$this->db->join("mst_menu mm","mm.menu_group_id = ".$this->_alias.".menu_group_id");

		$res = $this->db->get();

		return $res->result_array();
	}

	public function get_menu_by_user( $id )
	{
		$this->db->select($this->_alias.".*,mm.*");
		$this->db->from($this->_table." ".$this->_alias);
		$this->db->join("mst_menu mm","mm.menu_group_id = ".$this->_alias.".menu_group_id");
		$this->db->where($this->_alias.".menu_group_role_id", $id);

		$result = $this->db->get();

		return $result->result_array();
	}

	public function insert( $data )
	{
		$this->db->insert("mst_menu", $data);
		return $this->db->insert_id();
	}
}

/* End of file Menu_model.php */
/* Location: ./application/modules/menu/models/Menu_model.php */