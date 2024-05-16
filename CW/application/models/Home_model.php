<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function insert_post($data) {
		return $this->db->insert('posts', $data);
	}

	public function get_posts() {
		$this->db->select('posts.*, users.username');
		$this->db->from('posts');
		$this->db->join('users', 'posts.user_id = users.id');
		$this->db->order_by('posts.created_at', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_post_by_id($id) {
		$this->db->select('posts.*, users.username');
		$this->db->from('posts');
		$this->db->join('users', 'posts.user_id = users.id');
		$this->db->where('posts.id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
}
