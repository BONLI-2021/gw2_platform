<?php
/* Smarty version 3.1.29, created on 2021-03-08 14:40:43
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/jump_notice.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045c6ebdc1df6_72309794',
  'file_dependency' => 
  array (
    '6ccdc8491757183c493324081db3b4276cbfc5cb' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/jump_notice.html',
      1 => 1615172106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6045c6ebdc1df6_72309794 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3910864276045c6ebd7af42_07555942';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台 - 跳转提示 </title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/animate.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/style.min.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="middle-box text-center animated fadeInDown">
        <h2 class="font-bold"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h2>
        <!-- <h3 class="font-bold"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h3> -->

        <div class="error-desc">
            <p class="jump">
            页面自动 <a id="href" class="text-primary" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">跳转</a> 等待时间： <b id="wait"><?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
</b>
            </p>
            <br/>？如果无法跳转,您可以点击返回看看
            <br/><a href="javascript:;" onclick="javascript:history.back(-1)" class="btn btn-primary m-t">返回</a>
        </div>
        
    </div>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/bootstrap.min.js?v=3.3.6"><?php echo '</script'; ?>
>
</body>
<?php echo '<script'; ?>
 type="text/javascript">
var href = document.getElementById('href').href
document.onkeydown=function(event){
    location.href = href;
    /*var e = event || window.event || arguments.callee.caller.arguments[0];
    if(e) location.href = href;
    if(e && e.keyCode==27){ // 按 Esc
        location.href = href;
    }
    if(e && e.keyCode==13){ // enter 键
        location.href = href;
    }*/
};
(function(){
var wait = document.getElementById('wait');
var interval = setInterval(function(){
    var time = --wait.innerHTML;
    if(time <= 0) {
        location.href = href;
        clearInterval(interval);
    };
}, 1000);
})();
<?php echo '</script'; ?>
>

<!-- Mirrored from www.zi-han.net/theme/hplus/500.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:52 GMT -->
</html>
<?php }
}
