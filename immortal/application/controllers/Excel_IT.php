<?php
	class Excel_IT extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('it_model');
		}

		public function export(){
			header("Content-type: application/vnd-ms-excel");
    		header("Content-Disposition: attachment; filename=Data_feedback_ard.xls");

    		$data['feedback_it'] = $this->it_model->view();
    		$this->load->view('export/export_excel_it', $data);
		}
	}
?>