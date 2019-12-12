<?php
	class Excel_GA extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('ga_model');
		}

		public function export(){
			header("Content-type: application/vnd-ms-excel");
    		header("Content-Disposition: attachment; filename=Data_feedback_ard.xls");

    		$data['feedback_ga'] = $this->ga_model->view();
    		$this->load->view('export/export_excel_ga', $data);
		}
	}
?>