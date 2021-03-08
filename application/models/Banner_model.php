<?php

/**
 * Banner
 */
class Banner_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * 查询分类列表
	 * @author lyne
	 */
	public function selectBannerList(){

		$this->db->select('*');
		$this->db->from('gw_banner');
		$tmpDB = clone($this->db);
		$count = $this->db->count_all_results();
		$this->db = $tmpDB;
		$this->db->order_by('is_top desc');
		$this->db->order_by('sort_weight desc');
		$offset = ($this->uri->segment(3,  1) - 1) * $this->limitRows;
        $this->db->limit($this->limitRows, $offset);    // 添加limit

		if($this->query = $this->db->get()){
			$list = $this->getRows();
			$Banner['count'] = $count;
			$Banner['list'] = $list;
			$Banner['offset'] = $offset;
			return $Banner;
		}
		return false;
	}

	
	/** 
	 * updateBannerIsTop
	 * 更新置顶banner
	 * @access public 
	 * @author  lyne
	 */  
	public function updateBannerIsTop(){
		$this->db->set('is_top',0);
		if($this->db->update('gw_banner')){
			return $this->db->affected_rows();
		}
		return false;
	}
	

	/** 
	 * insertBanner
	 * 新增banner
	 * @access public 
	 * @author  lyne
	 * @version 1.0
	 * @return  array
	 */  
	public function insertBanner($post_data){
		try {
			
			if(!is_array($post_data)) return false;
			$this->db->trans_begin();
			if($post_data['is_top']==1){
				$sql1 = $this->db->set('is_top',0)->where('is_top',1)->get_compiled_update('gw_banner');
					$this->db->query($sql1);
					$res1 = $this->db->affected_rows();
			}

			$sql2 = $this->db->set($post_data)->get_compiled_insert('gw_banner');
					$this->db->query($sql2);
					$res2 = $this->db->insert_id();
					if(!$res2) {
						exit('3333');
			    		throw new Exception("存储过程失败,事务回滚2002", 1);
					}

			if ($this->db->trans_status() === FALSE)
			{
			    throw new Exception("存储过程失败,事务回滚", 1);
			}
			else
			{
			    $this->db->trans_commit();
				return true;
			}

		} catch (Exception $e) {
			$this->db->trans_rollback();
			return false;
		}

	}
	/**
	 * 更新Banner
	 * @author lyne
	 */
	public function updateBanner($id,$data){
		
		try {
			if(!is_array($data) || !$id) return false;
			$this->db->trans_begin();
			if($data['is_top']==1){
				$sql1 = $this->db->set('is_top',0)->where('is_top',1)->get_compiled_update('gw_banner');
				$this->db->query($sql1);
				$res1 = $this->db->affected_rows();
				if(!$res1){

				}
			}

			$sql2 = $this->db->set($data)->where('id',$id)->get_compiled_update('gw_banner');
			$this->db->query($sql2);
			$res2 = $this->db->affected_rows();
			
			if(!$res2) {
	    		throw new Exception("存储过程失败,事务回滚2002", 1);
			}

			if ($this->db->trans_status() === FALSE)
			{
			    throw new Exception("存储过程失败,事务回滚", 1);
			}
			else
			{
			    $this->db->trans_commit();
				return true;
			}

		} catch (Exception $e) {
			$this->db->trans_rollback();
			return false;
		}
	}

	/**
	 * 查询指定Banner
	 * @author lyne
	 */
	public function selectBannerInfo($id){
		$this->db->select('*');
		$this->db->from('gw_banner');
		$this->db->where('id',$id);
		if($query = $this->db->get()){
			return $query->first_row('array');
		}
		return false;
	}

	/** 
	 * 删除Banner
	 * @access public 
	 * @author  lyne
	 */  
	public function deleteBanner($id){
		$this->db->where('id',$id);
		if($this->db->delete('gw_banner')){
			return $this->db->affected_rows();
		}
		return false;
	}
	 
}