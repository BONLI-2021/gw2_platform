<?php
/* Smarty version 3.1.29, created on 2021-03-08 17:15:16
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/category/cate-table.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045eb24ab4c84_74934379',
  'file_dependency' => 
  array (
    'f0d2c1dc970499e685b6a39a72a90d3abccc80a7' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/category/cate-table.html',
      1 => 1615194511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6045eb24ab4c84_74934379 ($_smarty_tpl) {
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="3%">#</th>
            <th width="10%">分类名称</th>
            <!-- <th width="5%">排序</th> -->
            <th width="5%">是否显示</th>
            <th width="5%">操作</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($_smarty_tpl->tpl_vars['catelist']->value)) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['catelist']->value;
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
            <td class="cate_id" tmp-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo 1+$_smarty_tpl->tpl_vars['k']->value;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_name'];?>
</td>
            <!-- <td><?php echo $_smarty_tpl->tpl_vars['v']->value['sort_weight'];?>
</td> -->
            <td> <input type="checkbox" class="js-switch" <?php if ($_smarty_tpl->tpl_vars['v']->value['is_show'] == '1') {?>checked<?php }?> cateid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" /></td>
            <td> <a class="btn btn-xs btn-outline btn-success add-cate"  data-toggle="modal" href="#modal-form-cate" tmp-level="2" tmp-cateid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">添加子分类</a> </td>
        </tr>
            <?php if (!empty($_smarty_tpl->tpl_vars['v']->value['child'])) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['v']->value['child'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v2_1_saved_item = isset($_smarty_tpl->tpl_vars['v2']) ? $_smarty_tpl->tpl_vars['v2'] : false;
$_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v2']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v2']->value) {
$_smarty_tpl->tpl_vars['v2']->_loop = true;
$__foreach_v2_1_saved_local_item = $_smarty_tpl->tpl_vars['v2'];
?>
            <tr>
                <td></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;|— <?php echo $_smarty_tpl->tpl_vars['v2']->value['cate_name'];?>
</td>
                <!-- <td><?php echo $_smarty_tpl->tpl_vars['v2']->value['sort_weight'];?>
</td> -->
                <td>
                    <input type="checkbox" class="js-switch" <?php if ($_smarty_tpl->tpl_vars['v2']->value['is_show'] == '1') {?>checked<?php }?> cateid="<?php echo $_smarty_tpl->tpl_vars['v2']->value['id'];?>
" />
                </td>
                <!-- <td> <a class="btn btn-xs  btn-white del-cate" tmp-level="2" tmp-cateid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">删除</a> </td> -->
            </tr>
            <?php
$_smarty_tpl->tpl_vars['v2'] = $__foreach_v2_1_saved_local_item;
}
if ($__foreach_v2_1_saved_item) {
$_smarty_tpl->tpl_vars['v2'] = $__foreach_v2_1_saved_item;
}
?>
            <?php }?>
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
        <tr class="no-records-found" style="text-align: center;">
            <td colspan="4">没有找到匹配的记录</td>
        </tr>
        <?php }?>
    </tbody>
</table>


<div id="modal-form-cate" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-11">
                        <div class="m-b-md">
                            <h2>完善子分类信息</h2>
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
                                <form class="form-horizontal m-t" action="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/category/ajaxAdd">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">分类名称：</label>
                                        <div class="col-sm-8">
                                            <input name="cate_name" class="form-control" type="text" aria-required="true" required aria-invalid="true" class="error" />
                                            <input name="pid" class="form-control" type="hidden" value="" />
                                            <input name="level" class="form-control" type="hidden" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-3">
                                            <button class="btn btn-primary" type="submit">提交</button>
                                            <button class="hidden reset-btn" type="reset"></button>
                                            <button class="btn btn-error" type="reset" data-dismiss="modal">取消</button>
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

<?php echo '<script'; ?>
 type="text/javascript">

$(function(){
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        var switchery = new Switchery(html,{ size:'small' });
        html.onchange = function() {
            var cateid = html.attributes.cateid.nodeValue;
            ajaxStatus = true;
            post(module+'/category/ajaxUpdate',{id:cateid,is_show:html.checked},function(res){
                if(res.retcode==1){
                    layer.msg(res.msg,{icon:1,time:800});
                }else{
                    layer.msg(res.msg,{icon:2,time:800});
                }
            });
        };
    });


   




    // 添加分类1
    $(".add-cate").click(function(){
        var level = $(this).attr('tmp-level');
        var cateid = $(this).attr('tmp-cateid');
        $("#modal-form-cate input[name='level']").val(level);
        $("#modal-form-cate input[name='pid']").val(cateid);
    });
    // 添加分类2
    $('#modal-form-cate form').submit(function () {
        $("#modal-form-cate .close").trigger('click');
        submitAjax($(this),function(res){
            if(res.retcode==1){
                layer.msg(res.msg,{icon:1,time:800},function(){
                    getCateList();
                });
            }else{
                layer.msg(res.msg,{icon:2,time:800});
            }
        });
        return false;
    });

    // 删除分类
    $(".del-cate").click(function(){
        var cid = $(this).attr('tmp-cateid');

        layer.confirm('你确定要删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            post(module+'/category/ajaxDel',{id:cid},function(res){
                if(res.retcode==1){
                    layer.msg(res.msg,{icon:1,time:800},function(){
                        getCateList();
                    });
                }else{
                    layer.msg(res.msg,{icon:2,time:800});
                }
            });
        }, function(){
            
        });
    });
})



<?php echo '</script'; ?>
>



<?php }
}
