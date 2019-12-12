<?php 
	/**
	 * 
	 */
	class Karyawan extends CI_Controller{
		public function __construct(){
	        parent::__construct();
	        $this->load->model('karyawan_model');
			$this->load->helper('url');
	    }

	    public function index(){
	    	$data['user'] = $this->karyawan_model->tampil_data()->result();
	    	$data['karyawan'] = $this->karyawan_model->tampil_data2()->result();
	    	$data['title'] = "Data Karyawan";
	    	$this->load->view('input/input_karyawan', $data);
	    	
	    }

	    public function tambah(){
	    	$this->load->view('input/input_karyawan');
	    }

	    public function tambah_aksi(){
	    	$this->form_validation->set_rules('nik','nik','required|trim|is_unique[data_karyawan.nik]|max_lenght[10]');
	    	$this->form_validation->set_rules('nama_karyawan','nama_karyawan','required|trim|is_unique[data_karyawan.nama_karyawan]');
	    	$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
	    	$this->form_validation->set_rules('alamat','alamat','required');
	    	$this->form_validation->set_rules('no_telepon','no_telepon','required');

	    	if($this->form_validation->run() != false){
		    	$nik = $this->input->post('nik');
		    	$nama_karyawan = $this->input->post('nama_karyawan');
		    	$jenis_kelamin = $this->input->post('jenis_kelamin');
		    	$alamat = $this->input->post('alamat');
		    	$no_telepon = $this->input->post('no_telepon');

		    	$text = str_replace(' ','', $nik);
		    	$text2 = str_replace(' ','', $no_telepon);

		    	$data = array(
		    		'nik' => $nik,
		    		'nama_karyawan' => $nama_karyawan,
		    		'jenis_kelamin' => $jenis_kelamin,
		    		'alamat' => $alamat,
		    		'no_telepon' => $no_telepon
		    	);
		    	$cek = $this->karyawan_model->input_data($data);

		    	if ($cek == TRUE) {
	                echo "<script type='text/javascript'>alert('Data Telah Tersimpan');</script>";
		            redirect (site_url('karyawan'),'refresh');
	             }else{
	             	echo "<script type='text/javascript'>alert('Data Gagal Disimpan');</script>";
		            redirect (site_url('karyawan'),'refresh');
	             }
	        }else{
	          	echo "<script type='text/javascript'>alert('Data Sudah Ada Atau Data Kurang Dari 7 Karakter Dan Data Tidak Boleh Kosong');</script>";
	    		redirect(site_url('karyawan'),'refresh');
	        }
	    	
	    }

	    public function hapus($id){
			$where = array('id_karyawan' => $id);
			$this->karyawan_model->hapus_data($where,'data_karyawan');
			redirect('karyawan');
		}

		public function edit_karyawan($id_karyawan){
			$where = array('id_karyawan' => $id_karyawan);
			$data['karyawan'] = $this->karyawan_model->edit_data($where , 'data_karyawan')->result();
			$this->load->view('edit/edit_karyawan', $data);
		}

		public function update(){
			$this->form_validation->set_rules('nik','nik','required|trim|min_length[7]|is_unique[data_karyawan.nik]');
	    	$this->form_validation->set_rules('nama_karyawan','nama_karyawan','required|trim|is_unique[data_karyawan.nama_karyawan]');
	    	$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
	    	$this->form_validation->set_rules('alamat','alamat','required');
	    	$this->form_validation->set_rules('no_telepon','no_telepon','required|min_length[12]');

	    	$id_karyawan = $this->input->post('id_karyawan');

	    	if($this->form_validation->run() != false){
				$id_karyawan = $this->input->post('id_karyawan');
				$nik = $this->input->post('nik');
				$nama_karyawan = $this->input->post('nama_karyawan');
				$jenis_kelamin = $this->input->post('jenis_kelamin');
				$alamat = $this->input->post('alamat');
				$no_telepon = $this->input->post('no_telepon');

				$text = str_replace(' ','', $nik);
		    	$text2 = str_replace(' ','', $no_telepon);

				$data = array(
					'nik' => $nik,
		    		'nama_karyawan' => $nama_karyawan,
		    		'jenis_kelamin' => $jenis_kelamin,
		    		'alamat' => $alamat,
		    		'no_telepon' => $no_telepon
				);

				$where = array(
					'id_karyawan' => $id_karyawan
				);

				$this->karyawan_model->update_data($where,$data,'data_karyawan');
				echo "<script type='text/javascript'>alert('Data Telah Update');</script>";
				redirect (site_url('karyawan'),'refresh');
			}else{
	    		echo "<script type='text/javascript'>alert('Data Sudah Ada Atau Data Kurang Dari 7 Karakter Dan Data Tidak Boleh Kosong');</script>";
	    		redirect(site_url('karyawan/edit_karyawan/'.$id_karyawan),'refresh');
	    	}
		}

	}
?>