<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Goods extends Admin_Controller {
    
    protected $isNeedLogin = TRUE;

	public function __construct(){
		parent::__construct();
        $this->load->model('goods_model');
	}
	
	/**
	 * 商品列表
	 * @author lyne
	 */
	public function index(){
         // 供应商
        $vendorlist = $this->goods_model->selectVendor();
		$this->assign('title','查询商品');
        $this->assign('vendorlist',$vendorlist);
		$this->display('goods/index.html');
	}

    /** 
     * ajaxGoodsList
     * 动态获取商品列表
     * @access public 
     * @author lyne
     */  
    public function ajaxGoodsList(){
        $options = $this->input->post();
        
        @$this->session->options_goods = $options;
        if ($this->session->options_goods) {

            if (isset($this->session->options_goods['search_val']) && !empty($this->session->options_goods['search_val'])) {
                $tmp_options['search_key'] = $this->session->options_goods['search_key'];
                $tmp_options['search'] = $this->session->options_goods['search_val'];
            } else {
                $tmp_options['search']=null;
            }
            if (isset($this->session->options_goods['vendor_id']) && !empty($this->session->options_goods['vendor_id'])) {
                $tmp_options['vendor_id'] = $this->session->options_goods['vendor_id'];
            } else {
                $tmp_options['vendor_id']=null;
            }
            // 商品状态
            if (isset($this->session->options_goods['status_n']) && isset($this->session->options_goods['status_v']) && !empty($this->session->options_goods['status_n']) && ($this->session->options_goods['status_v']!='')) {
                $tmp_options['status'] = "g.".$this->session->options_goods['status_n']."='".$this->session->options_goods['status_v']."'";
            } else {
                $tmp_options['status']=null;
            }
            
        } else {
            $tmp_options=null;
        }
        $result = $this->goods_model->selectGoods($tmp_options);
        $list = $result['list'];
        $count = $result['count'];
        $offset = $result['offset'];
        
        $this->load->library('pagination');
        $config = $this->myPagination(base_url().'admin/goods/ajaxGoodsList',$count);
        $this->pagination->initialize($config);
        $page = $this->pagination->create_links();
        foreach ($list as $k => &$v) {

            if ($v['goods_main'] == null) continue;
            $a = explode('|', $v['goods_main']);
            $v['thumb_pic'] = current($a);
            $v['cate_one_name'] = $this->goods_model->getCateOneName($v['cate_id_one']);
        }
        $last_page = ceil($count / $this->limitRows);
       

        // echo "<pre>";
        // var_dump($list);exit;
        $this->assign('offset',$offset);
        $this->assign('last_page',$last_page);
        $this->assign('total',$count);
        $this->assign('showpage',$page);
        $this->assign('goodslist',$list);
        $this->assign('title','查询商品');
        $this->display('goods/goods-table.html');
    }

    /**
     * 清空筛选条件
     * @author lyne
     */
    public function goodsClear(){
        unset($this->session->options_goods);
    }

    /**
     * 商品添加
     * @author lyne
     */
    public function add(){
        // 分类
        $catelist = $this->goods_model->selectCate(1);
        if (!empty($catelist)) {
            foreach ($catelist as $k => &$v) {
                $v['child'] = $this->goods_model->selectCate(2,$v['id']);
            }
        }
        
        // 供应商
        $vendorlist = $this->goods_model->selectVendor();

        $this->session->tmpbigpic = [];
        $this->session->tmpsmallpic = [];
        $this->assign('vendorlist',$vendorlist);
        $this->assign('catelist',$catelist);
        $this->assign('title','商品录入');
        $this->display('goods/add.html');
    }

    /**
     * 添加
     * @author lyne
     */
    public function doAddGoods() {
        $data = $this->input->post();
        if ($data['cate_id'] != null) {
            $tmp_cateid = explode('-',$data['cate_id']);
            $data['cate_id_one'] = $tmp_cateid[0];
            $data['cate_id_two'] = $tmp_cateid[1];
        }
        $data['goods_main'] = $data['g_big_pic'];

        unset($data['g_small_pic']);
        unset($data['g_big_pic']);
        unset($data['cate_id']);

        $data['price'] = $data['price'];
        $data['stock'] = $data['stock'];
        $data['is_up_time'] = time();
        $data['add_time'] = time();
        
        $result = $this->goods_model->insertGoods($data);
        if ($result) {

            $this->ajaxReturn(['retcode'=>1,'msg'=>'提交成功','data'=>[]]);
        } else {

            $this->ajaxReturn(['retcode'=>2001,'msg'=>'存储过程失败','data'=>[]]);
        }
    }

    /**
     * ajaxUpload 上传文件
     * @author lyne
     */
    public function ajaxUpload(){
        $this->load->library('image_lib');
        $file = $_FILES;
        $file_path1 = 'goods/'.date('Ymd',time()).'/'; // 文件服务器目录 - 保存路径
        $file_path2 = WWWROOTPATH.PIC_O_PATH.$file_path1; // 文件服务器目录

        $file_small_path2 = WWWROOTPATH.PIC_T_PATH.PIC211X211.'/'.$file_path1;
        $big_pic = $this->session->tmpbigpic;
        $small_pic = $this->session->tmpsmallpic;
        foreach ($file as $key => $v) {

            $tmp_pic_ext = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
           
            $file_name = 'T'.date("Ymd").'X'.mt_rand(1001,9999).'.'.$tmp_pic_ext;
            
            if ($this->make_dir($file_path2)) {

                $result = $this->doUpload($key,$file_path2,$file_name);
            }

            if (isset($result['error']) && !empty($result['error'])) {

                $this->ajaxReturn(['success'=>false,'msg'=>$result['error']]);
            }

            $big_pic[] = $file_path1.$file_name;

            if ($this->make_dir($file_small_path2)) {
                
                $this->makeThumb($file_name, $file_path2, $file_small_path2, 211, 211);
            }
            $small_pic[] = $file_path1.$file_name; 
        }
        $this->session->tmpbigpic = $big_pic;
        $this->session->tmpsmallpic = $small_pic;
        // var_dump($pic);exit;
        $str_url['big_url'] = implode('|',$this->session->tmpbigpic);
        $str_url['small_url'] = implode('|',$this->session->tmpsmallpic);
        $str_url['tmp_filename'] = $file_path1.$file_name;
        $this->ajaxReturn(['success'=>true,'data'=>$str_url]);
    }

    /**
     * ajaxDelImg 删除指定图片
     * @author lyne
     */
    public function ajaxDelImg(){
        $file_path = $this->input->post('file_path',true);
        $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
        $big_pic_data = $this->session->tmpbigpic;
        $small_pic_data = $this->session->tmpsmallpic;
        if(empty($big_pic_data)) $this->ajaxReturn(['success'=>true,'data'=>null]);
        foreach ($big_pic_data as $k => &$v) {
            $pic_path = $v;
            if ($pic_path==$file_path) {
                @unlink(WWWROOTPATH.PIC_O_PATH.$v);
                unset($big_pic_data[$k]);
                @unlink(WWWROOTPATH.PIC_T_PATH.PIC211X211.'/'.$v);
                unset($small_pic_data[$k]);
            }
        }
        $this->session->tmpbigpic = $big_pic_data;
        $this->session->tmpsmallpic = $small_pic_data;
        $str_url['big_url'] = implode('|',$this->session->tmpbigpic);
        $str_url['small_url'] = implode('|',$this->session->tmpsmallpic);
        $this->ajaxReturn(['success'=>true,'data'=>$str_url]);
    }


    /**
     * ajaxUpdateIsUp
     * @author lyne
     */
    public function ajaxUpdateIsUp(){
        $goods_id = $this->input->post('id',true); 
        $is_up = $this->input->post('is_up',true);
        $up_data['is_up'] = $is_up=="true" ? 1 : 0;
        $up_data['is_up_time'] = time();
        $res = $this->goods_model->updateGoods($goods_id,$up_data);
        if($res) $this->ajaxReturn(['retcode'=>1,'msg'=>'操作成功','data'=>[]]);
        else $this->ajaxReturn(['retcode'=>2001,'msg'=>'操作失败','data'=>[]]);
    }

     /**
     * getGoodsDetail
     * @author lyne
     */
    public function getGoodsDetail(){
        $g_id = $this->input->get('id',true);
        $details = $this->goods_model->selectGoodsDetails($g_id);
        if (!$details) exit('出错！数据异常');
        $details['cate_one_name'] = $this->goods_model->getCateOneName($details['cate_id_one']);
        
        // echo "<pre>";
        // var_dump($details);
        $details['pic'] = explode('|', $details['goods_main']);
        $this->assign('details',$details);
        $this->assign('title','商品详情');
        $this->display('goods/goods-details.html');
    }

    /**
     * goodsEdit
     * @author lyne
     */
    public function goodsEdit(){
        $id = $this->uri->segment(4,false);
        $details = $this->goods_model->selectGoodsDetails($id);
        $this->session->tmpbigpic = explode('|',$details['goods_main']);
        $this->session->tmpsmallpic = explode('|',$details['goods_main']);
        $details['tmp_pic'] = explode('|', $details['goods_main']);

        // 分类
        $catelist = $this->goods_model->selectCate(1);
        if(!empty($catelist)){
            foreach ($catelist as $k => &$v) {
                $v['child'] = $this->goods_model->selectCate(2,$v['id']);
            }
        }
        
        // 供应商
        $vendorlist = $this->goods_model->selectVendor();

        $this->assign('catelist',$catelist);
        $this->assign('details',$details);
        $this->assign('vendorlist',$vendorlist);
        $this->assign('title','查询商品');
        $this->display('goods/goods-edit.html');
    }


    /**
     * 添加
     * @author lyne
     */
    public function doEditGoods(){
        $data = $this->input->post();
        $id = $data['goods_id'];
        unset($data['goods_id']);

        if(!empty($data['cate_id'])){
            $tmp_cateid = explode('-',$data['cate_id']);
            $data['cate_id_one'] = $tmp_cateid[0];
            $data['cate_id_two'] = $tmp_cateid[1];
        }
        $data['goods_main'] = $data['g_big_pic'];

        unset($data['g_small_pic']);
        unset($data['g_big_pic']);
        unset($data['cate_id']);

        $result = $this->goods_model->updateGoods($id,$data);
        if($result) $this->ajaxReturn(['retcode'=>1,'msg'=>'提交成功','data'=>[]]);
        else $this->ajaxReturn(['retcode'=>2001,'msg'=>'提交失败','data'=>[]]);
    }

    /**
     * ajaxDelImgEdit
     * @author lyne
     */
    public function ajaxDelImgEdit(){
        $goods_id = $this->input->post('gid',true);
        if(!$goods_id) $this->ajaxReturn(['success'=>false,'msg'=>'参数异常']);
        $file_path = $this->input->post('file_path',true);
        $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
        $big_pic_data = $this->session->tmpbigpic;
        $small_pic_data = $this->session->tmpsmallpic;
        if(empty($big_pic_data)) $this->ajaxReturn(['success'=>true,'data'=>null]);
        foreach ($big_pic_data as $k => &$v) {
            $pic_path = $v;
            if($pic_path==$file_path){
                @unlink(WWWROOTPATH.PIC_O_PATH.$v);
                unset($big_pic_data[$k]);
                @unlink(WWWROOTPATH.PIC_T_PATH.PIC211X211.'/'.$v);
                unset($small_pic_data[$k]);
            }
        }
        $this->session->tmpbigpic = $big_pic_data;
        $this->session->tmpsmallpic = $small_pic_data;
        $str_url['big_url'] = implode('|',$this->session->tmpbigpic);
        $str_url['small_url'] = implode('|',$this->session->tmpsmallpic);
        // 更新
        $this->load->model('goods_model');
        $up_data['goods_main'] = $str_url['big_url'];
        $this->goods_model->updateGoods($goods_id,$up_data);
        $this->ajaxReturn(['success'=>true,'data'=>$str_url]);
    }


    /**
     * ajaxUploadEdit 上传文件
     * @author lyne
     */
    public function ajaxUploadEdit(){
        $goods_id = $this->input->get('id',true);
        if(!$goods_id) $this->ajaxReturn(['success'=>false,'msg'=>'参数异常']);
        $this->load->library('image_lib');
        $file = $_FILES;
        $file_path1 = 'goods/'.date('Ymd',time()).'/'; // 文件服务器目录 - 保存路径
        $file_path2 = WWWROOTPATH.PIC_O_PATH.$file_path1; // 文件服务器目录

        $file_small_path2 = WWWROOTPATH.PIC_T_PATH.PIC211X211.'/'.$file_path1;
        $big_pic = $this->session->tmpbigpic;
        $small_pic = $this->session->tmpsmallpic;
        foreach ($file as $key => $v) {
            $tmp_pic_ext = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
           
            $file_name = 'T'.date("Ymd").'X'.mt_rand(1001,9999).'.'.$tmp_pic_ext;
            if($this->make_dir($file_path2)) $result = $this->doUpload($key,$file_path2,$file_name);

            if(isset($result['error']) && !empty($result['error'])){
                $this->ajaxReturn(['success'=>false,'msg'=>$result['error']]);
            }
            $big_pic[] = $file_path1.$file_name;
            if($this->make_dir($file_small_path2)) $this->makeThumb($file_name, $file_path2, $file_small_path2, 211, 211);
            $small_pic[] = $file_path1.$file_name; 
        }
        $this->session->tmpbigpic = $big_pic;
        $this->session->tmpsmallpic = $small_pic;
        // var_dump($pic);exit;
        $str_url['big_url'] = implode('|',$this->session->tmpbigpic);
        $str_url['small_url'] = implode('|',$this->session->tmpsmallpic);
        $str_url['tmp_filename'] = $file_path1.$file_name;
         // 更新
        $this->load->model('goods_model');
        $up_data['goods_main'] = $str_url['big_url'];
        $this->goods_model->updateGoods($goods_id,$up_data);
        $this->ajaxReturn(['success'=>true,'data'=>$str_url]);
    }




   /**
     * 导出商品列表excel
     * @author sam
     */
    public function exportGoodsExcel(){
        
        $this->load->library('CI_Excel');
        $options = $this->input->post();
        @$this->session->options_exportgoods = $options;
        if($this->session->options_exportgoods){

            if(isset($this->session->options_exportgoods['search_val']) && !empty($this->session->options_exportgoods['search_val'])){
                $tmp_options['search_key'] = $this->session->options_exportgoods['search_key'];
                $tmp_options['search'] = $this->session->options_exportgoods['search_val'];
            }else{
                $tmp_options['search']=null;
            }
            if(isset($this->session->options_exportgoods['vendor_id']) && !empty($this->session->options_exportgoods['vendor_id'])){
                $tmp_options['vendor_id'] = $this->session->options_exportgoods['vendor_id'];
            }else{
                $tmp_options['vendor_id']=null;
            }
            // 商品状态
            if(isset($this->session->options_exportgoods['status_n']) && isset($this->session->options_exportgoods['status_v']) && !empty($this->session->options_exportgoods['status_n']) && ($this->session->options_exportgoods['status_v']!='')){
                $tmp_options['status'] = "g.".$this->session->options_exportgoods['status_n']."='".$this->session->options_exportgoods['status_v']."'";
            }else{
                $tmp_options['status']=null;
            }
            
        }else{
            $tmp_options=null;
        }
        $list = $this->goods_model->selectExportGoods($tmp_options);
        
        if(!empty($list)){
            foreach ($list as $k => &$v) {
                $v['cate_one_name'] = $this->goods_model->getCateOneName($v['cate_id_one']);
            }
            unset($v);
            $processedList = array();
            foreach ($list as $k => $v) {
                $processedList[$k]['key'] = $k+1;
                $processedList[$k]['goods_code'] = $v['goods_code'];
                $processedList[$k]['goods_name'] = $v['goods_name'];
                $processedList[$k]['vendor_name'] = $v['vendor_name'];
                $processedList[$k]['cate'] = $v['cate_one_name'].'/'.$v['cate_two_name'];
                $processedList[$k]['price'] = $v['price'];
                $processedList[$k]['stock'] = $v['stock'];
                $processedList[$k]['sales'] = $v['sales'];
                $processedList[$k]['is_up'] = $v['is_up']==1?'上架':'下架';
            }

            $headerTitle[0][] = '序号';
            $headerTitle[0][] = '商品编码';
            $headerTitle[0][] = '商品名称';
            $headerTitle[0][] = '所属供应商';
            $headerTitle[0][] = '所属分类';
            $headerTitle[0][] = '供货价';
            $headerTitle[0][] = '剩余库存';
            $headerTitle[0][] = '销量';
            $headerTitle[0][] = '上架状态';
            
            $list = array_merge($headerTitle,$processedList);
            // echo "<pre>";
            // var_dump($list);exit;
            $objPHPExcel = $this->writerExcel($this->ci_excel,0,'商品数据',$list);
            $filename = "goods-data".date('Y-m');

            header('Content-Type: application/vnd.ms-excel');
            header("Content-Disposition: attachment;filename=".$filename.".xls");
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');

            header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
            header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header ('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $filepath = TF_EXPRESS_PATH.$filename.".xls";
            $fileurl = TF_EXPRESS_URL.$filename.".xls";
            $objWriter->save($filepath);
            $this->ajaxReturn(['success'=>true,'data'=>$fileurl]);
            exit;
        }else{
            // $this->jumpNoticePage('对不起，未找到相关数据',site_url('/order/index'));
            $this->ajaxReturn(['retcode'=>3001,'data'=>[],'msg'=>'未找到商品数据']);
            exit;       
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */