<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends Admin_Controller {
    
    protected $isNeedLogin = TRUE;

    public function __construct(){
        parent::__construct();
        $this->load->model('order_model');
    }
    
    /** 
     * index
     * 订单列表
     * @author sam
     */  
    public function index(){


        $this->assign('title','订单列表');
        $this->display('order/index.html');
    }

    /**
     * ajaxOrderList
     * 动态加载订单列表
     * @author sam
     */
    public function ajaxOrderList(){
        $options = $this->input->post();
        @$this->session->options = $options;
        if($this->session->options){
            if(isset($this->session->options['start']) && isset($this->session->options['end']) && !empty($this->session->options['start']) && !empty($this->session->options['end'])){
                $s = strtotime($this->session->options['start'].' 00:00:00');
                $e = strtotime($this->session->options['end'].' 23:59:59');
                // echo $s,$e;
                $tmp_options['add_time'] = "p.add_time >=$s and p.add_time <=$e";
            }else{
                $tmp_options['add_time'] = null;
            }
            if(isset($this->session->options['search_val']) && !empty($this->session->options['search_val'])){
                if($this->session->options['search_key']=='account'){
                    $tmp_options['search'] = "p.".$this->session->options['search_key']."='".$this->session->options['search_val']."'";
                }elseif($this->session->options['search_key']=='p_order_code'){
                    $tmp_options['search'] = "p.".$this->session->options['search_key']."='".$this->session->options['search_val']."'";
                }else{
                    $tmp_options['search'] = null;
                }
            }else{
                $tmp_options['search']=null;
            }
        }
        $result = $this->order_model->selectOrderList($tmp_options);
        // echo "<pre>";
        // var_dump($result);exit;
        $list = $result['list'];
        $count = $result['count'];
        foreach ($list as $k => &$v) {
            // $manage = $this->manageOrder($v);
            $v['add_time'] = date("Y-m-d H:i:s",$v['add_time']);
        }
        // echo "<pre>";
        // var_dump($list);exit;
        $this->load->library('pagination');
        $config = $this->myPagination(BASEURL.'admin/order/ajaxOrderList',$count);
        $this->pagination->initialize($config);
        $page = $this->pagination->create_links();
        // 尾页
        $last_page = ceil($count / $this->limitRows);
        $this->assign('offset',$offset);
        $this->assign('last_page',$last_page);
        $this->assign('total',$count);
        $this->assign('showpage',$page);
        $this->assign('orderlist',$list);
        $this->assign('title','订单列表');
        $this->display('order/order-table.html');
    }

    /**
     * orderDts
     * 订单详情
     * @author sam
     */
    public function orderDts(){
        $id = $this->uri->segment(4,true);
        $details = $this->order_model->getOrderDts($id);
        
        // echo "<pre>";
        // var_dump($details);exit;
        $details['sorder'] = $this->order_model->getSonOrders($id);
        foreach ($details['sorder'] as $k => &$v) {
            
            if($v['express_no'] !=''){
                $express_no = '';
                $express_no_arr =  explode('+', rtrim($v['express_no'],'+'));

                $v['express_no'] = $express_no_arr;
            }
            
            $goods = $this->order_model->getSonOrderGoods($v['id']);
            foreach ($goods as $gk=>&$gv) {
                $goods[$gk]['goods_pic'] = current(explode('|', $gv['goods_pic']));
            }
            $v['goods'] = $goods;
        }

        $details['add_time'] = date("Y-m-d H:i:s",$details['add_time']);
        // $this->manageOrder($details);
        $this->assign('title','订单列表');
        $this->assign('details',$details);
        $this->display('order/order-dts.html');
    }

    /**
     * orderVendor
     * 供应商订单列表
     * @author sam
     */
    public function orderVendor(){
        $id = $this->session->login['vendor_id'];
        $area = $this->order_model->getAreaList();
        if($id){
            $vendor = $this->order_model->getVendorList($id);
        }else{
            $vendor = $this->order_model->getVendorList();
        }
        // echo "<pre>";
        // var_dump($area);
        $this->assign('title','供应商订单');
        $this->assign('area',$area);
        $this->assign('vid',$id);
        $this->assign('vendor',$vendor);
        $this->display('order/vendor_order.html');
    }

    /**
     * ajaxVendorOrderList
     * 动态加载供应商订单列表
     * @author sam
     */
    public function ajaxVendorOrderList(){
        $data = $this->input->post();
        $this->session->v_options = $data;
        if($this->session->v_options){
            if(isset($this->session->v_options['start']) && isset($this->session->v_options['end']) && !empty($this->session->v_options['start']) && !empty($this->session->v_options['end'])){
                $s = strtotime($this->session->v_options['start'].' 00:00:00');
                $e = strtotime($this->session->v_options['end'].' 23:59:59');
                // echo $s,$e;
                $tmp_options['add_time'] = "p.add_time >=$s and p.add_time <=$e";
            }else{
                $tmp_options['add_time'] = null;
            }
            if(isset($this->session->v_options['search_val']) && !empty($this->session->v_options['search_val'])){
                if($this->session->v_options['search_key']=='account'){
                    $tmp_options['search'] = "p.".$this->session->v_options['search_key']."='".$this->session->v_options['search_val']."'";
                }elseif($this->session->v_options['search_key']=='s_order_code'){
                    $tmp_options['search'] = "s.".$this->session->v_options['search_key']."='".$this->session->v_options['search_val']."'";
                }else{
                    $tmp_options['search'] = null;
                }
            }else{
                $tmp_options['search']=null;
            }
            
            // 订单状态
            if(isset($this->session->v_options['order_status']) && $this->session->v_options['order_status'] !==''){
                if($this->session->v_options['order_status']=='1'){// 待审核
                    $tmp_options['os'] = "p.review_status < 4";
                }elseif($this->session->v_options['order_status']=='2'){// 审核通过待发货
                    $tmp_options['os'] = "(p.review_status = 4 and s.order_status = 0)";
                }elseif($this->session->v_options['order_status']=='3'){
                    $tmp_options['os'] = "(p.review_status = 4 and s.order_status >= 1)";
                }elseif($this->session->v_options['order_status']=='4'){
                    $tmp_options['os'] = "(p.review_status = 4 and s.receive_money = 1)";
                }
            }else{
                $tmp_options['os']=null;
            }

            // 区域
            if(isset($this->session->v_options['area_id']) && $this->session->v_options['area_id'] !==''){
                $tmp_options['area'] = "p.area_id='".$this->session->v_options['area_id']."'";
            }else{
                $tmp_options['area']=null;
            }

            // 供应商
            if(isset($this->session->v_options['vendor_id']) && $this->session->v_options['vendor_id'] !==''){
                $tmp_options['vendor'] = "s.vendor_id='".$this->session->v_options['vendor_id']."'";
            }else{
                $tmp_options['vendor']=null;
            }
        }

        $r = $this->order_model->getVendorOrderList($tmp_options);
        $list = $r['list'];
        $count = $r['count'];
        $offset = $r['offset'];
        foreach ($list as $k => &$v) {
            $this->manageOrderSon($v);
            if($v['area_type']==3){
                $area_dts = $this->order_model->getAreaDts($v['area_id']);
                $v['parent_area_name']  = $this->order_model->getAreaDts($area_dts['pid'])['area_name'];
            }
        }
        // echo "<pre>";
        // var_dump($list);exit;
        $this->load->library('pagination');
        $config = $this->myPagination(BASEURL.'admin/order/ajaxVendorOrderList',$count);
        $this->pagination->initialize($config);
        $page = $this->pagination->create_links();
        // 尾页
        $last_page = ceil($count / $this->limitRows);
        $this->assign('offset',$offset);
        $this->assign('last_page',$last_page);
        $this->assign('total',$count);
        $this->assign('showpage',$page);
        $this->assign('orderlist',$list);
        $this->display('order/vendor-order-table.html');
    }

    /**
     * ajax 立即订阅
     * @author lyne
     */
    public function ajaxSubscribe(){
        $order_id = $this->input->post('id',true);
        $r = $this->requestSubscribe($order_id);
        if($r){
            $this->ajaxReturn(['retcode'=>1,'data'=>[],'msg'=>'成功！已订阅']);
        }else{
            $this->ajaxReturn(['retcode'=>1006,'data'=>[],'msg'=>'失败！请重新订阅']);
        }
    }

    /**
     * vendorOrderGoods
     * 子订单商品发货
     * @author sam
     */
    public function vendorOrderGoods(){
        $id = $this->uri->segment(3);
        $goods = $this->order_model->getSonOrderGoods($id);
        foreach ($goods as $k => &$v) {
            $v['goods_pic'] = explode('|', $v['goods_pic'])[0];
        }
        $expresslist = $this->order_model->selectExpress();
        $this->assign('id',$id);
        $this->assign('goods',$goods);
        $this->assign('expresslist',$expresslist);
        $this->display('order/express-goods.html');
    }

    /**
     * ajaxSendExpress
     * 填写物流信息，发货
     * @author sam
     */
    public function ajaxSendExpress(){
        $data = $this->input->post('express',true);
        $s_id = $data['id'];
        $exp = explode('-', $data['company']);
        $in_data['express_code'] = $exp[0];
        $in_data['express_com'] = $exp[1];
        $in_data['express_no'] = $data['express_no'];
        $in_data['express_time'] = time();
        $in_data['order_status'] = 1;
        unset($data['id']);
        unset($data['company']);
        unset($data['express_no']);

        $up_data = [];
        foreach ($data as $k => $v) {
            $up_data[$k]['id'] = $k;
            $up_data[$k]['express_num'] = $v;
        }
        array_values($up_data);
        $this->load->model('order_model');
        $result = $this->order_model->updateOrderForExpress($s_id,$in_data,$up_data);
        if($result){
            $r = $this->requestSubscribe($s_id);
            if($r){
                $this->ajaxReturn(['retcode'=>1,'data'=>[],'msg'=>'发货成功']);
            }else{
                $this->ajaxReturn(['retcode'=>3002,'data'=>[],'msg'=>'发货成功，订阅失败！']);
            }
        }
        $this->ajaxReturn(['retcode'=>1006,'data'=>[],'msg'=>'发货失败']);
    }

    /**
     * 动态获取物流跟踪信息  【快递100】
     * @param $no s_order_sn 子订单号
     * @author lyne
     */
    public function ajaxPushList(){
        $no = $this->input->post('expno',true);
        // 物流跟踪信息
        $this->load->model('order_model');
        $exp_push_list = $this->order_model->selectPushList($no);
        switch ($exp_push_list['state']) {
            case '0': $exp_push_list['state_v']='在途中'; break;
            case '1': $exp_push_list['state_v']='已揽收'; break;
            case '2': $exp_push_list['state_v']='疑难';   break;
            case '3': $exp_push_list['state_v']='已签收'; break;
            case '4': $exp_push_list['state_v']='退签';   break;
            case '5': $exp_push_list['state_v']='派送中'; break;
            case '6': $exp_push_list['state_v']='退回';   break;
            case '7': $exp_push_list['state_v']='转单';   break;
        }
        if(!empty($exp_push_list['data'])){
            $exp_push_list['data'] = json_decode($exp_push_list['data'],true);
        }else{
            $exp_push_list['data'] = null;
        }
        // echo "<pre>";
        // var_dump($exp_push_list);
        $this->assign('exp_push_list',$exp_push_list);
        $this->display('order/pushlist.html');
    }

    /**
     * 快递100订阅
     * @author lyne
     */
    public function requestSubscribe($s_order_id){
        if(!$s_order_id) return false;
        $this->load->library('CI_Kuaidi');
        $this->load->model('order_model');
        $info = $this->order_model->getSonOrderDts($s_order_id);
        $nu = explode('+',rtrim($info['express_no'],'+'));
        $sub_res = true;
        foreach ($nu as $k => $v) {
            $s_order_code = $info['s_order_code'];
            $com = $info['express_code'];
            $company = $info['express_com'];
            $address = $info['addr'].$info['details'];
            $from = '仓库';
            $to = explode(' ', $info['addr'])[1];
            $result = $this->ci_kuaidi->subscribe($com,$v,$from,$to);

            $result = json_decode($result,true);
            $this->myLog4php('快递100找问题：'.json_encode($result,JSON_UNESCAPED_UNICODE).'||','info',__CLASS__);
            
            if($result['result']===true){
                $in_data['s_order_code'] = $s_order_code;
                $in_data['express_code'] = $com;
                $in_data['express_name'] = $company;
                $in_data['express_no'] = $v;
                $in_data['from'] = $from;
                $in_data['to'] = $to;
                $in_data['type'] = 1;
                $in_data['create_time'] = time();
                $r = $this->order_model->insertOrderPush($in_data);
                if($r){
                    $u_data['is_subscribe'] = '1';  // 订阅成功
                    $this->order_model->updateSonOrderInfo($s_order_id,$u_data);
                    $res['api_result'] = $result;
                    $res['save_push_result'] = $r;
                    $res['log_time'] = date('Y-m-d H:i:s',time());
                    $this->myLog4php('订阅success：'.json_encode($res,JSON_UNESCAPED_UNICODE).'||','info',__CLASS__);  
                }
            }else{
                $res['api_result'] = $result;
                $res['save_push_result'] = false;
                $res['log_time'] = date('Y-m-d H:i:s',time());
                $this->myLog4php('订阅fails：'.json_encode($res,JSON_UNESCAPED_UNICODE).'||','info',__CLASS__);
                $sub_res = false;
            }
        }
        return $sub_res;
    }

    /**
     * doReceive
     * 供应商订单确认收款
     * @author sam
     */
    public function doReceive(){
        $order_id = $this->input->post('id',true);
        $res = $this->order_model->updateSonOrderInfo($order_id,['receive_money'=>1]);
        if($res){
            $this->ajaxReturn(['retcode'=>1,'data'=>[],'msg'=>'确认收款成功！']);
        }else{
            $this->ajaxReturn(['retcode'=>1006,'data'=>[],'msg'=>'确认收款失败！']);
        }
    }

    /**
     * printExpress
     * 打印发货单
     * @author sam
     */
    public function printExpress(){
        $id = $this->uri->segment(3);
        $goods = $this->order_model->getSonOrderGoods($id);
        $vendor_info = $this->order_model->getVendorInfo($this->session->login['vendor_id']);
        $this->assign('goods',$goods);
        $this->assign('info',$vendor_info);
        $this->display('order/print.html');
    }

    /**
     * vendorOrderDts
     * 供应商订单详情
     * @author sam
     */
    public function vendorOrderDts(){
        $id = $this->uri->segment(3,true);
        $details = $this->order_model->getSonOrderDts($id);
        if($details['express_no'] !=''){
            $express_no = '';
            $express_no_arr = explode('+', rtrim($details['express_no'],'+'));

            $details['express_no'] = $express_no_arr;
        }
        if($details['receive_pic']!='' || $details['receive_pic'] !=null){
            // 收货图片
            $details['receive_pic_arr'] = explode('|', rtrim($details['receive_pic'],'|'));
        }
        $goods = $this->order_model->getSonOrderGoods($id);
        // echo "<pre>";
        // var_dump($goods);
        foreach ($goods as $gk=>&$gv) {
            $goods[$gk]['goods_pic'] = explode('|', $gv['goods_pic'])[0];
        }
        $details['goods'] = $goods;

        $this->manageOrder($details);
        // echo "<pre>";
        // var_dump($details);exit;
        $this->assign('title','供应商订单');
        $this->assign('details',$details);
        $this->display('order/vendor-order-dts.html');
    }

    /**
     * review
     * 订单审核
     * @author sam
     */
    public function review(){
        $area = $this->order_model->getAreaList();
        // echo "<pre>";
        // var_dump($area);
        $this->assign('title','订单审核');
        $this->assign('area',$area);
        $this->display('order/review.html');
    }

    /**
     * ajaxReviewList
     * 动态获取审核列表
     * @author sam
     */
    public function ajaxReviewList(){
        $options = $this->input->post();
        @$this->session->r_options = $options;
        if($this->session->r_options){
            if(isset($this->session->r_options['start']) && isset($this->session->r_options['end']) && !empty($this->session->r_options['start']) && !empty($this->session->r_options['end'])){
                $s = strtotime($this->session->r_options['start'].' 00:00:00');
                $e = strtotime($this->session->r_options['end'].' 23:59:59');
                // echo $s,$e;
                $tmp_options['add_time'] = "p.add_time >=$s and p.add_time <=$e";
            }else{
                $tmp_options['add_time'] = null;
            }
            if(isset($this->session->r_options['search_val']) && !empty($this->session->r_options['search_val'])){
                if($this->session->r_options['search_key']=='account'){
                    $tmp_options['search'] = "p.".$this->session->r_options['search_key']."='".$this->session->r_options['search_val']."'";
                }elseif($this->session->r_options['search_key']=='p_order_code'){
                    $tmp_options['search'] = "p.".$this->session->r_options['search_key']."='".$this->session->r_options['search_val']."'";
                }else{
                    $tmp_options['search'] = null;
                }
            }else{
                $tmp_options['search']=null;
            }
            
            // 订单状态
            $tmp_options['os'] = "p.review_status = 2";

            // 区域
            if(isset($this->session->r_options['area_id']) && $this->session->r_options['area_id'] !==''){
                $tmp_options['area'] = "p.area_id='".$this->session->r_options['area_id']."'";
            }else{
                $tmp_options['area']=null;
            }
        }
        $result = $this->order_model->selectOrderList($tmp_options);
        
        $list = $result['list'];
        $count = $result['count'];
        foreach ($list as $k => &$v) {
            $manage = $this->manageOrder($v);
            $v['goods'] = $this->order_model->getOrdersGoodsByPid($v['id']);
            foreach ($v['goods'] as $gk => &$gv) {
                $gv['goods_pic'] = explode('|',$gv['goods_pic'])[0];
            }
            if($v['area_type']==3){
                $area_dts = $this->order_model->getAreaDts($v['area_id']);
                $v['parent_area_name']  = $this->order_model->getAreaDts($area_dts['pid'])['area_name'];
            }
        }
        // echo "<pre>";
        // var_dump($list);exit;
        $this->load->library('pagination');
        $config = $this->myPagination(BASEURL.'admin/order/ajaxReviewList',$count);
        $this->pagination->initialize($config);
        $page = $this->pagination->create_links();
        // 尾页
        $last_page = ceil($count / $this->limitRows);
        $this->assign('offset',$offset);
        $this->assign('last_page',$last_page);
        $this->assign('total',$count);
        $this->assign('showpage',$page);
        $this->assign('orderlist',$list);
        $this->display('order/order-review-table.html');
    }

    /**
     * reviewDts
     * 审核详情
     * @author sam
     */
    public function reviewDts(){
        $id = $this->uri->segment(3,true);
        $details = $this->order_model->getOrderDts($id);
        
        // echo "<pre>";
        // var_dump($details);exit;
        $details['sorder'] = $this->order_model->getSonOrders($id);
        $details['review'] = $this->order_model->getOrderReview($id);
        $details['receive_pic'] = explode('|', rtrim($details['receive_pic'],'|'));
        foreach ($details['sorder'] as $k => &$v) {
            if($v['receive_pic'] !=''){
                $v['receive_pic'] = explode('|', rtrim($v['receive_pic'],'|'));
            }else{
                $v['receive_pic'] = null;
            }
            if($v['express_no'] !=''){
                $express_no = '';
                $express_no_arr =  explode('+', rtrim($v['express_no'],'+'));

                $v['express_no'] = $express_no_arr;
            }
            
            $goods = $this->order_model->getSonOrderGoods($v['id']);
            foreach ($goods as $gk=>&$gv) {
                $goods[$gk]['goods_pic'] = explode('|', $gv['goods_pic'])[0];
            }
            $v['goods'] = $goods;
        }
        $this->manageOrder($details);
        // echo "<pre>";
        // var_dump($details);exit;
        $this->assign('title','订单审核');
        $this->assign('details',$details);
        $this->display('order/review-dts.html');
    }

    /**
     * reviewOrder
     * 审核订单
     * @author sam
     */
    public function reviewOrder(){
        $data = $this->input->post();
        $id = $data['id'];
        
        $review_comments = $data['review_comments'];
        $status = $data['status'];
        $time = time();

        if($status==3){
            $og = $this->order_model->getOrdersGoodsByPid($id);
            $info = $this->order_model->getOrderDts($id);
            $res = $this->order_model->reviewOrder($id,$review_comments,$status,$time,$info,$og);
        }else{
            $res = $this->order_model->reviewOrder($id,$review_comments,$status,$time);
        }
        
        if($res){
            $this->ajaxReturn(['retcode'=>1,'data'=>[],'msg'=>'成功！审核状态已修改']);
        }else{
            $this->ajaxReturn(['retcode'=>1006,'data'=>[],'msg'=>'失败！审核状态修改异常 ']);
        }
    }

    /**
     * updateOrderStatus
     * 更新订单信息
     * @param $id 订单id
     * @author sam
     */
    public function updateOrderStatus(){
        $order_id = $this->input->post('id',true);
        $order_status = $this->input->post('status',true);

        // 取消操作，需要退积分，加回库存，写操作日志
        $og = $this->order_model->getOrdersGoodsByPid($order_id);
        $info = $this->order_model->getOrderDts($order_id);

        $res = $this->order_model->updateOrderInfo($order_id,$order_status,$info,$og);

        if($res) $this->ajaxReturn(['retcode'=>1,'data'=>[],'msg'=>'取消订单操作成功']);
        else $this->ajaxReturn(['retcode'=>3002,'data'=>[],'msg'=>'取消订单操作失败']);
    }

    /**
     * 导出订单列表excel
     * @author sam
     */
    public function exportOrderExcel(){
        $this->load->library('CI_Excel');
        $options = $this->input->post();
        // var_dump($options);exit;
        @$this->session->options_excel = $options;
        if($this->session->options_excel){
            if(isset($this->session->options_excel['start']) && isset($this->session->options_excel['end']) && !empty($this->session->options_excel['start']) && !empty($this->session->options_excel['end'])){
                $s = strtotime($this->session->options_excel['start'].' 00:00:00');
                $e = strtotime($this->session->options_excel['end'].' 23:59:59');
                // echo $s,$e;
                $tmp_options['add_time'] = "po.add_time >=$s and po.add_time <=$e";
            }else{
                $tmp_options['add_time'] = null;
            }
            if(isset($this->session->options_excel['search_val']) && !empty($this->session->options_excel['search_val'])){
                if($this->session->options_excel['search_key']=='phone'){
                    $tmp_options['search'] = "po.".$this->session->options_excel['search_key']."='".$this->session->options_excel['search_val']."'";
                }elseif($this->session->options_excel['search_key']=='p_order_code'){
                    $tmp_options['search'] = "po.".$this->session->options_excel['search_key']."='".$this->session->options_excel['search_val']."'";
                }else{
                    $tmp_options['search'] = null;
                }
            }else{
                $tmp_options['search']=null;
            }

            // 订单审核状态
            if(isset($this->session->options['review_status']) && $this->session->options['review_status'] !==''){
                $tmp_options['os'] = "po.review_status='".$this->session->options['review_status']."'";
            }else{
                $tmp_options['os']=null;
            }

            // 区域
            if(isset($this->session->options['area_id']) && $this->session->options['area_id'] !==''){
                $tmp_options['area'] = "po.area_id='".$this->session->options['area_id']."'";
            }else{
                $tmp_options['area']=null;
            }
        }
        // var_dump($tmp_options);
        $list = $this->order_model->selectExportOrder($tmp_options);
        // echo "<pre>";
        // var_dump($list);
        
        if(!empty($list)){
            foreach ($list as $k => &$v) {
                $v['p_area_name'] = $this->order_model->getAreaDts($v['pid'])['area_name'];
                // 处理订单
                $this->manageOrderSon($v);
            }
            unset($v);
            $processedList = array();
            $prev_orderno = '';
            foreach ($list as $k => $v) {
                if($k!=0){
                    $prev_orderno = $list[$k-1]['p_order_code'];
                }
                $processedList[$k]['key'] = $k+1;
                $processedList[$k]['p_order_code'] = "\t".$v['p_order_code']."\t";
                $processedList[$k]['s_order_code'] = "\t".$v['s_order_code']."\t";
                $processedList[$k]['account'] = $v['account'];
                $processedList[$k]['p_area_name'] = $v['p_area_name'];
                $processedList[$k]['area_name'] = $v['area_name'];
                $processedList[$k]['vendor_name'] = $v['vendor_name'];
                $processedList[$k]['review_status'] = $v['review_status_v'];
                if($v['review_status']=='-1' || $v['review_status']=='4'){
                    $processedList[$k]['order_status'] = $v['order_status_v'];
                }else{
                    $processedList[$k]['order_status'] = '审核中';
                }
                $processedList[$k]['goods_code'] = $v['goods_code'];
                $processedList[$k]['goods_name'] = $v['goods_name'];
                $processedList[$k]['spec_name'] = $v['spec_name'];
                $processedList[$k]['buy_num'] = $v['buy_num'];
                $processedList[$k]['buy_price'] = $v['buy_price'];
                $processedList[$k]['order_amt'] = $v['order_amt'];
                $processedList[$k]['s_order_amt'] = $v['s_order_amt'];
                $processedList[$k]['order_amt'] = $v['order_amt'];
                $processedList[$k]['receive_money'] = ($v['receive_money']==0)?'未收款':'已收款';
                $processedList[$k]['add_time'] = $v['add_time'];
                $processedList[$k]['consignee'] = $v['consignee'];
                $processedList[$k]['consignee_phone'] = "\t".$v['consignee_phone']."\t";
                $processedList[$k]['address'] = $v['addr'].$v['details'];
                $processedList[$k]['express_com'] = $v['express_com'];
                $processedList[$k]['express_no'] = "\t".$v['express_no']."\t";
                $processedList[$k]['express_time'] = $v['express_time'];
                $processedList[$k]['remark'] = $v['remark'];
                
            }

            $headerTitle[0][] = '序号';
            $headerTitle[0][] = '订单号';
            $headerTitle[0][] = '子订单号';
            $headerTitle[0][] = '下单账号';
            $headerTitle[0][] = '所属上级区域';
            $headerTitle[0][] = '所属区域';
            $headerTitle[0][] = '供应商';
            $headerTitle[0][] = '审核状态';
            $headerTitle[0][] = '订单状态';
            $headerTitle[0][] = '商品编号';
            $headerTitle[0][] = '商品名';
            $headerTitle[0][] = '规格名';
            $headerTitle[0][] = '购买数量';
            $headerTitle[0][] = '购买单价';
            $headerTitle[0][] = '子订单总价';
            $headerTitle[0][] = '订单总价';
            $headerTitle[0][] = '已收货款';
            $headerTitle[0][] = '下单时间';
            $headerTitle[0][] = '收货人姓名';
            $headerTitle[0][] = '收货人手机号';
            $headerTitle[0][] = '送货地址';
            $headerTitle[0][] = '快递公司';
            $headerTitle[0][] = '快递编号';
            $headerTitle[0][] = '邮寄时间';
            $headerTitle[0][] = '备注';
            
            $list = array_merge($headerTitle,$processedList);
            // echo "<pre>";
            // var_dump($list);exit;
            $objPHPExcel = $this->writerExcel($this->ci_excel,0,'订单数据',$list);
            $filename = "总订单".date('m.d',$s).'-'.date('m.d',$e);

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
            $this->jumpNoticePage('对不起，未找到相关数据',site_url('/order/index'));
            // $this->ajaxReturn(['retcode'=>3001,'data'=>[],'msg'=>'未找到订单数据']);
            exit;       
        }
    }

    /**
     * 导出订单审核excel
     * @author sam
     */
    public function exportReviewOrderExcel(){
        $this->load->library('CI_Excel');
        $this->load->model('order_model');
        $options = $this->input->post();
        @$this->session->r_options_excel = $options;
        if($this->session->r_options_excel){
            if(isset($this->session->r_options_excel['start']) && isset($this->session->r_options_excel['end']) && !empty($this->session->r_options_excel['start']) && !empty($this->session->r_options_excel['end'])){
                $s = strtotime($this->session->r_options_excel['start'].' 00:00:00');
                $e = strtotime($this->session->r_options_excel['end'].' 23:59:59');
                // echo $s,$e;
                $tmp_options['add_time'] = "po.add_time >=$s and po.add_time <=$e";
            }else{
                $tmp_options['add_time'] = null;
            }
            if(isset($this->session->r_options_excel['search_val']) && !empty($this->session->r_options_excel['search_val'])){
                if($this->session->r_options_excel['search_key']=='phone'){
                    $tmp_options['search'] = "po.".$this->session->r_options_excel['search_key']."='".$this->session->r_options_excel['search_val']."'";
                }elseif($this->session->r_options_excel['search_key']=='p_order_code'){
                    $tmp_options['search'] = "po.".$this->session->r_options_excel['search_key']."='".$this->session->r_options_excel['search_val']."'";
                }else{
                    $tmp_options['search'] = null;
                }
            }else{
                $tmp_options['search']=null;
            }

            $tmp_options['os'] = "po.review_status = 2";

            // 区域
            if(isset($this->session->r_options_excel['area_id']) && $this->session->r_options_excel['area_id'] !==''){
                $tmp_options['area'] = "po.area_id='".$this->session->r_options_excel['area_id']."'";
            }else{
                $tmp_options['area']=null;
            }
        }
        
        $list = $this->order_model->selectExportOrder($tmp_options);
        // echo "<pre>";
        // var_dump($list);exit;
        if(!empty($list)){
            foreach ($list as $k => &$v) {
                $v['p_area_name'] = $this->order_model->getAreaDts($v['pid'])['area_name'];
                // 处理订单
                $this->manageOrderSon($v);
            }
            unset($v);
            $processedList = array();
            $prev_orderno = '';
            foreach ($list as $k => $v) {
                if($k!=0){
                    $prev_orderno = $list[$k-1]['p_order_code'];
                }
                //订单编号、下单账户、所属区域、所属供应商、收货人姓名、收货手机号、收货地址、商品名称、规格、购买数量、商品单价、收货数量、小计（单价*收货数量）、收货金额（订单中所有确认收货的产品总价格）、订单金额、备注、订单状态、下单时间
                $processedList[$k]['key'] = $k+1;
                $processedList[$k]['p_order_code'] = "\t".$v['p_order_code']."\t";
                $processedList[$k]['s_order_code'] = "\t".$v['s_order_code']."\t";
                $processedList[$k]['account'] = $v['account'];
                $processedList[$k]['p_area_name'] = $v['p_area_name'];
                $processedList[$k]['area_name'] = $v['area_name'];
                $processedList[$k]['vendor_name'] = $v['vendor_name'];
                $processedList[$k]['review_status'] = $v['review_status_v'];
                if($v['review_status']=='-1' || $v['review_status']=='4'){
                    $processedList[$k]['order_status'] = $v['order_status_v'];
                }else{
                    $processedList[$k]['order_status'] = '审核中';
                }
                $processedList[$k]['goods_code'] = $v['goods_code'];
                $processedList[$k]['goods_name'] = $v['goods_name'];
                $processedList[$k]['spec_name'] = $v['spec_name'];
                $processedList[$k]['buy_num'] = $v['buy_num'];
                $processedList[$k]['buy_price'] = $v['buy_price'];
                $processedList[$k]['s_order_amt'] = $v['s_order_amt'];
                $processedList[$k]['order_amt'] = $v['order_amt'];
                $processedList[$k]['receive_money'] = ($v['receive_money']==0)?'未收款':'已收款';
                $processedList[$k]['add_time'] = $v['add_time'];
                $processedList[$k]['consignee'] = $v['consignee'];
                $processedList[$k]['consignee_phone'] = "\t".$v['consignee_phone']."\t";
                $processedList[$k]['address'] = $v['addr'].$v['details'];
                $processedList[$k]['express_com'] = $v['express_com'];
                $processedList[$k]['express_no'] = "\t".$v['express_no']."\t";
                $processedList[$k]['express_time'] = $v['express_time'];
                $processedList[$k]['remark'] = $v['remark'];
                
            }

            $headerTitle[0][] = '序号';
            $headerTitle[0][] = '订单号';
            $headerTitle[0][] = '子订单号';
            $headerTitle[0][] = '下单账号';
            $headerTitle[0][] = '所属上级区域';
            $headerTitle[0][] = '所属区域';
            $headerTitle[0][] = '供应商';
            $headerTitle[0][] = '审核状态';
            $headerTitle[0][] = '订单状态';
            $headerTitle[0][] = '商品编码';
            $headerTitle[0][] = '商品名';
            $headerTitle[0][] = '规格名';
            $headerTitle[0][] = '购买数量';
            $headerTitle[0][] = '购买单价';
            $headerTitle[0][] = '子订单总价';
            $headerTitle[0][] = '订单总价';
            $headerTitle[0][] = '已收货款';
            $headerTitle[0][] = '下单时间';
            $headerTitle[0][] = '收货人姓名';
            $headerTitle[0][] = '收货人手机号';
            $headerTitle[0][] = '送货地址';
            $headerTitle[0][] = '快递公司';
            $headerTitle[0][] = '快递编号';
            $headerTitle[0][] = '邮寄时间';
            $headerTitle[0][] = '备注';
            
            $list = array_merge($headerTitle,$processedList);
            // echo "<pre>";
            // var_dump($list);exit;
            $objPHPExcel = $this->writerExcel($this->ci_excel,0,'待总部审核订单数据',$list);
            $filename = "待审核订单".date('m.d',$s).'-'.date('m.d',$e);

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
            $this->jumpNoticePage('对不起，未找到相关数据',site_url('/order/review'));
            // $this->ajaxReturn(['retcode'=>3001,'data'=>[],'msg'=>'未找到订单数据']);
            exit;       
        }
    }


    /**
     * 导出供应商订单excel
     * @author sam
     */
    public function exportVendorOrderExcel(){
        $this->load->library('CI_Excel');
        $this->load->model('order_model');
        $options = $this->input->post();
        @$this->session->v_options_excel = $options;
        if($this->session->v_options_excel){
            if(isset($this->session->v_options_excel['start']) && isset($this->session->v_options_excel['end']) && !empty($this->session->v_options_excel['start']) && !empty($this->session->v_options_excel['end'])){
                $s = strtotime($this->session->v_options_excel['start'].' 00:00:00');
                $e = strtotime($this->session->v_options_excel['end'].' 23:59:59');
                // echo $s,$e;
                $tmp_options['add_time'] = "po.add_time >=$s and po.add_time <=$e";
            }else{
                $tmp_options['add_time'] = null;
            }
            if(isset($this->session->v_options_excel['search_val']) && !empty($this->session->v_options_excel['search_val'])){
                if($this->session->v_options_excel['search_key']=='phone'){
                    $tmp_options['search'] = "po.".$this->session->v_options_excel['search_key']."='".$this->session->v_options_excel['search_val']."'";
                }elseif($this->session->v_options_excel['search_key']=='p_order_code'){
                    $tmp_options['search'] = "so.".$this->session->v_options_excel['search_key']."='".$this->session->v_options_excel['search_val']."'";
                }else{
                    $tmp_options['search'] = null;
                }
            }else{
                $tmp_options['search']=null;
            }

            // 订单状态
            if(isset($this->session->v_options['order_status']) && $this->session->v_options['order_status'] !==''){
                if($this->session->v_options['order_status']=='1'){// 待审核
                    $tmp_options['os'] = "po.review_status < 4";
                }elseif($this->session->v_options['order_status']=='2'){// 审核通过待发货
                    $tmp_options['os'] = "(po.review_status = 4 and so.order_status = 0)";
                }elseif($this->session->v_options['order_status']=='3'){
                    $tmp_options['os'] = "(po.review_status = 4 and so.order_status >= 1)";
                }elseif($this->session->v_options['order_status']=='4'){
                    $tmp_options['os'] = "(po.review_status = 4 and so.receive_money = 1)";
                }
            }else{
                $tmp_options['os']=null;
            }
            
            // 区域
            if(isset($this->session->v_options_excel['area_id']) && $this->session->v_options_excel['area_id'] !==''){
                $tmp_options['area'] = "po.area_id='".$this->session->v_options_excel['area_id']."'";
            }else{
                $tmp_options['area']=null;
            }

            // 供应商
            if(isset($this->session->v_options_excel['vendor_id']) && $this->session->v_options_excel['vendor_id'] !==''){
                $tmp_options['vendor'] = "so.vendor_id='".$this->session->v_options_excel['vendor_id']."'";
            }else{
                $tmp_options['vendor']=null;
            }
        }
        
        $list = $this->order_model->selectExportVendorOrder($tmp_options);
        // echo "<pre>";
        // var_dump($list);exit;
        if(!empty($list)){
            foreach ($list as $k => &$v) {
                $v['p_area_name'] = $this->order_model->getAreaDts($v['pid'])['area_name'];
                // 处理订单
                $this->manageOrderSon($v);
            }
            unset($v);
            $processedList = array();
            $prev_orderno = '';
            foreach ($list as $k => $v) {
                if($k!=0){
                    $prev_orderno = $list[$k-1]['s_order_code'];
                }
                //订单编号、下单账户、所属区域、所属供应商、收货人姓名、收货手机号、收货地址、商品名称、规格、购买数量、商品单价、收货数量、小计（单价*收货数量）、收货金额（订单中所有确认收货的产品总价格）、订单金额、备注、订单状态、下单时间
                $processedList[$k]['key'] = $k+1;
                $processedList[$k]['s_order_code'] = "\t".$v['s_order_code']."\t";
                $processedList[$k]['account'] = $v['account'];
                $processedList[$k]['p_area_name'] = $v['p_area_name'];
                $processedList[$k]['area_name'] = $v['area_name'];
                $processedList[$k]['vendor_name'] = $v['vendor_name'];
                $processedList[$k]['order_status'] = $v['order_status_v'];
                $processedList[$k]['goods_code'] = $v['goods_code'];
                $processedList[$k]['goods_name'] = $v['goods_name'];
                $processedList[$k]['spec_name'] = $v['spec_name'];
                $processedList[$k]['buy_num'] = $v['buy_num'];
                $processedList[$k]['buy_price'] = $v['buy_price'];
                $processedList[$k]['s_order_amt'] = $v['s_order_amt'];
                $processedList[$k]['receive_money'] = ($v['receive_money']==0)?'未收款':'已收款';
                $processedList[$k]['add_time'] = $v['add_time'];
                $processedList[$k]['consignee'] = $v['consignee'];
                $processedList[$k]['consignee_phone'] = "\t".$v['consignee_phone']."\t";
                $processedList[$k]['address'] = $v['addr'].$v['details'];
                $processedList[$k]['express_com'] = $v['express_com'];
                $processedList[$k]['express_no'] = "\t".$v['express_no']."\t";
                $processedList[$k]['express_time'] = $v['express_time'];
            }

            $headerTitle[0][] = '序号';
            $headerTitle[0][] = '订单号';
            $headerTitle[0][] = '下单账号';
            $headerTitle[0][] = '所属上级区域';
            $headerTitle[0][] = '所属区域';
            $headerTitle[0][] = '供应商';
            $headerTitle[0][] = '订单状态';
            $headerTitle[0][] = '商品编码';
            $headerTitle[0][] = '商品名';
            $headerTitle[0][] = '规格名';
            $headerTitle[0][] = '购买数量';
            $headerTitle[0][] = '购买单价';
            $headerTitle[0][] = '订单总价';
            $headerTitle[0][] = '已收货款';
            $headerTitle[0][] = '下单时间';
            $headerTitle[0][] = '收货人姓名';
            $headerTitle[0][] = '收货人手机号';
            $headerTitle[0][] = '送货地址';
            $headerTitle[0][] = '快递公司';
            $headerTitle[0][] = '快递编号';
            $headerTitle[0][] = '邮寄时间';
            
            $list = array_merge($headerTitle,$processedList);
            $objPHPExcel = $this->writerExcelForVendor($this->ci_excel,0,'供应商订单数据',$list);
            $filename = "供应商订单".date('m.d',$s).'-'.date('m.d',$e);

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
            $this->jumpNoticePage('对不起，未找到相关数据',site_url('/order/orderVendor'));
            // $this->ajaxReturn(['retcode'=>3001,'data'=>[],'msg'=>'未找到订单数据']);
            exit;       
        }
    }

    /**
     * 清空筛选条件
     * @author sam
     */
    public function orderClear(){
        unset($this->session->options);
        unset($this->session->v_options);
        unset($this->session->options_excel);
        unset($this->session->v_options_excel);
    }
}