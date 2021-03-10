<?php
/* Smarty version 3.1.29, created on 2021-03-08 17:20:46
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/power/admin-list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045ec6e0cc0c6_57756558',
  'file_dependency' => 
  array (
    '1ce466b8adde2925ddb8ac4e67b64aa768d7c67f' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/power/admin-list.html',
      1 => 1615194511,
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
function content_6045ec6e0cc0c6_57756558 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/plugins/iCheck/custom.css" rel="stylesheet">
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
            <div class="row" id="content-main">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div id="adminList" class="ibox-title" style="min-height:94px">
                            <h5>管理员列表</h5>
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <div class="input-group m-b">
                                        <div class="input-group-btn">
                                            <button class="btn btn-white" type="button" aria-expanded="false">管理员账号</button>
                                        </div>
                                        <input class="form-control" type="text" name="account" value="<?php if (isset($_SESSION['option']['account'])) {
echo $_SESSION['option']['account'];
}?>">
                                        <span class="input-group-btn search">
                                            <button class="btn btn-primary" type="submit">搜索 </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group m-b">
                                        <span class="input-group-btn">
                                            <a data-toggle="modal" class="btn btn-success addAdmin-btn" href="#modal-form-add">创建管理员</a>
                                        </span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div id="ajaxAdminList" class="ibox-content">
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div id="modal-form-add" class="modal fade" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-11">
                                    <div class="m-b-md">
                                        <h2>完善管理员信息</h2>
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
                                            <form class="form-horizontal m-t" id="signupForm-add" action="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/power/ajaxAddAdmin" method="post">
                                                
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">公司名称：</label>
                                                    <div class="col-sm-8">
                                                        <input id="username" name="real_name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">账号：</label>
                                                    <div class="col-sm-8">
                                                        <input id="email" name="account" class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">密码：</label>
                                                    <div class="col-sm-8">
                                                        <input id="password-add" name="password" class="form-control" type="password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">确认密码：</label>
                                                    <div class="col-sm-8">
                                                        <input id="confirm_password" name="confirm_password" class="form-control" type="password">
                                                        <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 请再次输入您的密码</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">管理员类型：</label>
                                                    <div class="col-sm-8">
                                                        <div class="radio i-checks">
                                                            <label class="">
                                                                <input type="radio" name="admin_type" value="1" checked>系统管理员
                                                            </label>
                                                            <label class="">
                                                                <input type="radio" name="admin_type" value="2">供应商管理员
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="js-html"></div>
                                                <div class="form-group <?php if (empty($_smarty_tpl->tpl_vars['rolelist']->value)) {?>has-error<?php }?>">
                                                    <label class="col-sm-3 control-label">分配角色：</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control m-b roleList" name="role_id">
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['rolelist']->value)) {?>
                                                        <?php
$_from = $_smarty_tpl->tpl_vars['rolelist']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                                                        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
                                                        <?php } else { ?>
                                                        <option value="">请去添加角色</option>
                                                        <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="js-vendor-html"></div>
                                                <div class="form-group">
                                                    <div class="col-sm-8 col-sm-offset-3">
                                                        <?php if ($_smarty_tpl->tpl_vars['rolelist']->value) {?>
                                                        <button class="btn btn-primary" type="submit">提交</button>
                                                        <button class="hidden reset-btn" type="reset"></button>
                                                        <?php } else { ?>
                                                        <button class="btn btn-default" disabled type="submit">提交</button>
                                                        <?php }?>
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
            
            
            <div id="modal-form-edit" class="modal fade" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-11">
                                    <div class="m-b-md">
                                        <h2>更新管理员信息</h2>
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
                                            <form class="form-horizontal m-t" id="signupForm-edit" action="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/power/ajaxEditAdmin">
                                                <input type="hidden" name="id" value=""/>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">公司名称：</label>
                                                    <div class="col-sm-8">
                                                        <input name="real_name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">账号：</label>
                                                    <div class="col-sm-8">
                                                        <input name="account" class="form-control" type="text"  disabled="" placeholder="已被禁用">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">密码：</label>
                                                    <div class="col-sm-8">
                                                        <input id="password-edit" name="password" class="form-control" type="password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">确认密码：</label>
                                                    <div class="col-sm-8">
                                                        <input id="confirm_password2" name="confirm_password" class="form-control" type="password">
                                                        <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 请再次输入您的密码</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">管理员类型：</label>
                                                    <div class="col-sm-8">
                                                        <div class="radio i-checks">
                                                            <label class="">
                                                                <input type="radio" name="admin_type" value="1">系统管理员
                                                            </label>
                                                            <label class="">
                                                                <input type="radio" name="admin_type" value="2">供应商管理员
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group <?php if (empty($_smarty_tpl->tpl_vars['rolelist']->value)) {?>has-error<?php }?>">
                                                    <label class="col-sm-3 control-label">分配角色：</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control m-b roleList" name="role_id">
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['rolelist']->value)) {?>
                                                        <?php
$_from = $_smarty_tpl->tpl_vars['rolelist']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_1_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_1_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                                                        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_local_item;
}
if ($__foreach_v_1_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_item;
}
?>
                                                        <?php } else { ?>
                                                        <option value="">请去添加角色</option>
                                                        <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="js-vendor-html"></div>
                                                <div class="form-group">
                                                    <div class="col-sm-8 col-sm-offset-3">
                                                        <?php if ($_smarty_tpl->tpl_vars['rolelist']->value) {?>
                                                        <button class="btn btn-primary" type="submit">提交</button>
                                                        <?php } else { ?>
                                                        <button class="btn btn-default" disabled type="submit">提交</button>
                                                        <?php }?>
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
            
            <div class="vendor_hidden hidden"><?php echo $_smarty_tpl->tpl_vars['vendorlist']->value;?>
</div>

            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/chosen/chosen.jquery.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/datapicker/bootstrap-datepicker.js"><?php echo '</script'; ?>
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
/js/admin/form-validate.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/iCheck/icheck.min.js"><?php echo '</script'; ?>
>
            
            <?php echo '<script'; ?>
 type="text/javascript">
            
            $(function(){
                $('.radio').iCheck({ 
                  labelHover : true, 
                  cursor : true, 
                  checkboxClass : 'icheckbox_square-green', 
                  radioClass : 'iradio_square-green', 
                  increaseArea : '20%' 
                });
                $(".addAdmin-btn").click(function(){
                    $("#modal-form-add").find(".reset-btn").trigger('click');
                })
                
                // 获取管理员列表
                getAdminList();

                $("#adminList button[type='submit']").click(function(){
                    var url = module + '/power/ajaxAdminList';
                    var account = $("#adminList").find("input[name='account']").val();
                    if(account==''){
                        layer.msg('请输入账号'); 
                        return false;
                    }
                    posth(url,{account:account},function(res){
                        $("#ajaxAdminList").html(res);
                    });
                });
                
                // 点击添加
                $("#modal-form-add form").submit(function(e){
                    var reg = /^[\u4E00-\u9FA5A-Za-z0-9]+$/;
                    var account = $(this).find('input[name="account"]').val();
                    
                    if(!reg.test(account)){
                        return false;
                    }

                    var pass_reg = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/;
                    var password = $(this).find('input[name="password"]').val();
                    if(!pass_reg.test(password)){
                        layer.msg('密码长度为6~16位，且须同时包含数字及字母');
                        return false;
                    }

                    submitAjax($(this),function(res){
                        if(res.success){
                            $('.close').trigger('click');
                            layer.msg(res.msg);
                            getAdminList();
                        }
                    });
                    return false;
                });

                // 管理员类型选择供应商时锁定角色类型
                $(".radio input").on('ifChecked',function(event){
                    var html_data = '';
                    var admin_type = $(this).val();
                    if(admin_type=='2'){
                        $('select[name="role_id"]').find('option').each(function(){
                            if($(this).html()=='供应商管理员'){
                                $(this).siblings().attr('disabled',true);
                                $(this).attr('selected',true);
                            }
                        });
                        var vendorlist = JSON.parse($(".vendor_hidden").html());
                        if(vendorlist==''){
                            html_data += '<div class="form-group has-error"><label class="col-sm-3 control-label">选择供应商：</label><div class="col-sm-8"><select class="form-control m-b" name="vendor_id"><option value="">请去添加供应商</option></select></div></div>';
                        }else{
                            html_data += '<div class="form-group"><label class="col-sm-3 control-label">选择供应商：</label><div class="col-sm-8"><select class="form-control m-b" name="vendor_id"><option value="">--请选择--</option>';
                            for (var i = 0; i < vendorlist.length; i++) {
                                html_data += '<option value="'+ vendorlist[i]['id'] +'">'+ vendorlist[i]['vendor_name'] +'</option>';
                            }
                            html_data += '</select></div></div>';
                        }
                        $('.js-vendor-html').html(html_data);
                    }else{
                        $('select[name="role_id"]').find('option').each(function(){
                            if($(this).html()=='供应商管理员'){
                                $(this).attr('disabled',true);
                            }else{
                                $(this).removeAttr('disabled');
                            }
                        });
                        $('.js-vendor-html').html('');
                    }
                })
            })
            // 获取管理员列表
            function getAdminList(){

                var url = module + '/power/ajaxAdminList';
                posth(url,null,function(res){
                    $("#ajaxAdminList").html(res);
                });
            }

            <?php echo '</script'; ?>
>
            
        </div>
    </div>

</body>
</html>
<?php }
}
