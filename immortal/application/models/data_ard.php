<?php 
	/**
	 * 
	 */
	class data_ard extends CI_Model{
		function tampil_data(){
			$this->db->select('*');
		    $this->db->from('feedback');
		    $this->db->where('untuk','ard');
		    $query = $this->db->get();
		    return $query;
		}

		public function detail_feedback($id = NULL){
			$query = $this->db->get_where('feedback', array('id_feedback' => $id))->row();
			return $query;
		}
	}
?>