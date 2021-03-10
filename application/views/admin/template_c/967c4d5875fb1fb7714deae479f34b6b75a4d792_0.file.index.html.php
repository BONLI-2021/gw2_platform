<?php
/* Smarty version 3.1.29, created on 2021-03-09 09:36:03
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/user/index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6046d1037e07c4_65697667',
  'file_dependency' => 
  array (
    '967c4d5875fb1fb7714deae479f34b6b75a4d792' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/user/index.html',
      1 => 1615253760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.html' => 1,
    'file:public/navbar.html' => 1,
    'file:public/menu.html' => 1,
    'file:public/footer.html' => 1,
  ),
),false)) {
function content_6046d1037e07c4_65697667 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/plugins/datapicker/datepicker3.css" rel="stylesheet">
</head>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/navbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <br>
            <div class="row" id="content-main" style="">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="min-height:140px">
                            <h5>用户列表</h5>
                                <form id="down-user-form" onsubmit="return false;">
                                    <div class="col-sm-12" style="padding-left:0px;">
                                        <div class="col-sm-3">
                                            <div id="datepicker" class="input-daterange input-group input-medium date-picker">
                                                <input class="input-sm form-control" name="start" value="2020-12-01" type="text" tmp-start="2020-12-01">
                                                <span class="input-group-addon">到</span>
                                                <input class="input-sm form-control" name="end" value="<?php echo date('Y-m-d',time());?>
" type="text" tmp-end="<?php echo date('Y-m-d',time());?>
">
                                            </div>
                                        </div>
                                        <div class="col-sm-3" style="padding-left:0px;">
                                            <div class="input-group m-b">
                                                <input class="form-control" name="search_val" type="text" placeholder="请输入账号/用户姓名">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary search-btn" type="button">搜索 </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-1" style="padding:0px;">
                                            <div class="input-group m-b">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-error" type="reset">重置 </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-2 pull-right" style="padding-left:0px;width:105px">
                                            <div class="input-group m-b">
                                                <span class="input-group-btn">
                                                    <a data-toggle="modal" class="btn btn-success addUser-btn" href="#modal-form-adduser">创建用户</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-2" style="padding-left:0px;width:120px">
                                            <button class="btn btn-success user-account-excel" type="button" onclick="exportAccount()">
                                            <span class="bold">导账户明细</span>
                                            </button>
                                            <button id="load-btn" class="btn btn-default hidden" type="button"><img src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/images/admin/loading.gif"/>  加载中</button>
                                        </div>
                                        <div class="col-sm-2" style="padding-left:0px;width:120px">
                                            <button class="btn btn-primary user-recharge-excel" type="button" onclick="exportAccountRecharge()">
                                            <span class="bold">导充值明细</span>
                                            </button>
                                            <button id="load-btn" class="btn btn-default hidden" type="button"><img src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/images/admin/loading.gif"/>  加载中</button>
                                        </div>
                                        <div class="col-sm-2" style="padding-left:0px;width:120px">
                                            <button class="btn btn-warning user-order-excel" type="button" onclick="exportAccountOrder()">
                                            <span class="bold">导消费明细</span>
                                            </button>
                                            <button id="load-btn" class="btn btn-default hidden" type="button"><img src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/images/admin/loading.gif"/>  加载中</button>
                                        </div>
                                        <div class="col-sm-2" style="padding-left:0px;width:120px">
                                            <button class="btn btn-danger user-reduce-excel" type="button" onclick="exportAccountReduce()">
                                            <span class="bold">导扣减明细</span>
                                            </button>
                                            <button id="load-btn" class="btn btn-default hidden" type="button"><img src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/images/admin/loading.gif"/>  加载中</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                        <div id="ajaxUserList" class="ibox-content">
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="modal-form-adduser" class="modal fade" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-11">
                                    <div class="m-b-md">
                                        <h2>完善用户信息</h2>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <button class="close" type="button" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                    <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <div class="col-sm-12">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-content">
                                            <form id="signupForm-adduser" class="form-horizontal m-t" method="post" action="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/user/ajaxAddUser">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">用户账号：</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="account" type="text" placeholder="请输入账号，不能包含特殊符号">
                                                        <small class="text-navy">密码默认为Admin@123，请登录修改</small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">用户名：</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="user_name" type="text" placeholder="请输入用户姓名">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">邮箱：</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="email" type="text" placeholder="请输入用户邮箱">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-8 col-sm-offset-3">
                                                        <button class="btn btn-primary" type="submit">提交</button>
                                                        <button class="hidden reset-btn" type="reset"></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            

            
            <div id="modal-form-edituser" class="modal fade" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-11">
                                    <div class="m-b-md">
                                        <h2>完善用户信息</h2>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <button class="close" type="button" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                    <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <div class="col-sm-12">

                                    <div class="ibox float-e-margins">
                                        <div class="ibox-content">
                                            <form id="signupForm-edituser" class="form-horizontal m-t" class="form-horizontal m-t" method="post" action="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/user/ajaxEditUser">
                                                <input class="form-control" name="id" type="hidden">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">用户账号：</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="account" type="text" placeholder="请输入账号" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">用户名：</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="user_name" type="text" placeholder="请输入用户姓名">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">邮箱：</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="email" type="text" placeholder="请输入用户邮箱">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-8 col-sm-offset-3">
                                                        <button class="btn btn-primary" type="submit">提交</button>
                                                        <button class="hidden reset-btn" type="reset"></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            

            
            <div id="modal-form-recharge" class="modal fade" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-11">
                                    <div class="m-b-md">
                                        <h2 style="color:#ed5565">* 账户充值（请谨慎操作）</h2>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <button class="close" type="button" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                    <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <div class="col-sm-12">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-content">
                                            <form id="signupForm-recharge" class="form-horizontal m-t" action="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/user/ajaxDealMoney" method="post">
                                                <input class="form-control" name="id" type="hidden">
                                                <input class="form-control" name="type" type="hidden" value="">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">用户账号：</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="account" type="text" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">用户名：</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="user_name" type="text" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">账户余额：</label>
                                                    <div class="col-sm-8">
                                                        <input name="balance" class="form-control" type="text" value="0.00" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" style="color:#ed5565">本次充值金额：</label>
                                                    <div class="col-sm-8">
                                                        <input name="deal_amount" class="form-control" type="text" value="0.00">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">操作备注：</label>
                                                    <div class="col-sm-8">
                                                        <input name="explain" class="form-control" type="text" value="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-8 col-sm-offset-3">
                                                        <button id="do-button" class="btn btn-primary" type="submit">提交</button>
                                                        <button class="hidden reset-btn" type="reset"></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            

            
            <div id="modal-form-reduce" class="modal fade" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-11">
                                    <div class="m-b-md">
                                        <h2 style="color:#ed5565">* 余额扣减（请谨慎操作）</h2>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <button class="close" type="button" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                    <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <div class="col-sm-12">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-content">
                                            <form id="signupForm-reduce" class="form-horizontal m-t" action="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/user/ajaxDealMoney" method="post">
                                                <input class="form-control" name="id" type="hidden">
                                                <input class="form-control" name="type" type="hidden" value="">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">用户账号：</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="account" type="text" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">用户名：</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="user_name" type="text" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">账户余额：</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="balance" type="text" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" style="color:#ed5565">本次扣减金额：</label>
                                                    <div class="col-sm-8">
                                                        <input name="deal_amount" class="form-control" type="text" value="0.00">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">操作备注：</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="explain" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-8 col-sm-offset-3">
                                                        <button id="do-button" class="btn btn-primary" type="submit">提交</button>
                                                        <button class="hidden reset-btn" type="reset"></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>
        <!--右侧部分结束-->
    </div>
</body>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/datapicker/bootstrap-datepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/jasny/jasny-bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/prettyfile/bootstrap-prettyfile.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/validate/jquery.validate.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/validate/messages_zh.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/form-validate-user.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(function(){
    $("#datepicker").datepicker({
        autoclose:true,
        clearBtn:false,
        todayBtn:true,
        format:"yyyy-mm-dd"
    });

    // 初始化 获取列表
    getUserList();

    // 搜索
    $("#down-user-form .search-btn").click(function(){
        var url = module + '/user/ajaxUserList';
        var options = getOptions();
        posth(url,{options:options},function (data){
            $("#ajaxUserList").html(data);
        })
    });

    // 重置
    $("#down-user-form button[type='reset']").click(function(){
        $("#down-user-form input[name='search_val']").val('');

        var start = $("#down-user-form input[name='start']").attr('tmp-start');
        var end = $("#down-user-form input[name='end']").attr('tmp-end');
        $("#datepicker input[name='start']").val(start);
        $("#datepicker input[name='end']").val(end);

        $.get(module+'/user/userClear');
        getUserList();
    })

    // 添加用户
    $("#modal-form-adduser form").submit(function(e){
        if($(this).find('div').hasClass('has-error')){
            return false;
        }

        var reg = /^[\u4E00-\u9FA5A-Za-z0-9]+$/;
        var account = $(this).find('input[name="account"]').val();
        
        if(!reg.test(account)){
            layer.msg('账号只能为数字，字母，中文组合',{icon:2,time:1000});
            return false;
        }

        var jsonData={};
        $(this).find('input,select').each(function(){jsonData[this.name]=this.value});

        submitAjax($(this),function(r){
            if(r.retcode===1){
                $("#modal-form-adduser .close").trigger('click');
                toastr.success(r.msg);
                getUserList();
            }else{
                toastr.error(r.msg);
            }
        });
        return false;
    });

    // 编辑用户
    $("#modal-form-edituser form").submit(function(e){
        if($(this).find('div').hasClass('has-error')){
            return false;
        }
        var jsonData={};
        $(this).find('input').each(function(){jsonData[this.name]=this.value});
        submitAjax($(this),function(r){
            if(r.retcode===1){
                $("#modal-form-edituser .close").trigger('click');
                toastr.success(r.msg);
                getUserList();
            }else{
                toastr.error(r.msg);
            }
        });
        return false;
    });

    // 充值
    $("#modal-form-recharge form").submit(function(e){
        if($(this).find('div').hasClass('has-error')){
            return false;
        }

        var reg = /^[0-9]+$/;
        var money = $(this).find('input[name="deal_amount"]').val();
        if(!reg.test(money)){
            layer.msg('操作金额需是大于零的整数',{icon:2,time:1000});
            return false;
        }
        var jsonData={};
        $(this).find('input').each(function(){jsonData[this.name]=this.value});
        submitAjax($(this),function(r){
            if(r.retcode===1){
                $("#modal-form-recharge .close").trigger('click');
                toastr.success(r.msg);
                getUserList();
            }else{
                $("#modal-form-recharge .close").trigger('click');
                toastr.error(r.msg);
            }
        });
        return false;
    });

    // 扣减
    $("#modal-form-reduce form").submit(function(e){
        if($(this).find('div').hasClass('has-error')){
            return false;
        }
        
        var reg = /^[0-9]+$/;
        var money = $(this).find('input[name="deal_amount"]').val();
        if(!reg.test(money)){
            layer.msg('操作金额需是大于零的整数',{icon:2,time:1000});
            return false;
        }

        var jsonData={};
        $(this).find('input,select').each(function(){jsonData[this.name]=this.value});
        submitAjax($(this),function(r){
            if(r.retcode===1){
                $("#modal-form-reduce .close").trigger('click');
                toastr.success(r.msg);
                getUserList();
            }else{
                toastr.error(r.msg);
                $("#modal-form-reduce .close").trigger('click');
            }
        });
        return false;
    });

    // 点击创建，初始化值
    $(".addUser-btn").click(function(){
        $("#modal-form-adduser input,select").val('');
        $("#modal-form-adduser input,select").removeAttr('aria-required').removeAttr('aria-invalid').removeAttr('aria-describedby').next('span').remove();
        
        $("#signupForm-adduser").children().each(function(){
            $(this).removeClass('has-error').removeClass('has-success');
        });
    });
})
    
// 获取用户列表
function getUserList(){
    var url = module + '/user/ajaxUserList';
    var options = getOptions();
    posth(url,{options:options},function(r){
        $('#ajaxUserList').html(r);
    })
}

function getOptions(){
    var start,end,search_val,options;
    start = $("#datepicker input[name='start']").val();
    end = $("#datepicker input[name='end']").val();
    search_val = $("#down-user-form input[name='search_val']").val();
    options = {start:start,end:end,search_val:search_val,mark:1};
    return options;
}

// 导出账户明细
function exportAccount(){
    var start,end,search_val;
    start = $("#datepicker input[name='start']").val();
    end = $("#datepicker input[name='end']").val();
    search_val = $("#down-user-form input[name='search_val']").val();

    var form = $("<form>");
    form.attr('style', 'display:none');
    form.attr('target', '');
    form.attr('method', 'post');
    form.attr('action', module+'/user/exportAccount');

    var input1 = $('<input type="hidden" name="start" value="'+start+'">');
    var input2 = $('<input type="hidden" name="end" value="'+end+'">');
    var input3 = $('<input type="hidden" name="search_val" value="'+search_val+'">');
    $('body').append(form);

    form.append(input1);
    form.append(input2);
    form.append(input3);

    form.submit();
    form.remove();    
}

// 导出充值明细
function exportAccountRecharge(){
    var start,end,search_val;
    start = $("#datepicker input[name='start']").val();
    end = $("#datepicker input[name='end']").val();
    search_val = $("#down-user-form input[name='search_val']").val();

    var form = $("<form>");
    form.attr('style', 'display:none');
    form.attr('target', '');
    form.attr('method', 'post');
    form.attr('action', module+'/user/exportAccountRecharge');

    var input1 = $('<input type="hidden" name="start" value="'+start+'">');
    var input2 = $('<input type="hidden" name="end" value="'+end+'">');
    var input3 = $('<input type="hidden" name="search_val" value="'+search_val+'">');
    var input4 = $('<input type="hidden" name="type" value="1">');
    $('body').append(form);

    form.append(input1);
    form.append(input2);
    form.append(input3);
    form.append(input4);

    form.submit();
    form.remove();    
}

// 导出消费明细
function exportAccountOrder(){
    var start,end,search_val;
    start = $("#datepicker input[name='start']").val();
    end = $("#datepicker input[name='end']").val();
    search_val = $("#down-user-form input[name='search_val']").val();

    var form = $("<form>");
    form.attr('style', 'display:none');
    form.attr('target', '');
    form.attr('method', 'post');
    form.attr('action', module+'/user/exportAccountOrder');

    var input1 = $('<input type="hidden" name="start" value="'+start+'">');
    var input2 = $('<input type="hidden" name="end" value="'+end+'">');
    var input3 = $('<input type="hidden" name="search_val" value="'+search_val+'">');
    var input4 = $('<input type="hidden" name="type" value="3">');
    $('body').append(form);

    form.append(input1);
    form.append(input2);
    form.append(input3);
    form.append(input4);

    form.submit();
    form.remove();    
}

// 导出扣减明细
function exportAccountReduce(){
    var start,end,area_id,search_val;
    start = $("#datepicker input[name='start']").val();
    end = $("#datepicker input[name='end']").val();
    search_val = $("#down-user-form input[name='search_val']").val();

    var form = $("<form>");
    form.attr('style', 'display:none');
    form.attr('target', '');
    form.attr('method', 'post');
    form.attr('action', module+'/user/exportAccountReduce');

    var input1 = $('<input type="hidden" name="start" value="'+start+'">');
    var input2 = $('<input type="hidden" name="end" value="'+end+'">');
    var input3 = $('<input type="hidden" name="search_val" value="'+search_val+'">');
    var input4 = $('<input type="hidden" name="type" value="2">');
    $('body').append(form);

    form.append(input1);
    form.append(input2);
    form.append(input3);
    form.append(input4);

    form.submit();
    form.remove();    
}
<?php echo '</script'; ?>
>
</html>
<?php }
}
