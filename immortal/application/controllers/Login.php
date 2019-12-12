<?php 
	/**
	 * 
	 */
	class Login extends CI_Controller{
		public function __construct(){
	        parent::__construct();
	        $this->load->model('login_model');
	    }

	    public function index(){
	    	$data['title'] = "Login ADMIN || ARD || GA || IT";
	    	$this->load->view('login/login', $data);
	    }

	    public function cek_login(){
	    	$username = htmlspecialchars($this->input->post('username', TRUE),ENT_QUOTES);
	    	$password = htmlspecialchars($this->input->post('password', TRUE),ENT_QUOTES);
	    	$cek = $this->login_model->auth1($username, $password);

	    	if ($cek->num_rows() > 0) {
	    		$data = $cek->row_array();
	    		$this->session->set_userdata('masuk', TRUE);

	    		if($data['id_level']=='1'){
	                $this->session->set_userdata('akses','1');
	                $this->session->set_userdata('ses_id',$data['id_pegawai']);
	                $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
	                redirect('diagram_admin');
	            }elseif ($data['id_level']=='2') {
	                $this->session->set_userdata('akses','2');
	                $this->session->set_userdata('ses_id',$data['id_pegawai']);
	                $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
	                redirect('diagram_ard'); 
	            }elseif ($data['id_level']=='3') {
	                $this->session->set_userdata('akses','3');
	                $this->session->set_userdata('ses_id',$data['id_pegawai']);
	                $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
	                redirect('diagram_ga');
			
	            }elseif ($data['id_level']== '4'){
	                $this->session->set_userdata('akses','4');
	                $this->session->set_userdata('ses_id',$data['id_pegawai']);
	                $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
	                redirect('diagram_it');
	            }
	    	}else{
	    		$url = base_url('login');
	    		echo $this->session->set_flashdata('msg',"<script>alert('Username atau Password salah !');</script>");
	    		redirect($url);
	    	}
	    }

	    public function logout(){
	    	$this->session->sess_destroy();
	    	redirect(base_url('login'));
	    }
	}
?>