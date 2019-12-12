<?php
	/**
	 * 
	 */
	class Pdf_ARD extends CI_Controller{
		public function __construct(){
		    parent::__construct();
			$this->load->model('pdf_ard_model');
		}
		  
		public function cetak(){
		    ob_start();
		    $data['ard'] = $this->pdf_ard_model->view_row();
		    $this->load->view('export/export_pdf_ard', $data);
		    $html = ob_get_contents();
		    	ob_end_clean();
		        
		    	require_once('./assets/html2pdf/html2pdf.class.php');
		    $pdf = new HTML2PDF('P','A4','en');
		    $pdf->WriteHTML($html);
		    $pdf->Output('Data ARD.pdf', 'D');
		}
	}
?>