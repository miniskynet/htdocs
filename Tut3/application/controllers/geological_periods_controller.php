<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geological_Periods_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url'); // Load the URL Helper
		$this->load->model('geological_periods_model');
	}

	public function index() {
		$this->load->view('geological_periods_main_page');
	}

	public function getInfo($period) {
		switch ($period) {
			case 'Triassic':
				$data['info'] = $this->geological_periods_model->triassicAge();
				break;
			case 'Jurassic':
				$data['info'] = $this->geological_periods_model->jurassicAge();
				break;
			case 'Cretaceous':
				$data['info'] = $this->geological_periods_model->cretaceousAge();
				break;
			default:
				$data['info'] = 'Invalid period selected.';
		}

		$this->load->view('geological_periods_main_page', $data);
	}
}
