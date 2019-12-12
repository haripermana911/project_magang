<?php
	class admin_model extends CI_Model{
		public function view(){
			$this->db->select('*');
		    $this->db->from('feedback');
		    $query = $this->db->get()->result();;
		    return $query;
		}
	}
?>