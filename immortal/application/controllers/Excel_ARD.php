<?php
	class Excel_ARD extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('ard_model');
		}

		public function export(){
			header("Content-type: application/vnd-ms-excel");
    		header("Content-Disposition: attachment; filename=Data_feedback_ard.xls");

    		$data['feedback_ard'] = $this->ard_model->view();
    		$this->load->view('export/export_excel_ard', $data);
		}
	}
?>