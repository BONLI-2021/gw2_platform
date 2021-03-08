<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller {
    
    protected $isNeedLogin = TRUE;

	public function __construct(){
		parent::__construct();
        $this->load->model('category_model');
	}
	
	/**
	 * 分类列表
	 * @author lyne
	 */
	public function index(){

		$this->assign('title','查询分类');
		$this->display('category/index.html');
	}

    /** 
     * ajaxCateList
     * 动态获取分类列表
     * @access public 
     * @author lyne
     */  
    public function ajaxCateList(){
        
        $catelist = $this->category_model->selectCate(1);
        if(!empty($catelist)){
            foreach ($catelist as $k => &$v) {
                $v['child'] = $this->category_model->selectCate(2,$v['id']);
            }
        }
       
        $this->assign('catelist',$catelist);
        $this->assign('title','查询分类');
        $this->display('category/cate-table.html');
    }

    /**
     * ajaxAdd
     * @author  lyne
     */
    public function ajaxAdd(){
        $pid = $this->input->post('pid',true);
        $cate_name = $this->input->post('cate_name',true);
        $level = $this->input->post('level',true);
        if(!$cate_name || !$level){
            $this->ajaxReturn(['retcode'=>9999,'data'=>[],'msg'=>'请完善信息']);
        }
        $data['cate_name'] = $cate_name;
        $data['pid'] = $pid;
        $data['level'] = $level;
        $result = $this->category_model->insertCate($data);
        if($result) $this->ajaxReturn(['retcode'=>1,'data'=>[],'msg'=>'操作成功']);
        else $this->ajaxReturn(['retcode'=>2001,'data'=>[],'msg'=>'操作失败']);
    }

    /**
     * ajaxUpdate
     * @author  lyne
     */
    public function ajaxUpdate(){
        $cate_id = $this->input->post('id',true);
        $is_show = $this->input->post('is_show',true);
        $data['is_show'] = $is_show=="true" ? 1 : 0;
        $result = $this->category_model->updateCate($cate_id,$data);
        if($result) $this->ajaxReturn(['retcode'=>1,'data'=>[],'msg'=>'操作成功']);
        else $this->ajaxReturn(['retcode'=>2001,'data'=>[],'msg'=>'操作失败']);
    }






}