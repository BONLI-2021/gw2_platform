<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MY_Controller{
	protected $isNeedLogin = TRUE;

	public function __construct(){
		parent::__construct();
	}


	/** 
	 * index
	 * @author  lyne
	 */  
	public function index(){
		$this->session->options = null;
		$this->load->model('banner_model');
		$this->assign('nav','b-l');
		$this->assign('title','查询banner');
		$this->display('banner/index.html');
	}

	/**
	 * ajaxBannerList 获banner列表
	 * @author lyne
	 */
	public function ajaxBannerList(){
		$this->load->model('banner_model');
		
		$result = $this->banner_model->selectBannerList();
		
		$list = $result['list'];
		$count = $result['count'];
		$offset = $result['offset'];
		$this->load->library('pagination');
		$config = $this->myPagination(BASEURL.'admin.php/banner/ajaxBannerList',$count);
		$this->pagination->initialize($config);
		$page = $this->pagination->create_links();
		// 尾页
		$last_page = ceil($count / $this->limitRows);

		$this->assign('offset',$offset);
		$this->assign('total',$count);
		$this->assign('showpage',$page);
		$this->assign('last_page',$last_page);
		$this->assign('bannerlist',$list);
		$this->assign('title','Banner管理');
		$this->display('banner/banner-table.html');
	}
	 

	/** 
	 * ajaxAddBanner
	 * @author  lyne
	 */  
	public function ajaxAddBanner(){
		$post_data = $_POST;
		$file = $_FILES;
		$this->load->model('banner_model');

		$post_data['add_time'] = time();
		if($file['banner']==''){
			$this->ajaxReturn(['retcode'=>9999,'msg'=>'请选择图片','data'=>[]]);
			exit;
		}
		if(!isset($post_data['is_top'])){
			$post_data['is_top'] = 0;
		}else{
			$post_data['is_top'] = 1;
		}
		$b = 'banner/';
		$filepath_s = PIC_O_PATH.$b;
		$filepath_l = WWWROOTPATH.$filepath_s;
		$filename = 'Banner'.date('Ymd').mt_rand(10001,99999);
		if($this->make_dir($filepath_l)){
			$config = array(
				'allowed_types'	=>	'gif|jpg|png|jpeg',
				'upload_path'	=>	$filepath_l,
				'max_size'		=>	2000000,
				'max_width'		=>	3980,
				'max_height'	=>	3980,
			);
		}
		$config['file_name'] = $filename;
		$this->load->library('upload');
		$this->upload->initialize($config);
		if($this->upload->do_upload('banner')){
			$data = $this->upload->data();
		}
		$file_name = $data['file_name'];
		$post_data['image_path'] = $b.$file_name;
		$ins = $this->banner_model->insertBanner($post_data);
		if($ins){
			$this->ajaxReturn(['retcode'=>1,'msg'=>'操作成功','data'=>[]]);
		}else{
			$this->ajaxReturn(['retcode'=>9999,'msg'=>'操作失败','data'=>[]]);
		}
	}

	/** 
	 * ajaxEditBanner
	 * @author  lyne
	 */  
	public function ajaxEditBanner(){
		$post_data = $_POST;
		$this->load->model('banner_model');
		$id = $post_data['id'];
		unset($post_data['id']);
		$file = $_FILES;
		if(!isset($post_data['is_top'])){
			$post_data['is_top'] = 0;
		}else{
			$post_data['is_top'] = 1;
		}

		if(!empty($file['banner']['name'])){
			$b = 'banner/';
			$filepath_s = PIC_O_PATH.$b;
			$filepath_l = WWWROOTPATH.$filepath_s;
			$filename = 'Banner'.date('Ymd').mt_rand(10001,99999);
			if($this->make_dir($filepath_l)){
				$config = array(
					'allowed_types'	=>	'gif|jpg|png|jpeg',
					'upload_path'	=>	$filepath_l,
					'max_size'		=>	2000000,
					'max_width'		=>	3980,
					'max_height'	=>	3980,
				);
			}
			$config['file_name'] = $filename;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if($this->upload->do_upload('banner')){
				$data = $this->upload->data();
			}
			$file_name = $data['file_name'];
			$post_data['image_path'] = $b.$file_name;
		}
		$ins = $this->banner_model->updateBanner($id,$post_data);
		if($ins){
			$this->ajaxReturn(['retcode'=>1,'msg'=>'操作成功','data'=>[]]);
		}else{
			$this->ajaxReturn(['retcode'=>9999,'msg'=>'操作失败','data'=>[]]);
		}
	}

	/**
	 * getBannerInfo 获取指定Banner信息
	 * @author lyne
	 */
	public function getBannerInfo(){
		$id = $this->input->post('id',true);
		$this->load->model('banner_model');
		$info = $this->banner_model->selectBannerInfo($id);
		$this->ajaxReturn($info);
	}

	

	/**
	 * deleteBanner 删除Banner
	 * @author lyne
	 */
	public function ajaxDelBanner(){
		$id = $this->input->post('id');
		$this->load->model('banner_model');
		$res =$this->banner_model->deleteBanner($id);
		if($res){
			$this->ajaxReturn(['retcode'=>1,'msg'=>'操作成功','data'=>[]]);
		}else{
			$this->ajaxReturn(['retcode'=>9999,'msg'=>'操作失败','data'=>[]]);
		}
	 
	}
}