<?php
/* Smarty version 3.1.29, created on 2021-03-09 09:28:35
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/banner/banner-table.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6046cf434bc734_45373828',
  'file_dependency' => 
  array (
    '20235a4a3caaae8ad7a45f817a711c6698d82bf4' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/banner/banner-table.html',
      1 => 1615194511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6046cf434bc734_45373828 ($_smarty_tpl) {
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>路径URL</th>
            <th>链接Href</th>
            <th>排序</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <?php if (!empty($_smarty_tpl->tpl_vars['bannerlist']->value)) {?>
    <tbody>
    <?php
$_from = $_smarty_tpl->tpl_vars['bannerlist']->value;
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
            <td class="key_id" tmp-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['k']->value+1+$_smarty_tpl->tpl_vars['offset']->value;?>
</td>
            <td><img width="20" src="<?php echo PIC_O_URL;
echo $_smarty_tpl->tpl_vars['v']->value['image_path'];?>
">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value['image_path'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['image_href'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['sort_weight'];?>
</td>
            <td><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['v']->value['add_time']);?>
</td>
            <td>
                <a data-toggle="modal" class="btn btn-xs btn-outline btn-primary banner-edit" href="#modal-form-editBanner">编辑</a>
                <a class="btn btn-xs btn-outline btn-danger banner-del" href="JavaScript:;">删除</a>
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
    <?php }?>
    </tbody>
</table>

<div id="page-div" class="row">
    <div class="col-sm-6">
        <div id="editable_info" class="dataTables_info" role="alert" aria-live="polite" aria-relevant="all">显示 <span class="start">1</span> 到 <span class="end">10</span> 项，共 <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 项</div>
    </div>
    <div class="col-sm-6">
        <div id="editable_paginate" class="dataTables_paginate paging_simple_numbers">
            <ul class="pagination">
                <?php if (!empty($_smarty_tpl->tpl_vars['showpage']->value)) {?>
                <li id="page-first" class="paginate_button previous" aria-controls="editable" tabindex="0">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/banner/ajaxBannerList/1">首页</a>
                </li>
                <?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>

                <li id="page-last" class="paginate_button next" aria-controls="editable" tabindex="0">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/banner/ajaxBannerList/<?php echo $_smarty_tpl->tpl_vars['last_page']->value;?>
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
    var start = $("#ajaxBannerList table tbody tr:first").find('.key_id').html();
    var end = $("#ajaxBannerList table tbody tr:last").find('.key_id').html();
    $("#page-div .start").html(start);
    $("#page-div .end").html(end);

    // 上一页下一页改为post
    $("#page-div .paginate_button").click(function (event) {
        var url = $(this).children('a').attr('href');
        posth(url,null,function (r) {
            $('#ajaxBannerList').html(r);
        });
        // return false;
        event.preventDefault();
    });
    // 禁用Banner
    $("#ajaxBannerList .banner-del").click(function(){
        var url = module + '/banner/ajaxDelBanner';
        var banner_id = $(this).parent('td').parent('tr').find('td:first').attr('tmp-id');
        $this = $(this);
        post(url,{id:banner_id},function(r){
            if(r.retcode==1){
                layer.msg(r.msg,{icon:1,time:800},function(){
                    getBannerList();
                });
            }else{
                layer.msg(r.msg,{icon:2,time:1000},function(){
                    getBannerList();
                });
            }
        })
    });


    // 获取编辑banner
    $("#ajaxBannerList .banner-edit").click(function(){
        $("#modal-form-editBanner").find(".reset-btn").trigger('click');
        $("#modal-form-editBanner").find("input,select").siblings('span').hide();
        $("#modal-form-editBanner").find(".form-group").removeClass('has-error');
        var url = module + '/banner/getBannerInfo';
        var banner_id = $(this).parents('tr').find('td:first').attr('tmp-id');
        post(url,{id:banner_id},function(r){
            $("#modal-form-editBanner").find("input[name='id']").val(r.id);
            $("#modal-form-editBanner").find(".my-thumbnail img").attr('src',"<?php echo PIC_O_URL;?>
"+r.image_path);
            $("#modal-form-editBanner").find("input[name='image_path']").val(r.image_path);
            $("#modal-form-editBanner").find("input[name='image_href']").val(r.image_href);
            $("#modal-form-editBanner").find("input[name='sort_weight']").val(r.sort_weight);
            var st = $("#modal-form-editBanner").find("input[name='is_top']");
            if(r.is_top==1){
                st.attr('checked','checked');
            }else{
                st.removeAttr('checked');
            }
        });
    });

})
<?php echo '</script'; ?>
>



<?php }
}
