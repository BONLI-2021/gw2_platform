<?php

/**
 * 商品
 */
class Goods_model extends MY_Model {
	
	function __construct(){
		parent::__construct();
	}

	/**
	 * insertGoods
	 * @author lyne
	 */
	public function insertGoods($data){
		if(!$data) return false;
		try {
			
			$this->db->trans_begin();
			$sql1 = $this->db->set($data)->get_compiled_insert('gw_goods');
			$this->db->query($sql1);
			$goods_id = $this->db->insert_id();
			if ($goods_id == false) {
				throw new Exception("存储过程失败1", 1);
			}

			$code = sprintf("%05d",$goods_id);
			$goods_code = 'J'.mt_rand(0,9).substr($code,0,1).substr($code,4,1).substr($code,2,2).substr($code,1,1);
			$sql2 = $this->db->where('id',$goods_id)->set('goods_code',$goods_code)->get_compiled_update('gw_goods');
			$this->db->query($sql2);
			$res1 = $this->db->affected_rows();

			if ($res1 == false) {
				throw new Exception("存储过程失败2", 1);
			}

			if ($this->db->trans_status() === FALSE) {
				
				throw new Exception("事务回滚trans_status:false", 1);
			    
			} else {
			    $this->db->trans_commit();
			    return true;
			}

		} catch (Exception $e) {
			$this->db->trans_rollback();
			return false;
		}	
	}

	
	/** 
	 * selectGoods
	 * 根据条件获取商品
	 * @access public 
	 * @author  lyne
	 * @return  array
	 */  
	public function selectGoods($options=null){
		
		$this->db->select('g.*,c.cate_name as cate_two_name,v.vendor_name');
		$this->db->from('gw_goods g');
		$this->db->join('gw_cate c','c.id=g.cate_id_two','left');
		$this->db->join('gw_vendor v','v.id=g.vendor_id','left');

		if($options['search']){ $this->db->like($options['search_key'],$options['search']);}
		if($options['status']){ $this->db->where($options['status']);}
		if($options['vendor_id']){ $this->db->where('g.vendor_id',$options['vendor_id']);}
		$tmpDB = clone($this->db);
		$count = $this->db->count_all_results();
		$this->db = $tmpDB;
		$this->db->order_by('g.add_time desc');
		$offset = ($this->uri->segment(4,  1) - 1) * $this->limitRows;
        $this->db->limit($this->limitRows, $offset);    // 添加limit

		if($this->query = $this->db->get()){
			$list = $this->getRows();
			$order['count'] = $count;
			$order['list'] = $list;
			$order['offset'] = $offset;
			return $order;
		}
		return false;
	}

	/** 
	 * selectCate 
	 * 获取所有分类[通用]
	 * @author lyne
	 * @return  array
	 */  
	public function selectCate($level=1,$pid=0){
		$this->db->select('id,cate_name,pid,level');
		$this->db->from('gw_cate');
		$this->db->where('is_show','1');
		$this->db->where('level',$level);
		$this->db->where('pid',$pid);
		if($this->query = $this->db->get()){
			return $this->getRows();
		}
		return false;
	}

	
	/**
	 * selectVendor
	 * 获取供应商列表[通用]
	 * @author lyne
	 */
	public function selectVendor(){
		$this->db->select('id,vendor_name');
		$this->db->from('gw_vendor');
		$this->db->where('state',1);
		if($this->query = $this->db->get()){
			return $this->getRows();
		}
		return false;
	}

	/**
	 * updateGoods
	 * 更新商品数据[通用]
	 * @author lyne
	 */
	public function updateGoods($id,$data){
		if(!$id || !$data) return false;
		$this->db->where('id',$id);
		$sql = $this->db->set($data)->get_compiled_update('gw_goods');
		if($this->db->query($sql)){
			return $this->db->affected_rows();
		}
		return false;

	}
	

	/**
	 * getCateOneName
	 * 获取一级分类名称[通用]
	 * @author  lyne
	 */
	public function getCateOneName($id){
		if(!$id) return false;
		$this->db->select('cate_name');
		$this->db->from('gw_cate');
		$this->db->where('id',$id);
		if($query = $this->db->get()){
			return $query->first_row('array')['cate_name'];
		}
		return false;
	}

	/**
	 * selectGoodsDetails
	 * 获取商品详情[通用]
	 * @author lyne
	 */
	public function selectGoodsDetails($id){
		if(!$id) return false;
		$this->db->select('g.*,c.cate_name as cate_two_name,v.vendor_name');
		$this->db->from('gw_goods g');
		$this->db->join('gw_cate c','c.id=g.cate_id_two','left');
		$this->db->join('gw_vendor v','v.id=g.vendor_id','left');
		$this->db->where('g.id',$id);
		if($query = $this->db->get()){
			return $query->first_row('array');
		}
		return false;
	}


	/** 
	 * selectExportGoods
	 * 根据条件获取商品导出
	 * @access public 
	 * @author  lyne
	 * @return  array
	 */  
	public function selectExportGoods($options=null){

		$this->db->select('g.*,c.cate_name as cate_two_name,v.vendor_name');
		$this->db->from('gw_goods g');
		$this->db->join('gw_cate c','c.id=g.cate_id_two','left');
		$this->db->join('gw_vendor v','v.id=g.vendor_id','left');

		if($options['search']){ $this->db->like($options['search_key'],$options['search']);}
		if($options['status']){ $this->db->where($options['status']);}
		if($options['vendor_id']){ $this->db->where('g.vendor_id',$options['vendor_id']);}
		$this->db->order_by('g.add_time desc');
		if($this->query = $this->db->get()){
			// echo $this->db->last_query();
			$list = $this->getRows();
			return $list;
		}
		return false;
	}









	

}