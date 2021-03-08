<?php
/* Smarty version 3.1.29, created on 2021-03-08 16:02:55
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/goods/goods-details.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045da2f9d4bb2_12070184',
  'file_dependency' => 
  array (
    '8954d27cee0b399464d28fd04e53b3f5b2c29497' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/goods/goods-details.html',
      1 => 1615190568,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.html' => 1,
    'file:public/footer.html' => 1,
  ),
),false)) {
function content_6045da2f9d4bb2_12070184 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/goodsadd.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/lyne-up-pic.css">
</head>
<style type="text/css">
ul li{list-style-type:none}
</style>
<body>
<div class="gray-bg dashbard-1">
    <div id="content-main"  class="wrapper wrapper-content" style="height:calc(100% - 105px);">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>商品基础资料</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>商品名</label>
                                        <span class="form-control"><?php echo $_smarty_tpl->tpl_vars['details']->value['goods_name'];?>
</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>所属供应商</label>
                                        <span class="form-control"><?php echo $_smarty_tpl->tpl_vars['details']->value['vendor_name'];?>
</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>商品分类</label>
                                        <span class="form-control"><?php echo $_smarty_tpl->tpl_vars['details']->value['cate_one_name'];?>
 / <?php echo $_smarty_tpl->tpl_vars['details']->value['cate_two_name'];?>
</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                               
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>供货价</label>
                                        <span class="form-control"><?php echo $_smarty_tpl->tpl_vars['details']->value['price'];?>
</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>剩余库存</label>
                                        <span class="form-control"><?php echo $_smarty_tpl->tpl_vars['details']->value['stock'];?>
</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>商品主图</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-10">
                                <?php if ($_smarty_tpl->tpl_vars['details']->value['pic']) {?>
                                <?php
$_from = $_smarty_tpl->tpl_vars['details']->value['pic'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_p_0_saved_item = isset($_smarty_tpl->tpl_vars['p']) ? $_smarty_tpl->tpl_vars['p'] : false;
$_smarty_tpl->tpl_vars['p'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['p']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
$__foreach_p_0_saved_local_item = $_smarty_tpl->tpl_vars['p'];
?>
                                <img src="<?php echo PIC_T_PATH;
echo PIC211X211;?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
">
                                <?php
$_smarty_tpl->tpl_vars['p'] = $__foreach_p_0_saved_local_item;
}
if ($__foreach_p_0_saved_item) {
$_smarty_tpl->tpl_vars['p'] = $__foreach_p_0_saved_item;
}
?>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>商品详情</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php echo $_smarty_tpl->tpl_vars['details']->value['goods_details'];?>

                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
</body>
<?php echo '</script'; ?>
>
</html>
<?php }
}
