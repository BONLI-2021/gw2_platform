<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor extends MY_Controller {

    protected $isNeedLogin = TRUE;
	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * 供应商列表
	 * @author sam
	 */
	public function index(){
		$this->session->options = null;     // 清除筛选条件
		$this->assign('title','供应商管理');
		$this->display('vendor/index.html');
	}

	/**
	 * ajaxVendorList 获供应商列表
	 * @author sam
	 */
	public function ajaxVendorList(){
		$this->load->model('vendor_model');
		$options=$this->input->post('options');
		@$this->session->options = $options;
		if($this->session->options){
			if(isset($this->session->options['state']) && $this->session->options['state']!='clear'){
				$tmp_options['state'] = $this->session->options['state'];
 			}else{
				$tmp_options['state'] = null;
			}
			if(isset($this->session->options['keyword'])){
				$tmp_options['vendor_name'] = $this->session->options['keyword'];
			}else{
				$tmp_options['vendor_name'] = null;
			}
		}
		$result = $this->vendor_model->selectVendorList($tmp_options);
		$list = $result['list'];
		$count = $result['count'];
		$offset = $result['offset'];

		$this->load->library('pagination');
		$config = $this->myPagination(BASEURL.'admin.php/vendor/ajaxVendorList',$count);
		$this->pagination->initialize($config);
		$page = $this->pagination->create_links();
		// 尾页
		$last_page = ceil($count / $this->limitRows);
		$this->assign('offset',$offset);
		$this->assign('total',$count);
		$this->assign('showpage',$page);
		$this->assign('last_page',$last_page);
		$this->assign('vendorlist',$list);
		$this->display('vendor/vendor-table.html');
	}

	/**
	 * ajaxAddVendor 创建供应商
	 * @author sam
	 */
	public function ajaxAddVendor(){
		$data = $this->input->post();
		$data['state'] = '1';
		$data['add_time'] = time();
		$this->load->model('vendor_model');
		$check_result = $this->vendor_model->checkVendor($data['vendor_name']);
		if($check_result > 0){
			$this->ajaxReturn(['retcode'=>1006,'data'=>[],'msg'=>'失败！供应商名称已存在。']);
			exit;
		}
		$admin_arr['account'] = $data['account'];
		$admin_arr['password'] = md5($data['password'].'GW');
		$admin_arr['email'] = $data['email'];
		$admin_arr['real_name'] = $data['account'];
		$admin_arr['role_id'] = 4;
		$admin_arr['admin_type'] = 2;
		$admin_arr['add_time'] = time();

		unset($data['account']);
		unset($data['password']);
		unset($data['email']);
		$result = $this->vendor_model->insertVendor($data,$admin_arr);
		
		if($result) {
			$this->ajaxReturn(['retcode'=>1,'data'=>[],'msg'=>'成功！创建成功。']);
		}else{
			$this->ajaxReturn(['retcode'=>false,'data'=>[],'msg'=>'失败！创建失败。']);
		}
	}
	

	/**
	 * getVendorInfo 获取指定供应商信息
	 * @author sam
	 */
	public function getVendorInfo(){
		$id = $this->input->post('id',true);
		$this->load->model('vendor_model');
		$info = $this->vendor_model->selectVendorInfo($id);
		$this->ajaxReturn(['retcode'=>1,'data'=>$info,'msg'=>'']);
	}

	/**
	 * ajaxEditVendor 编辑供应商
	 * @author sam
	 */
	public function ajaxEditVendor(){
		$data = $this->input->post();
		$id = $data['id'];
		unset($data['id']);
		$this->load->model('vendor_model');
		
		$result = $this->vendor_model->updateVendor($id,$data);
		if($result) $this->ajaxReturn(['retcode'=>1,'data'=>[],'msg'=>'成功！编辑成功。']);
		else $this->ajaxReturn(['retcode'=>1006,'data'=>[],'msg'=>'失败！编辑失败。']);
	}

	/**
	 * ajaxChangeVendorStatus 更改供应商状态
	 * @author sam
	 */
	public function ajaxChangeVendorStatus(){
		$id = $this->input->post('id');
		$state = $this->input->post('state');
		$this->load->model('vendor_model');
		if($state=='0'){
			$isGoods = $this->vendor_model->selectVendorProducts($id);
			if($isGoods>0){
				$this->ajaxReturn(['retcode'=>false,'data'=>[],'msg'=>'失败！存在下属产品,不可删除。']);
			}
		}
		$res =$this->vendor_model->updateVendorStatus($id,$state);
		if($res) $this->ajaxReturn(['retcode'=>true,'data'=>[],'msg'=>'成功！供应商状态修改成功。']);
		else $this->ajaxReturn(['retcode'=>false,'data'=>[],'msg'=>'失败！供应商状态修改失败。']);
	}

	
}
