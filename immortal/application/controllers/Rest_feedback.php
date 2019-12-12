<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Rest_feedback extends REST_Controller{
	function __construct($config = 'rest'){
		parent::__construct($config);
		$this->load->database();
	}

	function index_get(){
		$id_feedback = $this->get('id_feedback');
		if($id_feedback == ''){
			$feedback = $this->db->get('feedback')->result();
		}else{
			$this->db->where('id_feedback', $id_feedback);
			$feedback = $this->db->get('feedback')->result();
		}
		$this->response($feedback, 200);
	}

	function index_post(){
		$data = array(
					'id_feedback'		=> $this->post('id_feedback'),
					'nik'				=> $this->post('nik'),
					'untuk'				=> $this->post('untuk'),
					'kritik_saran'		=> $this->post('kritik_saran'));
		$insert = $this->db->insert('feedback', $data);
		if($insert){
			$this->response($data, 200);
		}else{
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put() {
        $id_feedback = $this->put('id_feedback');
        $data = array(
                    'id_feedback'       => $this->put('id_feedback'),
                    'nik'          		=> $this->put('nik'),
                    'untuk'    			=> $this->put('untuk'),
        			'kritik_saran'		=> $this->put('kritik_saran'));
        $this->db->where('id_feedback', $id_feedback);
        $update = $this->db->update('feedback', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id_feedback = $this->delete('id_feedback');
        $this->db->where('id_feedback', $id_feedback);
        $delete = $this->db->delete('feedback');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>