<?php 
	/**
	 * 
	 */
	class Pegawai extends CI_Controller{
		public function __construct(){
	        parent::__construct();
	        $this->load->model('pegawai_model');
			$this->load->helper('url');
			$this->load->library('form_validation');
	    }

	    public function index(){
	    	$data['user'] = $this->pegawai_model->tampil_data()->result();
	    	$data['pegawai'] = $this->pegawai_model->tampil_data2()->result();
	    	$data['title'] = "Data Pegawai";
	    	$this->load->view('input/input_pegawai', $data);
	    	
	    }

	    public function tambah(){
	    	$this->load->view('input/input_pegawai');
	    }

	    public function tambah_aksi(){
	    	$this->form_validation->set_rules('nama_pegawai','nama_pegawai','required|trim|is_unique[user_pegawai.nama_pegawai]');
	    	$this->form_validation->set_rules('username','username','required|min_length[7]|trim|is_unique[user_pegawai.username]');
	    	$this->form_validation->set_rules('password','password','required|min_length[7]|trim');
	    	$this->form_validation->set_rules('id_level','id_level','required');

	    	if($this->form_validation->run() != false){
	    		$nama_pegawai = $this->input->post('nama_pegawai');
		    	$username = $this->input->post('username');
		    	$password = $this->input->post('password');
		    	$id_level = $this->input->post('id_level');

		    	$text = str_replace(' ','', $username);
		    	$text2 = str_replace(' ','', $password);

		    	$data = array(
		    		'nama_pegawai' => $nama_pegawai,
		    		'username' => $username,
		    		'password' => $password,
		    		'id_level' => $id_level,
		    	);
		    	$cek = $this->pegawai_model->input_data($data);

		    	if ($cek == TRUE) {
	                echo "<script type='text/javascript'>alert('Data Telah Tersimpan');</script>";
		            redirect (site_url('pegawai'),'refresh');
	             }else{
	             	echo "<script type='text/javascript'>alert('Data Gagal Disimpan');</script>";
		            redirect (site_url('pegawai'),'refresh');
	             }
	    	}else{
	    		echo "<script type='text/javascript'>alert('Data Sudah Ada Atau Data Kurang Dari 7 Karakter Dan Data Tidak Boleh Kosong');</script>";
	    		redirect(site_url('pegawai'),'refresh');
	    	}
	    	
	    }

	    public function hapus($id){
			$where = array('id_pegawai' => $id);
			$this->pegawai_model->hapus_data($where,'user_pegawai');
			redirect('pegawai');
		}

		public function edit_pegawai($id_pegawai){
			$where = array('id_pegawai' => $id_pegawai);
			$data['pegawai'] = $this->pegawai_model->edit_data($where , 'user_pegawai')->result();
			$this->load->view('edit/edit_pegawai', $data);
		}

		public function update(){
			$this->form_validation->set_rules('nama_pegawai','nama_pegawai','required|trim|is_unique[user_pegawai.nama_pegawai]');
	    	$this->form_validation->set_rules('username','username','required|min_length[7]|trim|is_unique[user_pegawai.username]');
	    	$this->form_validation->set_rules('password','password','required|min_length[7]|trim');
	    	$this->form_validation->set_rules('id_level','id_level','required');

	    	$id_pegawai = $this->input->post('id_pegawai');

	    	if($this->form_validation->run() != FALSE){
				$id_pegawai = $this->input->post('id_pegawai');
				$nama_pegawai = $this->input->post('nama_pegawai');
		    	$username = $this->input->post('username');
		    	$password = $this->input->post('password');
		    	$id_level = $this->input->post('id_level');

		    	$text = str_replace(' ','', $username);
		    	$text2 = str_replace(' ','', $password);

				$data = array(
					'nama_pegawai' => $nama_pegawai,
		    		'username' => $username,
		    		'password' => $password,
		    		'id_level' => $id_level,
				);

				$where = array(
					'id_pegawai' => $id_pegawai
				);

				$this->pegawai_model->update_data($where,$data,'user_pegawai');
				echo "<script type='text/javascript'>alert('Data Telah Update');</script>";
				redirect (site_url('pegawai'),'refresh');
			}else{
	    		echo "<script type='text/javascript'>alert('Data Sudah Ada Atau Data Kurang Dari 7 Karakter Dan Data Tidak Boleh Kosong');</script>";
	    		redirect(site_url('pegawai/edit_pegawai/'.$id_pegawai),'refresh');
	    	}
		}

	}
?>