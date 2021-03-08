<?php

/**
 * 商品
 */
class Goods_model extends MY_Model {
	
	function __construct(){
		parent::__construct();
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
		$offset = ($this->uri->segment(3,  1) - 1) * $this->limitRows;
        $this->db->limit($this->limitRows, $offset);    // 添加limit

		if($this->query = $this->db->get()){
			// echo $this->db->last_query();
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
	 * 获取所有分类
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
	 * selectSpec
	 * @author  lyne
	 */
	public function selectSpec(){
		$this->db->select('id,spec_name');
		$this->db->from('gw_spec');
		if($this->query = $this->db->get()){
			return $this->getRows();
		}
		return false;
	}

	/**
	 * selectVendor
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
	 * insertGoods
	 * @author lyne
	 */
	public function insertGoods($data,$gw_stock){
		if(!$data || !$gw_stock) return false;
		$this->db->trans_begin();
		
		$sql1 = $this->db->set($data)->get_compiled_insert('gw_goods');
		$this->db->query($sql1);
		$goods_id = $this->db->insert_id();

		$code = sprintf("%05d",$goods_id);
		$goods_code = mt_rand(0,9).substr($code,0,1).substr($code,4,1).substr($code,2,2).substr($code,1,1);
		$sql2 = $this->db->where('id',$goods_id)->set('goods_code',$goods_code)->get_compiled_update('gw_goods');
		$this->db->query($sql2);
		$res1 = $this->db->affected_rows();

		foreach ($gw_stock as $k => &$v) {
			$v['goods_id'] = $goods_id;
		}
		$this->db->insert_batch('gw_stock',$gw_stock);
		$res2 = $this->db->affected_rows();

		if ($this->db->trans_status() === FALSE || !$goods_id || !$res1 || !$res2)
		{
		    $this->db->trans_rollback();
		    return false;
		}
		else
		{
		    $this->db->trans_commit();
		    return true;
		}		
	}


	/**
	 * getGoodsStock
	 * @author lyne
	 */
	public function getGoodsStock($goods_id){
		if(!$goods_id) return false;
		$this->db->select_sum('stock');
		$this->db->from('gw_stock');
		$this->db->where('goods_id',$goods_id);
		if($query = $this->db->get()){
			return $query->first_row('array')['stock'];
		}
		return false;
	}

	/**
	 * getGoodsStockList
	 * @author  lyne
	 */
	public function getGoodsStockList($goods_id){
		if(!$goods_id) return false;
		$this->db->select('id as gs_id,spec_name,price,stock,sales,min_buynum');
		$this->db->from('gw_stock');
		$this->db->where('goods_id',$goods_id);
		if($this->query = $this->db->get()){
			return $this->getRows();
		}
		return false;
	}


	/**
	 * updateGoods
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
	 * updateGoodsForEdit
	 * @author  lyne
	 */
	public function updateGoodsForEdit($goods_id,$goods_data,$gw_stock_update,$gw_stock_add){
		
		if(!$goods_id || !$goods_data) return false;
		try {
			
			$this->db->trans_begin();
			// 更新商品表
			if(!empty($goods_data)){
                $goods_data['update_time'] = date('Y-m-d H:i:s',time());
				$sql1 = $this->db->where('id',$goods_id)->set($goods_data)->get_compiled_update('gw_goods');
				$this->db->query($sql1);
				$res1 = $this->db->affected_rows();
				if(!$res1){
					throw new Exception("存储过程失败1", 1);
				}
			}
			
			// 更新库存表
			if(!empty($gw_stock_update)){
				$res2 = $this->db->update_batch('gw_stock',$gw_stock_update,'id');
				if(!$res2){
					throw new Exception("存储过程失败2", 1);
				}
			}
			// 新增库存表
			if(!empty($gw_stock_add)){
				$res3 = $this->db->insert_batch('gw_stock',$gw_stock_add);
				if(!$res3){
					throw new Exception("存储过程失败3", 1);
				}
			}
			
			if ($this->db->trans_status() === FALSE)
			{
			    throw new Exception("存储过程失败4", 1);
			}
			else
			{
			    $this->db->trans_commit();
			    return true;
			}
		} catch (Exception $e) {
			// echo $e->getMessage();exit;
			 $this->db->trans_rollback();
			 return false;
		}
	}


	/**
	 * deleteStockById
	 * @author lyne
	 */
	public function deleteStockById($id){
		if(!$id) return false;
		$sql = $this->db->where('id',$id)->get_compiled_delete('gw_stock');
		if($this->db->query($sql)){
			return $this->db->affected_rows();
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
		
		$this->db->select('g.*,s.spec_name,s.price,s.stock,s.sales,s.min_buynum,c.cate_name as cate_two_name,v.vendor_name');
		$this->db->from('gw_stock s');
		$this->db->join('gw_goods g','g.id=s.goods_id','left');
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