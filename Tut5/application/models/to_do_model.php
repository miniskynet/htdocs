<?php

class to_do_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function add($userid,$action)
	{
		$this->db->insert('to_do_actions',array('user_id' => $userid, 'action_title' => $action));
	}

	function getTasks($userid){
		$query = $this->db->get_where('to_do_actions', array('user_id' => $userid));
		return $query->result_array();
	}


}
