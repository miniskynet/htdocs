<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geological_Periods_Model extends CI_Model {

	public function triassicAge() {
		$info = "Sample information for Triassic period.";
		return $info;
	}

	public function jurassicAge() {
		$info = "Sample information for Jurassic period.";
		return $info;
	}

	public function cretaceousAge() {
		$info = "Sample information for Cretaceous period.";
		return $info;
	}
}
