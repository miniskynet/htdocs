<?php

class all_movies_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getMoviesByGenre($genre){
		$query = $this->db->where('genre', $genre)->from('films')->get()->result();
		return $query;
	}

	public function getAllMovies(){
		$query = $this->db->from('films')->get()->result();
		return $query;
	}


}
