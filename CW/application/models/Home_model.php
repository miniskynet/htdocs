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
		$posts = $query->result_array();

		foreach ($posts as &$post) {
			$post['comments'] = $this->get_comments($post['post_id']);
		}

		return $posts;
	}

	public function get_post_by_id($id) {
		$this->db->select('posts.*, users.username, posts.up_votes');
		$this->db->from('posts');
		$this->db->join('users', 'posts.user_id = users.id');
		$this->db->where('posts.post_id', $id);
		$query = $this->db->get();
		$post = $query->row_array();

		if ($post) {
			$post['comments'] = $this->get_comments($post['post_id']);
		}

		return $post;
	}

	public function upvote_post($post_id) {
		$this->db->set('up_votes', 'up_votes+1', FALSE);
		$this->db->where('post_id', $post_id);
		$this->db->update('posts');
		$updated_upvotes = $this->db->get_where('posts', array('post_id' => $post_id))->row()->up_votes;

		return $updated_upvotes;
	}

	public function insert_comment($data) {
		return $this->db->insert('comments', $data);
	}

	public function get_comments($post_id) {
		$this->db->select('comments.*, users.username');
		$this->db->from('comments');
		$this->db->join('users', 'comments.user_id = users.id');
		$this->db->where('comments.post_id', $post_id);
		$this->db->order_by('comments.created_at', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
	}
}
