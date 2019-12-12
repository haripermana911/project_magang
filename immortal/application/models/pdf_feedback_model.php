<?php 
	/**
	 * 
	 */
	class pdf_feedback_model extends CI_Model
	{
		public function view(){
			$this->db->select('*');
		    $this->db->from('feedback');
		    $query = $this->db->get()->result();
		    return $query;
		}

		public function view_row(){
			$this->db->select('*');
		    $this->db->from('feedback');
		    $query = $this->db->get()->result();
		    return $query;
		}
	}
?>