<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();

        // Load Session Library
        $this->load->library('session');
        // Load the URL Helper
        $this->load->helper('url');

		$this->load->database();
        // Load Seller Model
        $this->load->model('Seller_model');

        // Load Form Validation Library
        $this->load->library('form_validation');
	}


	public function index()
	{
		// List all sellers
		$data['sellers'] = $this->Seller_model->get_sellers();
		$this->load->view('home', $data);
	}

    public function add()
    {
        // Set validation rules
        $this->form_validation->set_rules('seller_name', 'Name', 'required');
        $this->form_validation->set_rules('seller_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('seller_phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('seller_address', 'Address', 'required');

        if($this->form_validation->run() ==  FALSE) {
            // validation failed, reload the add form woth errors
            $this->load->view('crud/add');
        } else {
            // Validation passed, insert data
            $data = array(
                'seller_name' => $this->input->post('seller_name'),
                'seller_email' => $this->input->post('seller_email'),
                'seller_phone' => $this->input->post('seller_phone'),
                'seller_address' => $this->input->post("seller_address"),
                'seller_picture' => $this->input->post('seller_picture')
            );

            if($this->Seller_model->add_seller($data)) {
                $this->session->set_flashdata('success', 'Seller added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to add seller.');
            }
           
            redirect('sellers');
        }
    }

    public function edit($id) 
    {
        // Set validation rules
        $this->form_validation->set_rules('seller_name', 'Name', 'required');
        $this->form_validation->set_rules('seller_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('seller_phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('seller_address', 'Address', 'required');
        $this->form_validation->set_rules('seller_picture', 'Picture', 'required');
        
        if($this->form_validation->run() == FALSE) {
            // Validation failed, reload the edit form with errors
            $data['seller'] = $this->Seller_model->get_seller($id);
            $this->load->view('crud/edit', $data);
        } else {
            // Validation passed, update data
            $data = array(
                'seller_name' => $this->input->post('seller_name'),
                'seller_email' => $this->input->post('seller_email'),
                'seller_phone' => $this->input->post('seller_phone'),
                'seller_address' => $this->input->post('seller_address'),
                'seller_picture' => $this->input->post('seller_picture')
            );

            if($this->Seller_model->update_seller($id, $data)) {
                $this->session->set_flashdata('success', 'Seller updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update seller.');
            }

            redirect('sellers');
        }
    }

    public function delete($id)
    {
        if($this->Seller_model->delete_seller($id)) {
            $this->session->set_flashdata('success', 'Seller deleted successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete seller.');
        }
        redirect('sellers');
    }
}