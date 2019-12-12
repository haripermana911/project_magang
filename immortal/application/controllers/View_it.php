<?php 
	/**
	 * 
	 */
	class View_it extends CI_Controller{
		public function __construct(){
	        parent::__construct();
	        $this->load->model('data_it');
	        $this->load->helper('url');
	    }

		public function index(){
			$data['it'] = $this->data_it->tampil_data()->result();
			$data['title'] = "Data IT";
			$this->load->view('halaman/halaman_it', $data);
		}

		public function lihat_feedback($id){
	    	$detail = $this->data_it->detail_feedback($id);
	    	$data['detail'] = $detail;
	    	$this->load->view('lihat_data/lihat_data_it', $data);
	    }
		
	}
?>