<?php
/* Smarty version 3.1.29, created on 2021-03-09 09:28:08
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/banner/index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6046cf285a3c96_02556093',
  'file_dependency' => 
  array (
    'dcb6f945d43a1614a60caa4fc2833c6dbff98a4f' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/banner/index.html',
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
function content_6046cf285a3c96_02556093 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/banner.css">
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
                            <h5>Banner列表</h5>
                            <div class="col-sm-12">
                                <div class="col-sm-2">
                                    <div class="input-group m-b">
                                        <span class="input-group-btn">
                                            <a data-toggle="modal" class="btn btn-success addBanner-btn" href="#modal-form-addBanner">新增Banner</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="ajaxBannerList" class="ibox-content">
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="modal-form-addBanner" class="modal fade" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-11">
                                    <div class="m-b-md">
                                        <h2>完善Banner信息</h2>
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
                                            <form class="form-horizontal m-t" id="signupForm-add">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">banner：</label>
                                                    <div class="col-sm-9">
                                                        <div class="album-upload" >
                                                            <div class="col-sm-13 my-thumbnail">
                                                                <span class="del-img hidden">X</span>
                                                                <img width="360" height="120" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/images/admin/banner.jpg" alt="..." class="img-t cursor-pointer" onClick="clickInputFileForAlbum(this);">
                                                                <input type="file" name="banner" id="" class="hidden" onChange="changeInputFileForAlbum(this);" hasimg='n'>
                                                                <span class="pic-name">请选择图片...</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                        
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">链接：</label>
                                                    <div class="col-sm-8">
                                                        <input name="image_href" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" value=""/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">排序：</label>
                                                    <div class="col-sm-4">
                                                        <input name="sort_weight" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" value="0"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">置顶：</label>
                                                    <div class="col-sm-3">
                                                        <input name="is_top" id="topCheck" type="checkbox">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-3 col-sm-offset-5">
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
            
            
            <div id="modal-form-editBanner" class="modal fade" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-11">
                                    <div class="m-b-md">
                                        <h2>编辑Banner信息</h2>
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
                                            <form class="form-horizontal m-t" id="signupForm-edit">
                                                <input type="hidden" name="id"/>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">banner：</label>
                                                    <div class="col-sm-9">
                                                        <div class="album-upload" >
                                                            <div class="col-sm-13 my-thumbnail">
                                                                <span class="del-img">X</span>
                                                                <img width="360" height="120" src="" alt="..." class="img-t cursor-pointer" onClick="clickInputFileForAlbum(this);">
                                                                <input type="file" name="banner" id="" class="hidden" onChange="changeInputFileForAlbum(this);" hasimg='y'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">URL：</label>
                                                    <div class="col-sm-8">
                                                        <input name="image_path" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" readonly="readonly" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">链接：</label>
                                                    <div class="col-sm-8">
                                                        <input name="image_href" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" value=""/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">排序：</label>
                                                    <div class="col-sm-8">
                                                        <input name="sort_weight" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">置顶：</label>
                                                    <div class="col-sm-3">
                                                        <input name="is_top" checked="" type="checkbox">
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
/js/admin/form-validate-banner.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/switchery/switchery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/banneradd.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(function(){
    // 获取Banner列表
    getBannerList();
    
    // 重置表单
    $(".addBanner-btn").click(function(){
        $("#modal-form-addBanner").find(".reset-btn").trigger('click');
    });

    // 点击添加Banner
    $("#modal-form-addBanner form").submit(function(e){
        var has = $('#modal-form-addBanner').find('input[name="banner"]').attr('hasimg');
        if(has=='n'){
            layer.msg('请先上传图片',{icon:2});
            return false;
        }
        if($(this).find('div').hasClass('has-error')){
            return false;
        }
        
        var formData = new FormData($("#signupForm-add")[0]);
        $.ajax({
            url: module + '/banner/ajaxAddBanner',
            type: 'POST',
            data:formData,
            async:false,
            cache:false,
            contentType:false,
            processData: false,  
            success: function (r) {  
                if(r.retcode==1){
                    $("#modal-form-addBanner .close").trigger('click');
                    $("#signupForm-add").find('img').attr('src','/public/images/admin/banner.jpg');
                    $("#signupForm-add").find('img').attr('onclick','clickInputFileForAlbum(this);');
                    $("#signupForm-add").find('input[name="banner"]').attr('hasimg','n');
                    $('.del-img').addClass('hidden');
                    layer.msg(r.msg,{icon:1,time:1000},function(){
                        getBannerList();
                    });
                }else{
                    $("#modal-form-addBanner .close").trigger('click');
                    $("#signupForm-add").find('img').attr('src','/public/images/admin/banner.jpg');
                    $("#signupForm-add").find('img').attr('onclick','clickInputFileForAlbum(this);');
                    $("#signupForm-add").find('input[name="banner"]').attr('hasimg','n');
                    $('.del-img').addClass('hidden');
                    layer.msg('添加失败',{icon:2,time:1200});
                }
            },  
            error: function (data) {  
                toastr.error("异常！请联系开发人员寻求帮助。");
            }  
        })
        return false;
    });

    // 编辑banner
    $("#modal-form-editBanner form").submit(function(e){
        var has = $('#modal-form-editBanner').find('input[name="banner"]').attr('hasimg');
        if(has=='n'){
            layer.msg('请先上传图片');
            return false;
        }
        if($(this).find('div').hasClass('has-error')){
            return false;
        }
        var formData = new FormData($("#signupForm-edit")[0]);
        $.ajax({
            url: module + '/banner/ajaxEditBanner',
            type: 'POST',
            data:formData,
            async:false,
            cache:false,
            contentType:false,
            processData: false,  
            success: function (r) {  
                if(r.retcode==1){
                    $("#modal-form-editBanner .close").trigger('click');
                    layer.msg('编辑成功',{icon:1,time:1000},function(){
                        getBannerList();
                    });
                }else{
                    $("#modal-form-editBanner .close").trigger('click');
                    layer.msg('编辑失败',{icon:2,time:1000},function(){
                        getBannerList();
                    });
                }
            },  
            error: function (data) {  
                toastr.error("异常！请联系开发人员寻求帮助。");
            }  
        })
        return false;
    });

})

// 获取分类列表
function getBannerList(){
    var url = module + '/banner/ajaxBannerList';
    posth(url,null,function(res){
        $("#ajaxBannerList").html(res);
    });
}


<?php echo '</script'; ?>
>
</html>
<?php }
}
