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
				// Success message
				$this->session->set_flashdata('signup_success', 'Account created successfully.');
			} else {
				// Error message
				$this->session->set_flashdata('signup_error', 'Username or Email already exists. Please choose different ones.');
			}

			redirect('http://localhost/CW/');
		}
	}

	public function index() {
		$this->load->view('Welcome_view');
	}
}
