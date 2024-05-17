<?php
class Cors {
	public function enable_cors() {
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			header('HTTP/1.1 200 OK');
			exit();
		}
	}
}
