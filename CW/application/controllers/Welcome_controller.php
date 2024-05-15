<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Welcome_model');
		$this->load->library('session'); // Ensure the session library is loaded
	}

	public function signup() {
		// Check if the request is a POST request
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			// Retrieve POST data
			$userData = array(
				'first_name' => $this->input->post('fname'),
				'last_name' => $this->input->post('lname'),
				'username' => $this->input->post('usernameSignup'),
				'password' => password_hash($this->input->post('passSignup'), PASSWORD_DEFAULT),
				'email' => $this->input->post('email')
			);

			// Attempt to insert the user data
			$inserted = $this->Welcome_model->insert_user($userData);

			if ($inserted) {
				// Success response
				$response = array('success' => true, 'message' => 'Account created successfully.');
			} else {
				// Error response
				$response = array('success' => false, 'message' => 'Username or Email already exists. Please choose different ones.');
			}

			// Return JSON response
			echo json_encode($response);
			return;
		}

		// If not a POST request, load the index view
		$this->index();
	}

	public function login() {
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$username = $this->input->post('usernameLogin');
			$password = $this->input->post('passLogin');

			$user = $this->Welcome_model->get_user($username);

			if ($user && password_verify($password, $user->password)) {
				$this->session->set_userdata('user_id', $user->id);
				$response = array('success' => true, 'message' => 'Login successful.');
			} else {
				$response = array('success' => false, 'message' => 'Invalid username or password.');
			}

			echo json_encode($response);
			return;
		}

		$this->index();
	}

	public function home() {
		if (!$this->session->userdata('user_id')) {
			redirect('/');
		}
		$this->load->view('Home_view');
	}

	public function index() {
		$this->load->view('Welcome_view');
	}
}

