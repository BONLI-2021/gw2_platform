<?php
/* Smarty version 3.1.29, created on 2021-03-09 13:26:40
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/user/shopping-table.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_60470710711979_20137022',
  'file_dependency' => 
  array (
    '52b2bfac9c9ee260ffe60ae2725e351fb7255d02' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/user/shopping-table.html',
      1 => 1615194511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60470710711979_20137022 ($_smarty_tpl) {
?>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th class="col-sm-2">账号</th>
            <th class="col-sm-2">时间</th>
            <th class="col-sm-1">类型</th>
            <th class="col-sm-1">金额</th>
            <th class="col-sm-2">操作账号</th>
            <th class="col-sm-3">操作原因</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($_smarty_tpl->tpl_vars['shoppinglist']->value)) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['shoppinglist']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_s_0_saved_item = isset($_smarty_tpl->tpl_vars['s']) ? $_smarty_tpl->tpl_vars['s'] : false;
$__foreach_s_0_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['s'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['s']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
$__foreach_s_0_saved_local_item = $_smarty_tpl->tpl_vars['s'];
?>
        <tr tmp-k="<?php echo $_smarty_tpl->tpl_vars['k']->value+1+$_smarty_tpl->tpl_vars['offset']->value;?>
">
            <td tmp-id="<?php echo $_smarty_tpl->tpl_vars['s']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['offset']->value+1+$_smarty_tpl->tpl_vars['k']->value;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['s']->value['account'];?>
</td>
            <td><?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['s']->value['add_time']);?>
</td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['s']->value['deal_type'] == 1) {?>
                    <span class="text-navy">充值</span>
                <?php } elseif ($_smarty_tpl->tpl_vars['s']->value['deal_type'] == 2) {?>
                    <span class="text-warning">扣减</span>
                <?php } elseif ($_smarty_tpl->tpl_vars['s']->value['deal_type'] == 3) {?>
                    <span class="text-success">消费</span>
                <?php } else { ?>
                    <span class="text-danger">退回</span>
                <?php }?>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['s']->value['deal_amount'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['s']->value['admin_account'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['s']->value['explain'];?>
</td>
        </tr>
        <?php
$_smarty_tpl->tpl_vars['s'] = $__foreach_s_0_saved_local_item;
}
if ($__foreach_s_0_saved_item) {
$_smarty_tpl->tpl_vars['s'] = $__foreach_s_0_saved_item;
}
if ($__foreach_s_0_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_s_0_saved_key;
}
?>
        <?php } else { ?>
        <tr class="no-records-found t-align">
            <td colspan="7">没有找到匹配的记录</td>
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
/user/ajaxShoppingList/1">首页</a>
                </li>
                <?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>

                <li id="page-last" class="paginate_button next" aria-controls="editable" tabindex="0">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/user/ajaxShoppingList/<?php echo $_smarty_tpl->tpl_vars['last_page']->value;?>
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
    var start = $("#ajaxShoppingList table tbody tr:first").attr('tmp-k');
    var end = $("#ajaxShoppingList table tbody tr:last").attr('tmp-k');
    $("#page-div .start").html(start);
    $("#page-div .end").html(end);

    // 上一页下一页改为post
    $("#page-div .paginate_button").click(function (event) {
        var url = $(this).children('a').attr('href');
        var type = $("select[name='type']").val();
        var id = $("input[name='id']").val();
        posth(url,{type:type,id:id},function(res){
            $("#ajaxShoppingList").html(res);
        })
        event.preventDefault();
    });
})
<?php echo '</script'; ?>
><?php }
}
