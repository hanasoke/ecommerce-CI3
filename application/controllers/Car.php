<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Load the URL Helper
        $this->load->helper('url');

        // Load database library
        $this->load->database();

        // Load Car Model
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
        $this->load->view('car/index', $data);
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
        $config['upload_path'] = FCPATH . 'public/img/cars'; 

        // Allowed file types
        $config['allowed_types'] = 'jpg|jpeg|png';

        // Max file size in KB (2MB)
        $config['max_size'] = 2048;

        // Encrypt file name for security
        $config['encrypt_name'] = TRUE;

        // Load the upload library with configuration
        $this->load->library('upload', $config);

        // Check if the form validation and file upload are successful
        if($this->form_validation->run() == FALSE || !$this->upload->do_upload('photo')) {

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
                $this->session->set_flashdata('success', 'Car added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to add a car.');
            }

            redirect('cars');
        }
    }

    public function edit($id)
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
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');$this->form_validation->set_rules('manufacture', 'Manufacture', 'required');

        $config['upload_path'] = FCPATH . 'public/img/cars'; 
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;
    
        // Load the upload library
        $this->load->library('upload', $config);

        if($this->form_validation->run() == FALSE) {
            // Validation failed
            $data['car'] = $this->Car_model->get_car($id);
            $this->load->view('car/edit', $data);
        } else {
            // Check if a file was uploaded
            if(!empty($_FILES['photo']['name'])) {
                if(!$this->upload->do_upload('photo')) {
                    // File upload failed
                    $error = $this->upload->display_errors();

                    $this->session->set_flashdata('error', $error);

                    $data['car'] = $this->Car_model->get_car($id);
                    $this->load->view('car/edit', $data);
                    return;
                } else {
                    // File upload successful
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];

                    // Delete the old image if it exists
                    $old_image = $this->Car_model->get_car($id)->photo;

                    if(!empty($old_image)) {
                        unlink(FCPATH . 'public/img/cars/' . $old_image);
                    }
                }
            } else {
                // No file uploaded, retain the old image
                $file_name = $this->Car_model->get_car($id)->photo;
            }

            // Prepare data for update
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
                'photo' => $file_name 
            );

            // Update data in the database
            if($this->Car_model->update_car($id, $data)) {
                $this->session->set_flashdata('success', 'Seller updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update car.');
            }
            redirect('cars');
        }
    }

    public function delete($id)
    {
        // Check if the request is a POST request
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Delete the car
            if($this->Car_model->delete_car($id)) {
                $this->session->set_flashdata('success', 'Car deleted successfully');
            } else {
                $this->session->set_flashdata('error', 'Failed to delete car.');
            }
        } else {
            // If the request is not POST, show an error
            $this->session->set_flashdata('error', 'Invalid request method.');
        }
        redirect('cars');
    }
}


?>