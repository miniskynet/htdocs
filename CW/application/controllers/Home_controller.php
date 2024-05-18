<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->library('session');
	}

	public function index() {
		if (!$this->session->userdata('user_id')) {
			redirect('/');
		}

		$data['posts'] = $this->Home_model->get_posts();
		$this->load->view('home_view', $data);
	}

	public function submit_post() {
		$this->_set_cors_headers();

		if ($this->input->server('REQUEST_METHOD') == 'POST' && $this->session->userdata('user_id')) {
			$postText = $this->input->post('postText');
			$gameName = $this->input->post('gameName');
			$postImage = '';

			if (isset($_FILES['postImage']) && $_FILES['postImage']['size'] > 0) {
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('postImage')) {
					$postImage = 'http://localhost/CW/uploads/' . $this->upload->data('file_name');
				}
			}

			$postData = array(
				'user_id' => $this->session->userdata('user_id'),
				'text' => $postText,
				'image' => $postImage,
				'game_name' => $gameName,
			);

			$inserted = $this->Home_model->insert_post($postData);

			if ($inserted) {
				echo json_encode(array('success' => true, 'message' => 'Post submitted successfully.'));
			} else {
				echo json_encode(array('success' => false, 'message' => 'Failed to submit post.'));
			}
		} else {
			echo json_encode(array('success' => false, 'message' => 'Invalid request or user not authenticated.'));
		}
	}

	public function get_posts() {
		$this->_set_cors_headers();
		$posts = $this->Home_model->get_posts();
		echo json_encode(array('success' => true, 'posts' => $posts));
	}

	public function search_posts() {
		$this->_set_cors_headers();
		if ($this->input->server('REQUEST_METHOD') == 'GET') {
			$query = $this->input->get('query');
			$posts = $this->Home_model->search_posts($query);
			echo json_encode(array('success' => true, 'posts' => $posts));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Invalid request'));
		}
	}

	public function upvote_post() {
		$this->_set_cors_headers();
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$post_id = $this->input->post('post_id');
			$updated_upvotes = $this->Home_model->upvote_post($post_id);
			echo json_encode(array('success' => true, 'message' => 'Post upvoted', 'updated_upvotes' => $updated_upvotes));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Invalid request'));
		}
	}

	public function add_comment() {
		$this->_set_cors_headers();
		if ($this->input->server('REQUEST_METHOD') == 'POST' && $this->session->userdata('user_id')) {
			$post_id = $this->input->post('post_id');
			$comment_text = $this->input->post('comment_text');

			$commentData = array(
				'post_id' => $post_id,
				'user_id' => $this->session->userdata('user_id'),
				'comment_text' => $comment_text,
			);

			$inserted = $this->Home_model->insert_comment($commentData);

			if ($inserted) {
				echo json_encode(array('success' => true, 'message' => 'Comment added successfully.'));
			} else {
				echo json_encode(array('success' => false, 'message' => 'Failed to add comment.'));
			}
		} else {
			echo json_encode(array('success' => false, 'message' => 'Invalid request or user not authenticated.'));
		}
	}

	public function logout() {
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		redirect('http://localhost/CW/');
	}

	public function user_profile($user_id) {
		// Implement the functionality to navigate to user profile page
		// This could involve fetching user details, posts, etc.
	}

	private function _set_cors_headers() {
		header('Access-Control-Allow-Origin: *'); // Adjust as needed for security
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		header('Access-Control-Allow-Headers: Content-Type, Authorization');
		header('Access-Control-Allow-Credentials: true');
		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit; // Return immediately to handle preflight
		}
	}
}
