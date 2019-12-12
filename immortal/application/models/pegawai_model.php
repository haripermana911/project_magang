<?php 
	/**
	 * 
	 */
	class pegawai_model extends CI_Model{
		public function tampil_data(){
			return $this->db->get('user_pegawai');
		}

		public function input_data($data){
			return $this->db->insert('user_pegawai', $data);
		}

		function tampil_data2(){
			$this->db->select('*');
		    $this->db->from('user_pegawai');
		    $query = $this->db->get();
		    return $query;
		}

		public function hapus_data($where,$table){
			$this->db->where($where);
			$this->db->delete($table);
		}

		public function edit_data($id_pegawai){
			return $this->db->get_where('user_pegawai', $id_pegawai);
		}

		public function update_data($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table, $data);
		}
	}
?>