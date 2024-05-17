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
		$this->db->select('posts.*, users.username, posts.up_votes');
		$this->db->from('posts');
		$this->db->join('users', 'posts.user_id = users.id');
		$this->db->order_by('posts.created_at', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_post_by_id($id) {
		$this->db->select('posts.*, users.username, posts.up_votes');
		$this->db->from('posts');
		$this->db->join('users', 'posts.user_id = users.id');
		$this->db->where('posts.post_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function upvote_post($post_id) {
		$this->db->set('up_votes', 'up_votes+1', FALSE);
		$this->db->where('post_id', $post_id);
		$this->db->update('posts');

		// Retrieve the updated upvotes count
		$updated_upvotes = $this->db->get_where('posts', array('post_id' => $post_id))->row()->up_votes;

		return $updated_upvotes;
	}

}
