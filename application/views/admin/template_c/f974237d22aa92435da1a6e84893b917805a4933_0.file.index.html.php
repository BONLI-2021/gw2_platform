<?php
/* Smarty version 3.1.29, created on 2021-03-08 17:15:15
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/category/index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045eb23916904_48198625',
  'file_dependency' => 
  array (
    'f974237d22aa92435da1a6e84893b917805a4933' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/category/index.html',
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
function content_6045eb23916904_48198625 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/plugins/switchery/switchery.css">
</head>
<style type="text/css">
.input-order{padding: 5px 10px;width: 60px;text-align: center;border:0;}
.order-on{border:1px solid #18A689;background: #afd3cb;}
.order-off{border:0px;background: #fff;}
</style>
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
                <div class="col-sm-10">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="min-height:94px">
                            <h5>分类列表</h5>
                            <form id="down-cate-form" action="javascript:;" method="post" class="col-sm-12">
                                
                                

                                <div class="col-sm-2" style="float: right;">
                                    <div class="input-group m-b">
                                        <span class="input-group-btn">
                                            <a class="btn btn-success add-cate"  data-toggle="modal" href="#modal-form-cate" tmp-level="1" tmp-cateid="0">添加一级分类</a>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="ajaxCateList" class="ibox-content"></div>
                    </div>
                </div>
            </div>
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>
        <!--右侧部分结束-->
    </div>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/switchery/switchery.js"><?php echo '</script'; ?>
>
</body>
<?php echo '<script'; ?>
 type="text/javascript">
    
$(function(){

    // 初始化列表
    getCateList();

   
    
    


})

// 获取订单列表
function getCateList(url=null){
    var search_val = $("#down-cate-form input[name='content']").val();
    // 状态
    var status_n = $("#cate-status-menu .c_status_ajax").find("input[name='status']").val();
    var status_v = $("#cate-status-menu .c_status_ajax").find("input[name='value']").val();
    if(status_n=='undefined' || status_n=='') o_status_n = null;
    if(status_v=='undefined' || status_v=='') o_status_v = null;
   
    if(url==null) url = module + '/category/ajaxCateList';

    posth(url,{search_val:search_val,status_n:status_n,status_v:status_v},function(res){
        $("#ajaxCateList").html(res);
    });
}

<?php echo '</script'; ?>
>
</html>
<?php }
}
