<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 加载快递100类
require_once APPPATH.'libraries/Kuaidi/Kuaidi.class.php';

/**
 * CI_Kuaidi 自定义快递100 ，物流跟踪查询。单号的订阅及推送状态。
 * @author lyne 20180706
 */
class CI_Kuaidi extends Kuaidi {
    
    protected $ci;
    protected $complie_dir;
    protected $template_ext;

    public function  __construct(){
        // 获得CI超级对象 使得自定义类可以使用Controller类的方法
        $this->ci = & get_instance();
    }
    
}