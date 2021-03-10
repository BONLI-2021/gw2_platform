<?php
/* Smarty version 3.1.29, created on 2021-03-09 13:26:40
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/user/shopping-list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_604707100ce833_51132487',
  'file_dependency' => 
  array (
    '6d1b16733fa9935b1bd0e1f2a6a8ea82b58b32d1' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/user/shopping-list.html',
      1 => 1615267588,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.html' => 1,
  ),
),false)) {
function content_604707100ce833_51132487 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>
<body>
<div class="ibox float-e-margins">
    <div class="ibox-title" style="min-height:94px">
    <h3>用户消费明细</h3>
    <div class="col-sm-12">
        <div class="col-sm-1">
            <select class="form-control m-b js-example-basic-multiple area-choose" name="type" tmp-msg="请选择类型">
                <option value="">- 筛选类型 -</option>
                <option value="1">充值</option>
                <option value="3">消费</option>
                <option value="2">扣减</option>
                <option value="4">取消退回</option>
            </select>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
        </div>
        <div class="col-sm-1 pull-right">
            <div class="input-group m-b">
                <span class="input-group-btn">
                    <button class="btn btn-primary export-list pull-right" type="button" onclick="exportExcel()">导出</button>
                </span>
            </div>
        </div>
    </div>
    <div id="ajaxShoppingList" class="ibox-content">
    
    </div>
</div>
    
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/jquery.cookie.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/layer/layer.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/toastr/toastr.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/server/ajax.common.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    var index = parent.layer.getFrameIndex(window.name);
    $(".close-iframe").click(function(){
        parent.layer.closeAll();
    })
    getShoppingList();

    $('select[name="type"]').change(function(){
        getShoppingList();
    })
    
    function exportExcel(){
        var id = $('input[name="id"]').val();
        var type = $('select[name="type"]').val();
        var form = $("<form>");
        form.attr('style', 'display:none');
        form.attr('target', '');
        form.attr('method', 'post');
        form.attr('action', module+'/user/exportShoppingLogs');

        var input1 = $('<input>');
        input1.attr('type', 'hidden');
        input1.attr('name', 'id');
        input1.attr('value', id);      /* JSON.stringify($.serializeObject($('#searchForm'))) */

        var input2 = $('<input>');
        input2.attr('type', 'hidden');
        input2.attr('name', 'type');
        input2.attr('value',type);      /* JSON.stringify($.serializeObject($('#searchForm'))) */
        $('body').append(form);
        form.append(input1);
        form.append(input2);
         
        form.submit();
        form.remove();
    }

    function getShoppingList(){
        var type = $("select[name='type']").val();
        var id = $("input[name='id']").val();
        var url = module+'/user/ajaxShoppingList';
        posth(url,{type:type,id:id},function(res){
            $("#ajaxShoppingList").html(res);
            var trlen = $('body .table').find('tbody tr').length;
            if(trlen==1){
                if($('body .table').find('tbody tr').hasClass('no-records-found')){
                    $('body .export-list').removeClass('btn-primary').addClass('btn-default').attr('disabled','disabled');
                }else{
                   $('body .export-list').removeClass('btn-default').addClass('btn-primary').removeAttr('disabled'); 
                }
            }else{
                $('body .export-list').removeClass('btn-default').addClass('btn-primary').removeAttr('disabled'); 
            }
        })
    }

    
    
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
