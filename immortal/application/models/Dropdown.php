<?php 
	/**
	 * 
	 */
	class Dropdown extends CI_Model{
		function tampil_data(){
			$query = $this->db->get('data_karyawan');
			return $query;
		}
	}
?>