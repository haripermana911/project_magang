<?php
	class ga_model extends CI_Model{
		public function view(){
			$this->db->select('*');
		    $this->db->from('feedback');
		    $this->db->where('untuk','ga');
		    $query = $this->db->get()->result();;
		    return $query;
		}
	}
?>