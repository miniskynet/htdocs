<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Word_form_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('word_form');
	}

	public function getDefinition()
	{
		// This should be replaced with actual logic to get the word definition
		echo 'sample definition';
	}
}

