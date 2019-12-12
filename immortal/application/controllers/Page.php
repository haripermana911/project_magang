<?php 
	/**
	 * 
	 */
	class Page extends CI_Controller{
		public function __construct(){
	        parent::__construct();
	        $this->load->model('login_model');
	        if($this->session->userdata('masuk') != TRUE){
		        $url=base_url('login');
		        redirect($url); 
		    }
		}

		public function index(){
			$this->load->view('landing/landing_page');
		}

		public function data_admin(){
			if($this->session->userdata('akses')=='1'){
		      $data['admin'] =$this->login_model->getAlladmin();
		      $this->load->view('halaman/halaman_semua_karyawan', $data);
		    }
		}

		public function data_hrd(){
		    if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		      $data['hrd'] =$this->login_model->getAllard();
		      $this->load->view('halaman/halaman_ard', $data);
		    }
	    }

	    public function data_ga(){
		    if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='3'){
		      $data['ga'] =$this->login_model->getAllga();
		      $this->load->view('halaman/halaman_ga', $data);
		    }
	    }

	    public function data_it(){
	    	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='4'){
	    		$data['it'] = $this->login_model->getAllit();
	    		$this->load->view('halaman/halaman_it', $data);
	    	}
	    }
	}
?>