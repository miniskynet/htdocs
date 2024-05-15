<?php

class Welcome_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Welcome_model');
		$this->load->library('session'); // Load the session library
	}

	// Function to check if the username or email already exists
	public function user_exists($username, $email) {
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->or_where('email', $email);
		$query = $this->db->get();
		return $query->num_rows() > 0;
	}

	// Function to insert user data into the database
	public function insert_user($data) {
		// Check if the username or email already exists
		if ($this->user_exists($data['username'], $data['email'])) {
			return false; // User exists, return false to indicate failure
		}
		return $this->db->insert('users', $data); // Insert the data if user does not exist
	}

	public function get_user($username) {
		$this->db->from('users');
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query->row();
	}

}
