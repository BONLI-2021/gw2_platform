<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 * MY_Controller
 * 扩展控制器核心类
 * 简化变量分配和模板加载
 */
class Home_Controller extends CI_Controller {
    
    protected $limitRows = 10;
    protected $isNeedLogin = FALSE;
 
	public function __construct(){
		parent::__construct();
        $this->load->set_home_view_dir();
        $msectime = $this->msectime();
         // 分配一个全局变量
        $this->assign('public', base_url('public'));
        $this->assign('module', base_url('home'));
        $this->assign('version','v1.0.1');
        $this->assign('timestamp',$msectime);
        $this->checkLogin();
        // $this->forbidShare();
	}

    //返回当前的毫秒时间戳
    public function msectime() {
        list($msec, $sec) = explode(' ', microtime());
        $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return $msectime;
    }

    /**
     * checkLogin 检查是否登录
     * @access private
     * @param void
     * @return void
     */
    private function checkLogin(){
        
        if ($this->isNeedLogin) {
            if ( ! isset($_SESSION['login']) || empty($_SESSION['login'])) {
                 // 记住跳转前的访问的页面
                $_SESSION['SOURCE_PAGE'] = @$_SERVER['REQUEST_URI'];
                header('Location: /home/login/index');exit;
            }
        }
    }

    /**
     * 给CI_Controller扩展Smarty的方法
     * assign 分配变量
     */
    protected function assign($key,$val) {
        $this->ci_smarty->assign($key,$val);
    }
 
    /**
     * 给CI_Controller扩展Smarty的方法
     * display 加载模板
     */
    protected function display($html) {
        $this->ci_smarty->display($html);
    }

   /**
     * Ajax方式返回数据到客户端
     * @access protected
     * @param mixed $data 要返回的数据
     * @param String $type AJAX返回数据格式
     * @param int $json_option 传递给json_encode的option参数
     * @return void
     */
    protected function ajaxReturn($data,$type='',$json_option=0) {
        if(empty($type)) $type = 'JSON';
        switch (strtoupper($type)){
            case 'JSON' :
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                exit(json_encode($data));
            case 'XML'  :
                // 返回xml格式数据
                header('Content-Type:text/xml; charset=utf-8');
                exit(xml_encode($data));
            case 'EVAL' :
                // 返回可执行的js脚本
                header('Content-Type:text/html; charset=utf-8');
                exit($data);            
            default     :
                // 用于扩展其他返回格式数据
                Hook::listen('ajax_return',$data);
        }
    }

    
     /** 
     * make_dir
     * 创建目录
     * @access public 
     * @author  Sam<liusong@xxgrp.cn>
     * @version 1.0
     * @return  array
     */  
    public function make_dir($dir, $mode = 0755){
        if ( ! is_dir($dir)) {
            if ( ! $this->make_dir(dirname($dir), $mode)) return false;
            if ( ! mkdir($dir, $mode)) return false;
        }
        return true;
    }

    /** 
     * doUpload
     * 上传图片
     * @access public 
     * @param fkey $_FILES[]的键
     * @param $filepath 存放路径
     * @param $filename 存放名称
     * @author  Sam<liusong@xxgrp.cn>
     * @version 1.0
     * @return  array
     */  
    public function doUpload($fkey,$filepath = '',$filename = '',$type = 'single'){
        $this->load->library('upload');
        if(is_dir($filepath)){
            $config['upload_path'] = $filepath;
        }else{
            $config['upload_path'] = FCPATH.'/public/upload/tmp/';
        }
        if($filename){
            $config['file_name'] = $filename;
        }else{
            $config['file_name'] = 'T'.date("Ymd").'X'.mt_rand(1001,9999);
        }

        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']     = 20000000;
        // $config['max_width']    = 3980;
        // $config['max_height']   = 3980;
        $this->upload->initialize($config);
        if($type=='multi'){
            $data = array();
            foreach($_FILES as $key=>$val){
                if(!empty($val['name'])){
                    if($this->upload->do_upload($key)){
                        $data[] = $this->upload->data('file_name');
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                    }
                }
            }
            $result = array('data'=>$data,'error'=>$error);
            return $result;
        }else{
            if ($this->upload->do_upload($fkey)){
                $data = $this->upload->data();
                return $data;
            } else {
                $error = $this->upload->display_errors();
                return $error;
            }
        }
    }
     

    /** 
     * makeThumb
     * 创建缩略图
     * @access public 
     * @param $filename 文件名
     * @param $filepath 原大图路径
     * @param $newpath 缩略图路径
     * @param $width 宽度
     * @param $height 高度
     * @author  Sam<liusong@xxgrp.cn>
     * @version 1.0
     * @return  array
     */  
    public function makeThumb($filename, $filepath, $newpath, $width, $height){
        $config['image_library'] = 'gd2';
        $config['source_image'] = $filepath.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']     = $width;
        $config['height']   = $height;
        $config['thumb_marker'] = FALSE;
        $config['new_image'] = $newpath.$filename;

        $this->image_lib->initialize($config);
        $r = $this->image_lib->resize();
        return $r;
    }
    
    
    /**
     * 隐藏微信浏览器非基础功能，禁止转发、收藏、复制等
     * @author lyne
     */
    protected function forbidShare(){
        require_once APPPATH.'libraries/Jssdk/jssdk.class.php';
        $this->config->load('wx_oauth');
        $appid = $this->config->item('appid');
        $secret = $this->config->item('secret');
        $jssdk = new JSSDK($appid, $secret);
        $signPackage = $jssdk->getSignPackage();
        $this->assign('signPackage',$signPackage);
    }

     /**
     * my_log4php 日志记录方法
     */
    public function my_log4php($content,$level,$class){
        require_once LOG4PHP_DIR.'Logger.php';  
        Logger::configure(LOG4PHP_DIR.'crontab.php'); 
        $c = 'log4'.$level;
        $this->$c = Logger::getLogger($class);  
        $this->$c->$level($content);
    }

    /** 
     * send_message 发送短信
     * @access public 
     * @author  lyne
     * @version 1.0 尊敬的用户，您本次的验证码为@，请及时输入验证码并完成操作。【三爱中医】
     */  
    public function send_message($mobile,$sms){
        $this->load->helper('my_functions');
        
        $result = sendSmsApi($mobile, $sms);
        if ($result['returnstatus'] == 'Success') {
            return true;
        }else{
            return false;
        }
    }

}

// // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
// // // // // // // // // // // // // // // // // // // // // // // // // // // // // 

/**
 * MY_Controller
 * 扩展控制器核心类
 * 简化变量分配和模板加载
 */
class Admin_Controller extends CI_Controller {

    protected $limitRows = 10;

 
    public function __construct(){
        parent::__construct();
        $this->load->set_admin_view_dir();
         // 分配一个全局变量
        $this->assign('public', base_url());
        $this->assign('module', base_url('admin'));
        $this->navbarByAdmin();
        $msectime = $this->msectime();
        $this->assign('version','v1.0.1');
        $this->assign('timestamp',$msectime);
    }

    /**
     * 根据权限显示菜单栏
     * @author lyne
     */
    public function navbarByAdmin(){
        if($this->session->login){
            $this->load->model('power_model');
            $rid = $this->session->login['role_id'];
            $menu_id = $this->power_model->getMenuId($rid);
            $menu_arr = explode(',',$menu_id['menu_id']);
            $navbar = [];
            foreach ($menu_arr as $k => $v) {
                if(empty($v)) continue;
                $r = $this->power_model->getNavbar($v);
                if(!$r || empty($r)) continue;
                $navbar[] = $r;
            }
            $navbar_list = $this->getTree($navbar,0);
            if(!empty($navbar_list)){
                foreach ($navbar_list as $k => &$v) {
                    $tmp_active = [];
                    if(!empty($v['child'])){
                        array_push($tmp_active, $v['name']);
                        $nav = array_column($v['child'],'name');
                        $v['active'] = array_merge($tmp_active,$nav);
                    }else{
                        $v['active'][] = $v['name'];
                    }
                }
                $tmp_order = array_column($navbar_list,'order');
                array_multisort($tmp_order,SORT_DESC,$navbar_list);
            }
            unset($v);
           
            $this->assign('navbar_list',$navbar_list);
            // 检查权限
            $this->checkUserPower($menu_arr);
        }else{
            if($this->isNeedLogin){
                $this->jumpNoticePage('登录已失效','/admin/login/index');
            }
        }
    }

    /**
     * checkUserPower 检查用户权限
     * @access protected
     * @param void
     * @return void
     */
    protected function checkUserPower($menu_arr){
        error_reporting(E_ALL ^ E_NOTICE);
        $this->load->helper('cookie');
        if ((!$this->isNeedLogin)) return false;
        // 当前访问的控制器名
        $controller = $this->router->fetch_class();
        // 当前访问的方法名
        $method = $this->router->fetch_method();

        $strurl = $controller.'/'.$method;
        
        // if(strstr($strurl,'index')) return false;
        $this->load->model('power_model');
        $num = 0;
        foreach ($menu_arr as $k => $v) {
            if(empty($v)) continue;
            // $result += $this->authority_model->selectMenuByIdCount($v,$strurl);//$_SERVER['HTTP_REFERER']
            $actionArr[$k] = $this->power_model->selectMenuInfo($v);//$_SERVER['HTTP_REFERER']
            
            if( strpos($actionArr[$k]['action'], ',') ){
                $newActionArr = explode(',', $actionArr[$k]['action']);
                foreach ($newActionArr as $value) {
                    if( $value == $strurl ) $num++;
                }
            }else{
                if( $actionArr[$k]['action'] == $strurl ) $num++;
            }
        }
        if (($num) < 1) {
            if(get_cookie('ajaxmark') == 'ajax'){
                $this->ajaxReturn(['POWER_LIMIT'=>false,'msg'=>'权限限制 Power Limit']);
            }else{
                $this->jumpNoticePage('权限限制 Power Limit');
            }
        }
    }

    /**
     * jumpNoticePage 跳转提示
     * @access protected
     * @param string $message
     * @param string $jump_url
     * @return void
     * @author lyne
     */
    public function jumpNoticePage($message, $jump_url = '', $mark = 'SUCCESS', $wait = 3){
        if (!$jump_url) $jump_url = @$_SERVER['HTTP_REFERER'];
        if($message!='true'){
            $this->assign('message', $message);
            $this->assign('url', $jump_url);
            $this->assign('mark', $mark);
            $this->assign('waitSecond', $wait);
            $this->display('public/jump_notice.html');
            exit;
        }else{
            header("Location:".site_url($jump_url));
        }
    }

    /**
     * 给CI_Controller扩展Smarty的方法
     * assign 分配变量
     */
    protected function assign($key,$val) {
        $this->ci_smarty->assign($key,$val);
    }
 
    /**
     * 给CI_Controller扩展Smarty的方法
     * display 加载模板
     */
    protected function display($html) {
        $this->ci_smarty->display($html);
    }

   /**
     * Ajax方式返回数据到客户端
     * @access protected
     * @param mixed $data 要返回的数据
     * @param String $type AJAX返回数据格式
     * @param int $json_option 传递给json_encode的option参数
     * @return void
     */
    protected function ajaxReturn($data,$type='',$json_option=0) {
        if(empty($type)) $type = 'JSON';
        switch (strtoupper($type)){
            case 'JSON' :
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                exit(json_encode($data));
            case 'XML'  :
                // 返回xml格式数据
                header('Content-Type:text/xml; charset=utf-8');
                exit(xml_encode($data));
            case 'EVAL' :
                // 返回可执行的js脚本
                header('Content-Type:text/html; charset=utf-8');
                exit($data);            
            default     :
                // 用于扩展其他返回格式数据
                Hook::listen('ajax_return',$data);
        }
    }
    
    public function getTree($data, $pId){
        $tree = [];
        foreach($data as $k => &$v){
            if($v['pid'] == $pId){ 
                //父亲找到儿子
                $v['child'] = $this->getTree($data, $v['id']);
                $tree[] = $v;
                unset($data[$k]);
            }else{
                continue;
            }
        }
        return $tree;
    }

    /**
     * 设置分页样式
     * @param $base_url
     * @param $count 总数
     * @author lyne
     */
    protected function myPagination($base_url,$count){
        $this->load->library('pagination');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $count;
        $config['per_page']   = $this->limitRows;
        $config['use_page_numbers'] = TRUE;
        $config['next_link'] = '下一页';           //你希望在分页中显示“下一页”链接的名字。
        $config['next_tag_open'] = '<li id="editable_next" class="paginate_button next" aria-controls="editable" tabindex="0">';      //“下一页”链接的打开标签。
        $config['next_tag_close'] = '</li>';    //“下一页”链接的关闭标签。
        $config['prev_link'] = '上一页';           //你希望在分页中显示“上一页”链接的名字。
        $config['prev_tag_open'] = '<li id="editable_previous" class="paginate_button previous" aria-controls="editable" tabindex="0">';      //“上一页”链接的打开标签。
        $config['prev_tag_close'] = '</li>';    //“上一页”链接的关闭标签。
        $config['cur_tag_open'] = '<li class="paginate_button active" aria-controls="editable" tabindex="0"><a href="javascript:;">';//“当前页”链接的打开标签。
        $config['cur_tag_close'] = '</a></li>';     //“当前页”链接的关闭标签。
        $config['num_tag_open'] = '<li class="paginate_button" aria-controls="editable" tabindex="0">';       //“数字”链接的打开标签。
        $config['num_tag_close'] = '</li>';
        $config['last_link'] = FALSE;
        $config['first_link'] = FALSE;
        return $config;
    }

    /**
     * 写入excel  by user
     * @author lyne
     */
    public function writerExcel($Excel, $sheet, $title, $data){
        $this->load->helper('my_functions');
        //创建一个新的工作空间(sheet)
        $Excel->createSheet();
        //设置SHEET
        $Excel->setactivesheetindex($sheet)->setTitle($title);
        //写入多行数据
        $rowspan = 1;
        // 获取当前工作表 worksheet
        $objActiveSheet = $Excel->getActiveSheet();
        foreach($data as $row){ //行写入
            // A列
            $colspan = 0;
            foreach ($row as $v) {// 列写入
                $tmp = num2alpha($colspan, false);
                $objActiveSheet->setCellValue($tmp.$rowspan, $v);
                $colspan++; // 下一列
            }
            $rowspan++; // 下一行
        }           
        unset($data);
        $Excel->setactivesheetindex($sheet);  // 最后选择显示sheet0 
        return $Excel;

    }

    /**
     * doUpload
     * 上传图片
     * @author sam
     */
    public function doUpload($key,$filepath,$filename,$type='single'){
        // $config['image_library'] = 'gd2';
        // $this->load->library('image_lib');
        $this->load->library('upload');
        if(is_dir($filepath)){
            $config['upload_path'] = $filepath;
        }else{
            $config['upload_path'] = FCPATH.'/public/upload/tmp/';
        }
        if($filename){
            $config['file_name'] = $filename;
        }else{
            $config['file_name'] = 'T'.date("Ymd").'X'.mt_rand(1001,9999);
        }
        $config['allowed_types'] = 'img|jpg|jpeg|png|gif';
        $config['max_size'] = 20000000;
        // $config['max_width'] = 3980;
        // $config['max_height'] = 3980;
        $this->upload->initialize($config);
        if($type == 'multi'){
            $data = array();
            foreach ($_FILES as $k => $v) {
                if(!$v['name']){
                    $this->upload->do_upload($k);
                    $data[] = $this->upload->data('file_name');
                }else{
                    $error = array('error'=>$this->upload->display_errors());
                }
            }
            $result = array('data'=>$data,'error'=>$error);
            return $result;
        }else{
            if ($this->upload->do_upload($key)){
                $data = $this->upload->data();
                return $data;
            } else {
                $error = $this->upload->display_errors();
                return $error;
            }
        }
    }

    /** 
     * makeThumb
     * 创建缩略图
     * @access public 
     * @param $filename 文件名
     * @param $filepath 原大图路径
     * @param $newpath 缩略图路径
     * @param $width 宽度
     * @param $height 高度
     * @author  sam
     */  
    public function makeThumb($filename, $filepath, $newpath, $width, $height){
        $config['image_library'] = 'gd2';
        $config['source_image'] = $filepath.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']     = $width;
        $config['height']   = $height;
        $config['thumb_marker'] = FALSE;
        $config['new_image'] = $newpath.$filename;

        $this->image_lib->initialize($config);
        $r = $this->image_lib->resize();
        return $r;
    }

    /** 
     * make_dir
     * 创建目录
     * @access public 
     * @author  Sam<liusong@xxgrp.cn>
     */  
    public function make_dir($dir, $mode = 0755){
        if ( ! is_dir($dir)) {
            if ( ! $this->make_dir(dirname($dir), $mode)) return false;
            if ( ! mkdir($dir, $mode)) return false;
        }
        return true;
    }

    //返回当前的毫秒时间戳
    public function msectime() {
        list($msec, $sec) = explode(' ', microtime());
        $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return $msectime;
    }

    /** 
     * send_message 发送短信
     * @access public 
     * @author  lyne
     * @version 1.0 
     */  
    public function send_message($mobile,$sms){
        $this->load->helper('my_functions');
        
        $result = sendSmsApi($mobile, $sms);
        if ($result['returnstatus'] == 'Success') {
            return true;
        }else{
            return false;
        }
    }




}


