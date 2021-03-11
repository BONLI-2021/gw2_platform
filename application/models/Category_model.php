<?php

/**
 * 分类
 */
class Category_model extends MY_Model {
	
	function __construct(){
		parent::__construct();
	}


	/** 
	 * selectCate
	 * @access public 
	 * @author  lyne
	 * @return  array
	 */  
	public function selectCate($level=1,$pid=0){
		
		$this->db->select('id,cate_name,pid,level,sort_weight,is_show');
		$this->db->from('gw_cate');
		$this->db->where('level',$level);
		$this->db->where('pid',$pid);
		$this->db->order_by('sort_weight desc');
		if($this->query = $this->db->get()){
			return $this->getRows();
		}
		return false;
	}


	/**
	 * insertCate
	 * @author  lyne
	 */
	public function insertCate($data){
		if(!$data) return false;
		$insert = $this->db->set($data)->get_compiled_insert('gw_cate');
		if($this->db->query($insert)){
			return $this->db->insert_id();
		}
		return false;
	}


	/**
	 * updateCate
	 * @author  lyne
	 */
	public function updateCate($cate_id,$data){
		if(!$cate_id || !$data) return false;
		$this->db->where('id',$cate_id);
		$sql = $this->db->set($data)->get_compiled_update('gw_cate');
		if($this->db->query($sql)){
			return $this->db->affected_rows();
		}
		return false;
	}

}