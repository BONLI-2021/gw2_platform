<?php

/**
 * 用户
 */
class User_model extends MY_Model{
	
	function __construct(){
		parent::__construct();
	}

	/**
	 * isExistsUser 验证是否存在
	 * @author  lyne
	 */
	public function isExistsUser($account){
		if(!$account) return false;
		return $this->db->where('account',$account)->count_all_results('admin');
	}

	/**
	 * selectUser 获取账号信息
	 * @author  lyne
	 */
	public function selectUser($account){
		if(!$account) return false;
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('account',$account);
		if($query = $this->db->get()){
			return $query->first_row('array');
		}
		return false;
	}
	
	/**
	 * checkPassWord 验证账号密码
	 * @author lyne
	 */
	public function checkPassWord($account,$pwd){
		if(!$account || !$pwd) return false;
		$this->db->select('a.*,r.name as role_name');
		$this->db->from('admin a');
		$this->db->join('role r','a.role_id=r.id');
		$this->db->where('a.status','1');
		$this->db->where('account',$account);
		$this->db->where('password',$pwd);
		if($query = $this->db->get()){
			return $query->first_row('array');
		}
		return false;
	}


	/**
	 * updataPassword 修改密码
	 * @author lyne
	 */
	public function updataPassword($email,$data){
		if(!$email || empty($data)) return false;
		$this->db->where('account',$email);
		$sql = $this->db->set($data)->get_compiled_update('admin');
		if($this->db->query($sql)){
			return $this->db->affected_rows();
		}
		return false;
	}


	/**
	 * 验证密码
	 * @author lyne
	 */
	public function selectUserPass($pass){
		if(!$pass) return false;
		$res = $this->db->where('id',$this->session->login['id'])->where('password',$pass)->count_all_results('admin');
		return $res;
	}

	/**
	 * 查询用户列表
	 * @author lyne
	 */
	public function selectUserList($options=null){
		$this->db->select('u.*');
		$this->db->from('gw_user u');
		if($options['add_time']){ $this->db->where($options['add_time']);}
		if($options['search']){ $this->db->where($options['search']);}
		$tmpDB = clone($this->db);
		$count = $this->db->count_all_results();
		$this->db = $tmpDB;
		$this->db->order_by('u.id desc');
		$offset = ($this->uri->segment(4,  1) - 1) * $this->limitRows;
        $this->db->limit($this->limitRows, $offset);    // 添加limit
		if($this->query = $this->db->get()){
			$list = $this->getRows();
			$user['count'] = $count;
			$user['list'] = $list;
			$user['offset'] = $offset;
			return $user;
		}
		return false;
	}

	/**
	 * checkAccountExists
	 * 检查账户是否存在
	 * @author sam
	 */
	public function checkAccountExists($account){
		if(!$account) return false;
		$this->db->select('*');
		$this->db->from('gw_user');
		$this->db->where('account',$account);
		if($query = $this->db->get()){
			return $query->first_row('array');
		}
		return false;
	}

	/**
	 * checkEmailExists
	 * 检查邮箱是否存在
	 * @author sam
	 */
	public function checkEmailExists($email){
		if(!$email) return false;
		$this->db->select('*');
		$this->db->from('gw_user');
		$this->db->where('email',$email);
		if($query = $this->db->get()){
			return $query->first_row('array');
		}
		return false;
	}

	

	/**
	 * addNewUser
	 * 添加新用户
	 * @param $data 用户信息
	 * @author sam
	 * return array
	 */
	public function addNewUser($data){
		if(!is_array($data)) return false;
		$insert = $this->db->set($data)->get_compiled_insert('gw_user');
		if($this->db->query($insert)){
			return $this->db->insert_id();
		}
		return false;
	}

	/**
	 * getUserInfo
	 * 获取用户信息
	 * @param $id 用户id
	 * @author sam
	 * return array
	 */
	public function getUserInfo($id){
		if(!$id) return false;
		$this->db->select('*');
		$this->db->from('gw_user');
		$this->db->where('id',$id);
		if($query = $this->db->get()){
			return $query->first_row('array');
		}
		return false;
	}

	/**
	 * updateUserInfo
	 * 更新用户信息
	 * @param $id 用户id
	 * @param $data 用户信息
	 * @author sam
	 * return int
	 */
	public function updateUserInfo($id,$data){
		if(!$id || !is_array($data)) return false;
		$sql = $this->db->set($data)->where('id',$id)->get_compiled_update('gw_user');
		if($this->db->query($sql)){
			return $this->db->affected_rows();
		}
		return false;
	}

	/**
	 * dealUserMoney
	 * 账户余额操作
	 * @param $user_id 用户id
	 * @param $recharge 充值金额
	 * @param $deal_log 充值日志
	 * @param $type 操作类型
	 * @author sam
	 * return boolean
	 */
	public function dealUserMoney($user_id,$recharge,$deal_log,$type = 1){
		if(!$user_id || !$recharge || !is_array($deal_log)) return false;
		$this->db->trans_begin();
		if($type==1){
			$sql1 = $this->db->set('`balance`',"`balance` + {$recharge}", FALSE)->set('`recharge_amount`',"`recharge_amount` + {$recharge}", FALSE)->where('id',$user_id)->get_compiled_update('gw_user');
			$this->db->query($sql1);
			$r1 = $this->db->affected_rows();
		}else{
			$sql1 = $this->db->set('`balance`',"`balance` - {$recharge}", FALSE)->set('`recharge_amount`',"`recharge_amount` - {$recharge}", FALSE)->where('id',$user_id)->get_compiled_update('gw_user');
			$this->db->query($sql1);
			$r1 = $this->db->affected_rows();
		}
		
		$sql2 = $this->db->set($deal_log)->get_compiled_insert('gw_deal_logs');
		$this->db->query($sql2);
		$r2 = $this->db->insert_id();

		if($this->db->trans_status()===FALSE || !$r1 || !$r2){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}

	/**
	 * getShoppingList
	 * 获取用户消费列表
	 * @param $uid 用户id
	 * @author sam
	 * return array
	 */
	public function getShoppingList($options){
		if(!is_array($options)) return false;
		$this->db->select('l.*,u.account,a.account admin_account');
		$this->db->from('gw_deal_logs l');
		$this->db->join('gw_user u','u.id = l.user_id','left');
		$this->db->join('admin a','a.id = l.admin_account','left');
		if($options['id']) $this->db->where($options['id']);
		if($options['type']) $this->db->where($options['type']);
		$tmpDB = clone($this->db);
		$count = $this->db->count_all_results();
		$this->db = $tmpDB;
		$this->db->order_by('l.id desc');
		$offset = ($this->uri->segment(4,  1) - 1) * $this->limitRows;
        $this->db->limit($this->limitRows, $offset);    // 添加limit
		if($this->query = $this->db->get()){
			$list = $this->getRows();
			$shopping['count'] = $count;
			$shopping['list'] = $list;
			$shopping['offset'] = $offset;
			return $shopping;
		}
		return false;
	}

	/**
	 * getShoppingListForExport
	 * 获取用户消费列表-导出
	 * @param $uid 用户id
	 * @author sam
	 * return array
	 */
	public function getShoppingListForExport($options){
		if(!is_array($options)) return false;
		$this->db->select('l.*,u.account,u.user_name,a.account admin_account');
		$this->db->from('gw_deal_logs l');
		$this->db->join('gw_user u','u.id = l.user_id','left');
		$this->db->join('admin a','a.id = l.admin_account','left');
		if($options['id']) $this->db->where($options['id']);
		if($options['type']) $this->db->where($options['type']);
		$this->db->order_by('l.id desc');
		if($this->query = $this->db->get()){
			$list = $this->getRows();
			return $list;
		}
		return false;
	}

	/**
	 * getAccountList
	 * 账号列表
	 * @param $options
	 * @author sam
	 * return array
	 */
	public function getAccountList($options){
		if(!is_array($options)) return false;
		$this->db->select('u.*');
		$this->db->from('gw_user u');
		if($options['search']) $this->db->where($options['search']);
		$this->db->where($options['time']);
		$this->db->order_by('id desc');
		if($this->query = $this->db->get()){
			return $this->getRows();
		}
		return false;
	}

	/**
	 * getAccountDealList
	 * 按需导出用户充值/退回列表
	 * @param $options
	 * @author sam
	 * return array
	 */
	public function getAccountDealList($options){
		if(!is_array($options)) return false;
		$this->db->select('l.*,u.account,u.user_name,a.account admin_account');
		$this->db->from('gw_deal_logs l');
		$this->db->join('gw_user u','u.id = l.user_id','left');
		$this->db->join('admin a','a.id = l.admin_account','left');
		if($options['search']) $this->db->where($options['search']);
		if($options['type']) $this->db->where($options['type']);
		$this->db->where($options['time']);
		$this->db->order_by('u.id desc');
		if($this->query = $this->db->get()){
			// echo $this->db->last_query();
			$list = $this->getRows();
			return $list;
		}
		return false;
	}

	/**
	 * getAccountOrderList
	 * 按需导出用户消费列表
	 * @param $options
	 * @author sam
	 * return array
	 */
	public function getAccountOrderList($options){
		if(!is_array($options)) return false;
		$this->db->select('l.*,p.p_order_code,p.order_amt,u.account,u.user_name');
		$this->db->from('gw_deal_logs l');
		$this->db->join('gw_user u','u.id = l.user_id','left');
		$this->db->join('gw_p_order p','p.id = order_id','left');
		if($options['search']) $this->db->where($options['search']);
		if($options['type']) $this->db->where($options['type']);
		$this->db->where($options['time']);
		$this->db->order_by('u.id desc');
		if($this->query = $this->db->get()){
			// echo $this->db->last_query();
			$list = $this->getRows();
			return $list;
		}
		return false;
	}
}