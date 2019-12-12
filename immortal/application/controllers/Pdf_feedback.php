<?php
	/**
	 * 
	 */
	class Pdf_feedback extends CI_Controller{
		public function __construct(){
		    parent::__construct();
			$this->load->model('pdf_feedback_model');
		}
		  
		public function cetak(){
		    ob_start();
		    $data['feedback'] = $this->pdf_feedback_model->view_row();
		    $this->load->view('export/export_pdf_feedback', $data);
		    $html = ob_get_contents();
		    	ob_end_clean();
		        
		    	require_once('./assets/html2pdf/html2pdf.class.php');
		    $pdf = new HTML2PDF('P','A4','en');
		    $pdf->WriteHTML($html);
		    $pdf->Output('Data Feedback.pdf', 'D');
		}
	}
?>