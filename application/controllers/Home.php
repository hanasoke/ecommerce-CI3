<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
       
        // Load the URL Helper
        $this->load->helper('url');

        // Load database Library
		$this->load->database();

        // Load Seller Model
        $this->load->model('Seller_model');

        // Load Form Validation Library
        $this->load->library('form_validation');

        // load session library
        $this->load->library('session');
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
        $this->form_validation->set_rules('seller_phone', 'Phone', 'required|numeric|callback_validate_phone');
        $this->form_validation->set_rules('seller_address', 'Address', 'required');

        // File upload configuration
        $config['upload_path'] = FCPATH . 'public/img/sellers/'; // Folder to save uploaded filed
        $config['allowed_types'] = 'jpg|jpeg|png'; // Allowed file types
        $config['max_size'] = 2048; // Max file size in KB (2MB)
        $config['encrypt_name'] = TRUE; // Encrypt file name for security
        
        // Load the upload library with configuration
        $this->load->library('upload', $config);

        // Check if the form validation and file upload are successful
        if($this->form_validation->run() ==  FALSE || !$this->upload->do_upload('seller_picture')) {
            // validation or file upload failed
            $error = $this->upload->display_errors(); // Get file upload errors
            $this->session->set_flashdata('error', $error); // Set error message
            $this->load->view('crud/add'); // Reload the add form
        } else {
            // Validation and file upload failed
            $upload_data = $this->upload->data(); // Get uploaded file data
            $file_name = $upload_data['file_name']; // Get the uploaded file name

            // Prepare data for insertion
            $data = array(
                'seller_name' => $this->input->post('seller_name'),
                'seller_email' => $this->input->post('seller_email'),
                'seller_phone' => $this->input->post('seller_phone'),
                'seller_address' => $this->input->post("seller_address"),
                'seller_picture' => $file_name // Save the file name in the database
            );

            // Insert data into the database
            if($this->Seller_model->add_seller($data)) {
                $this->session->set_flashdata('success', 'Seller added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to add seller.');
            }

            redirect('sellers');
        }
    }

    // Custom callback function to validate phone numbers
    public function validate_phone($phone) {
        if($phone < 0) {
            $this->form_validation->set_message('validate_phone', 'the {field} must be a positive number.');
            return FAlSE;
        }
        return TRUE;
    }

    public function edit($id) 
    {
        // Set validation rules
        $this->form_validation->set_rules('seller_name', 'Name', 'required');
        $this->form_validation->set_rules('seller_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('seller_phone', 'Phone', 'required|numeric|callback_validate_phone');
        $this->form_validation->set_rules('seller_address', 'Address', 'required');

        // File upload configuration
        $config['upload_path'] = FCPATH . 'public/img/sellers';
        $config['allowed_types'] = 'jpg|jpeg|png'; 
        $config['max_size'] = 2048; 
        $config['encrypt_name'] = TRUE;

        // Load the upload library
        $this->load->library('upload', $config);
        
        if($this->form_validation->run() == FALSE || !$this->upload->do_upload('seller_picture')) {
            // Validation or file upload failed
            $error = $this->upload->display_errors(); // Get file upload errors

            $this->session->set_flashdata('error', $error); // Set error message

            // Reload the edit form with the current seller data
            $data['seller'] = $this->Seller_model->get_seller($id);
            $this->load->view('crud/edit', $data);
        } else {
            // File upload successfully
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name']; // Get the uploaded file name

            // Delete the old image if it exists
            $old_image = $this->Seller_model->get_seller($id)->seller_picture;

            if(!empty($old_image) && file_exists(FCPATH . 'public/img/sellers' . $old_image)) {
                unlink(FCPATH . 'public/img/sellers/' . $old_image); // Delete the old image
            }

            // Prepare data for upodate
            $data = array(
                'seller_name' => $this->input->post('seller_name'),
                'seller_email' => $this->input->post('seller_email'),
                'seller_phone' => $this->input->post('seller_phone'),
                'seller_address' => $this->input->post('seller_address'),
                'seller_picture' => $file_name // Save the new or existing file name
            );

            // Update data in the database
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
        // Check if the request is a POST request
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Delete the seller
            if($this->Seller_model->delete_seller($id)) {
                $this->session->set_flashdata('success', 'Seller deleted successfully');
            } else {
                $this->session->set_flashdata('error', 'Failed to delete seller.');
            }
        } else {
            // If the request is not POST, show an error
            $this->session->set_flashdata('error', 'Invalid request method.');
        }

        redirect('sellers');
        
        
        
        
        
    }
}