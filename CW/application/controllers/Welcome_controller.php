<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Welcome_model');
		$this->load->library('session');
	}

	public function signup() {
		//check if the request is a POST request
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			//get the POST data and store in variables
			$userData = array(
				'first_name' => $this->input->post('fname'),
				'last_name' => $this->input->post('lname'),
				'username' => $this->input->post('usernameSignup'),
				'password' => password_hash($this->input->post('passSignup'), PASSWORD_DEFAULT),
				'email' => $this->input->post('email')
			);

			//insert retrieved user data into the database
			$inserted = $this->Welcome_model->insert_user($userData);

			//return if insertion was successful or not
			if ($inserted) {
				$response = array('success' => true, 'message' => 'Account created successfully.');
			} else {
				$response = array('success' => false, 'message' => 'Username or Email already exists. Please choose different ones.');
			}

			//return JSON response
			echo json_encode($response);
			return;
		}

		//if not a POST request load the index view
		$this->index();
	}

	public function login() {
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$username = $this->input->post('usernameLogin');
			$password = $this->input->post('passLogin');

			$user = $this->Welcome_model->get_user($username);

			//un-hash the user password in the database and compare with user entered password
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

	//goes to home page
	public function home() {
		if (!$this->session->userdata('user_id')) {
			redirect('/');
		}
		$this->load->view('Home_view');
	}

	//initially load the welcome page
	public function index() {
		$this->load->view('Welcome_view');
	}
}

