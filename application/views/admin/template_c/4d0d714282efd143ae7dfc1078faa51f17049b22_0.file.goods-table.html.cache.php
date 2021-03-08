<?php
/* Smarty version 3.1.29, created on 2021-03-08 15:32:45
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/goods/goods-table.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045d31de87b70_56248623',
  'file_dependency' => 
  array (
    '4d0d714282efd143ae7dfc1078faa51f17049b22' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/goods/goods-table.html',
      1 => 1615172106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6045d31de87b70_56248623 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '335234196045d31ddfb614_22274062';
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="3%">编码</th>
            <th width="3%">缩略图</th>
            <th width="18%">商品名称</th>
            <th width="10%">所属供应商</th>
            <th width="10%">所属分类</th>
            <th width="6%">供货价</th>
            <th width="5%">剩余库存</th>
            <th width="5%">销量</th>
            <th width="5%">是否上架</th>
            <th width="5%">操作</th>
        </tr>
    </thead>
    <tbody>
    	<?php if (!empty($_smarty_tpl->tpl_vars['goodslist']->value)) {?>
    	<?php
$_from = $_smarty_tpl->tpl_vars['goodslist']->value;
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
            <td class="goods_id" tmp-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display: none"><?php echo $_smarty_tpl->tpl_vars['offset']->value+1+$_smarty_tpl->tpl_vars['k']->value;?>
</td>
            <td class="goods_code" tmp-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['goods_code'];?>
</td>
            <td><img width="50" src="<?php echo PIC_T_URL;
echo PIC211X211;?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['thumb_pic'];?>
"/></td>
            <td class="goods_name"><?php echo $_smarty_tpl->tpl_vars['v']->value['goods_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['vendor_name'];?>
</td>
            <td><a href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_one_name'];?>
</a> / <a href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_two_name'];?>
</a></td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['min_price'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['total_stock'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['total_sales'];?>
</td>
            <td><input type="checkbox" class="js-switch" <?php if ($_smarty_tpl->tpl_vars['v']->value['is_up'] == '1') {?>checked<?php }?> goodsid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" /></td>
            <td>
                <a class="btn btn-xs btn-outline btn-success goods-details-btn" href="javascript:;">查询</a>
                <a class="btn btn-xs btn-outline btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/goods/goodsEdit/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">编辑</a>
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
       	<tr class="no-records-found" style="text-align: center;">
			<td colspan="10">没有找到匹配的记录</td>
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
            <?php if (!empty($_smarty_tpl->tpl_vars['showpage']->value)) {?>
            <ul class="pagination">
            	<li id="page-first" class="paginate_button previous" aria-controls="editable" tabindex="0">
                	<a href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/goods/ajaxGoodsList/1">首页</a>
                </li>
				<?php echo $_smarty_tpl->tpl_vars['showpage']->value;?>

				<li id="page-last" class="paginate_button next" aria-controls="editable" tabindex="0">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/goods/ajaxGoodsList/<?php echo $_smarty_tpl->tpl_vars['last_page']->value;?>
">尾页</a>
                </li>
            </ul>
            <?php }?>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">

$(function(){
    // 初始化是否可以排序
    if($("#edit-order-btn").attr('tmp-mark')=='true'){
        $(".th-order,.td-order").removeClass('hidden');
    }
	// 显示从1到10项，共xx项
	var start = $("#ajaxGoodsList table tbody tr:first").find('.goods_id').html();
	var end = $("#ajaxGoodsList table tbody tr:last").find('.goods_id').html();
	$("#page-div .start").html(start);
	$("#page-div .end").html(end);

	// 首页、尾页 url
	var first_url = $("#page-first").children('a').attr('href');
	var last_url = $("#page-last").children('a').attr('href');
	$("#page-first a").attr('href',first_url);
	$("#page-last a").attr('href',last_url);

	// 上一页下一页改为post
	$("#page-div .paginate_button").click(function (event) {
	    var url = $(this).children('a').attr('href');
	    $.post(url,function (r) {
	        $('#ajaxGoodsList').html(r);
	    });
	    // return false;
	    event.preventDefault();
	});

    $(".goods-details-btn").click(function(){
        var goods_name = $(this).parents('tr').find('.goods_name').html();
        var goods_id = $(this).parents('tr').find('.goods_id').attr('tmp-id');
        var h = document.body.clientHeight;

        layer.open({
            type: 2,
            title: '你正在查看'+goods_name+'的详细信息。',
            shadeClose: true,
            shade: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['1003px', h-50+'px'],
            content: module+'/goods/getGoodsDetail?id='+goods_id+'&_t='+ (new Date()).valueOf()
        });
    });


    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        var switchery = new Switchery(html,{ size:'small' });
        html.onchange = function() {
            var goodsid = html.attributes.goodsid.nodeValue;
            ajaxStatus = true;
            post(module+'/goods/ajaxUpdateIsUp',{id:goodsid,is_up:html.checked},function(res){
                if(res.retcode==1){
                    layer.msg(res.msg,{icon:1,time:800});
                }else{
                    layer.msg(res.msg,{icon:2,time:800});
                }
            });
        };
    });

})



<?php echo '</script'; ?>
>



<?php }
}
