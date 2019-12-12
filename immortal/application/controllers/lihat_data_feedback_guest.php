<?php 
	class lihat_data_feedback_guest extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('lihat_feedback_guest');
			$this->load->helper('url');
		}

		public function index(){
	    	$data['lihat_guest'] = $this->lihat_feedback_guest->tampil_data()->result();
	    	$data['title'] = "Data Feedback Guest";
	    	$this->load->view('halaman/halaman_Guest', $data);
	    }

	    public function lihat_feedback($id){
	    	$detail = $this->lihat_feedback_guest->detail_feedback($id);
	    	$data['detail'] = $detail;
	    	$this->load->view('lihat_data/lihat_data_guest', $data);
	    }
	}

?>