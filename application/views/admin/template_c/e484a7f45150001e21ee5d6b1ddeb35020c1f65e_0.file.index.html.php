<?php
/* Smarty version 3.1.29, created on 2021-03-08 17:25:19
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/vendor/index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045ed7fa11d21_15666854',
  'file_dependency' => 
  array (
    'e484a7f45150001e21ee5d6b1ddeb35020c1f65e' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/vendor/index.html',
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
function content_6045ed7fa11d21_15666854 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>
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
                    <div class="col-sm-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" style="min-height:94px">
                                <h5>供应商列表</h5>
                                <div class="col-sm-12">
                                    <div class="col-sm-1 vendor_state">
                                        <button class="btn btn-white dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">供应商状态<span class="caret"></span></button>
                                        <ul class="dropdown-menu" style="left:15px">
                                            <li><a class="option" option="1">正常 </a></li>
                                            <li><a class="option" option="0">失效 </a></li>
                                            <li><a class="option" option="clear" title="供应商状态">清除该筛选结果</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group m-b">
                                            <div class="input-group-btn">
                                                <button class="btn btn-white " data-type="button">按名称查询</button>
                                            </div>
                                            <input class="form-control vendorOption" type="text">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary sear" markcheck="" type="button">搜索 </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group m-b">
                                            <span class="input-group-btn">
                                                <a data-toggle="modal" class="btn btn-success addVendor-btn" href="#modal-form-addVendor">创建供应商</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="ajaxVendorList" class="ibox-content">
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="modal-form-addVendor" class="modal fade" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-11">
                                        <div class="m-b-md">
                                            <h2>完善供应商信息</h2>
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
                                                <form class="form-horizontal m-t" id="signupForm-add" action="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/vendor/ajaxAddVendor" method="post">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">供应商名称：</label>
                                                        <div class="col-sm-8">
                                                            <input name="vendor_name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">联系人：</label>
                                                        <div class="col-sm-8">
                                                            <input name="contactor" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">电话：</label>
                                                        <div class="col-sm-8">
                                                            <input name="phone" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">管理人员邮箱：</label>
                                                        <div class="col-sm-8">
                                                            <input name="email" class="form-control" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">管理人员账号：</label>
                                                        <div class="col-sm-8">
                                                            <input name="account" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">密码：</label>
                                                        <div class="col-sm-8">
                                                            <input name="password" class="form-control" type="password" minlength="6" aria-required="true" aria-invalid="true" class="error"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-8 col-sm-offset-3">
                                                            <button class="btn btn-primary" type="submit">提交</button>
                                                            <button class="hidden reset-btn" type="reset"></button>
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
                
                
                <div id="modal-form-editVendor" class="modal fade" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-11">
                                        <div class="m-b-md">
                                            <h2>完善供应商信息</h2>
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
                                                <form class="form-horizontal m-t" id="signupForm-edit" action="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/vendor/ajaxEditVendor" method="post">
                                                    <input type="hidden" name="id"/>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">供应商名称：</label>
                                                        <div class="col-sm-8">
                                                            <input name="vendor_name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">联系人：</label>
                                                        <div class="col-sm-8">
                                                            <input name="contactor" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">电话：</label>
                                                        <div class="col-sm-8">
                                                            <input name="phone" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-8 col-sm-offset-3">
                                                            <button class="btn btn-primary" type="submit">提交</button>
                                                            <button class="hidden reset-btn" type="reset"></button>
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
                
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>
        <!--右侧部分结束-->
    </div>
</body>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/chosen/chosen.jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/validate/jquery.validate.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/validate/messages_zh.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/form-validate-vendor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/switchery/switchery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">

$(function(){
    // 获取供应商列表
    getVendorList();
    $(".sear").click(function(){
        var url = module+'/vendor/ajaxVendorList';
        var options = getOptions();
        posth(url,{options:options},function(r){
            $('#ajaxVendorList').html(r);
        })
    });
    $('.vendor_state ul li').click(function(){
        var url = module+'/vendor/ajaxVendorList';
        $li = $(this);
        $li.parent().children().removeClass().end().end().addClass('selected');
        var tmp1,tmp2,options;
        tmp1=$li.children('.option').attr('option');
        if(tmp1=='clear'){
            tmp2=$li.children('.option').attr('title')+' <span class="caret"></span>';
        }else{
            tmp2 = $li.children('.option').html()+' <span class="caret"></span>';
        }
        $li.parent().siblings('button').html(tmp2);
        options = getOptions();
        posth(url,{options:options},function(r){
            $('#ajaxVendorList').html(r);
        })
    })

    // 重置表单
    $(".addVendor-btn").click(function(){
        $("#modal-form-addVendor").find(".reset-btn").trigger('click');
    });

    // 点击添加供应商
    $("#modal-form-addVendor form").submit(function(e){
        var reg = /^[\u4E00-\u9FA5A-Za-z0-9]+$/;
        var account = $(this).find('input[name="account"]').val();
        
        if(!reg.test(account)){
            layer.msg('账号不能包含特殊字符');
            return false;
        }

        var pass_reg = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/;
        var password = $(this).find('input[name="password"]').val();
        if(!pass_reg.test(password)){
            layer.msg('密码长度为6~16位，且须同时包含数字及字母');
            return false;
        }
        
        var jsonData={};
        $(this).find('input').each(function(){jsonData[this.name]=this.value});
        submitAjax($(this),function(r){
            if(r.retcode===1){
                $("#modal-form-addVendor .close").trigger('click');
                toastr.success(r.msg);
                getVendorList();
            }else{
                $("#modal-form-addVendor .close").trigger('click');
                toastr.error(r.msg);
            }
        });
        return false;
    });

    // 编辑供应商
    $("#modal-form-editVendor form").submit(function(e){
        if($(this).find('div').hasClass('has-error')){
            return false;
        }
        var url = module + '/vendor/ajaxEditVendor';
        var jsonData={};
        $(this).find("input[type='hidden'],input[type='text']").each(function(){jsonData[this.name]=this.value});
        submitAjax($(this),function(r){
            if(r.retcode===1){
                $("#modal-form-editVendor .close").trigger('click');
                toastr.success(r.msg);
                getVendorList();
            }else{
                $("#modal-form-editVendor .close").trigger('click');
                toastr.error(r.msg);
            }
        });
        return false;
    });
})

// 获取供应商列表
function getVendorList(){
    var url = module + '/vendor/ajaxVendorList';
    options = getOptions();
    posth(url,{options:options},function(res){
        $("#ajaxVendorList").html(res);
    });
}

function getOptions(){
    var options,state,keyword;
    state = $('.vendor_state .selected .option').attr('option');
    keyword = $('.vendorOption').val();
    options = {state:state,keyword:keyword,mark:1};
    return options;
}
<?php echo '</script'; ?>
>
</html>
<?php }
}
