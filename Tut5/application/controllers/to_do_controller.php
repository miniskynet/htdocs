<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  to_do_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('to_do_model');
		$this->load->library('session');
	}

	public function index()
	{
		$userid = $this->session->userdata('userid');
		$data['actions'] = $this->to_do_model->getTasks($userid);
		$this->load->view('to_do_view',$data);
	}

	public function setAction()
	{
		if(!($this->session->userdata('userid'))) {
			$data = array('userid' => uniqid());
			$this->session->set_userdata($data);
			log_message('debug', 'User ID generated: ' . $data['userid']);
		}

		if ($this->input->post('action')){
			$action = $this->input->post('action');
		}

		$this->to_do_model->add($this->session->userdata('userid'), $action);
		redirect('to_do_controller/index');
	}

}
