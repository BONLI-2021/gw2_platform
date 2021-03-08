<?php

/**
 * 供应商
 */
class Vendor_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * 查询供应商列表
	 * @author lyne
	 */
	public function selectVendorList($options){
		$this->db->select('*');
		$this->db->from('gw_vendor');
		if ($options['state']!=null) {
            $this->db->where('state',$options['state']);
        }
        // 关键字like查询
        if ($options['vendor_name']) {
            $this->db->like('vendor_name',$options['vendor_name']);
        }
		$tmpDB = clone($this->db);
		$count = $this->db->count_all_results();
		$this->db = $tmpDB;
		$this->db->order_by('add_time desc');
		$offset = ($this->uri->segment(3,  1) - 1) * $this->limitRows;
        $this->db->limit($this->limitRows, $offset);    // 添加limit

		if($this->query = $this->db->get()){
			$list = $this->getRows();
			$vendor['count'] = $count;
			$vendor['list'] = $list;
			$vendor['offset'] = $offset;
			return $vendor;
		}
		return false;
	}

	/**
	 * 验证供应商名称是否存在
	 * @author lyne
	 */
	public function checkVendor($name){
		if(!$name) return false;
		$this->db->where('vendor_name',$name);
		$count = $this->db->count_all_results('gw_vendor');
		return $count;
	}

	/**
	 * 创建供应商
	 * @author lyne
	 */
	public function insertVendor($data,$admin){
		if(!$data || !$admin) return false;
		$this->db->trans_begin();

		$insert = $this->db->set($data)->get_compiled_insert('gw_vendor');
		$this->db->query($insert);
		$r1 = $this->db->insert_id();

		if($r1){
			$admin['vendor_id'] = $r1;
			$insert2 = $this->db->set($admin)->get_compiled_insert('admin');
			$this->db->query($insert2);
			$r2 = $this->db->insert_id();

			if($this->db->trans_status()===FALSE || !$r1 || !$r2){
				$this->db->trans_rollback();
				return false;
			}else{
				$this->db->trans_commit();
				return true;
			}
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}

	/**
	 * 查询指定供应商
	 * @author lyne
	 */
	public function selectVendorInfo($id){
		$this->db->select('*');
		$this->db->from('gw_vendor');
		$this->db->where('id',$id);
		if($query = $this->db->get()){
			return $query->first_row('array');
		}
		return false;
	}

	/**
	 * 更新供应商
	 * @author sam
	 */
	public function updateVendor($id,$data){
		$this->db->where('id',$id);
		$sql = $this->db->set($data)->get_compiled_update('gw_vendor');
		if($this->db->query($sql)){
			return $this->db->affected_rows();
		}
		return false;
	}

	/**
	 * 删除供应商
	 * @author lyne
	 */
	public function deleteVendor($id){
		if(!$id) return false;
		$this->db->where('id',$id);
		$sql = $this->db->get_compiled_delete('gw_vendor');
		if($this->db->query($sql)){
			return $this->db->affected_rows();
		}
		return false;
	}


	/** 
	 * 编辑供应商状态
	 * @access public 
	 * @author  lyne
	 */  
	public function updateVendorStatus($id,$data){
		$this->db->set('state',$data);
		$this->db->where('id',$id);
		if($this->db->update('gw_vendor')){
			return $this->db->affected_rows();
		}
		return false;
	}
	 
	/** 
	 * 查看供应商下有无商品
	 * @access public 
	 * @author  lyne
	 */  
	public function selectVendorProducts($id){
		if(!$id) return false;
		$this->db->select('id');
		$this->db->from('gw_goods');
		$this->db->where('vendor_id',$id);
		$count = $this->db->count_all_results();
		return $count;
	}


	/**
	 * 查询所有供应商
	 * @author lyne
	 */
	public function selectVendor(){
		$this->db->select('*');
		$this->db->from('gw_vendor');
		$this->db->where('state',1);
		if($this->query = $this->db->get()){
			return $this->getRows();
		}
		return false;
	}


}
