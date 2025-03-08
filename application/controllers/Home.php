<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
        // Load the URL Helper
        $this->load->helper('url');
		$this->load->database();
        $this->load->model('Seller_model');
	}


	public function index()
	{
		// List all sellers
		$data['sellers'] = $this->Seller_model->get_sellers();
		$this->load->view('home', $data);
	}

    public function add()
    {
        if($_POST) {
            $data = array(
                'seller_name' => $this->input->post('seller_name'),
                'seller_email' => $this->input->post('seller_email'),
                'seller_phone' => $this->input->post('seller_phone'),
                'seller_address' => $this->input->post("seller_address"),
                'seller_picture' => $this->input->post('seller_picture')
            );
            $this->Seller_model->add_seller($data);
            redirect('sellers');
        }
        $this->load->view('crud/add');
    }

    public function edit($id) 
    {
        if($_POST) {
            $data = array(
                'seller_name' => $this->input->post('seller_name'),
                'seller_email' => $this->input->post('seller_email'),
                'seller_phone' => $this->input->post('seller_phone'),
                'seller_address' => $this->input->post('seller_address'),
                'seller_picture' => $this->input->post('seller_picture')
            );
            $this->Seller_model->update_seller($id, $data);
            redirect('sellers');
        }
        $data['seller'] = $this->Seller_model->get_seller($id);
        $this->load->view('crud/edit', $data);
    }

    public function delete($id)
    {
        $this->Seller_model->delete_seller($id);
        redirect('sellers');
    }
}