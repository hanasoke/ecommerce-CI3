<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Load the URL Helper
        $this->load->helper('url');

        // Load database library
        $this->load->database();

        // Load Seller Model
        $this->load->model('Car_model');

        // Load Form Validation Library
        $this->load->library('form_validation');

        // load session library
        $this->load->library('session');
    }

    public function index() 
    {
        // list all cars 
        $data['cars'] = $this->Car_model->get_cars();
        $this->load->view('car/index');
    }

    public function add()
    {
        
    }
}


?>