<?php 

class Seller_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_sellers() {
        return $this->db->get('sellers')->result();
    }

    // Get a single seller by ID
    public function get_seller($id) {
        return $this->db->get_where('sellers', array('id_seller' => $id))->row();
    }

    // Add a new seller
    public function add_seller($data) {
        return $this->db->insert('sellers', $data);
    }

    // Update a seller
    public function update_seller($id, $data) {
        $this->db->where('id_seller', $id);
        return $this->db->update('sellers', $data);
    }

    // Delete a seller
    public function delete_seller($id) {
        $this->db->where('id_seller', $id);
        return $this->db->delete('sellers');
    }
}


?>