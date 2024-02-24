<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class movies_controller extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('all_movies_model');
	}

	public function index(){
		$this->load->view('movies_view');
	}

	public function search(){
		if (isset($this->input)) {
			$data = $this->input->post();
		}
		$movies = $this->all_movies_model->getMoviesByGenre($data['genre']);
		$this->load->view('movies_view',array('movies'=>$movies));
	}

	public function allMovies()
	{
		$movies = $this->all_movies_model->getAllMovies();
		$this->load->view('movies_view',array('movies'=>$movies));
	}

}
