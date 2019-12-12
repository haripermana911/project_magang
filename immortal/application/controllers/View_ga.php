<?php 
	/**
	 * 
	 */
	class View_ga extends CI_Controller{
		public function __construct(){
	        parent::__construct();
	        $this->load->model('data_ga');
	        $this->load->helper('url');
	    }

		public function index(){
			$data['ga'] = $this->data_ga->tampil_data()->result();
			$data['title'] = "Data GA";
			$this->load->view('halaman/halaman_ga', $data);
		}

		public function lihat_feedback($id){
	    	$detail = $this->data_ga->detail_feedback($id);
	    	$data['detail'] = $detail;
	    	$this->load->view('lihat_data/lihat_data_ga', $data);
	    }
		
	}
?>