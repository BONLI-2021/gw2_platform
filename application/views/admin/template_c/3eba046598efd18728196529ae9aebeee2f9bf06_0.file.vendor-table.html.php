<?php
/* Smarty version 3.1.29, created on 2021-03-08 17:25:46
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/vendor/vendor-table.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045ed9a160c89_86963006',
  'file_dependency' => 
  array (
    '3eba046598efd18728196529ae9aebeee2f9bf06' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/vendor/vendor-table.html',
      1 => 1615194511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6045ed9a160c89_86963006 ($_smarty_tpl) {
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>供应商名称</th>
            <th>联系人姓名</th>
            <th>电话</th>
            <th>创建时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
    </thead>
    <?php if (!empty($_smarty_tpl->tpl_vars['vendorlist']->value)) {?>
    <tbody>
    <?php
$_from = $_smarty_tpl->tpl_vars['vendorlist']->value;
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
"><?php echo $_smarty_tpl->tpl_vars['k']->value+1+$_smarty_tpl->tpl_vars['offset']->value;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['vendor_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['contactor'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['phone'];?>
</td>
            <td><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['v']->value['add_time']);?>
</td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['state'] == '1') {?><label class="label label-success">正常</label><?php } else { ?><label class="label label-danger">失效</label><?php }?>
            </td>
            <td>
                <a data-toggle="modal" class="btn btn-xs btn-outline btn-primary vendor-edit" href="#modal-form-editVendor">编辑</a>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['state'] == '1') {?>
                    <a class="btn btn-xs btn-outline btn-warning vendor-change" href="JavaScript:;" tmp-state=0>禁用</a>
                <?php } else { ?>
                    <a class="btn btn-xs btn-outline btn-danger vendor-change" href="JavaScript:;" tmp-state=1>恢复</a>
                <?php }?>
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
/vendor/ajaxVendorList/1">首页</a>
                </li>
                <?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>

                <li id="page-last" class="paginate_button next" aria-controls="editable" tabindex="0">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/vendor/ajaxVendorList/<?php echo $_smarty_tpl->tpl_vars['last_page']->value;?>
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
    var start = $("#ajaxVendorList table tbody tr:first").find('.key_id').html();
    var end = $("#ajaxVendorList table tbody tr:last").find('.key_id').html();
    $("#page-div .start").html(start);
    $("#page-div .end").html(end);

    // 上一页下一页改为post
    $("#page-div .paginate_button").click(function (event) {
        var url = $(this).children('a').attr('href');
        options = getOptions();
        posth(url,{options:options},function(r){
            $("#ajaxVendorList").html(r);
        });
        // return false;
        event.preventDefault();
    });
    // 禁用供应商
    $("#ajaxVendorList .vendor-change").click(function(){
        var url = module + '/vendor/ajaxChangeVendorStatus';
        var vendor_id = $(this).parent('td').parent('tr').find('td:first').attr('tmp-id');
        var state = $(this).attr('tmp-state');
        $this = $(this);
        post(url,{id:vendor_id,state:state},function(r){
            if(r.retcode==true){
                toastr.success(r.msg);
                getVendorList();
            }else{
                toastr.error(r.msg);
                getVendorList();
            }
        })
    });

    // 获取编辑分类
    $("#ajaxVendorList .vendor-edit").click(function(){
        $("#modal-form-editVendor").find(".reset-btn").trigger('click');
        $("#modal-form-editVendor").find("input").siblings('span').hide();
        $("#modal-form-editVendor").find(".form-group").removeClass('has-error');
        var url = module + '/vendor/getVendorInfo';
        var vendor_id = $(this).parents('tr').find('td:first').attr('tmp-id');
        post(url,{id:vendor_id},function(res){
            if(res.retcode==true){
                var r = res.data;
                $("#modal-form-editVendor").find("input[name='id']").val(r.id);
                $("#modal-form-editVendor").find("input[name='vendor_name']").val(r.vendor_name);
                $("#modal-form-editVendor").find("input[name='contactor']").val(r.contactor);
                $("#modal-form-editVendor").find("input[name='phone']").val(r.phone);
            }else{
                toastr.error(res.msg);
            }
        });
    });

})
<?php echo '</script'; ?>
>



<?php }
}
