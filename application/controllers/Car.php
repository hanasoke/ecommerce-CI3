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
        // Set validation rules
        $this->form_validation->set_rules('name', 'Name', 'required');

        $this->form_validation->set_rules('color', 'Color', 'required');

        $this->form_validation->set_rules('brand', 'Brand', 'required');

        $this->form_validation->set_rules('transmission', 'Transmission', 'required');

        $this->form_validation->set_rules('seat', 'Seat', 'required|numeric');

        $this->form_validation->set_rules('machine', 'Machine', 'required|numeric');

        $this->form_validation->set_rules('power', 'Power', 'required|numeric');

        $this->form_validation->set_rules('price', 'Price', 'required|numeric');

        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');

        $this->form_validation->set_rules('manufacture', 'Manufacture', 'required');

        // File upload configuration
        $config['upload_path'] = FCPATH . 'public/img/cars/'; 

        // Allowed file types
        $config['allowed_types'] = 'jpg|jpeg|png';

        // Max file size in KB (2MB)
        $config['max_size'] = 2048;

        // Encrypt file name for security
        $config['encrypt_name'] = TRUE;

        // Load the upload library with configuration
        $this->load->library('upload', $config);

        // Check if the form validation and file upload are successful
        if($this->form_validation->run() == FALSE || !$this->upload->do_upload('seller_picture')) {
            // validation or file upload failed

            $error = $this->upload->display_errors(); // Get file upload errors

            $this->session->set_flashdata('error', $error); // Set error message

            $this->load->view('car/add'); // Reload the add form
        } else {
            // Validation and file upload failed
            $upload_data = $this->upload->data(); // Get uploaded file data

            $file_name = $upload_data['file_name']; // Get the uploaded file name

            // Prepare data for insertion
            $data = array(
                'name' => $this->input->post('name'),
                'color' => $this->input->post('color'), 
                'brand' => $this->input->post('brand'),
                'transmission' => $this->input->post('transmission'),
                'seat' => $this->input->post('seat'),
                'machine' => $this->input->post('machine'),
                'power' => $this->input->post('power'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock'),
                'manufacture' => $this->input->post('manufacture'),
                'photo' => $file_name // Save the file name in the database
            );

            // Insert data into the database
            if ($this->Car_model->add_car($data)) {
                $this->session->set_flashdata('success', 'Car adeed successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to add seller.');
            }

            redirect('cars');
        }
    }

    public function edit()
    {
        $this->load->view('car/edit');
    }
}


?>