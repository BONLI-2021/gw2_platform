<?php
/* Smarty version 3.1.29, created on 2021-03-08 15:00:02
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/jump_notice.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045cb72370a02_19852283',
  'file_dependency' => 
  array (
    '6ccdc8491757183c493324081db3b4276cbfc5cb' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/jump_notice.html',
      1 => 1615172106,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 60,
),true)) {
function content_6045cb72370a02_19852283 ($_smarty_tpl) {
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
    <link href="http://gw2.com//css/admin/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="http://gw2.com//css/admin/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="http://gw2.com//css/admin/animate.min.css" rel="stylesheet">
    <link href="http://gw2.com//css/admin/style.min.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="middle-box text-center animated fadeInDown">
        <h2 class="font-bold">登录已失效</h2>
        <!-- <h3 class="font-bold">登录已失效</h3> -->

        <div class="error-desc">
            <p class="jump">
            页面自动 <a id="href" class="text-primary" href="/admin/login/index">跳转</a> 等待时间： <b id="wait">3</b>
            </p>
            <br/>？如果无法跳转,您可以点击返回看看
            <br/><a href="javascript:;" onclick="javascript:history.back(-1)" class="btn btn-primary m-t">返回</a>
        </div>
        
    </div>
    <script src="http://gw2.com//js/admin/jquery.min.js"></script>
    <script src="http://gw2.com//js/admin/bootstrap.min.js?v=3.3.6"></script>
</body>
<script type="text/javascript">
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
</script>

<!-- Mirrored from www.zi-han.net/theme/hplus/500.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:52 GMT -->
</html>
<?php }
}
