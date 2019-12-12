<?php
	class it_model extends CI_Model{
		public function view(){
			$this->db->select('*');
		    $this->db->from('feedback');
		    $this->db->where('untuk','it');
		    $query = $this->db->get()->result();;
		    return $query;
		}
	}
?>