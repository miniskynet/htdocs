<?php

class Welcome_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Welcome_model');
		$this->load->library('session');
	}

	//check if the username or email already exists
	public function user_exists($username, $email) {
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->or_where('email', $email);
		$query = $this->db->get();
		return $query->num_rows() > 0;
	}

	//insert user data into the database
	public function insert_user($data) {
		if ($this->user_exists($data['username'], $data['email'])) {
			//alert if user already exists
			return false;
		}
		//insert the data if user does not exist
		return $this->db->insert('users', $data);
	}

	//gets the user details from database
	public function get_user($username) {
		$this->db->from('users');
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query->row();
	}

}
