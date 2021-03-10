<?php
/* Smarty version 3.1.29, created on 2021-03-09 09:38:52
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/user/user-table.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6046d1ac066e09_17731885',
  'file_dependency' => 
  array (
    'ab2e00fe9649e94a5c847fb4684717b0d576bec0' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/user/user-table.html',
      1 => 1615253927,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6046d1ac066e09_17731885 ($_smarty_tpl) {
?>
<table class="table table-bordered table-hover" data-click-to-select='true'>
    <thead>
        <tr>
            <th>#</th>
            <th>账号</th>
            <th>用户名</th>
            <th>邮箱</th>
            <th>状态</th>
            <th>总充值金额</th>
            <th>已消费金额</th>
            <th>账户余额</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
    	<?php if (!empty($_smarty_tpl->tpl_vars['userlist']->value)) {?>
    	<?php
$_from = $_smarty_tpl->tpl_vars['userlist']->value;
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
        <tr tmp-k="<?php echo $_smarty_tpl->tpl_vars['k']->value+1+$_smarty_tpl->tpl_vars['offset']->value;?>
">
            <td tmp-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['offset']->value+1+$_smarty_tpl->tpl_vars['k']->value;?>
</td>
            <td style="position:relative"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['account'];?>
</span></td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['email'];?>
</td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['state'] == 1) {?>
                    <span class="label label-primary">正常</span>
                <?php } else { ?>
                    <span class="label label-danger">禁用</span>
                <?php }?>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['recharge_amount'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['used_amount'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['balance'];?>
</td>
            <td><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['v']->value['add_time']);?>
</td>
            <td>
                <a data-toggle="modal" class="btn btn-xs btn-outline btn-primary edit-btn" href="#modal-form-edituser">编辑</a>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['state'] == 1) {?>
                    <a class="btn btn-xs btn-danger user-del-btn" tmp-state="0">禁用</a>
                <?php } else { ?>
                    <a class="btn btn-xs btn-primary user-del-btn" tmp-state="1">恢复</a>
                <?php }?>
                <a class="btn btn-xs btn-outline btn-success shoppingDts" href="javascript:void(0);">明细</a><br>

                <?php if ($_smarty_tpl->tpl_vars['v']->value['state'] == '1') {?>
                    <a class="btn btn-xs btn-outline btn-danger recharge-btn" data-toggle="modal" href="#modal-form-recharge">充值</a>
                <?php } else { ?>
                    <a class="btn btn-xs btn-outline btn-default" disabled href="javascript:;">充值</a>
                <?php }?>
                <a class="btn btn-xs btn-outline btn-warning reduce-btn" data-toggle="modal" href="#modal-form-reduce">扣减</a>
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
			<td colspan="11">没有找到匹配的记录</td>
		</tr>
       	<?php }?>
    </tbody>
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
/user/ajaxUserList/1">首页</a>
                </li>
				<?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>

				<li id="page-last" class="paginate_button next" aria-controls="editable" tabindex="0">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/user/ajaxUserList/<?php echo $_smarty_tpl->tpl_vars['last_page']->value;?>
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
	var start = $("#ajaxUserList table tbody tr:first").attr('tmp-k');
	var end = $("#ajaxUserList table tbody tr:last").attr('tmp-k');;
	$("#page-div .start").html(start);
	$("#page-div .end").html(end);

	// 上一页下一页改为post
	$("#page-div .paginate_button").click(function (event) {
        var options = getOptions();
	    var url = $(this).children('a').attr('href');
	    posth(url,{options:options},function(r){
            $('#ajaxUserList').html(r);
        })
	    event.preventDefault();
	});
   
    // 获取编辑用户
    $("#ajaxUserList .edit-btn").click(function(){
        var url = module + '/user/getUserInfo';
        var user_id = $(this).parents('tr').find('td:first').attr('tmp-id');
        post(url,{id:user_id},function(r){
            if(r.retcode===1){
                $("#modal-form-edituser").find("input[name='id']").val(r.data.userinfo.id);
                $("#modal-form-edituser").find("input[name='account']").val(r.data.userinfo.account);
                $("#modal-form-edituser").find("input[name='user_name']").val(r.data.userinfo.user_name);
                $("#modal-form-edituser").find("input[name='email']").val(r.data.userinfo.email);
            }else{
                $("#modal-form-edituser .close").trigger('click');
                toastr.error(r.msg);
            }
        });
    });

    // 禁用用户
    $(".user-del-btn").click(function(){
        var uid = $(this).parents('tr').find('td:first').attr('tmp-id');
        var state = $(this).attr('tmp-state');
        var url = module + '/user/ajaxDelUser';
        layer.confirm('您确定修改该用户状态吗？', {
          btn: ['确定','取消'] //按钮
        }, function(){
            post(url,{id:uid,state:state},function(res){
                if(res.retcode===1){
                    layer.msg(res.msg,{icon:1},function(){
                        getUserList();
                    });
                }else{
                    layer.msg(res.msg,{icon:1});
                }
            });
        }, function(){
            layer.msg('已取消', {icon: 2});
        });
    });

    // 获取充值用户信息
    $("#ajaxUserList .recharge-btn").click(function(){
        $("#modal-form-recharge input").val('');
        $("#modal-form-recharge input").removeAttr('aria-required').removeAttr('aria-invalid').removeAttr('aria-describedby').next('span').remove();
        
        $("#signupForm-recharge").children().each(function(){
            $(this).removeClass('has-error').removeClass('has-success');
        });

        var url = module + '/user/getUserInfo';
        var user_id = $(this).parents('tr').find('td:first').attr('tmp-id');
        post(url,{id:user_id},function(res){
            if(res.retcode===1){
                var r = res.data; 
                $("#modal-form-recharge").find("input[name='id']").val(r.userinfo.id);
                $("#modal-form-recharge").find("input[name='account']").val(r.userinfo.account);
                $("#modal-form-recharge").find("input[name='user_name']").val(r.userinfo.user_name);
                $("#modal-form-recharge").find("input[name='balance']").val(r.userinfo.balance);
                $("#modal-form-recharge").find("input[name='type']").val(1);
            }else{
                layer.msg(res.msg,{icon:2});
            }
        });
    });

    // 获取扣减用户信息
    $("#ajaxUserList .reduce-btn").click(function(){
        $("#modal-form-reduce input").val('');
        $("#modal-form-reduce input").removeAttr('aria-required').removeAttr('aria-invalid').removeAttr('aria-describedby').next('span').remove();
        
        $("#signupForm-reduce").children().each(function(){
            $(this).removeClass('has-error').removeClass('has-success');
        });

        var url = module + '/user/getUserInfo';
        var user_id = $(this).parents('tr').find('td:first').attr('tmp-id');
        post(url,{id:user_id},function(res){
            if(res.retcode===1){
                var r = res.data;
                $("#modal-form-reduce").find("input[name='id']").val(r.userinfo.id);
                $("#modal-form-reduce").find("input[name='account']").val(r.userinfo.account);
                $("#modal-form-reduce").find("input[name='user_name']").val(r.userinfo.user_name);
                $("#modal-form-reduce").find("input[name='balance']").val(r.userinfo.balance);
                $("#modal-form-reduce").find("input[name='type']").val(2);
            }else{
                layer.msg(res.msg,{icon:2});
            }
        });
    });
    
    // 点击
    $('.shoppingDts').click(function(){
        var id = $(this).parents('tr').find('td:first').attr('tmp-id');
        var url = module + '/user/shoppingList/'+id;
        
        layer.open({
            type: 2,
            title: ' 用户消费明细：',
            shadeClose: true,
            shade: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['100%', '100%'],
            content: url,
            end:function(){
                getUserList();
            }
        });
    })
})

<?php echo '</script'; ?>
>



<?php }
}
