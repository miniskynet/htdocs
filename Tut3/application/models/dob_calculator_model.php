<?php
class dob_calculator_model extends CI_Model{
	public function calculateAge($dateOfBirth){
		try {
			$from = new DateTime($dateOfBirth);
		} catch (Exception $e) {
		}
		$to = new DateTime('today');
		return $from->diff($to)->y;
	}
}
