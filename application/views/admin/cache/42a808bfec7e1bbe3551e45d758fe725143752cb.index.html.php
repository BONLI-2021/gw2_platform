<?php
/* Smarty version 3.1.29, created on 2021-03-08 15:00:11
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/login/index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045cb7b487e21_92277480',
  'file_dependency' => 
  array (
    '42a808bfec7e1bbe3551e45d758fe725143752cb' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/login/index.html',
      1 => 1615173476,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 60,
),true)) {
function content_6045cb7b487e21_92277480 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>中粮长城—后台管理系统 - 登录</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="-">
<meta name="description" content="-">
<link rel="stylesheet" type="text/css" href="http://gw2.com//css/admin/login.min.css">
<style type="text/css">
.disabled-btn{background:#eee;}
.disabled-btn:hover{background-color:#eee;}
</style>
</head>
<body>
<div class="bg-wrap">
    <div id="form" class="main-cont-wrap login-model">
        <div class="form-title g-mb40">
            <span class="s-txt-c s-fs20">登录</span>
        </div>
        <div class="ui-form-item g-mb30" style="display: flex;align-items: center;margin-bottom: 5px;">
            <span class="ui-form-txt zh" style="border-right: 1px solid #c6c5c6;height:100%;"></span>
            <input type="text" name="email" class="ui-form-input" placeholder="请输入账号" required="" msg="账号不许为空">
        </div>
        <div class="ui-form-item g-mb30" style="margin-bottom: 15px;display: flex;align-items: center;">
            <span class="ui-form-txt password" style="border-right: 1px solid #c6c5c6;height: 100%;"></span>
            <input type="password" name="password" class="ui-form-input" placeholder="请输入密码" required="" msg="密码不许为空">
        </div>
        <!--验证码-->
        <div class="ui-form-item g-mb20" style="border: none;">
            <input type="text" name="yzm" class="ui-form-input" placeholder="请输入验证码" required="" msg="验证码不许为空" size="4" style="position: absolute;bottom: 6px;width: 178px;height: 34px;border: 1px solid #e3e3e3;">
            <img class="yzm-reload" title="点击刷新" src="http://gw2.com/admin/login/captcha" align="absbottom" onclick="this.src='http://gw2.com/admin/login/captcha?'+Math.random();" style="position: relative;left: 220px;bottom: 8px"></img>
        </div>
        <div class="ui-form-btn">

            <button type="submit" class="ui-button login-btn">登 录</button>
        </div>

    </div>
</div>
<!-- <div class="footer-wrap">
    <p class="s-tac s-txt-gy1">&copy; 2016-2017 中粮长城 CO.,LTD.</p>
</div> -->
<script src="http://gw2.com//js/admin/jquery.min.js"></script>
<script src="http://gw2.com//js/layer/layer.js"></script>
<script src="http://gw2.com//js/admin/server/ajax.common.js"></script>
<script src="http://gw2.com//js/admin/jquery.cookie.js"></script>
<script type="text/javascript">

$(function(){

    $("body").keydown(function(event) { 
        if(event.keyCode == "13" && $("#form button").attr('disabled')==undefined){
            $("#form button").click();
        }
    });

    $("#form button").click(function(){
        $this = $(this);
        $this.html('<img width="60" src="http://gw2.com//fonts/three-dots.svg">');
        var jsonData = {};
        var mark = true;
        $("#form").find('input').each(function(){
            var msg = $("#form input[name='"+this.name+"']").attr('msg');
            if(this.value==''){
                $this.html('登 录').attr('disabled','disabled');
                setTimeout(function(){$this.removeAttr('disabled')},1000);
                layer.msg(msg,{icon:2,time:1200});
                mark = false;
                return mark;
            }
            jsonData[this.name] = this.value;
        });
        if(!mark){
            $this.html('登 录').attr('disabled','disabled');
            setTimeout(function(){$this.removeAttr('disabled')},1000);
            return false;
        }

        post("http://gw2.com/admin" + '/login/doLogin',jsonData,function(res){
            
            if(res.retcode===1){
                layer.msg('登录成功',{icon:1,time:1000},function(){
                    $this.html('登 录');
                    if(res.data['admin_type']==1){
                        window.location.href = "http://gw2.com/admin" + '/order/';
                    }else{
                        window.location.href = "http://gw2.com/admin" + '/order/orderVendor';
                    }
                });
                
            }else{
                // _obj.reset(); //重置验证码
                $(".yzm-reload").trigger('click');
                layer.msg(res.msg,{icon:2,time:1200},function(){
                    $this.html('登 录');
                });
            }
        });
    });

})
</script>


</body></html><?php }
}
