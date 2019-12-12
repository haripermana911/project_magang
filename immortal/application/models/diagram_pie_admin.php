<?php 
	/**
	 * 
	 */
	class diagram_pie_admin extends CI_Model{
		public function get_all_data(){
			$query = $this->db->query('SELECT COUNT(*) AS jml, untuk FROM feedback GROUP BY untuk');
			return $query;
		}
	}
?>