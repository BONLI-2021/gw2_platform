<?php
/* Smarty version 3.1.29, created on 2021-03-08 15:00:18
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/order/index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045cb8247df02_20845872',
  'file_dependency' => 
  array (
    '51c830568cb0b6b4ac9880ef7760e055ac35e5b2' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/order/index.html',
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
function content_6045cb8247df02_20845872 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '15642242656045cb82408024_63881307';
?>
<!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/plugins/select2/select2.min.css" rel="stylesheet" />
<link href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/plugins/chosen/chosen.css" rel="stylesheet">

<style type="text/css">
#datepicker2{z-index: 9999}
.dropdown-menu>li>a{padding: 5px;}
</style>
</head>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/navbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <br>
                <div class="row" id="content-main" style="">
                    <div class="col-sm-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" style="min-height:94px">
                                <h5>订单列表</h5>
                                <div class="col-sm-12">
                                    <form id="down-order-form" action="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/order/exportOrderExcel" method="post" tmp-start="<?php echo date('Y-m-01',strtotime('-3 month'));?>
" tmp-end="<?php echo date('Y-m-d',time());?>
">
                                        <div class="col-sm-3">
                                            <div id="datepicker" class="input-daterange input-group input-medium date-picker">
                                                <input class="input-sm form-control" name="start" value="<?php if (isset($_SESSION['options']['start']) && !empty($_SESSION['options']['start'])) {
echo $_SESSION['options']['start'];
} else {
echo date('Y-m-01',strtotime('-3 month'));
}?>" type="text">
                                                <span class="input-group-addon">到</span>
                                                <input class="input-sm form-control" name="end" value="<?php if (isset($_SESSION['options']['end']) && !empty($_SESSION['options']['end'])) {
echo $_SESSION['options']['end'];
} else {
echo date('Y-m-d',time());
}?>" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-1" style="width: 10%;">
                                            <div class="input-group m-b">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-white dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false" style="padding:4px 12px"><span>审核状态</span><span class="caret"></span></button>
                                                    <ul id="order-status-menu" class="dropdown-menu min-w50" style="left:0">
                                                        <li tmp-value="0"><a href="javascript:;">待战区审核</a></li>
                                                        <li tmp-value="1"><a href="javascript:;">战区审核拒绝</a></li>
                                                        <li tmp-value="2"><a href="javascript:;">待总部审核</a></li>
                                                        <li tmp-value="3"><a href="javascript:;">总部审核拒绝</a></li>
                                                        <li tmp-value="4"><a href="javascript:;">审核通过</a></li>
                                                        <li tmp-value="-1"><a href="javascript:;">后台取消</a></li>
                                                        <li tmp-value=""><a href="javascript:;">清除筛选</a></li>
                                                        <div class="hidden status_ajax"></div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1" style="width: 13%;">
                                            <select class="form-control m-b js-example-basic-multiple area-choose" name="area_id" tmp-msg="请选择区域">
                                                <option value="">- 筛选区域 -</option>
                                                <?php
$_from = $_smarty_tpl->tpl_vars['area']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_a_0_saved_item = isset($_smarty_tpl->tpl_vars['a']) ? $_smarty_tpl->tpl_vars['a'] : false;
$_smarty_tpl->tpl_vars['a'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['a']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->_loop = true;
$__foreach_a_0_saved_local_item = $_smarty_tpl->tpl_vars['a'];
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['a']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['area_name'];?>
</option>
                                                <?php
$_smarty_tpl->tpl_vars['a'] = $__foreach_a_0_saved_local_item;
}
if ($__foreach_a_0_saved_item) {
$_smarty_tpl->tpl_vars['a'] = $__foreach_a_0_saved_item;
}
?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="input-group m-b">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-white dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">操作<span class="caret"></span></button>
                                                    <ul class="dropdown-menu search-menu">
                                                        <li tmp-type="p_order_code" tmp-name="订单号"><a href="javascript:;">按订单号查询</a></li>
                                                        <li tmp-type="account" tmp-name="用户手机号"><a href="javascript:;">按用户账号查询</a></li>
                                                    </ul>
                                                </div>
                                                <input class="form-control" name="search_key" type="hidden">
                                                <input class="form-control" name="search_val" type="text" placeholder="请输入订单号/账号">
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
                            </div>
                            <div id="ajaxOrderList" class="ibox-content">
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/chosen/chosen.jquery.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/select2/select2.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/datapicker/bootstrap-datepicker.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 type="text/javascript">

                $(function(){
                    $("#datepicker").datepicker({
                        autoclose:true,
                        clearBtn:false,
                        todayBtn:true,
                        format:"yyyy-mm-dd"
                    });

                    $(document).ready(function() {
                        $('.js-example-basic-multiple').select2();
                    });

                    // 初始化 获取列表
                    getOrderList(true);

                    // 导出
                    $("#down-order-form").submit(function(){
                        var start = $("#datepicker input[name='start']").val();
                        var end = $("#datepicker input[name='end']").val();
                        var search_key = $("#down-order-form input[name='search_key']").val();
                        var search_val = $("#down-order-form input[name='search_val']").val();
                        
                        // 订单状态
                        var review_status = $("#order-status-menu .status_ajax").find("input[name='review_status']").val();
                        if(review_status==='') o_status_v = null;
                     
                        // 区域
                        var area_id = $("select[name='area_id']").val();
                        var url = module + '/order/exportOrderExcel';
                        mask = false;
                        $.ajax({
                            async:false,
                            type:'POST',
                            data:{start:start,end:end,search_key:search_key,search_val:search_val,review_status:review_status,area_id:area_id},
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
                                if(res.retcode==3001){
                                    mark = false;
                                    toastr.info(res.msg);
                                }else{
                                    mark = true
                                }

                            },
                            error : function(){
                                mark = false;
                            }
                        });
                        return mark;
                    })

                    $("#down-order-form .search-menu li").click(function(){
                        $(this).parent().find('li').removeClass('active');
                        $(this).addClass('active');

                        var search_key = $(this).attr('tmp-type');
                        var search_name = $(this).attr('tmp-name');
                        $("#down-order-form input[name='search_key']").val(search_key);
                        $("#down-order-form input[name='search_val']").attr('placeholder','请输入'+search_name);
                    });

                    // 搜索
                    $("#down-order-form .search-btn").click(function(){
                        getOrderList(false);
                    });
                   
                    // 重置
                    $("#down-order-form button[type='reset']").click(function(){
                        $('#order-status-menu').siblings('button').find('span:first').html('审核状态');
                        $('#order-status-menu').find('li').removeClass('active');
                        $("#order-status-menu .status_ajax").html('<input type="text" name="review_status" value="">');

                        $("#down-order-form input[name='search_key']").val('');
                        $("#down-order-form input[name='search_val']").val('');
                        
                        $("#down-order-form .search-menu li").removeClass('active');
                        
                        // 重置区域
                        $("#down-order-form select[name='area_id'] option:first").prop('selected','selected');
                        $("select[name='area_id']").next().find('.select2-selection__rendered').html('- 筛选区域 -');

                        var start = $("#down-order-form").attr('tmp-start');
                        var end = $("#down-order-form").attr('tmp-end');
                        $("#datepicker input[name='start']").val(start);
                        $("#datepicker input[name='end']").val(end);

                        $.get(module+'/order/orderClear');
                        getOrderList(false);
                    })

                    // 选择订单状态
                    $("#order-status-menu li").click(function(){
                        // 改变显示状态
                        $(this).parents('ul').find('.active').removeClass('active');
                        $(this).addClass('active');
                        
                        var status_value = $(this).attr('tmp-value');

                        if(status_value !== ''){
                            var s_menu = $(this).find('a').html();
                        }else{
                            var s_menu = '审核状态';
                        }
                        $(this).parents('ul').siblings('button').find('span:first').html(s_menu);

                        $("#order-status-menu .status_ajax").html('<input type="text" name="review_status" value="'+status_value+'">');
                        
                        getOrderList(false);
                    });

                    // 战区分区选择条件
                    $(".area-choose").on('change',function(){
                        getOrderList(false);
                    });

                })
               
                // 获取订单列表
                function getOrderList(type,url=null){
                    // 订单日期
                    var start = $("#datepicker input[name='start']").val();
                    var end = $("#datepicker input[name='end']").val();

                    // 关键字查询
                    var search_key = $("#down-order-form input[name='search_key']").val();
                    var search_val = $("#down-order-form input[name='search_val']").val();
                    if(search_val != '' && search_key ==''){
                        layer.msg('请先指定关键字类型');
                        return false;
                    }

                    // 订单状态
                    var review_status = $("#order-status-menu .status_ajax").find("input[name='review_status']").val();
                    if(review_status === '') review_status = null;

                    // 区域框
                    var area_id = $("#down-order-form").find("select[name='area_id']").find('option:selected').val();

                    if(url==null){
                        var u = document.location.toString();
                        var current_page = u.split("#/")[1];
                        if(current_page==undefined || current_page=='undefined'){
                            current_page='';
                        }
                        if(type==false){
                            url = u.split("#/")[0];
                            current_page='';
                            window.history.pushState(null, '', url);
                        }
                        url = module + '/order/ajaxOrderList/'+current_page;
                    }

                    posth(url,{start:start,end:end,search_key:search_key,search_val:search_val,review_status:review_status,area_id:area_id},function(res){
                        $("#ajaxOrderList").html(res);
                    });
                }

            <?php echo '</script'; ?>
>
        </div>
        <!--右侧部分结束-->
    </div>

</body>
</html><?php }
}
