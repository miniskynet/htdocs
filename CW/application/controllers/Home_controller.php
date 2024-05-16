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
				$this->session->set_flashdata('message', 'Post submitted successfully.');
			} else {
				$this->session->set_flashdata('message', 'Failed to submit post.');
			}

			redirect('home_controller');
		}
	}

	public function get_posts() {
		$posts = $this->Home_model->get_posts();
		echo json_encode(array('success' => true, 'posts' => $posts));
	}

	public function logout() {
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		redirect('/');
	}

	public function user_profile($user_id) {
		// Implement the functionality to navigate to user profile page
		// This could involve fetching user details, posts, etc.
	}
}
