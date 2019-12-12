<?php 
	/**
	 * 
	 */
	class karyawan_model extends CI_Model{
		public function tampil_data(){
			return $this->db->get('data_karyawan');
		}

		public function input_data($data){
			return $this->db->insert('data_karyawan', $data);
		}

		function tampil_data2(){
			$this->db->select('*');
		    $this->db->from('data_karyawan');
		    $query = $this->db->get();
		    return $query;
		}

		public function hapus_data($where,$table){
			$this->db->where($where);
			$this->db->delete($table);
		}

		public function edit_data($id_karyawan){
			return $this->db->get_where('data_karyawan', $id_karyawan);
		}

		public function update_data($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table, $data);
		}
	}
?>