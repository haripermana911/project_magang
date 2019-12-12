<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Rest_karyawan extends REST_Controller{
	function __construct($config = 'rest'){
		parent::__construct($config);
		$this->load->database();
	}

	function index_get(){
		$id_karyawan = $this->get('id_karyawan');
		if($id_karyawan == ''){
			$data_karyawan = $this->db->get('data_karyawan')->result();
		}else{
			$this->db->where('id_karyawan', $id_pegawai);
			$data_karyawan = $this->db->get('data_karyawan')->result();
		}
		$this->response($data_karyawan, 200);
	}

	function index_post(){
		$data = array(
					'id_karyawan'			=> $this->post('id_karyawan'),
					'nik'					=> $this->post('nik'),
					'nama_karyawan'			=> $this->post('nama_karyawan'),
					'jenis_kelamin'			=> $this->post('jenis_kelamin'),
					'alamat'				=> $this->post('alamat'),
					'no_telepon'			=> $this->post('no_telepon'));
		$insert = $this->db->insert('data_karyawan', $data);
		if($insert){
			$this->response($data, 200);
		}else{
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put() {
        $id_karyawan = $this->put('id_karyawan');
        $data = array(
                    'id_karyawan'			=> $this->put('id_karyawan'),
					'nik'					=> $this->put('nik'),
					'nama_karyawan'			=> $this->put('nama_karyawan'),
					'jenis_kelamin'			=> $this->put('jenis_kelamin'),
					'alamat'				=> $this->put('alamat'),
					'no_telepon'			=> $this->put('no_telepon'));
        $this->db->where('id_karyawan', $id_karyawan);
        $update = $this->db->update('data_karyawan', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id_karyawan = $this->delete('id_karyawan');
        $this->db->where('id_karyawan', $id_karyawan);
        $delete = $this->db->delete('data_karyawan');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>