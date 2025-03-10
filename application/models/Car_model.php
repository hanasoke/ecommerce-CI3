<?php 

class Car_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_cars() {
        return $this->db->get('cars')->result();
    }

    // Get a single car by ID
    public function get_car($id) {
        return $this->db->get_where('cars', array('id' => $id))->row();
    }

    // Add a new car
    public function add_car($data) {
        return $this->db->insert('cars', $data);
    }

    // Update a car
    public function update_car($id, $data) {
        $this->db->where('id', $id);
        return $this->db-> update('cars', $data);
    }

    // Delete a car
    public function delete_car($id) {
        $this->db->where('id', $id);
        return $this->db->delete('cars');
    }

}

?>