<?php
/* Smarty version 3.1.29, created on 2021-03-08 15:03:38
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/goods/add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045cc4abf19a0_49970434',
  'file_dependency' => 
  array (
    'dba61f88844b6c6c4039acbaf658c3c2e2588d1d' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/goods/add.html',
      1 => 1615186173,
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
function content_6045cc4abf19a0_49970434 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<title>商品录入</title>
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

<link href="http://gw2.com//css/admin/goodsadd.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="http://gw2.com//css/admin/lyne-up-pic.css">
</head>
<style type="text/css">
ul li{list-style-type:none}
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
                                    <li class=""><a class="J_menuItem" href="http://gw2.com/admin/goods/index">查询商品</a></li>
                                    <li class="active"><a class="J_menuItem" href="http://gw2.com/admin/goods/add">商品录入</a></li>
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
                <div id="content-main"  class="wrapper wrapper-content" style="height:calc(100% - 105px);">
                    <form id="signupForm-goodsadd" action="http://gw2.com/admin/goods/doAddGoods" class="wizard-big" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>商品基础资料</h5>
                                    <a href="http://gw2.com/admin/goods/index" class="btn btn-white btn-xs pull-right">返回上一页</a>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>商品名 *</label>
                                                    <input name="goods_name" type="text" required class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>所属供应商 *</label>
                                                    <select class="form-control m-b" required name="vendor_id">
                                                        <option value="">--请选择--</option>
                                                                
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
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>商品分类 *</label>
                                                    <select class="form-control m-b" required name="cate_id">
                                                    <option value="">--请选择--</option>
                                                            
                                                                                                            <option value="1" disabled="disabled" style="background: #eee;"> 水具酒具</option>
                                                                
                                                                                                                    <option value="1-27">&nbsp;&nbsp;&nbsp;&nbsp;|－葡萄酒</option>
                                                                                                                    <option value="1-32">&nbsp;&nbsp;&nbsp;&nbsp;|－开瓶器</option>
                                                                                                                                                                                                                            <option value="2" disabled="disabled" style="background: #eee;">家居日用</option>
                                                                
                                                                                                                    <option value="2-28">&nbsp;&nbsp;&nbsp;&nbsp;|－厨具</option>
                                                                                                                    <option value="2-29">&nbsp;&nbsp;&nbsp;&nbsp;|－生活用品</option>
                                                                                                                                                                                                                            <option value="3" disabled="disabled" style="background: #eee;">数码电器</option>
                                                                
                                                                                                                    <option value="3-30">&nbsp;&nbsp;&nbsp;&nbsp;|－厨房电器</option>
                                                                                                                                                                                                                            <option value="4" disabled="disabled" style="background: #eee;">包装提袋</option>
                                                                
                                                                                                                    <option value="4-31">&nbsp;&nbsp;&nbsp;&nbsp;|－提袋</option>
                                                                                                                                                                                                                            <option value="5" disabled="disabled" style="background: #eee;">创意礼品</option>
                                                                                                                                                                    <option value="6" disabled="disabled" style="background: #eee;">厨卫用品</option>
                                                                                                                                                                    <option value="7" disabled="disabled" style="background: #eee;">清洁护理</option>
                                                                                                                                                                    <option value="8" disabled="disabled" style="background: #eee;">美妆个护</option>
                                                                                                                                                                                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>单价 *</label>
                                                    <input name="price" type="text" required class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>库存 *</label>
                                                    <input name="stock" type="text" required class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>排序</label>
                                                    <input name="sort_weight" required type="text" class="form-control" value="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>商品主图</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="g_small_pic" type="text">
                                            <input type="hidden" name="g_big_pic" type="text">
                                            <div class="well">
                                                <div id="Pic_pass">
                                                    <p style="font-size: 20px;font-weight: bold;">请上传商品图片 </p>
                                                    <p><span style="color: red">注：每张照片大小不可超过1M，且尽量上传2~3张，最多可上传10张</span></p>
                                                    <div class="picDiv">
                                                        <div class="addImages">
                                                            <input id="files" class="file" accept="image/png, image/jpeg, image/gif, image/jpg" type="file">
                                                            <div class="text-detail" name="pic">
                                                                <span>+</span>
                                                                <p>点击上传</p>
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
                        <div class="col-sm-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>商品详情</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <textarea id="goods_details" name="goods_details" style="z-index:999"></textarea>
                                        </div>
                                        <div id="temp-img-list" class="hidden">临时数据</div>
                                    </div>
                                </div>
                                <div class="col-sm-8" style="margin-bottom:100px;margin-left: 100px">
                                    <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-up"></i> 提交</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
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
        </div>
        <!--右侧部分结束-->
    </div>

</body>
<!-- UEditor 配置文件 -->
<script type="text/javascript" src="http://gw2.com//js/admin/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="http://gw2.com//js/admin/ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript" src="http://gw2.com//js/admin/server/goodsadd.js"></script>
<script src="http://gw2.com//js/admin/jquery.form.js"></script>
<script type="text/javascript">
//图片上传预览功能
var userAgent = navigator.userAgent; //用于判断浏览器类型
$(".file").change(function() {
    // 1.formdata 创建个对象
    var formData = new FormData(document.querySelector("form"));

    $this = $(this);
    //获取选择图片的对象
    var docObj = $(this)[0];
    // console.log(docObj);
    var picDiv = $(this).parents(".picDiv");
    //得到所有的图片文件
    var fileList = docObj.files;
    // console.log(fileList);
    //循环遍历
    // console.log(fileList.length);
    var tmp_file_name = [];
    for (var i = 0; i < fileList.length; i++) {
        // 2.formdata 赋值数据
        formData.append('file'+i,$this[0].files[i]);
        //动态添加html元素
        var picHtml = "<div class='imageDiv' ><img id='img" + fileList[i].name + "' tmp-picname='"+fileList[i].name + "' /> <div class='cover'><i class='delbtn'>删除</i></div></div>";
        // console.log(picHtml);
        picDiv.prepend(picHtml);
        //获取图片imgi的对象
        var imgObjPreview = document.getElementById("img" + fileList[i].name);
        if (fileList && fileList[i]) {
            //图片属性
            imgObjPreview.style.display = 'block';
            imgObjPreview.style.width = '160px';
            imgObjPreview.style.height = '130px';
            //imgObjPreview.src = docObj.files[0].getAsDataURL();
            //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要以下方式
            if (userAgent.indexOf('MSIE') == -1) {
                //IE以外浏览器
                imgObjPreview.src = window.URL.createObjectURL(docObj.files[i]); //获取上传图片文件的物理路径;
                // console.log(imgObjPreview.src);
                // var msgHtml = '<input type="file" id="fileInput" multiple/>';
            } else {
                //IE浏览器
                if (docObj.value.indexOf(",") != -1) {
                    var srcArr = docObj.value.split(",");
                    imgObjPreview.src = srcArr[i];
                } else {
                    imgObjPreview.src = docObj.value;
                }
            }
        }
    }
    var r = do_upload(formData);
});

// 删除功能
$("div").delegate('.delbtn','click',function() {
    var _this = $(this);
    var img_name = _this.parents(".imageDiv").find('img').attr("tmp-picname");
    // alert(img_name);return false;
    var d_res = del_img(img_name);
    _this.parents(".imageDiv").remove();
});


function do_upload(filedata){
    var url = module + '/goods/ajaxUpload';
    $.ajax({
        async: false,
        url: url,
        type: 'POST',
        data: filedata,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend : function(XMLHttpRequest){
            load_index = layer.msg('上传中', {
                icon: 16,
                shade: [0.5,'#000']
            });
        },
        complete : function(XMLHttpRequest, r){
            layer.close(load_index);
        },
        success : function(res){
            if(res.success==true){
                $("form input[name='g_big_pic']").val(res.data.big_url);
                $("form input[name='g_small_pic']").val(res.data.small_url);
                $("#Pic_pass").find('.imageDiv:first').children('img').attr('tmp-picname',res.data.tmp_filename);
                layer.msg('已上传');
            }else{
                layer.msg(res.msg);
            }
        },
        error : function(){
            layer.msg('异常，请重新尝试。');
        }
    });
}

function del_img(filepath){
    var url = module + '/goods/ajaxDelImg';
    $.ajax({
        async: false,
        url: url,
        type: 'POST',
        data: {file_path:filepath},
        beforeSend : function(XMLHttpRequest){
            load_index = layer.msg('删除中', {
                icon: 16,
                shade: [0.5,'#000']
            });
        },
        complete : function(XMLHttpRequest, r){
            layer.close(load_index);
        },
        success : function(res){
            if(res.success==true){
                $("form input[name='g_big_pic']").val(res.data.big_url);
                $("form input[name='g_small_pic']").val(res.data.small_url);
                layer.msg('已删除');
            }else{
                layer.msg(res.msg);
            }
        },
        error : function(){
            layer.msg('异常，请重新尝试。');
        }
    });
}
// 删除功能
$("div").delegate('.certdelbtn','click',function() {
    var _this = $(this);
    var img_name = _this.parents(".imageDiv").find('img').attr("tmp-picname");
    
    var d_res = del_img_cert(img_name);
    _this.parents(".imageDiv").remove();
});

// 判断数组有无重复元素
function mm(a){
    var nary=a.sort();
    for(var i=0;i<a.length;i++){
        if (nary[i]==nary[i+1]){
            return false;
        }else{
            return true;
        }
    }
}


</script>
</html>
<?php }
}
