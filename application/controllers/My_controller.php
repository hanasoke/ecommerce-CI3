<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}


	public function index()
	{
		// Data to pass to the view
		$data['message'] = 'Hello from the controller!';

		// Load the view and pass data
		$this->load->view('index', $data);
	}
}
