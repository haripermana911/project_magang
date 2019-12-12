<?php 
	/**
	 * 
	 */
	class login_model extends CI_Model{
		public function getAll(){
			return $this->db->get('data_karyawan');
		}

		public function auth1($username,$password){
			$query = $this->db->query("SELECT * FROM user_pegawai WHERE username = '$username' AND password = ('$password')");
			return $query;
		}
	}
?>