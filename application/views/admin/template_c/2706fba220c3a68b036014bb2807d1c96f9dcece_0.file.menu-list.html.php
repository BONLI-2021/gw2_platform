<?php
/* Smarty version 3.1.29, created on 2021-03-08 17:18:19
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/power/menu-list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045ebdbcaaf48_30100164',
  'file_dependency' => 
  array (
    '2706fba220c3a68b036014bb2807d1c96f9dcece' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/power/menu-list.html',
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
function content_6045ebdbcaaf48_30100164 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/plugins/switchery/switchery.css" rel="stylesheet">
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
                        <div id="menuList" class="ibox-title" style="min-height:94px">
                            <h5>菜单列表</h5>
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <div class="input-group m-b">
                                        <div class="input-group-btn">
                                            <button class="btn btn-white" type="button" aria-expanded="false">菜单名</button>
                                        </div>
                                        <input class="form-control" type="text" name="name">
                                        <span class="input-group-btn search">
                                            <button class="btn btn-primary" type="submit">搜索 </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group m-b">
                                        <span class="input-group-btn">
                                            <a data-toggle="modal" class="btn btn-success addmenu-btn" href="#modal-form-add">创建顶级菜单</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="ajaxMenuList" class="ibox-content">
                            
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
                                        <h2>完善菜单信息</h2>
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
                                            <form class="form-horizontal m-t" id="signupForm-add" method="post" action="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/power/ajaxAddMenu">
                                                <div class='add-child-tmp hidden'>
                                                    <input type='hidden' name='pid'/>
                                                    <input type='hidden' name='level'/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">菜单名称：</label>
                                                    <div class="col-sm-8">
                                                        <input name="name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">controller/method：</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" name="action" required="welcome/index 多个用逗号隔开" aria-required="true"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">是否显示菜单：</label>
                                                    <div class="col-sm-8">
                                                        <div class="radio i-checks">
                                                            <label class=""><input type="radio" name="is_navbar" value="1" >是</label>
                                                            <label class=""><input type="radio" name="is_navbar" value="0" checked>否</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="js-html"></div>
                                                
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">排序：</label>
                                                    <div class="col-sm-8">
                                                        <input name="order" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" value='0'>
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
            
            
            
            <div id="modal-form-edit" class="modal fade" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-11">
                                    <div class="m-b-md">
                                        <h2>更新菜单信息</h2>
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
                                            <form class="form-horizontal m-t" id="signupForm-edit" method="post" action="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/power/ajaxEditMenu">
                                                <input type="hidden" name="id"/>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">菜单名称：</label>
                                                    <div class="col-sm-8">
                                                        <input name="name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">controller/method：</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" name="action" required="welcome/index 多个用逗号隔开" aria-required="true"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">是否显示菜单：</label>
                                                    <div class="col-sm-8">
                                                        <div class="radio i-checks">
                                                            <label class=""><input type="radio" name="is_navbar" value="1">是</label>
                                                            <label class=""><input type="radio" name="is_navbar" value="0">否</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="js-html"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">排序：</label>
                                                    <div class="col-sm-8">
                                                        <input name="order" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">
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
            <!-- // <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/form-validate.js"><?php echo '</script'; ?>
> -->
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/switchery/switchery.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/iCheck/icheck.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/menu-list.js"><?php echo '</script'; ?>
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
                // 创建radio切换
                $("#modal-form-add .radio input").on('ifChanged',function(event){
                    var html_data = '';
                    var is_navbar = $(this).val();
                    if(is_navbar=='1'){
                        html_data += '<div class="form-group"><label class="col-sm-3 control-label">跳转URL：</label><div class="col-sm-8"><input class="form-control" type="text" name="navbar_url" aria-required="true" aria-invalid="true" placeholder="/user/getList" /></div></div><div class="form-group"><label class="col-sm-3 control-label">icon：</label><div class="col-sm-8"><input class="form-control" name="icon" aria-required="true" placeholder="fa-home"/><span class="help-block m-b-none"><i class="fa fa-info-circle"></i><a href="http://www.zi-han.net/theme/hplus/fontawesome.html" target="_blank"> 更多icon</a></span></div></div>';
                    }
                    $("#modal-form-add .js-html").html(html_data);
                });
                // 编辑radio切换
                $("#modal-form-edit .radio input").on('ifChanged',function(event){
                    var is_navbar = $(this).val();
                    if(is_navbar==1){
                        var obj = JSON.parse($.cookie('input_obj_str'));
                        if(obj==null){
                            $("#modal-form-edit .js-html").html('<div class="form-group"><label class="col-sm-3 control-label">跳转URL：</label><div class="col-sm-8"><input class="form-control" type="text" name="navbar_url" aria-required="true" aria-invalid="true" placeholder="例：/user/getList" /></div></div><div class="form-group"><label class="col-sm-3 control-label">icon：</label><div class="col-sm-8"><input class="form-control" name="icon" aria-required="true" placeholder="例：fa-home"/><span class="help-block m-b-none"><i class="fa fa-info-circle"></i><a href="http://www.zi-han.net/theme/hplus/fontawesome.html" target="_blank"> 更多icon</a></span></div></div>');
                        }else{
                            $("#modal-form-edit .js-html").html('').html('<div class="form-group"><label class="col-sm-3 control-label">跳转URL：</label><div class="col-sm-8"><input class="form-control" type="text" name="navbar_url" aria-required="true" aria-invalid="true" placeholder="例：/user/getList" value="'+obj.navbar_url+'"/></div></div><div class="form-group"><label class="col-sm-3 control-label">icon：</label><div class="col-sm-8"><input class="form-control" name="icon" aria-required="true" placeholder="例：fa-home" value="'+obj.icon+'"/><span class="help-block m-b-none"><i class="fa fa-info-circle"></i><a href="http://www.zi-han.net/theme/hplus/fontawesome.html" target="_blank"> 更多icon</a></span></div></div>');
                        }
                        
                    }else{
                        $("#modal-form-edit .js-html").html('');
                    }
                });

                // 获取菜单列表
                getMenuList();

                $("#menuList button[type='submit']").click(function(){
                    var name = $("#menuList").find("input[name='name']").val();
                    var url = module + '/power/ajaxMenuList';
                    if(name==''){
                        layer.msg('请输入菜单名称'); 
                        return false;
                    }
                    posth(url,{name:name},function(res){
                        $("#ajaxMenuList").html(res);
                    });
                });
                // 重置表单
                $("#menuList .addmenu-btn").click(function(){
                    $("#modal-form-add .add-child-tmp").html('');
                    $("#modal-form-add").find(".reset-btn").trigger('click');
                });
                // 点击添加菜单/子菜单
                $("#modal-form-add form").submit(function(){
                    submitAjax($(this),function(res){
                        res.success && $('.close').trigger('click');
                        layer.msg(res.msg);
                        getMenuList();
                    });
                    return false;
                });
                
            })
            // 获取管理员列表
            function getMenuList(){
                var url = module + '/power/ajaxMenuList';
                posth(url,null,function(res){
                    $("#ajaxMenuList").html(res);
                });
            }

            <?php echo '</script'; ?>
>
            
        </div>
        <!--右侧部分结束-->
    </div>

</body>
</html>
<?php }
}