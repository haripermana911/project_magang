<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Rest_pegawai extends REST_Controller{
	function __construct($config = 'rest'){
		parent::__construct($config);
		$this->load->database();
	}

	function index_get(){
		$id_pegawai = $this->get('id_pegawai');
		if($id_pegawai == ''){
			$user_pegawai = $this->db->get('user_pegawai')->result();
		}else{
			$this->db->where('id_pegawai', $id_pegawai);
			$user_pegawai = $this->db->get('user_pegawai')->result();
		}
		$this->response($user_pegawai, 200);
	}

	function index_post(){
		$data = array(
					'id_pegawai'		=> $this->post('id_pegawai'),
					'nama_pegawai'		=> $this->post('nama_pegawai'),
					'username'			=> $this->post('username'),
					'password'			=> $this->post('password'),
					'id_level'			=> $this->post('id_level'));
		$insert = $this->db->insert('user_pegawai', $data);
		if($insert){
			$this->response($data, 200);
		}else{
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put() {
        $id_pegawai = $this->put('id_pegawai');
        $data = array(
                    'id_pegawai'       => $this->put('id_pegawai'),
                    'nama_pegawai' 	   => $this->put('nama_pegawai'),
                    'username'     	   => $this->put('username'),
        			'password'		   => $this->put('password'),
        			'id_level'		   => $this->put('id_level'));
        $this->db->where('id_pegawai', $id_pegawai);
        $update = $this->db->update('user_pegawai', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id_pegawai = $this->delete('id_pegawai');
        $this->db->where('id_pegawai', $id_pegawai);
        $delete = $this->db->delete('user_pegawai');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>