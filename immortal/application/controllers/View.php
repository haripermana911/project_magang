<?php 
	/**
	 * 
	 */
	class View extends CI_Controller{
		public function __construct(){
	        parent::__construct();
	        $this->load->model('data_model');
	    }

	    public function index(){
	    	$data['title'] = "Data Semua Feedback";
	    	$this->load->view('halaman/halaman_semua_feedback', $data);
	    }

	    function get_data_feedback(){
	    	$list = $this->data_model->get_datatables();
	    	$data = array();
        	$no = $_POST['start'];
	    	foreach($list as $sub_array){
	    		$no++;
	    		$row = array(); 
	    		$row[] = $no;
                $row[] = $sub_array->id_feedback;
                $row[] = $sub_array->nik;  
                $row[] = $sub_array->untuk;
                $row[] = word_limiter($sub_array->kritik_saran, 5);
                $row[] = $sub_array->biaya_feedback;
                $row[] = $sub_array->waktu_feedback;
                $row[] = "<a class='btn btn-danger' href='view/delete_feedback/$sub_array->id_feedback' class='delete'>hapus</a>";  

                $data[] = $row;  
	    	}

	    	$output = array(
	            "draw" => $_POST['draw'],
	            "recordsTotal" => $this->data_model->count_all(),
	            "recordsFiltered" => $this->data_model->count_filtered(),
	            "data" => $data,
	        );
	        echo json_encode($output);
	    }

	    function delete_feedback($id_feedback){
	    	$this->load->model("data_model");
	    	$this->data_model->delete_feedback($id_feedback);
	    	redirect('view');
	    }
	}
?>