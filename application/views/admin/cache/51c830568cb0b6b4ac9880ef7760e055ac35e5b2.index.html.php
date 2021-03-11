<?php
/* Smarty version 3.1.29, created on 2021-03-08 15:00:18
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/order/index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045cb824c8bf8_53336470',
  'file_dependency' => 
  array (
    '51c830568cb0b6b4ac9880ef7760e055ac35e5b2' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/order/index.html',
      1 => 1615172106,
      2 => 'file',
    ),
    '7168759f66d4e720e0af58275db868ed97e73c51' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/header.html',
      1 => 1615172106,
      2 => 'file',
    ),
    'b0f67897d0b854bb48394a1ba35cbf4b8be23b8e' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/navbar.html',
      1 => 1615172106,
      2 => 'file',
    ),
    'e4b4708c02a58438ef051319dabe96a876339e80' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/password-edit.html',
      1 => 1615172106,
      2 => 'file',
    ),
    '589f06c61bd8ab9c8cd7aab4044269692133a273' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/menu.html',
      1 => 1615172106,
      2 => 'file',
    ),
    'd5e062d5ac72f865b3be5713fa741b7ae61e30de' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/footer.html',
      1 => 1615186173,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 60,
),true)) {
function content_6045cb824c8bf8_53336470 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<title>订单列表</title>
<!--[if lt IE 9]>
<meta http-equiv="refresh" content="0;ie.html" />
<![endif]-->
<!-- <link rel="shortcut icon" href="favicon.ico"> -->
<link rel="stylesheet" type="text/css" href="http://gw2.com//css/admin/material.css">
<link href="http://gw2.com//css/admin/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="http://gw2.com//css/admin/font-awesome.min.css?v=4.4.0" rel="stylesheet">
<link href="http://gw2.com//css/admin/animate.min.css" rel="stylesheet">
<link href="http://gw2.com//css/admin/style.min.css?v=4.1.0" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="http://gw2.com//css/admin/common.css">
<link href="http://gw2.com//css/admin/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
<link href="http://gw2.com//css/admin/plugins/toastr/toastr.min.css" rel="stylesheet">

<script type="text/javascript">
	var public = "http://gw2.com/";
	var module = "http://gw2.com/admin";
</script>

<link href="http://gw2.com//css/admin/plugins/select2/select2.min.css" rel="stylesheet" />
<link href="http://gw2.com//css/admin/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="http://gw2.com//css/admin/plugins/chosen/chosen.css" rel="stylesheet">

<style type="text/css">
#datepicker2{z-index: 9999}
.dropdown-menu>li>a{padding: 5px;}
</style>
</head>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="nav-close"><i class="fa fa-times-circle"></i></div>
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img class="img-circle mb10 " style="border-radius:0%" width="140" alt="image" src="http://gw2.com//images/admin/logo.png" /></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">lyne007@163.com</strong>
                            </span>
                            <span class="text-muted text-xs block">lyne007
                                <b class="caret"></b>
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a data-toggle="modal" class="edit_pass" href="#modal-form-password">修改密码</a></li>
                        <li class="divider"></li>
                        <li><a href="http://gw2.com/admin/login/loginOut">安全退出</a></li>
                    </ul>
                </div>
                <div class="logo-element">L</div>
            </li>
                                    <li class=" active">
                <a class="J_menuItem" href="http://gw2.com/admin/order/index">
                    <i class="fa fa-map"></i>
                    <span class="nav-label">订单管理</span>
                </a>
                                <ul class="nav nav-second-level">
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/order/orderVendor">供应商订单</a></li>
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/order/review">订单审核</a></li>
                                    <li class="active"><a class="J_menuItem" href="http://gw2.com/admin/order/index">订单列表</a></li>
                                </ul>
                            </li>
                        <li class=" ">
                <a class="J_menuItem" href="http://gw2.com/admin/goods/index">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="nav-label">商品管理</span>
                </a>
                                <ul class="nav nav-second-level">
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/goods/index">查询商品</a></li>
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/goods/add">商品录入</a></li>
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/category/index">查询分类</a></li>
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/spec/index">查询规格</a></li>
                                </ul>
                            </li>
                        <li class=" ">
                <a class="J_menuItem" href="http://gw2.com/admin/area/index">
                    <i class="fa fa-globe"></i>
                    <span class="nav-label">区域管理</span>
                </a>
                                <ul class="nav nav-second-level">
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/area/gitGoods">仓库商品列表</a></li>
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/area/git">仓库列表</a></li>
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/area/index">区域列表</a></li>
                                </ul>
                            </li>
                        <li class=" ">
                <a class="J_menuItem" href="http://gw2.com/admin/user/index">
                    <i class="fa fa-user"></i>
                    <span class="nav-label">用户管理</span>
                </a>
                                <ul class="nav nav-second-level">
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/user/index">用户列表</a></li>
                                </ul>
                            </li>
                        <li class=" ">
                <a class="J_menuItem" href="http://gw2.com/admin/vendor/index">
                    <i class="fa fa-group"></i>
                    <span class="nav-label">供应商管理</span>
                </a>
                                <ul class="nav nav-second-level">
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/vendor/index">供应商列表</a></li>
                                </ul>
                            </li>
                        <li class=" ">
                <a class="J_menuItem" href="http://gw2.com/admin/cencus/index">
                    <i class="fa fa-industry"></i>
                    <span class="nav-label">统计管理</span>
                </a>
                                <ul class="nav nav-second-level">
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/cencus/index">区域订单统计</a></li>
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/cencus/vendorCencus">供应商订单统计</a></li>
                                </ul>
                            </li>
                        <li class=" ">
                <a class="J_menuItem" href="http://gw2.com/admin/matter/index">
                    <i class="fa fa-cubes"></i>
                    <span class="nav-label">物料设计稿管理</span>
                </a>
                                <ul class="nav nav-second-level">
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/matter/index">设计稿列表</a></li>
                                </ul>
                            </li>
                        <li class=" ">
                <a class="J_menuItem" href="http://gw2.com/admin">
                    <i class="fa fa-desktop"></i>
                    <span class="nav-label">banner管理</span>
                </a>
                                <ul class="nav nav-second-level">
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/banner/index">查询banner</a></li>
                                </ul>
                            </li>
                        <li class=" ">
                <a class="J_menuItem" href="http://gw2.com/admin">
                    <i class="fa fa-cogs"></i>
                    <span class="nav-label">权限管理</span>
                </a>
                                <ul class="nav nav-second-level">
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/power/admin">管理员</a></li>
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/power/role">角色</a></li>
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/power/menu">菜单</a></li>
                                </ul>
                            </li>
                                    <br>
            <br>
            <br>
        </ul>
    </div>
</nav>

<div id="modal-form-password" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-11">
                        <div class="m-b-md">
                            <h5>修改密码</h5>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <button class="close" type="button" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="col-sm-12">

                        <div class="ibox float-e-margins mb0">
                            <div class="ibox-content">
                                <div class="form-horizontal m-t">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">账号：</label>
                                        <div class="col-sm-8">
                                            <input name="account" class="form-control" type="email" value="lyne007@163.com" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">原始密码：</label>
                                        <div class="col-sm-8">
                                            <input name="password" class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">新密码：</label>
                                        <div class="col-sm-8">
                                            <input name="newpassword" class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">确认新密码：</label>
                                        <div class="col-sm-8">
                                            <input name="confirm_newpassword" class="form-control" type="password">
                                            <br>
                                            <span id="password-error-msg" class="hidden help-block m-b-none" style="color:#a94442"><i class="fa fa-info-circle"></i> <span>请再次输入您的新密码</span></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-3">
                                            <button class="btn btn-w-m btn-primary edit_pass_btn" type="submit">提交</button>
                                            <button class="btn btn-w-m btn-default pass-cancel-btn" type="reset">取消</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<script src="http://gw2.com//js/admin/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    $('.edit_pass').click(function(){
        $('input[name="password"]').val('');
        $('input[name="newpassword"]').val('');
        $('input[name="confirm_newpassword"]').val('');
        $('.edit_pass_btn').removeAttr('disabled');
    })
	$(".pass-cancel-btn").click(function(){
		$("#modal-form-password .close").trigger('click');
	});

	$("#modal-form-password input[name='newpassword'],#modal-form-password input[name='confirm_newpassword']").keyup(function(){
		var n_pwd = $("input[name='newpassword']").val();
		var c_n_pwd = $("input[name='confirm_newpassword']").val();
		if(n_pwd !== c_n_pwd){
			$("#password-error-msg").removeClass('hidden').children('span').html('与新的密码不一致！');
		}else{
			$("#password-error-msg").addClass('hidden');
		}
	});

	$("#modal-form-password button[type='submit']").click(function(){
        var n_pwd = $("input[name='newpassword']").val();
        var c_n_pwd = $("input[name='confirm_newpassword']").val();
        if(n_pwd !== c_n_pwd){
            $("#password-error-msg").removeClass('hidden').children('span').html('与新的密码不一致！');
            return false;
        }else{
            $("#password-error-msg").addClass('hidden');
        }
		$(this).attr('disabled','disabled');
		var url = module + '/power/ajaxPasswordEdit';
		var jsonData={};
	    $(this).parents('#modal-form-password').find('input').each(function(){
	    	jsonData[this.name]=this.value;
	    });
	    $this = $(this);
        post(url,{jsonData},function(r){
            if(r.success==true){
                $("#password-error-msg").addClass('hidden');
                $(".pass-cancel-btn").trigger('click');
                toastr.success(r.msg);
            }else{
                $this.removeAttr('disabled');
                toastr.error(r.msg);
            }
        })
	});
})
</script>






        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row" style="border-bottom:2px solid #000">
<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;background:#fff">
    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="javascript:;"><i class="fa fa-bars"></i> </a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li class="hidden-xs">
            <a href="http://gw2.com/admin/login/loginOut">
                <i class="fa fa-sign-out" style="font-size:18px"></i> 安全退出
            </a>
        </li>
    </ul>
</nav>
</div>
                <br>
                <div class="row" id="content-main" style="">
                    <div class="col-sm-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" style="min-height:94px">
                                <h5>订单列表</h5>
                                <div class="col-sm-12">
                                    <form id="down-order-form" action="http://gw2.com/admin/order/exportOrderExcel" method="post" tmp-start="2020-12-01" tmp-end="2021-03-08">
                                        <div class="col-sm-3">
                                            <div id="datepicker" class="input-daterange input-group input-medium date-picker">
                                                <input class="input-sm form-control" name="start" value="2020-12-01" type="text">
                                                <span class="input-group-addon">到</span>
                                                <input class="input-sm form-control" name="end" value="2021-03-08" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-1" style="width: 10%;">
                                            <div class="input-group m-b">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-white dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false" style="padding:4px 12px"><span>审核状态</span><span class="caret"></span></button>
                                                    <ul id="order-status-menu" class="dropdown-menu min-w50" style="left:0">
                                                        <li tmp-value="0"><a href="javascript:;">待战区审核</a></li>
                                                        <li tmp-value="1"><a href="javascript:;">战区审核拒绝</a></li>
                                                        <li tmp-value="2"><a href="javascript:;">待总部审核</a></li>
                                                        <li tmp-value="3"><a href="javascript:;">总部审核拒绝</a></li>
                                                        <li tmp-value="4"><a href="javascript:;">审核通过</a></li>
                                                        <li tmp-value="-1"><a href="javascript:;">后台取消</a></li>
                                                        <li tmp-value=""><a href="javascript:;">清除筛选</a></li>
                                                        <div class="hidden status_ajax"></div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1" style="width: 13%;">
                                            <select class="form-control m-b js-example-basic-multiple area-choose" name="area_id" tmp-msg="请选择区域">
                                                <option value="">- 筛选区域 -</option>
                                                                                                <option value="2">华东战区</option>
                                                                                                <option value="3">华南战区</option>
                                                                                                <option value="4">西北战区</option>
                                                                                                <option value="5">江苏分区</option>
                                                                                                <option value="6">浙江分区</option>
                                                                                                <option value="7">福建分区</option>
                                                                                                <option value="8">广东分区</option>
                                                                                                <option value="9">广西分区</option>
                                                                                                <option value="10">甘肃分区</option>
                                                                                                <option value="11">青海分区</option>
                                                                                                <option value="12">安徽分区</option>
                                                                                                <option value="13">山西分区</option>
                                                                                                <option value="14">江西分区</option>
                                                                                                <option value="15">华北战区</option>
                                                                                                <option value="16">北京战区</option>
                                                                                                <option value="17">杭州分区</option>
                                                                                                <option value="18">西南战区</option>
                                                                                                <option value="19">西南分区</option>
                                                                                                <option value="20">江苏</option>
                                                                                                <option value="21">南京</option>
                                                                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="input-group m-b">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-white dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">操作<span class="caret"></span></button>
                                                    <ul class="dropdown-menu search-menu">
                                                        <li tmp-type="p_order_code" tmp-name="订单号"><a href="javascript:;">按订单号查询</a></li>
                                                        <li tmp-type="account" tmp-name="用户手机号"><a href="javascript:;">按用户账号查询</a></li>
                                                    </ul>
                                                </div>
                                                <input class="form-control" name="search_key" type="hidden">
                                                <input class="form-control" name="search_val" type="text" placeholder="请输入订单号/账号">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary search-btn" type="button">搜索 </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 ">
                                            <div class="input-group m-b">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-error" type="reset">重置</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <button class="btn btn-success export-excel" type="submit">
                                            <i class="fa fa-download"></i>
                                            <span class="bold">导出</span>
                                            </button>
                                            <button id="load-btn" class="btn btn-default hidden" type="submit"><img src="http://gw2.com//images/admin/loading.gif"/>  玩命加载中</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="ajaxOrderList" class="ibox-content">
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            <div class="footer">
    <div class="pull-right">&copy; 2016-2017 <a href="http://www.51bonli.com/" target="_blank">51bonli.com</a>
    </div>
</div>
<div  id="loading" class="hidden"><div class=" mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active" style="margin-left: 40%"></div></div>
<div id="bg" class="hidden" >
    <div class="masking"></div>
    <div class="bg-loading" >
        <div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"><br>正在处理中...  请耐心等待。</div>
    </div>
</div>
<script src="http://gw2.com//js/admin/jquery.min.js"></script>
<script src="http://gw2.com//js/admin/bootstrap.min.js?v=3.3.6"></script>
<script src="http://gw2.com//js/admin/material.min.js"></script>
<script src="http://gw2.com//js/admin/contabs.js"></script>
<script src="http://gw2.com//js/admin/plugins/pace/pace.min.js"></script>
<script src="http://gw2.com//js/admin/plugins/toastr/toastr.min.js"></script>
<script src="http://gw2.com//js/admin/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="http://gw2.com//js/admin/jquery.cookie.js"></script>
<script src="http://gw2.com//js/admin/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="http://gw2.com//js/layer/layer.js"></script>
<script src="http://gw2.com//js/admin/hplus.min.js?v=4.1.0"></script>
<script src="http://gw2.com//js/admin/server/ajax.common.js"></script>

<script type="text/javascript">
// 
$(function(){
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "7000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
    // $("#showtoast").click(function(){
    //     toastr.success('祝贺你成功了');
    //     toastr.info('这是一个提示信息');
    //     toastr.warning('警告你别来烦我了');
    //     toastr.error('出现错误，请更改');
    // });
})
</script>
            <script src="http://gw2.com//js/admin/plugins/chosen/chosen.jquery.js"></script>
            <script src="http://gw2.com//js/admin/plugins/select2/select2.min.js"></script>
            <script src="http://gw2.com//js/admin/plugins/datapicker/bootstrap-datepicker.js"></script>
            <script type="text/javascript">

                $(function(){
                    $("#datepicker").datepicker({
                        autoclose:true,
                        clearBtn:false,
                        todayBtn:true,
                        format:"yyyy-mm-dd"
                    });

                    $(document).ready(function() {
                        $('.js-example-basic-multiple').select2();
                    });

                    // 初始化 获取列表
                    getOrderList(true);

                    // 导出
                    $("#down-order-form").submit(function(){
                        var start = $("#datepicker input[name='start']").val();
                        var end = $("#datepicker input[name='end']").val();
                        var search_key = $("#down-order-form input[name='search_key']").val();
                        var search_val = $("#down-order-form input[name='search_val']").val();
                        
                        // 订单状态
                        var review_status = $("#order-status-menu .status_ajax").find("input[name='review_status']").val();
                        if(review_status==='') o_status_v = null;
                     
                        // 区域
                        var area_id = $("select[name='area_id']").val();
                        var url = module + '/order/exportOrderExcel';
                        mask = false;
                        $.ajax({
                            async:false,
                            type:'POST',
                            data:{start:start,end:end,search_key:search_key,search_val:search_val,review_status:review_status,area_id:area_id},
                            url:url,
                            beforeSend : function(XMLHttpRequest){
                                // 发送请求前
                                $("#load-btn").removeClass('hidden');
                                $(".export-excel").addClass('hidden');
                                loading = layer.msg('正在导出中, 请稍等', {  //通过layer插件来进行提示正在加载
                                    icon: 16,
                                    shade: [0.5,'#000']
                                });
                            },
                            complete : function(XMLHttpRequest, r){
                                // 请求完成后回调函数
                                layer.close(loading);
                                $("#load-btn").addClass('hidden');
                                $(".export-excel").removeClass('hidden');
                            },
                            success : function(res){
                                if(res.retcode==3001){
                                    mark = false;
                                    toastr.info(res.msg);
                                }else{
                                    mark = true
                                }

                            },
                            error : function(){
                                mark = false;
                            }
                        });
                        return mark;
                    })

                    $("#down-order-form .search-menu li").click(function(){
                        $(this).parent().find('li').removeClass('active');
                        $(this).addClass('active');

                        var search_key = $(this).attr('tmp-type');
                        var search_name = $(this).attr('tmp-name');
                        $("#down-order-form input[name='search_key']").val(search_key);
                        $("#down-order-form input[name='search_val']").attr('placeholder','请输入'+search_name);
                    });

                    // 搜索
                    $("#down-order-form .search-btn").click(function(){
                        getOrderList(false);
                    });
                   
                    // 重置
                    $("#down-order-form button[type='reset']").click(function(){
                        $('#order-status-menu').siblings('button').find('span:first').html('审核状态');
                        $('#order-status-menu').find('li').removeClass('active');
                        $("#order-status-menu .status_ajax").html('<input type="text" name="review_status" value="">');

                        $("#down-order-form input[name='search_key']").val('');
                        $("#down-order-form input[name='search_val']").val('');
                        
                        $("#down-order-form .search-menu li").removeClass('active');
                        
                        // 重置区域
                        $("#down-order-form select[name='area_id'] option:first").prop('selected','selected');
                        $("select[name='area_id']").next().find('.select2-selection__rendered').html('- 筛选区域 -');

                        var start = $("#down-order-form").attr('tmp-start');
                        var end = $("#down-order-form").attr('tmp-end');
                        $("#datepicker input[name='start']").val(start);
                        $("#datepicker input[name='end']").val(end);

                        $.get(module+'/order/orderClear');
                        getOrderList(false);
                    })

                    // 选择订单状态
                    $("#order-status-menu li").click(function(){
                        // 改变显示状态
                        $(this).parents('ul').find('.active').removeClass('active');
                        $(this).addClass('active');
                        
                        var status_value = $(this).attr('tmp-value');

                        if(status_value !== ''){
                            var s_menu = $(this).find('a').html();
                        }else{
                            var s_menu = '审核状态';
                        }
                        $(this).parents('ul').siblings('button').find('span:first').html(s_menu);

                        $("#order-status-menu .status_ajax").html('<input type="text" name="review_status" value="'+status_value+'">');
                        
                        getOrderList(false);
                    });

                    // 战区分区选择条件
                    $(".area-choose").on('change',function(){
                        getOrderList(false);
                    });

                })
               
                // 获取订单列表
                function getOrderList(type,url=null){
                    // 订单日期
                    var start = $("#datepicker input[name='start']").val();
                    var end = $("#datepicker input[name='end']").val();

                    // 关键字查询
                    var search_key = $("#down-order-form input[name='search_key']").val();
                    var search_val = $("#down-order-form input[name='search_val']").val();
                    if(search_val != '' && search_key ==''){
                        layer.msg('请先指定关键字类型');
                        return false;
                    }

                    // 订单状态
                    var review_status = $("#order-status-menu .status_ajax").find("input[name='review_status']").val();
                    if(review_status === '') review_status = null;

                    // 区域框
                    var area_id = $("#down-order-form").find("select[name='area_id']").find('option:selected').val();

                    if(url==null){
                        var u = document.location.toString();
                        var current_page = u.split("#/")[1];
                        if(current_page==undefined || current_page=='undefined'){
                            current_page='';
                        }
                        if(type==false){
                            url = u.split("#/")[0];
                            current_page='';
                            window.history.pushState(null, '', url);
                        }
                        url = module + '/order/ajaxOrderList/'+current_page;
                    }

                    posth(url,{start:start,end:end,search_key:search_key,search_val:search_val,review_status:review_status,area_id:area_id},function(res){
                        $("#ajaxOrderList").html(res);
                    });
                }

            </script>
        </div>
        <!--右侧部分结束-->
    </div>

</body>
</html><?php }
}
