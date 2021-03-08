<?php
/* Smarty version 3.1.29, created on 2021-03-08 15:32:44
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/goods/index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045d31c6d36c8_63119348',
  'file_dependency' => 
  array (
    '6a5511de837b27bef950d00e25ce48516c9078d1' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/goods/index.html',
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
function content_6045d31c6d36c8_63119348 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<title>查询商品</title>
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

<link rel="stylesheet" href="http://gw2.com//css/admin/plugins/switchery/switchery.css">
<link href="http://gw2.com//css/admin/plugins/select2/select2.min.css" rel="stylesheet" />
</head>
<style type="text/css">
.input-order{padding: 5px 10px;width: 60px;text-align: center;border:0;}
.order-on{border:1px solid #18A689;background: #afd3cb;}
.order-off{border:0px;background: #fff;}
</style>
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
                                    <li class=" ">
                <a class="J_menuItem" href="http://gw2.com/admin/order/index">
                    <i class="fa fa-map"></i>
                    <span class="nav-label">订单管理</span>
                </a>
                                <ul class="nav nav-second-level">
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/order/orderVendor">供应商订单</a></li>
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/order/review">订单审核</a></li>
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/order/index">订单列表</a></li>
                                </ul>
                            </li>
                        <li class=" active">
                <a class="J_menuItem" href="http://gw2.com/admin/goods/index">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="nav-label">商品管理</span>
                </a>
                                <ul class="nav nav-second-level">
                                    <li class="active"><a class="J_menuItem" href="http://gw2.com/admin/goods/index">查询商品</a></li>
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
            <div class="row" id="content-main">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="min-height:94px">
                            <h5>商品列表</h5>
                            <iframe id="send-ifile" style="display:none"></iframe>
                            <iframe id="ifile" style="display:none"></iframe>
                            <form id="down-goods-form" action="javascript:;" method="post" class="col-sm-12">
                                <div class="col-sm-2">
                                    <select class="form-control m-b js-select2" name="vendor_id" tmp-msg="请选择供应商">
                                        <option value="">- 所属供应商 -</option>
                                                                                <option value="1">小米北京供应商</option>
                                                                                <option value="2">NIKE中国</option>
                                                                                <option value="3">ADIDAS中国</option>
                                                                                <option value="4">双立人广东实业公司</option>
                                                                                <option value="5">车老大12</option>
                                                                                <option value="20">爱多多零食（上海）有限公司</option>
                                                                                <option value="21">北京生道福科贸有限公司</option>
                                                                                <option value="22">北京五味聚全商贸有限公司</option>
                                                                                <option value="23">中粮集团</option>
                                                                                <option value="24">测试供应商</option>
                                                                                <option value="25">上海祥先实业有限公司</option>
                                                                            </select>
                                </div>
                                <div class="col-sm-1">
                                    <div class="input-group m-b">
                                        <div class="input-group-btn">
                                            <button class="btn btn-white dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false"><span>商品状态</span><span class="caret"></span></button>
                                            <ul id="goods-status-menu" class="dropdown-menu min-w50">
                                                <li tmp-type="is_up" tmp-value="1"><a href="javascript:;">上架</a></li>
                                                <li tmp-type="is_up" tmp-value="0"><a href="javascript:;">下架</a></li>
                                                <li tmp-type="" tmp-value=""><a href="javascript:;">清除筛选</a></li>
                                                <div class="hidden g_status_ajax"></div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 ml20">
                                    <div class="input-group m-b">
                                        <div class="input-group-btn">
                                            <button class="btn btn-white dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">关键词<span class="caret"></span></button>
                                            <ul class="dropdown-menu search-menu">
                                                <li class="active" tmp-type="goods_name" tmp-name="商品名"><a href="javascript:;">按商品名查询</a></li>
                                                <li class="" tmp-type="goods_code" tmp-name="商品编码"><a href="javascript:;">按商品编码查询</a></li>
                                            </ul>
                                        </div>
                                        <input class="form-control" name="content" type="text" placeholder="请输入商品名" value="">
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
                        <div id="ajaxGoodsList" class="ibox-content"></div>
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
        <script src="http://gw2.com//js/admin/plugins/switchery/switchery.js"></script>
        <script src="http://gw2.com//js/admin/plugins/chosen/chosen.jquery.js"></script>
        <script src="http://gw2.com//js/admin/plugins/select2/select2.min.js"></script>

        <!--右侧部分结束-->
    </div>
</body>
<script type="text/javascript">

$(function(){

    $('.js-select2').select2();
    // 初始化列表
    getGoodsList();


    $("#down-goods-form .search-menu li").click(function(){
        $(this).parent().find('li').removeClass('active');
        $(this).addClass('active');

        var search_key = $(this).attr('tmp-type');
        var search_name = $(this).attr('tmp-name');
        $("#down-goods-form input[name='content']").attr('placeholder','请输入'+search_name);
        console.log(search_key);
    });
    

    // 搜索
    $("#down-goods-form .search-btn").click(function(){
        getGoodsList();
    });
   
    // 重置
    $("#down-goods-form button[type='reset']").click(function(){
        $('#goods-status-menu').siblings('button').find('span:first').html('商品状态');
        $("#goods-status-menu .g_status_ajax").html('<input type="text" name="status" value=""/><input type="text" name="value" value="">');
        $("#down-goods-form .search-menu li").removeClass('active');
        $("#down-goods-form .search-menu li:first").trigger('click');
        $("#down-goods-form input[name='content']").val('');
        $(".js-select2").select2("val", "");
        get(module+'/goods/goodsClear',function(){
            window.location.reload();
        });
    })

    // 状态
    $("#goods-status-menu li").click(function(){
        // 改变显示状态
        $(this).parents('ul').find('.active').removeClass('active');
        $(this).addClass('active');
        
        var status_name = $(this).attr('tmp-type');
        var status_value = $(this).attr('tmp-value');

        if(status_name!='undefined' && status_name!=''){
            var s_menu = $(this).find('a').html();
        }else{
            var s_menu = '商品状态';
        }
        $(this).parents('ul').siblings('button').find('span:first').html(s_menu);

        $("#goods-status-menu .g_status_ajax").html('<input type="text" name="status" value="'+status_name+'"/><input type="text" name="value" value="'+status_value+'">');
        
        getGoodsList();
    });


    // 导出
    $("#down-goods-form").submit(function(){
        var search_key = $("#down-goods-form .search-menu .active").attr('tmp-type');
        var search_val = $("#down-goods-form input[name='content']").val();
        // 状态
        var status_n = $("#goods-status-menu .g_status_ajax").find("input[name='status']").val();
        var status_v = $("#goods-status-menu .g_status_ajax").find("input[name='value']").val();
        if(status_n=='undefined' || status_n=='') o_status_n = null;
        if(status_v=='undefined' || status_v=='') o_status_v = null;

        var vendor_id = $('.js-select2').select2("val");

        var url = module + '/goods/exportGoodsExcel';
        mask = false;
        $.ajax({
            async:false,
            type:'POST',
            data:{search_key:search_key,search_val:search_val,status_n:status_n,status_v:status_v,vendor_id:vendor_id},
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
                if(res.success==true){
                    $("#ifile").attr('src',res.data);
                    mask = true;
                }else{
                    mask = false;
                    toastr.error(res.msg);
                    // layer.msg(res.msg,{icon:2});
                }

            },
            error : function(){
                mark = false;
            }
        });
        return false;
    })
    
    

});

// 获取订单列表
function getGoodsList(url=null){
    var search_key = $("#down-goods-form .search-menu .active").attr('tmp-type');
    var search_val = $("#down-goods-form input[name='content']").val();
    // 状态
    var status_n = $("#goods-status-menu .g_status_ajax").find("input[name='status']").val();
    var status_v = $("#goods-status-menu .g_status_ajax").find("input[name='value']").val();
    if(status_n=='undefined' || status_n=='') o_status_n = null;
    if(status_v=='undefined' || status_v=='') o_status_v = null;

    var vendor_id = $('.js-select2').select2("val");

    if(url==null) url = module + '/goods/ajaxGoodsList';

    posth(url,{search_key:search_key,search_val:search_val,status_n:status_n,status_v:status_v,vendor_id:vendor_id},function(res){
        $("#ajaxGoodsList").html(res);
    });
}

</script>
</html>
<?php }
}
