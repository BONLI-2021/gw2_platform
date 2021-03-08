<?php
/* Smarty version 3.1.29, created on 2021-03-08 15:03:44
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/goods/index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045cc50ea9bb9_80170339',
  'file_dependency' => 
  array (
    '6a5511de837b27bef950d00e25ce48516c9078d1' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/goods/index.html',
      1 => 1615172106,
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
function content_6045cc50ea9bb9_80170339 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '4433526376045cc50e70035_39901473';
?>
<!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/plugins/switchery/switchery.css">
<link href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/plugins/select2/select2.min.css" rel="stylesheet" />
</head>
<style type="text/css">
.input-order{padding: 5px 10px;width: 60px;text-align: center;border:0;}
.order-on{border:1px solid #18A689;background: #afd3cb;}
.order-off{border:0px;background: #fff;}
</style>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/navbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <br>
            <div class="row" id="content-main">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="min-height:94px">
                            <h5>商品列表</h5>
                            <iframe id="send-ifile" style="display:none"></iframe>
                            <iframe id="ifile" style="display:none"></iframe>
                            <form id="down-goods-form" action="javascript:;" method="post" class="col-sm-12">
                                <div class="col-sm-2">
                                    <select class="form-control m-b js-select2" name="vendor_id" tmp-msg="请选择供应商">
                                        <option value="">- 所属供应商 -</option>
                                        <?php
$_from = $_smarty_tpl->tpl_vars['vendorlist']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_ve_0_saved_item = isset($_smarty_tpl->tpl_vars['ve']) ? $_smarty_tpl->tpl_vars['ve'] : false;
$_smarty_tpl->tpl_vars['ve'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['ve']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ve']->value) {
$_smarty_tpl->tpl_vars['ve']->_loop = true;
$__foreach_ve_0_saved_local_item = $_smarty_tpl->tpl_vars['ve'];
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['ve']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ve']->value['vendor_name'];?>
</option>
                                        <?php
$_smarty_tpl->tpl_vars['ve'] = $__foreach_ve_0_saved_local_item;
}
if ($__foreach_ve_0_saved_item) {
$_smarty_tpl->tpl_vars['ve'] = $__foreach_ve_0_saved_item;
}
?>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <div class="input-group m-b">
                                        <div class="input-group-btn">
                                            <button class="btn btn-white dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false"><span>商品状态</span><span class="caret"></span></button>
                                            <ul id="goods-status-menu" class="dropdown-menu min-w50">
                                                <li tmp-type="is_up" tmp-value="1"><a href="javascript:;">上架</a></li>
                                                <li tmp-type="is_up" tmp-value="0"><a href="javascript:;">下架</a></li>
                                                <li tmp-type="" tmp-value=""><a href="javascript:;">清除筛选</a></li>
                                                <div class="hidden g_status_ajax"></div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 ml20">
                                    <div class="input-group m-b">
                                        <div class="input-group-btn">
                                            <button class="btn btn-white dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">关键词<span class="caret"></span></button>
                                            <ul class="dropdown-menu search-menu">
                                                <li class="active" tmp-type="goods_name" tmp-name="商品名"><a href="javascript:;">按商品名查询</a></li>
                                                <li class="" tmp-type="goods_code" tmp-name="商品编码"><a href="javascript:;">按商品编码查询</a></li>
                                            </ul>
                                        </div>
                                        <input class="form-control" name="content" type="text" placeholder="请输入商品名" value="<?php if (isset($_SESSION['options']['search_val'])) {
echo $_SESSION['options']['search_val'];
}?>">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary search-btn" type="button">搜索 </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-1 ">
                                    <div class="input-group m-b">
                                        <span class="input-group-btn">
                                            <button class="btn btn-error" type="reset">重置</button>
                                        </span>
                                    </div>
                                </div>
                                 <div class="col-sm-1">
                                    <button class="btn btn-success export-excel" type="submit">
                                    <i class="fa fa-download"></i>
                                    <span class="bold">导出</span>
                                    </button>
                                    <button id="load-btn" class="btn btn-default hidden" type="submit"><img src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/images/admin/loading.gif"/>  玩命加载中</button>
                                </div>
                            </form>
                        </div>
                        <div id="ajaxGoodsList" class="ibox-content"></div>
                    </div>
                </div>
            </div>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/switchery/switchery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/chosen/chosen.jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/select2/select2.min.js"><?php echo '</script'; ?>
>

        <!--右侧部分结束-->
    </div>
</body>
<?php echo '<script'; ?>
 type="text/javascript">

$(function(){

    $('.js-select2').select2();
    // 初始化列表
    getGoodsList();


    $("#down-goods-form .search-menu li").click(function(){
        $(this).parent().find('li').removeClass('active');
        $(this).addClass('active');

        var search_key = $(this).attr('tmp-type');
        var search_name = $(this).attr('tmp-name');
        $("#down-goods-form input[name='content']").attr('placeholder','请输入'+search_name);
        console.log(search_key);
    });
    

    // 搜索
    $("#down-goods-form .search-btn").click(function(){
        getGoodsList();
    });
   
    // 重置
    $("#down-goods-form button[type='reset']").click(function(){
        $('#goods-status-menu').siblings('button').find('span:first').html('商品状态');
        $("#goods-status-menu .g_status_ajax").html('<input type="text" name="status" value=""/><input type="text" name="value" value="">');
        $("#down-goods-form .search-menu li").removeClass('active');
        $("#down-goods-form .search-menu li:first").trigger('click');
        $("#down-goods-form input[name='content']").val('');
        $(".js-select2").select2("val", "");
        get(module+'/goods/goodsClear',function(){
            window.location.reload();
        });
    })

    // 状态
    $("#goods-status-menu li").click(function(){
        // 改变显示状态
        $(this).parents('ul').find('.active').removeClass('active');
        $(this).addClass('active');
        
        var status_name = $(this).attr('tmp-type');
        var status_value = $(this).attr('tmp-value');

        if(status_name!='undefined' && status_name!=''){
            var s_menu = $(this).find('a').html();
        }else{
            var s_menu = '商品状态';
        }
        $(this).parents('ul').siblings('button').find('span:first').html(s_menu);

        $("#goods-status-menu .g_status_ajax").html('<input type="text" name="status" value="'+status_name+'"/><input type="text" name="value" value="'+status_value+'">');
        
        getGoodsList();
    });


    // 导出
    $("#down-goods-form").submit(function(){
        var search_key = $("#down-goods-form .search-menu .active").attr('tmp-type');
        var search_val = $("#down-goods-form input[name='content']").val();
        // 状态
        var status_n = $("#goods-status-menu .g_status_ajax").find("input[name='status']").val();
        var status_v = $("#goods-status-menu .g_status_ajax").find("input[name='value']").val();
        if(status_n=='undefined' || status_n=='') o_status_n = null;
        if(status_v=='undefined' || status_v=='') o_status_v = null;

        var vendor_id = $('.js-select2').select2("val");

        var url = module + '/goods/exportGoodsExcel';
        mask = false;
        $.ajax({
            async:false,
            type:'POST',
            data:{search_key:search_key,search_val:search_val,status_n:status_n,status_v:status_v,vendor_id:vendor_id},
            url:url,
            beforeSend : function(XMLHttpRequest){
                // 发送请求前
                $("#load-btn").removeClass('hidden');
                $(".export-excel").addClass('hidden');
                loading = layer.msg('正在导出中, 请稍等', {  //通过layer插件来进行提示正在加载
                    icon: 16,
                    shade: [0.5,'#000']
                });
            },
            complete : function(XMLHttpRequest, r){
                // 请求完成后回调函数
                layer.close(loading);
                $("#load-btn").addClass('hidden');
                $(".export-excel").removeClass('hidden');
            },
            success : function(res){
                if(res.success==true){
                    $("#ifile").attr('src',res.data);
                    mask = true;
                }else{
                    mask = false;
                    toastr.error(res.msg);
                    // layer.msg(res.msg,{icon:2});
                }

            },
            error : function(){
                mark = false;
            }
        });
        return false;
    })
    
    

});

// 获取订单列表
function getGoodsList(url=null){
    var search_key = $("#down-goods-form .search-menu .active").attr('tmp-type');
    var search_val = $("#down-goods-form input[name='content']").val();
    // 状态
    var status_n = $("#goods-status-menu .g_status_ajax").find("input[name='status']").val();
    var status_v = $("#goods-status-menu .g_status_ajax").find("input[name='value']").val();
    if(status_n=='undefined' || status_n=='') o_status_n = null;
    if(status_v=='undefined' || status_v=='') o_status_v = null;

    var vendor_id = $('.js-select2').select2("val");

    if(url==null) url = module + '/goods/ajaxGoodsList';

    posth(url,{search_key:search_key,search_val:search_val,status_n:status_n,status_v:status_v,vendor_id:vendor_id},function(res){
        $("#ajaxGoodsList").html(res);
    });
}

<?php echo '</script'; ?>
>
</html>
<?php }
}
