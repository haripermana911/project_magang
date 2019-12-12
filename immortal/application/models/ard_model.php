<?php
	class ard_model extends CI_Model{
		public function view(){
			$this->db->select('*');
		    $this->db->from('feedback');
		    $this->db->where('untuk','ard');
		    $query = $this->db->get()->result();;
		    return $query;
		}
	}
?>