<?php

/**
 * 订单
 */
class Order_model extends MY_Model{
	
	function __construct(){
		parent::__construct();
	}

	/**
	 * getAreaList
	 * 查询所有区域
	 * @author sam
	 * return array
	 */
	public function getAreaList(){
		$this->db->select('*');
		$this->db->from('gw_area');
		$this->db->where('state',1);
		$this->db->where('type !=',1);
		if($this->query = $this->db->get()){
			return $this->getRows();
		}
		return false;
	}

	/**
	 * selectOrderList
	 * 查询父订单列表
	 * @param $option 条件数组
	 * @author sam
	 * return array
	 */
	public function selectOrderList($options){
		if(!is_array($options)) return false;
		$this->db->select('p.*,a.area_name');
		$this->db->from('gw_p_order p');
		$this->db->join('gw_area a','a.id=p.area_id','left');

		if($options['add_time']){ $this->db->where($options['add_time']);}
		if($options['search']){ $this->db->where($options['search']);}
		if($options['os']){ $this->db->where($options['os']); }
		if($options['area']){ $this->db->where($options['area']); }
		$tmpDB = clone($this->db);
		$count = $this->db->count_all_results();
		$this->db = $tmpDB;
		$this->db->order_by('p.add_time desc');
		$this->db->order_by('p.id');
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
	 * checkOrderCancel
	 * 查看订单是否可以取消
	 * @param id 子订单id
	 * @author sam
	 * return array
	 */
	public function checkOrderCancel($id){
		$this->db->select('id');
		$this->db->from('gw_s_order');
		$this->db->where('parent_oid',$id);
		$this->db->where_in('order_status',array(1,2));
		if($this->query = $this->db->get()){
			return $this->getRows();
		}
		return false;
	}

	/**
	 * getVendorOrderList
	 * 获取供应商订单列表
	 * @param $options
	 * @author sam
	 * return array
	 */
	public function getVendorOrderList($options){
		if(!is_array($options)) return false;
		$this->db->select('s.*,p.account,p.consignee,p.consignee_phone,p.addr,p.details,p.add_time,p.review_status,p.area_id,p.area_type,a.area_name,v.vendor_name');
		$this->db->from('gw_s_order s');
		$this->db->join('gw_p_order p','p.id = s.parent_oid','left');
		$this->db->join('gw_area a','a.id = p.area_id','left');
		$this->db->join('gw_vendor v','v.id = s.vendor_id','left');
		if($options['add_time']) $this->db->where($options['add_time']);
		if($options['search']){ $this->db->where($options['search']);}
		if($options['os']){ $this->db->where($options['os']); }
		if($options['area']){ $this->db->where($options['area']); }
		if($options['vendor']){ $this->db->where($options['vendor']); }
		$this->db->where_not_in('p.review_status',array(1,3,-1));
		$tmpDB = clone($this->db);
		$count = $this->db->count_all_results();
		$this->db = $tmpDB;
		$this->db->order_by('p.add_time desc');
		$this->db->order_by('p.id');
		$offset = ($this->uri->segment(3,1) -1)* $this->limitRows;
		$this->db->limit($this->limitRows,$offset);
		$this->query = $this->db->get();
		if($this->query){
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
	 * getVendorList
	 * 获取供应商列表
	 * @author sam
	 * return array
	 */
	public function getVendorList($id=null){
		$this->db->select('*');
		$this->db->from('gw_vendor');
		if($id){
			$this->db->where('id',$id);
		}
		if($this->query = $this->db->get()){
			return $this->getRows();
		}
		return false;
	}

	/**
	 * getOrderDts
	 * 查看订单详情
	 * @param $id 订单id
	 * @author sam
	 * return array
	 */
	public function getOrderDts($id){
		if(!$id) return false;
		$this->db->select('p.*,a.area_name,u.id uid');
		$this->db->from('gw_p_order p');
		$this->db->join('gw_area a','a.id = p.area_id','left');
		$this->db->join('gw_user u','u.account = p.account','left');
		$this->db->where('p.id',$id);
		if($query = $this->db->get()){
			// echo $this->db->last_query();
			return $query->first_row('array');
		}
		return false;
	}

	/**
	 * getSonOrders
	 * 查询子订单
	 * @param $id 父订单id
	 * @author sam
	 * return array
	 */
	public function getSonOrders($id){
		if(!$id) return false;
		$this->db->select('s.*,v.vendor_name');
		$this->db->from('gw_s_order s');
		$this->db->join('gw_vendor v','v.id = s.vendor_id','left');
		$this->db->where('s.parent_oid',$id);
		if($this->query = $this->db->get()){
			return $this->getRows();
		}
		return false;
	}

	/**
	 * getSonOrderDts
	 * 查询子订单详情
	 * @param $id 父订单id
	 * @author sam
	 * return array
	 */
	public function getSonOrderDts($id){
		if(!$id) return false;
		$this->db->select('s.*,p.consignee,p.consignee_phone,p.addr,p.details,p.account,p.review_status,p.add_time,a.area_name');
		$this->db->from('gw_s_order s');
		$this->db->join('gw_p_order p','p.id = s.parent_oid','left');
		$this->db->join('gw_area a','a.id = p.area_id','left');
		$this->db->where('s.id',$id);
		if($query = $this->db->get()){
			return $query->first_row('array');
		}
		return false;
	}

	/**
	 * getSonOrderGoods
	 * 获取子订单商品
	 * @param $id 子订单id
	 * @author sam
	 * return array
	 */
	public function getSonOrderGoods($id){
		if(!$id) return false;
		$this->db->select('g.*,s.s_order_code');
		$this->db->from('gw_order_goods g');
		$this->db->join('gw_s_order s','s.id = g.parent_sid','left');
		$this->db->where('g.parent_sid',$id);
		if($this->query = $this->db->get()){
			return $this->getRows();
		}
		return false;
	}

	/**
	 * getOrderReview
	 * 获取订单审核意见
	 * @param $id 父订单id
	 * @author sam
	 * return array
	 */
	public function getOrderReview($id){
		if(!$id) return false;
		$this->db->select('*');
		$this->db->from('gw_review');
		$this->db->where('p_order_id',$id);
		$this->db->order_by('from_who asc');
		if($this->query = $this->db->get()){
			return $this->getRows();
		}
		return false;
	}

	/**
	 * updateOrderForExpress
	 * 发货更新订单信息
	 * @param $s_id 子订单id
	 * @param $in_data 更新子订单信息
	 * @param $data 更新订单商品发货信息
	 * @author sam
	 */
	public function updateOrderForExpress($s_id,$in_data,$data){
		if(!$s_id || !is_array($in_data) || !is_array($data)) return false;

		$sql1 = $this->db->set($in_data)->where('id',$s_id)->get_compiled_update('gw_s_order');
		$this->db->query($sql1);
		$r1 = $this->db->affected_rows();

		$r2 = $this->db->update_batch('gw_order_goods', $data, 'id');

		if($this->db->trans_status()===FALSE || !$r1 || !$r2){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}

	}

	/**
	 * updateSorderInfo
	 * 更新子订单信息
	 * @param $id 订单id
	 * @param $data 订单信息
	 * @author sam
	 * return array
	 */
	public function updateSonOrderInfo($id,$data){
		if(!$id || !$data) return false;
		
		$this->db->where('id',$id);
		$sql = $this->db->set($data)->get_compiled_update('gw_s_order');
		if($this->db->query($sql)){
			return $this->db->affected_rows();
		}
		return false;
	}

	/**
	 * getVendorInfo
	 * 获取供应商信息
	 * @param $id 供应商id
	 * @author sam
	 * return array
	 */
	public function getVendorInfo($id){
		if(!$id) return false;
		$this->db->select('*');
		$this->db->from('gw_vendor');
		$this->db->where('id',$id);
		if($query = $this->db->get()){
			return $query->first_row('array');
		}
		return false;
	}

	/**
	 * selectExpress
	 * 查询快递公司
	 * @author sam
	 * return array
	 */
	public function selectExpress(){
		$this->db->select('*');
		$this->db->from('express_company_code');
		$this->query = $this->db->get();
		if($this->query){
			return $this->getRows();
		}
		return false;
	}

	/**
	 * reviewOrder
	 * 审核订单
	 * @param id 父订单id
	 * @param comments 意见
	 * @param status 状态
	 * @author sam
	 * return array
	 */
	public function reviewOrder($id,$comments,$status,$time,$info=null,$og=null){
		if(!$id || !$status) return false;
		try{
			$this->db->trans_begin();

			// 订单审核状态
			$sql1 = $this->db->set('review_status',$status)->where('id',$id)->get_compiled_update('gw_p_order');
			$this->db->query($sql1);
			$r1 = $this->db->affected_rows();
			if(!$r1) throw new Exception("存储过程失败", 1);

			// 插入审核
			$data = [];
			$data['p_order_id'] = $id;
			$data['from_who'] = 2;
			$data['review_comments'] = $comments;
			$data['review_time'] = $time;
			$sql2 = $this->db->set($data)->get_compiled_insert('gw_review');
			$this->db->query($sql2);
			$r2 = $this->db->insert_id();
			if(!$r2) throw new Exception("存储过程失败", 1);

			if($status==3 && $info && $og){	// 如果是审核拒绝，需写退款交易日志res3，加回库存res,退款res4
				$deal_arr['user_id'] = $info['uid'];
				$deal_arr['order_id'] = $id;
				$deal_arr['deal_type'] = 4;
				$deal_arr['deal_amount'] = $info['order_amt'];
				$deal_arr['explain'] = $comments;
				$deal_arr['add_time'] = $time;
				
				// 需写退款交易日志res3
				$sql3 = $this->db->set($deal_arr)->get_compiled_insert('gw_deal_logs');
				$this->db->query($sql3);
				$r3 = $this->db->insert_id();
				if(!$r3) throw new Exception("存储过程失败", 1);

				// 加回库存res
				$tmp_res = true;
				foreach ($og as $k => $v) {
					$tmp_sql1 = $this->db->set('`stock`',"`stock`+{$v['buy_num']}",FALSE)->set('`sales`',"`sales`-{$v['buy_num']}",FALSE)->where('goods_id',$v['goods_id'])->where('spec_name',$v['spec_name'])->get_compiled_update('gw_stock');
					$this->db->query($tmp_sql1);
					$res1 = $this->db->affected_rows();
					if(!$res1) $tmp_res = false;

					$tmp_sql2 = $this->db->set('`total_sales`',"`total_sales`-{$v['buy_num']}",FALSE)->where('id',$v['goods_id'])->get_compiled_update('gw_goods');
                    $this->db->query($tmp_sql2);
                    $res2 = $this->db->affected_rows();
                    if(!$res2) $tmp_res = false;
				}
				if(!$tmp_res) throw new Exception("存储过程失败", 1);

				// 退款res4
				$sql4 = $this->db->set('`balance`',"`balance`+{$info['order_amt']}",FALSE)->set('`used_amount`',"`used_amount`-{$info['order_amt']}",FALSE)->where('id',$info['uid'])->get_compiled_update('gw_user');
				$this->db->query($sql4);
				$r4 = $this->db->affected_rows();
				if(!$r4) throw new Exception("存储过程失败", 1);
			}

			if($this->db->trans_status()===FALSE || !$r1 || !$r2){
				throw new Exception("存储过程失败", 1);
			}else{
				$this->db->trans_commit();
				return true;
			}
		}catch(Exception $e){
			$this->db->trans_rollback();
			return false;
		}
	}

	/**
	 * updateOrderInfo
	 * 更新订单信息
	 * @param $id 订单id
	 * @param $status 订单状态
	 * @param $info 父订单信息
	 * @param $og 订单商品数组
	 * @author sam
	 * return array
	 */
	public function updateOrderInfo($id,$status,$info,$og){
		if(!$id) return false;
		try {
			$this->db->trans_begin();
			// 1.更新父订单状态
			$sql1 = $this->db->set('review_status',$status)->where('id',$id)->get_compiled_update('gw_p_order');
			$this->db->query($sql1);
			$r1 = $this->db->affected_rows();
			// echo $r1;

			// 2.更新子订单状态
			$sql2 = $this->db->set('order_status',$status)->where('parent_oid',$id)->get_compiled_update('gw_s_order');
			$this->db->query($sql2);
			$r2 = $this->db->affected_rows();
			// echo $r2;

			// 3.插入操作日志
			$deal_arr['user_id'] = $info['uid'];
			$deal_arr['order_id'] = $id;
			$deal_arr['deal_type'] = 4;
			$deal_arr['deal_amount'] = $info['order_amt'];
			$deal_arr['explain'] = '订单取消退款';
			$deal_arr['admin_account'] = $this->session->login['account'];
			$deal_arr['admin_name'] = $this->session->login['real_name'];
			$deal_arr['add_time'] = time();
			
			// 需写退款交易日志res3
			$sql3 = $this->db->set($deal_arr)->get_compiled_insert('gw_deal_logs');
			$this->db->query($sql3);
			$r3 = $this->db->insert_id();
			// echo $r3;

			// 加回库存res
			$tmp_res = true;
			foreach ($og as $k => $v) {
				$sql = $this->db->set('`stock`',"`stock`+{$v['buy_num']}",FALSE)->set('`sales`',"`sales`-{$v['buy_num']}",FALSE)->where('goods_id',$v['goods_id'])->where('spec_name',$v['spec_name'])->get_compiled_update('gw_stock');
				$this->db->query($sql);
				$res = $this->db->affected_rows();
				if(!$res) $tmp_res = false;
			}
			if(!$tmp_res) throw new Exception("存储过程失败", 1);

			// 退款res4
			$sql4 = $this->db->set('`balance`',"`balance`+{$info['order_amt']}",FALSE)->set('`used_amount`',"`used_amount`-{$info['order_amt']}",FALSE)->where('id',$info['uid'])->get_compiled_update('gw_user');
			$this->db->query($sql4);
			$r4 = $this->db->affected_rows();
			// echo $r4;

			if($this->db->trans_status()===FALSE || !$r1 || !$r2 || !$r3 || !$r4){
				throw new Exception("存储过程失败", 1);
			}else{
				$this->db->trans_commit();
				return true;
			}
		} catch (Exception $e) {
			$this->db->trans_rollback();
			return false;
		}
		
	}








	/**
	 * 发货后订阅成功后，写入推送表
	 * @author lyne
	 */
	public function insertOrderPush($data){
		if(!$data) return false;
		$insert = $this->db->set($data)->get_compiled_insert('express_push');
		if($this->db->query($insert)){
			return $this->db->insert_id();
		}
		return false;
	}

	/**
	 * 获取物流跟踪信息 快递100
	 * @author lyne
	 */
	public function selectPushList($express_no){
		if(!$express_no) return false;
		$this->db->select('*');
		$this->db->from('express_push');
		$this->db->where('express_no',$express_no);
		if($query = $this->db->get()){
			return $query->first_row('array');
		}
		return false;
	}

	/**
	 * selectExportOrder
	 * 查询导出订单
	 * @param $options 条件
	 * @author sam
	 * return array
	 */
	public function selectExportOrder($options){
		if(!is_array($options)) return false;
		$this->db->select('og.goods_name,og.spec_name,og.buy_num,og.buy_price,og.express_num,og.receive_num,so.s_order_code,so.s_order_amt,so.express_no,so.express_com,so.express_time,so.order_status,so.receive_money,po.p_order_code,po.account,po.area_id,po.review_status,po.consignee,po.consignee_phone,po.addr,po.details,po.order_amt,po.add_time,po.remark,v.vendor_name,a.area_name,a.pid,g.goods_code');
		$this->db->from('gw_order_goods og');
		$this->db->join('gw_s_order so','so.id = og.parent_sid','left');
		$this->db->join('gw_p_order po','po.id = so.parent_oid','left');
		$this->db->join('gw_vendor v','v.id = so.vendor_id','left');
		$this->db->join('gw_area a','a.id = po.area_id','left');
		$this->db->join('gw_goods g','g.id = og.goods_id','left');
		if($options['add_time']){ $this->db->where($options['add_time']);}
		if($options['search']){ $this->db->where($options['search']);}
		if($options['os']){ $this->db->where($options['os']);}
		if($options['area']){ $this->db->where($options['area']); }
		$this->db->order_by('po.p_order_code desc');
		$this->db->order_by('so.s_order_code asc');
		// $this->db->order_by('po.add_time desc');
		// $this->db->order_by('po.id');
		if($this->query = $this->db->get()){
			$list = $this->getRows();
			return $list;
		}
		return false;
	}

	/**
	 * getOrdersGoodsByPid
	 * 根据父订单id获取全部订单商品
	 * @param $pid
	 * @author sam
	 * return array
	 */
	public function getOrdersGoodsByPid($pid){
		if(!$pid) return false;
		$this->db->select('og.*');
		$this->db->from('gw_order_goods og');
		$this->db->join('gw_s_order s','s.id = og.parent_sid','left');
		$this->db->where('s.parent_oid',$pid);
		$this->db->order_by('og.id desc');
		$this->query = $this->db->get();
		if($this->query){
			// echo $this->db->last_query();
			return $this->getRows();
		}
		return false;
	}

	/**
	 * selectExportVendorOrder
	 * 获取供应商订单导出列表
	 * @param $options
	 * @author sam
	 * return array
	 */
	public function selectExportVendorOrder($options){
		if(!is_array($options)) return false;

		$this->db->select('og.goods_name,og.spec_name,og.buy_num,og.buy_price,og.express_num,og.receive_num,so.s_order_code,so.s_order_amt,so.express_no,so.express_com,so.express_time,so.order_status,receive_money,po.account,po.area_id,po.consignee,po.consignee_phone,po.addr,po.details,po.review_status,po.add_time,po.remark,v.vendor_name,a.area_name,a.pid,g.goods_code');
		$this->db->from('gw_order_goods og');
		$this->db->join('gw_s_order so','so.id = og.parent_sid','left');
		$this->db->join('gw_p_order po','po.id = so.parent_oid','left');
		$this->db->join('gw_vendor v','v.id = so.vendor_id','left');
		$this->db->join('gw_area a','a.id = po.area_id','left');
		$this->db->join('gw_goods g','g.id = og.goods_id','left');
		if($options['add_time']) $this->db->where($options['add_time']);
		if($options['search']){ $this->db->where($options['search']);}
		if($options['os']){ $this->db->where($options['os']); }
		if($options['area']){ $this->db->where($options['area']); }
		if($options['vendor']){ $this->db->where($options['vendor']); }
		$this->db->order_by('so.s_order_code asc');
		// $this->db->order_by('po.add_time desc');
		if($this->query = $this->db->get()){
			$list = $this->getRows();
			return $list;
		}
		return false;
	}

	/**
	 * getAreaDts
	 * 获取区域名
	 * @param $id
	 * @author sam
	 * return array
	 */
	public function getAreaDts($id){
		if(!$id) return false;
		$this->db->select('*');
		$this->db->from('gw_area');
		$this->db->where('id',$id);
		if($query = $this->db->get()){
			return $query->first_row('array');
		}
		return false;
	}
}
