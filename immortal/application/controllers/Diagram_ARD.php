<?php 
	/**
	 * 
	 */
	class Diagram_ARD extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('diagram_pie_ard');
			$this->load->helper('string');
			$this->load->helper(array('url','html','form'));
		}

		public function index(){
			$untukQuery = $this->db->query("SELECT COUNT(*) AS jml, untuk FROM feedback WHERE untuk = 'ARD' GROUP BY untuk");

	    	$data['line_bar'] = $untukQuery->result();
	      	$this->load->view('landing/landing_page', $data);
	    }

	    public function get_data(){
	    	$data = $this->diagram_pie_ard->get_all_data();

	    	$responce->cols[]=array("id_feedback"=>"","label"=>"Topping","pattern"=>"","type"=>"string");
 			$responce->cols[]=array("id_feedback"=>"","label"=>"Slices","pattern"=>"","type"=>"number");

 			foreach ($data->result() as $row) {
 				$responce->rows[]["c"]=array(array("v"=>"$row->untuk","f"=>null),array("v"=>(int)$row->jml,"f"=>null));
 			}
	    	echo json_encode($responce);
	    }
	}
?>