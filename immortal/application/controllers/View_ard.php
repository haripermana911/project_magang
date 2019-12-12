<?php 
	/**
	 * 
	 */
	class View_ard extends CI_Controller{
		public function __construct(){
	        parent::__construct();
	        $this->load->model('data_ard');
	        $this->load->helper('url');
	    }

	    public function index(){
	    	$data['ard'] = $this->data_ard->tampil_data()->result();
	    	$data['title'] = "Data ARD";
	    	$this->load->view('halaman/halaman_ard', $data);
	    }

	    public function lihat_feedback($id){
	    	$detail = $this->data_ard->detail_feedback($id);
	    	$data['detail'] = $detail;
	    	$this->load->view('lihat_data/lihat_data_ard', $data);
	    }
	}
?>