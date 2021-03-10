<?php
/* Smarty version 3.1.29, created on 2021-03-08 17:20:46
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/power/admin-table.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045ec6ee4e281_50654921',
  'file_dependency' => 
  array (
    'ca616faf8161b45b7d1b2adb8eda51dd7539acc1' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/power/admin-table.html',
      1 => 1615194511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6045ec6ee4e281_50654921 ($_smarty_tpl) {
?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>昵称</th>
            <th>账号</th>
            <th>所属角色</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($_smarty_tpl->tpl_vars['adminlist']->value)) {?>
    <?php
$_from = $_smarty_tpl->tpl_vars['adminlist']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_0_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
    <tr>
        <td class="key_id" tmp-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo ($_smarty_tpl->tpl_vars['k']->value+1)+$_smarty_tpl->tpl_vars['offset']->value;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['real_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['account'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
        <td>
            <div class="switch">
                <div class="onoffswitch">
                    <input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['v']->value['status']) {?>checked<?php }?> class="onoffswitch-checkbox" id="example<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
                    <label class="onoffswitch-label" for="example<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </td>
        <td>
            <a data-toggle="modal" class="btn btn-xs btn-outline btn-warning admin-edit" href="#modal-form-edit">编辑</a>
            <a class="btn btn-xs btn-outline btn-danger admin-delete" href="javascript:;">删除</a>
        </td>
    </tr>
    <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
if ($__foreach_v_0_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_0_saved_key;
}
?>
    <?php } else { ?>
    <tr class="no-records-found t-align">
        <td colspan="6">没有找到匹配的记录</td>
    </tr>
    </tbody>
    <?php }?>
</table>

<div id="page-div" class="row">
    <div class="col-sm-6">
        <div id="editable_info" class="dataTables_info" role="alert" aria-live="polite" aria-relevant="all">显示 <span class="start">0</span> 到 <span class="end">0</span> 项，共 <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 项</div>
    </div>
    <div class="col-sm-6">
        <div id="editable_paginate" class="dataTables_paginate paging_simple_numbers">
            <ul class="pagination">
                <?php if (!empty($_smarty_tpl->tpl_vars['showpage']->value)) {?>
                <li id="page-first" class="paginate_button previous" aria-controls="editable" tabindex="0">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/power/ajaxAdminList/1">首页</a>
                </li>
                <?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>

                <li id="page-last" class="paginate_button next" aria-controls="editable" tabindex="0">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/power/ajaxAdminList/<?php echo $_smarty_tpl->tpl_vars['last_page']->value;?>
">尾页</a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>


<?php echo '<script'; ?>
 type="text/javascript">
$(function(){
    // 显示从1到10项，共xx项
    var start = $("#ajaxAdminList table tbody tr:first").find('.key_id').html();
    var end = $("#ajaxAdminList table tbody tr:last").find('.key_id').html();
    $("#page-div .start").html(start);
    $("#page-div .end").html(end);

    // 首页、尾页 url
    // var first_url = $("#page-first").next('li').children('a').attr('href');
    // var last_url = $("#page-last").prev('li').children('a').attr('href');
    // $("#page-first a").attr('href',first_url);
    // $("#page-last a").attr('href',last_url);

    var time = $("#adminList").find("input[name='time']").val();
    // 上一页下一页改为post
    $("#page-div .paginate_button").click(function (event) {
        if($(this).hasClass('active')) return false;
        var url = $(this).children('a').attr('href');
        posth(url,null,function (r) {
            $('#ajaxAdminList').html(r);
        });
        // return false;
        event.preventDefault();
    });

    // 获取编辑管理员
    $("#ajaxAdminList .admin-edit").click(function(){
        var url = module + '/power/getAdminInfo';
        var admin_id = $(this).parent('td').parent('tr').find('td:first').attr('tmp-id');
        post(url,{id:admin_id},function(r){
            $("#modal-form-edit").find("input[name='real_name']").val(r.real_name);
            $("#modal-form-edit").find("input[name='account']").val(r.account);
            $("#modal-form-edit").find("input[value='"+r.admin_type+"']").parent().trigger('click');
            $("#modal-form-edit").find("input[name='role_id']").val(r.role_id);
            $("#modal-form-edit").find("input[name='id']").val(r.id);
        });
    });

    // 编辑管理员
    $("#modal-form-edit form").submit(function(e){

        var pass_reg = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/;
        var password = $(this).find('input[name="password"]').val();
        if(!pass_reg.test(password)){
            layer.msg('密码长度为6~16位，且须同时包含数字及字母');
            return false;
        }
        
        submitAjax($(this),function(res){
            if(res.success){
                $('.close').trigger('click');
                layer.msg(res.msg,{
                    icon: 1,
                    time: 2000 //2秒关闭（如果不配置，默认是3秒）},function(){
                },function(){
                    getAdminList();
                });
            }
        });
        return false;
    });

    // 删除管理员
    $("#ajaxAdminList .admin-delete").click(function(){
        var $this = $(this);
        layer.prompt({title: '输入管理员密码口令，并确认', formType: 1}, function(pass, index){
            layer.close(index);
            post(module+'/power/verifyPass',{pass:pass},function(checkres){
                if(checkres.success==true){
                    var url = module + '/power/ajaxDelAdmin';
                    var admin_id = $this.parent('td').parent('tr').find('td:first').attr('tmp-id');
                    ajaxStatus = true;
                    post(url,{id:admin_id},function(res){
                        res.success && $('.close').trigger('click');
                        layer.msg(res.msg,{icon:1},function(){
                            getAdminList();
                        });
                    })
                }else{
                    layer.msg(checkres.msg,{icon:2});
                }
            });
        });
        
    });
        
})

<?php echo '</script'; ?>
>



<?php }
}
