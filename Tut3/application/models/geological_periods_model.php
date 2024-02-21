<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Geological_Periods_Model extends CI_Model
{

	public function triassicAge()
	{
		$info = array('period' => '237-201 mya', 'landAnimals' => 'Archosaurs ("ruling lizards"), 
					  therapsids ("mammal-like reptiles")', 'marineAnimals' => 'Plesiosaurs, ichthyosaurs, fish',
			          'avianAnimals' => '-', 'plantLife' => 'Cycads, ferns, Gingko-like trees, and seed plants');
		return $info;
	}

	public function jurassicAge()
	{
		$info = array('period' => '201-145 mya', 'landAnimals' => 'Dinosaurs (sauropods, therapods),
					   Early mammals, Feathered dinosaurs', 'marineAnimals' => 'Plesiosaurs, fish, squid, marine reptiles',
					   'avianAnimals' => 'Pterosaurs, Flying insects', 'plantLife' => 'Ferns, conifers, cycads, club mosses, horsetail, flowering plants');
		return $info;
	}

	public function cretaceousAge()
	{
		$info = array('period' => '145-66 mya', 'landAnimals' => 'Dinosaurs (sauropods, therapods, raptors, hadrosaurs, herbivorous ceratopsians),
					  Small, tree-dwelling mammals', 'marineAnimals' => 'Plesiosaurs, pliosaurs, mosasaurs, sharks, fish, squid, marine reptiles',
					  'avianAnimals' => 'Pterosaurs, Flying insects, Feathered birds', 'plantLife' => 'Huge expansion of flowering plants');
		return $info;
	}
}
