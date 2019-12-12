<?php

class model_karyawan extends CI_Model {
    public function index() {

        $query = $this->db->get('feedback', 'asc');
        return $query->result();
    }
    
    public function insertOne($feedback){
        return $this->db->insert('feedback', $feedback);
    }
}
