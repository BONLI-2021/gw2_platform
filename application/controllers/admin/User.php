<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

    protected $isNeedLogin = TRUE;
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}
	
	/**
	 * index
	 * 用户管理
	 * @author sam
	 */
	public function index(){
		$this->load->model('order_model');
        $area = $this->order_model->getAreaList();

        $this->assign('area',$area);
		$this->assign('title','用户列表');
		$this->display('user/index.html');
	}

	/**
	 * ajaxUserList
	 * 动态添加用户列表
	 * @author sam
	 */
	public function ajaxUserList(){
		$options = $this->input->post('options');
		@$this->session->u_options = $options;
		
		if($this->session->u_options){
			$s = strtotime($_SESSION['u_options']['start'].' 00:00:00');
			$e = strtotime($_SESSION['u_options']['end'].' 23:59:59');

			$tmp_options['add_time'] = "u.add_time >=$s and u.add_time <=$e";
			if($options['search_val']){
				$tmp_options['search'] = "u.account like '%".$_SESSION['u_options']['search_val']."%' or u.user_name like '%".$_SESSION['u_options']['search_val']."%' ";
			}else{
				$tmp_options['search']=null;
			}
			if($options['area_id']){
				$tmp_options['area_id'] = "u.area_id='".$_SESSION['u_options']['area_id']."'";
			}else{
				$tmp_options['area_id']=null;
			}
		}
		
		$result = $this->user_model->selectUserList($tmp_options);
		$list = $result['list'];
		$count = $result['count'];
		$offset = $result['offset'];
		
		$this->load->library('pagination');
		$config = $this->myPagination(BASEURL.'admin.php/user/ajaxUserList',$count);
		$this->pagination->initialize($config);
		$page = $this->pagination->create_links();
		// 尾页
		$last_page = ceil($count / $this->limitRows);
		// echo "<pre>";
		// var_dump($list);exit;
		$this->assign('offset',$offset);
		$this->assign('total',$count);
		$this->assign('showpage',$page);
		$this->assign('last_page',$last_page);
		$this->assign('userlist',$list);
		$this->assign('title','用户列表');
		$this->display('user/user-table.html');
	}

	/**
	 * ajaxAddUser
	 * 动态添加用户
	 * @author sam
	 */
	public function ajaxAddUser(){
		$data = $this->input->post();
		$this->load->helper('my_functions');
		$data['account'] = trim_all($data['account'],'strict');
		$data['balance'] = 0;
		$has = $this->user_model->checkAccountExists($data['account']);
		if($has){
			$this->ajaxReturn(['retcode'=>1002,'data'=>[],'msg'=>'失败！账号已存在']);
		}else{
			$hasEmail = $this->user_model->checkEmailExists($data['email']);
			if($hasEmail){
				$this->ajaxReturn(['retcode'=>1002,'data'=>[],'msg'=>'失败！邮箱已存在']);
			}
		}
		$data['area_type'] = $this->user_model->getAreaInfo($data['area_id'])['type'];
		$data['password'] = md5('Admin@123GW');
		$data['add_time'] = time();
		$res = $this->user_model->addNewUser($data);
		if($res){
			$this->ajaxReturn(['retcode'=>1,'data'=>[],'msg'=>'成功！用户添加成功']);
		}else{
			$this->ajaxReturn(['retcode'=>1006,'data'=>[],'msg'=>'失败！用户添加失败']);
		}
	}

	/**
	 * getUserInfo
	 * 获取用户信息
	 * @author sam
	 */
	public function getUserInfo(){
		$id = $this->input->post('id',true);
		$dts = $this->user_model->getUserInfo($id);
		if($dts){
			$this->ajaxReturn(['retcode'=>1,'data'=>['userinfo'=>$dts],'msg'=>'成功！']);
		}else{
			$this->ajaxReturn(['retcode'=>1002,'data'=>[],'msg'=>'失败！未查询到用户信息']);
		}
	}

	/**
	 * ajaxEditUser 
	 * 动态修改用户信息
	 * @author sam
	 */
	public function ajaxEditUser(){
		$data = $this->input->post();
		$id = $data['id'];
		unset($data['id']);
		$res = $this->user_model->updateUserInfo($id,$data);
		if($res>0){
			$this->ajaxReturn(['retcode'=>1,'data'=>['userinfo'=>$dts],'msg'=>'成功！用户信息更新成功']);
		}else{
			$this->ajaxReturn(['retcode'=>1006,'data'=>[],'msg'=>'失败！用户信息更新失败']);
		}
	}

	/**
	 * 禁用用户
	 * @author sam
	 */
	public function ajaxDelUser(){
		$id = $this->input->post('id',true);
		$state = $this->input->post('state',true);
		$data['state'] = $state;
		$res = $this->user_model->updateUserInfo($id,$data);
		if($res) $this->ajaxReturn(['retcode'=>1,'data'=>[],'msg'=>'成功！用户状态更新成功']);
		else $this->ajaxReturn(['retcode'=>1006,'data'=>[],'msg'=>'失败！用户状态更新失败']);
	}

	/**
	 * ajaxDealMoney  处理充值/扣减
	 * @author sam
	 */
	public function ajaxDealMoney(){
		$data = $this->input->post();
		
		if(empty($data['id']) || empty($data['account'])){
			$this->ajaxReturn(['retcode'=>1006,'data'=>[],'msg'=>'失败！账户余额操作失败。']);
		}

		if($data['deal_amount'] <= 0) $this->ajaxReturn(['retcode'=>1006,'data'=>[],'msg'=>'失败！操作金额要求大于0']);
		
		if($data['type']==2){
			$balance = $this->user_model->getUserInfo($data['id'])['balance'];
			if(bcsub($balance,$data['deal_amount'],2)<0){
				$this->ajaxReturn(['retcode'=>1006,'data'=>[],'msg'=>'失败！扣减金额大于账户余额']);
			}
		}
		
		$deal_log['user_id'] = $data['id'];
		$deal_log['deal_type'] = $data['type']; // 充值
		$deal_log['deal_amount'] = $data['deal_amount'];
		$deal_log['explain'] = $data['explain'];
		$deal_log['admin_account'] = $_SESSION['login']['id'];
		$deal_log['admin_name'] = $_SESSION['login']['real_name'];
		$deal_log['add_time'] = time();

		$result = $this->user_model->dealUserMoney($data['id'],$data['deal_amount'],$deal_log,$data['type']);  // 充值积分
		if($result){
			$this->ajaxReturn(['retcode'=>1,'data'=>[],'msg'=>'成功！账户余额操作成功']);
		}else{
			$this->ajaxReturn(['retcode'=>1006,'data'=>[],'msg'=>'失败！账户余额操作失败']);
		}
	}

	/**
	 * shoppingList
	 * 消费明细
	 * @author sam
	 */
	public function shoppingList(){
		$id = $this->uri->segment(3);
		$this->assign('title','消费列表');
		$this->assign('id',$id);
		$this->display('user/shopping-list.html');
	}

	/**
	 * ajaxShoppingList
	 * 动态获取消费列表
	 * @author sam
	 */
	public function ajaxShoppingList(){
		$data = $this->input->post();
		@$this->session->shop_options = $data;
		if($this->session->shop_options){
			if(isset($this->session->shop_options['type']) && !empty($this->session->shop_options['type'])){
				$tmp_options['type'] = "l.deal_type = ".$this->session->shop_options['type'];
			}else{
				$tmp_options['type'] = null;
			}
			if(!empty($this->session->shop_options['id'])){
				$tmp_options['id'] ="l.user_id =".$this->session->shop_options['id'];
			}else{
				$tmp_options['id'] = null;
			}
		}

		$result = $this->user_model->getShoppingList($tmp_options);
		$list = $result['list'];
		$count = $result['count'];
		$offset = $result['offset'];
		$this->load->library('pagination');
		$config = $this->myPagination(BASEURL.'admin.php/user/ajaxShoppingList',$count);
		$this->pagination->initialize($config);
		$page = $this->pagination->create_links();
		// 尾页
		$last_page = ceil($count / $this->limitRows);
		// echo "<pre>";
		// var_dump($list);exit;
		$this->assign('offset',$offset);
		$this->assign('total',$count);
		$this->assign('showpage',$page);
		$this->assign('last_page',$last_page);
		$this->assign('shoppinglist',$list);
		$this->display('user/shopping-table.html');
	}

	/**
	 * exportShoppingLogs
	 * 按条件导出消费明细
	 * @author sam
	 */
	public function exportShoppingLogs(){
        $this->load->library('CI_Excel');
		$data = $this->input->post();
		if(!empty($data['type'])){
			$tmp_options['type'] = "l.deal_type = ".$this->session->shop_options['type'];
		}else{
			$tmp_options['type'] = null;
		}

		$tmp_options['id'] = "l.user_id = ".$this->session->shop_options['id'];
		$list = $this->user_model->getShoppingListForExport($tmp_options);
		if(!empty($list)){

			$exportlist = array();
			foreach ($list as $k => &$v) {

				$exportlist[$k]['key'] = $k+1;
				$exportlist[$k]['account'] = $v['account'];
				$exportlist[$k]['user_name'] = $v['user_name'];
				$exportlist[$k]['area_name'] = $v['area_name'];
				$exportlist[$k]['add_time'] = date("Y-m-d H:i:s",$v['add_time']);
				switch ($v['deal_type']) {
					case 1:
						$exportlist[$k]['deal_type'] = '充值';
						break;
					case 2:
						$exportlist[$k]['deal_type'] = '扣减';
						break;
					case 3:
						$exportlist[$k]['deal_type'] = '消费';
						break;
					default:
						$exportlist[$k]['deal_type'] = '退回';
						break;
				}
				$exportlist[$k]['deal_amount'] = $v['deal_amount'];
				$exportlist[$k]['admin_account'] = $v['admin_account'];
				$exportlist[$k]['admin_area'] = '总部';
				$exportlist[$k]['explain'] = $v['explain'];
			}
			$headerTitle[0][] = '序号';
			$headerTitle[0][] = '账号';
			$headerTitle[0][] = '用户名';
			$headerTitle[0][] = '所属区域';
			$headerTitle[0][] = '变更时间';
			$headerTitle[0][] = '类型';
			$headerTitle[0][] = '金额';
			$headerTitle[0][] = '操作账户';
			$headerTitle[0][] = '操作账户所属区域';
			$headerTitle[0][] = '操作缘由';
			$list = array_merge($headerTitle,$exportlist);
            // echo "<pre>";
            // var_dump($list);exit;
            $objPHPExcel = $this->writerExcel2($this->ci_excel,0,'消费明细数据',$list);
            $filename = '用户'.$list[0]['account'].":消费明细".date('m.d',time());

            header('Content-Type: application/vnd.ms-excel');
            header("Content-Disposition: attachment;filename=".$filename.".xls");
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');

            header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
            header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header ('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit;
        }else{
            $this->jumpNoticePage('对不起，未找到相关数据',site_url('/user/index'));
            exit;       
        }
   	}

   	/**
   	 * exportAccount
   	 * 导出账户明细
   	 * @author sam
   	 */
   	public function exportAccount(){
   		$this->load->library("CI_Excel");
   		//导出字段信息有用户名、姓名、账户所属区域、手机号、邮箱、总收入金额、已消费金额、剩余金额
   		$data = $this->input->post();
   		$data['start'] = strtotime($data['start'].' 00:00:00');
   		$data['end'] = strtotime($data['end'].' 23:59:59');
   		$tmp_options['time'] = 'u.add_time >='.$data['start'].' and u.add_time <='.$data['end'];
   		if(!empty($data['area_id'])){
   			$tmp_options['area_id'] = 'u.area_id ='.$data['area_id'];
   		}else{
   			$tmp_options['area_id'] = null;
   		}

   		if(!empty($data['search_val'])){
   			$tmp_options['search'] = "u.account like '%".$data['search_val']."%' or u.user_name like '%".$data['search_val']."%' ";
   		}else{
   			$tmp_options['search'] = null;
   		}

   		$list = $this->user_model->getAccountList($tmp_options);
   		if(!empty($list)){

			$exportlist = array();
			foreach ($list as $k => &$v) {
				$p_area_name = $this->user_model->getAreaInfo($v['pid'])['area_name'];
				$exportlist[$k]['key'] = $k+1;
				$exportlist[$k]['p_area_name'] = $p_area_name;
				$exportlist[$k]['area_name'] = $v['area_name'];
				$exportlist[$k]['account'] = $v['account'];
				$exportlist[$k]['email'] = $v['email'];
				$exportlist[$k]['recharge_amount'] = $v['recharge_amount'];
				$exportlist[$k]['used_amount'] = $v['used_amount'];
				$exportlist[$k]['balance'] = $v['balance'];
			}
			$headerTitle[0][] = '序号';
			$headerTitle[0][] = '所属上级区域';
			$headerTitle[0][] = '所属区域';
			$headerTitle[0][] = '账号';
			$headerTitle[0][] = '邮箱';
			$headerTitle[0][] = '总充值金额';
			$headerTitle[0][] = '总消费金额';
			$headerTitle[0][] = '余额';
			$list = array_merge($headerTitle,$exportlist);
            // echo "<pre>";
            // var_dump($list);exit;
            $objPHPExcel = $this->writerExcel2($this->ci_excel,0,'账户明细数据',$list);
            $filename = "账户明细表".date('m.d',$data['start']).'-'.date('m.d',$data['end']);

            header('Content-Type: application/vnd.ms-excel');
            header("Content-Disposition: attachment;filename=".$filename.".xls");
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');

            header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
            header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header ('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit;
        }else{
            $this->jumpNoticePage('对不起，未找到相关数据',site_url('/user/index'));
            exit;       
        }
   	}

   	/**
   	 * exportAccountRecharge
   	 * 导出账户充值明细
   	 * @author sam
   	 */
   	public function exportAccountRecharge(){
   		$this->load->library("CI_Excel");
   		//导出字段信息有消费账户、订单号、订单金额、订单状态、所属区域、订单时间
   		$data = $this->input->post();
   		$data['start'] = strtotime($data['start'].' 00:00:00');
   		$data['end'] = strtotime($data['end'].' 23:59:59');
   		$tmp_options['time'] = 'u.add_time >='.$data['start'].' and u.add_time <='.$data['end'];
   		if(!empty($data['area_id'])){
   			$tmp_options['area_id'] = 'u.area_id ='.$data['area_id'];
   		}else{
   			$tmp_options['area_id'] = null;
   		}

   		if(!empty($data['search_val'])){
   			$tmp_options['search'] = "u.account like '%".$data['search_val']."%' or u.user_name like '%".$data['search_val']."%' ";
   		}else{
   			$tmp_options['search'] = null;
   		}
   		$tmp_options['type'] = "l.deal_type = ".$data['type'];
   		$list = $this->user_model->getAccountDealList($tmp_options);
   		// echo "<pre>";
   		// var_dump($list);exit;
   		
   		if(!empty($list)){
			$exportlist = array();
			foreach ($list as $k => &$v) {
				$p_area_name = $this->user_model->getAreaInfo($v['pid'])['area_name'];
				$exportlist[$k]['key'] = $k+1;
				$exportlist[$k]['p_area_name'] = $p_area_name;
				$exportlist[$k]['area_name'] = $v['area_name'];
				$exportlist[$k]['account'] = $v['account'];
				$exportlist[$k]['deal_amount'] = $v['deal_amount'];
				$exportlist[$k]['add_time'] = date("Y-m-d H:i:s",$v['add_time']);
				$exportlist[$k]['explain'] = $v['explain'];
				$exportlist[$k]['admin_account'] = $v['admin_account'];
				$exportlist[$k]['admin_area'] = '总部';
			}
			$headerTitle[0][] = '序号';
			$headerTitle[0][] = '所属上级区域';
			$headerTitle[0][] = '所属区域';
			$headerTitle[0][] = '账号';
			$headerTitle[0][] = '充值金额';
			$headerTitle[0][] = '充值时间';
			$headerTitle[0][] = '充值备注';
			$headerTitle[0][] = '操作账户';
			$headerTitle[0][] = '操作账户所属区域';
			$list = array_merge($headerTitle,$exportlist);
			
            // echo "<pre>";
            // var_dump($list);exit;
            $objPHPExcel = $this->writerExcel2($this->ci_excel,0,'账户充值明细数据',$list);
            $filename = "用户充值明细".date('m.d',$data['start']).'-'.date('m.d',$data['end']);

            header('Content-Type: application/vnd.ms-excel');
            header("Content-Disposition: attachment;filename=".$filename.".xls");
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');

            header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
            header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header ('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit;
        }else{
            $this->jumpNoticePage('对不起，未找到相关数据',site_url('/user/index'));
            exit;       
        }
   	}

   	/**
   	 * exportAccountOrder
   	 * 导出账户消费明细
   	 * @author sam
   	 */
   	public function exportAccountOrder(){
   		$this->load->library("CI_Excel");
   		//导出字段信息有充值账户、充值金额、充值账户所属区域、充值缘由、操作账户、操作账户所属区域、充值时间
   		$data = $this->input->post();
   		$data['start'] = strtotime($data['start'].' 00:00:00');
   		$data['end'] = strtotime($data['end'].' 23:59:59');
   		$tmp_options['time'] = 'u.add_time >='.$data['start'].' and u.add_time <='.$data['end'];
   		if(!empty($data['area_id'])){
   			$tmp_options['area_id'] = 'u.area_id ='.$data['area_id'];
   		}else{
   			$tmp_options['area_id'] = null;
   		}

   		if(!empty($data['search_val'])){
   			$tmp_options['search'] = "u.account like '%".$data['search_val']."%' or u.user_name like '%".$data['search_val']."%' ";
   		}else{
   			$tmp_options['search'] = null;
   		}
   		$tmp_options['type'] = "l.deal_type = ".$data['type'];
   		$list = $this->user_model->getAccountOrderList($tmp_options);
   		// echo "<pre>";
   		// var_dump($list);
   		
   		if(!empty($list)){
   			foreach ($list as $k => &$v) {
	   			$this->manageOrder($v);
	   		}
			$exportlist = array();
			foreach ($list as $k => &$v) {
				$p_area_name = $this->user_model->getAreaInfo($v['pid'])['area_name'];
				$exportlist[$k]['key'] = $k+1;
				$exportlist[$k]['p_area_name'] = $p_area_name;
				$exportlist[$k]['area_name'] = $v['area_name'];
				$exportlist[$k]['account'] = $v['account'];
				$exportlist[$k]['p_order_code'] = $v['p_order_code'];
				$exportlist[$k]['order_amt'] = $v['order_amt'];
				$exportlist[$k]['review_status'] = $v['review_status_v'];
				$exportlist[$k]['area_name'] = $v['area_name'];
				$exportlist[$k]['add_time'] = $v['add_time'];
			}
			$headerTitle[0][] = '序号';
			$headerTitle[0][] = '所属上级区域';
			$headerTitle[0][] = '所属区域';
			$headerTitle[0][] = '账号';
			$headerTitle[0][] = '订单号';
			$headerTitle[0][] = '订单金额';
			$headerTitle[0][] = '审核状态';
			$headerTitle[0][] = '所属区域';
			$headerTitle[0][] = '下单时间';
			$list = array_merge($headerTitle,$exportlist);
            // echo "<pre>";
            // var_dump($list);exit;
            $objPHPExcel = $this->writerExcel2($this->ci_excel,0,'账户消费明细数据',$list);
            $filename = "用户消费明细".date('m.d',$data['start']).'-'.date('m.d',$data['end']);

            header('Content-Type: application/vnd.ms-excel');
            header("Content-Disposition: attachment;filename=".$filename.".xls");
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');

            header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
            header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header ('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit;
        }else{
            $this->jumpNoticePage('对不起，未找到相关数据',site_url('/user/index'));
            exit;       
        }
   	}

   	/**
   	 * exportAccountReduce
   	 * 导出账户扣减明细
   	 * @author sam
   	 */
   	public function exportAccountReduce(){
   		$this->load->library("CI_Excel");
   		//导出字段信息有消费账户、订单号、订单金额、订单状态、所属区域、订单时间
   		$data = $this->input->post();
   		$data['start'] = strtotime($data['start'].' 00:00:00');
   		$data['end'] = strtotime($data['end'].' 23:59:59');
   		$tmp_options['time'] = 'u.add_time >='.$data['start'].' and u.add_time <='.$data['end'];
   		if(!empty($data['area_id'])){
   			$tmp_options['area_id'] = 'u.area_id ='.$data['area_id'];
   		}else{
   			$tmp_options['area_id'] = null;
   		}

   		if(!empty($data['search_val'])){
   			$tmp_options['search'] = "u.account like '%".$data['search_val']."%' or u.user_name like '%".$data['search_val']."%' ";
   		}else{
   			$tmp_options['search'] = null;
   		}
   		$tmp_options['type'] = "l.deal_type = ".$data['type'];
   		$list = $this->user_model->getAccountDealList($tmp_options);
   		// echo "<pre>";
   		// var_dump($list);exit;
   		
   		if(!empty($list)){
			$exportlist = array();
			foreach ($list as $k => &$v) {
				$p_area_name = $this->user_model->getAreaInfo($v['pid'])['area_name'];
				$exportlist[$k]['key'] = $k+1;
				$exportlist[$k]['p_area_name'] = $p_area_name;
				$exportlist[$k]['area_name'] = $v['area_name'];
				$exportlist[$k]['account'] = $v['account'];
				$exportlist[$k]['deal_amount'] = $v['deal_amount'];
				$exportlist[$k]['add_time'] = date("Y-m-d H:i:s",$v['add_time']);
				$exportlist[$k]['explain'] = $v['explain'];
				$exportlist[$k]['admin_account'] = $v['admin_account'];
				$exportlist[$k]['admin_area'] = '总部';
			}
			$headerTitle[0][] = '序号';
			$headerTitle[0][] = '所属上级区域';
			$headerTitle[0][] = '所属区域';
			$headerTitle[0][] = '账号';
			$headerTitle[0][] = '充值金额';
			$headerTitle[0][] = '充值时间';
			$headerTitle[0][] = '充值备注';
			$headerTitle[0][] = '操作账户';
			$headerTitle[0][] = '操作账户所属区域';
			$list = array_merge($headerTitle,$exportlist);
			
            // echo "<pre>";
            // var_dump($list);exit;
            $objPHPExcel = $this->writerExcel2($this->ci_excel,0,'账户扣减明细数据',$list);
            $filename = "用户扣减明细".date('m.d',$data['start']).'-'.date('m.d',$data['end']);

            header('Content-Type: application/vnd.ms-excel');
            header("Content-Disposition: attachment;filename=".$filename.".xls");
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');

            header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
            header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header ('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit;
        }else{
            $this->jumpNoticePage('对不起，未找到相关数据',site_url('/user/index'));
            exit;
        }
   	}


	/**
	 * userClear
	 * 用户查询条件清除
	 * @author sam
	 */
	public function userClear(){
		unset($this->session->u_options);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */