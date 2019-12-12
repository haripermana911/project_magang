<?php 
	/**
	 * 
	 */
	class data_model extends CI_Model{
		var $table = 'feedback';
	    var $column_order = array(null, 'id_feedback','nik','untuk','kritik_saran','biaya_feedback','waktu_feedback', null);
	    var $column_search = array('nik','untuk','kritik_saran','biaya_feedback','waktu_feedback');
	    var $order = array('id_feedback' => 'asc');

	    public function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }

	    private function _get_datatables_query(){

	        $this->db->from($this->table);

	        $i = 0;    

	        foreach ($this->column_search as $item){
	            if($_POST['search']['value']){
	                 
	                if($i===0){
	                    $this->db->group_start(); 
	                    $this->db->like($item, $_POST['search']['value']);
	                }else{
	                    $this->db->or_like($item, $_POST['search']['value']);
	                }
	                
	                if(count($this->column_search) - 1 == $i) 
	                    $this->db->group_end(); 
	            }
	            $i++;
	        }
	         
	        if(isset($_POST['order'])){
	            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	        }else if(isset($order)){
	            $order = $this->order;
	            $this->db->order_by(key($order), $order[key($order)]);
	        }
	    }
	 
	    function get_datatables() {
	        $this->_get_datatables_query();
	        if($_POST['length'] != -1)
	        $this->db->limit($_POST['length'], $_POST['start']);
	        $query = $this->db->get();
	        return $query->result();
	    }
	     function count_filtered(){
	        $this->_get_datatables_query();
	        $query = $this->db->get();
	        return $query->num_rows();
	    }
	 
	    public function count_all(){
	        $this->db->from($this->table);
	        return $this->db->count_all_results();
	    }

	    public function delete_feedback($id_feedback){
	      	$this->db->where("id_feedback", $id_feedback);
	      	return $this->db->delete("feedback");
	      }
	}
?>