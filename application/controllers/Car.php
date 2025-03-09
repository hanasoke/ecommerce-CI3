<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Load the URL Helper
        $this->load->helper('url');
    }

    public function index() 
    {
        // list all cars 
        
        $this->load->view('car/index');
    }
}


?>