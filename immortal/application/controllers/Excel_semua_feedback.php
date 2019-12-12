<?php
	class Excel_semua_feedback extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');
		}

		public function export(){
			header("Content-type: application/vnd-ms-excel");
    		header("Content-Disposition: attachment; filename=Data_feedback_ard.xls");

    		$data['semua_feedback'] = $this->it_model->view();
    		$this->load->view('export/export_excel_semua_feedback', $data);
		}
	}
?>