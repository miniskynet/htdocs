<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class dob_controller extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model('dob_calculator_model');
	}

	public function index()
	{
		$this->load->view('date_of_birth_form');
	}

	public function form()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if (isset($_POST['dateOfBirth'])) {
				$dateOfBirth = $_POST['dateOfBirth'];
			} else {
				$dateOfBirth = 0;
			}
		}
		$user_age = $this->dob_calculator_model->calculateAge($dateOfBirth);
		$data = array('age' => $user_age);
		$this->load->view('date_of_birth_calculated',$data);
	}
}
