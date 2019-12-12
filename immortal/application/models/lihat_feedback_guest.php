<?php 
	class lihat_feedback_guest extends CI_Model{
		public function tampil_data(){
			$this->db->select('*');
			$this->db->from('feedback');
			$this->db->order_by('id_feedback' , 'DESC');
			$this->db->limit('1');
			$query = $this->db->get();
		    return $query;
			// return $this->db->query("SELECT * FROM 'feedback' ORDER BY id_feedback DESC LIMIT 1");
		}

		public function detail_feedback($id = NULL){
			$query = $this->db->get_where('feedback', array('id_feedback' => $id))->row();
			return $query;
		}
	}
?>