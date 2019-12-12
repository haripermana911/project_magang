<?php 
	/**
	 * 
	 */
	class pdf_it_model extends CI_Model
	{
		public function view(){
			$this->db->select('*');
		    $this->db->from('feedback');
		    $this->db->where('untuk','IT');
		    $query = $this->db->get()->result();
		    return $query;
		}

		public function view_row(){
			$this->db->select('*');
		    $this->db->from('feedback');
		    $this->db->where('untuk','IT');
		    $query = $this->db->get()->result();
		    return $query;
		}
	}
?>