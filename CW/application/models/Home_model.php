<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	//insert the post data into the database
	public function insert_post($data) {
		return $this->db->insert('posts', $data);
	}

	//retrieves posts from the database
	public function get_posts() {
		$this->db->select('posts.*, users.username, posts.up_votes');
		$this->db->from('posts');
		$this->db->join('users', 'posts.user_id = users.id');
		//order based on created time
		$this->db->order_by('posts.created_at', 'DESC');
		$query = $this->db->get();
		$posts = $query->result_array();

		//assign comments to the respective posts
		foreach ($posts as &$post) {
			$post['comments'] = $this->get_comments($post['post_id']);
		}

		return $posts;
	}

	//retrieve posts based on user searched keyword
	public function search_posts($query) {
		$this->db->select('posts.*, users.username, posts.up_votes');
		$this->db->from('posts');
		$this->db->join('users', 'posts.user_id = users.id');
		$this->db->like('posts.text', $query);
		$this->db->or_like('posts.game_name', $query);
		$this->db->or_like('users.username', $query);
		$this->db->order_by('posts.created_at', 'DESC');
		$query = $this->db->get();
		$posts = $query->result_array();

		foreach ($posts as &$post) {
			$post['comments'] = $this->get_comments($post['post_id']);
		}

		return $posts;
	}

	//increment the upvotes value in the database by one
	public function upvote_post($post_id) {
		$this->db->set('up_votes', 'up_votes+1', FALSE);
		$this->db->where('post_id', $post_id);
		$this->db->update('posts');
		$updated_upvotes = $this->db->get_where('posts', array('post_id' => $post_id))->row()->up_votes;

		return $updated_upvotes;
	}

	//inserts comment into database
	public function insert_comment($data) {
		return $this->db->insert('comments', $data);
	}

	//retrieve comments based on user and post id
	public function get_comments($post_id) {
		$this->db->select('comments.*, users.username');
		$this->db->from('comments');
		$this->db->join('users', 'comments.user_id = users.id');
		$this->db->where('comments.post_id', $post_id);
		$this->db->order_by('comments.created_at', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	//retrieve user data based on user ID
	public function get_user($user_id) {
		$this->db->where('id', $user_id);
		$query = $this->db->get('users');
		return $query->row_array(); // Return single user as an array
	}


}
