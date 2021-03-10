<?php
/* Smarty version 3.1.29, created on 2021-03-09 09:27:59
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/goods/add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6046cf1fdb7dc3_70468998',
  'file_dependency' => 
  array (
    'dba61f88844b6c6c4039acbaf658c3c2e2588d1d' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/goods/add.html',
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
function content_6046cf1fdb7dc3_70468998 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/goodsadd.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/css/admin/lyne-up-pic.css">
</head>
<style type="text/css">
ul li{list-style-type:none}
</style>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/navbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
                <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <div id="content-main"  class="wrapper wrapper-content" style="height:calc(100% - 105px);">
                    <form id="signupForm-goodsadd" action="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/goods/doAddGoods" class="wizard-big" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>商品基础资料</h5>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/goods/index" class="btn btn-white btn-xs pull-right">返回上一页</a>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>商品名 *</label>
                                                    <input name="goods_name" type="text" required class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>所属供应商 *</label>
                                                    <select class="form-control m-b" required name="vendor_id">
                                                        <option value="">--请选择--</option>
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['vendorlist']->value)) {?>        
                                                        <?php
$_from = $_smarty_tpl->tpl_vars['vendorlist']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['vendor_name'];?>
</option>
                                                        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>商品分类 *</label>
                                                    <select class="form-control m-b" required name="cate_id">
                                                    <option value="">--请选择--</option>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['catelist']->value)) {?>        
                                                    <?php
$_from = $_smarty_tpl->tpl_vars['catelist']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_c_1_saved_item = isset($_smarty_tpl->tpl_vars['c']) ? $_smarty_tpl->tpl_vars['c'] : false;
$_smarty_tpl->tpl_vars['c'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['c']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
$__foreach_c_1_saved_local_item = $_smarty_tpl->tpl_vars['c'];
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" disabled="disabled" style="background: #eee;"><?php echo $_smarty_tpl->tpl_vars['c']->value['cate_name'];?>
</option>
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['c']->value['child'])) {?>        
                                                        <?php
$_from = $_smarty_tpl->tpl_vars['c']->value['child'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_c2_2_saved_item = isset($_smarty_tpl->tpl_vars['c2']) ? $_smarty_tpl->tpl_vars['c2'] : false;
$_smarty_tpl->tpl_vars['c2'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['c2']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['c2']->value) {
$_smarty_tpl->tpl_vars['c2']->_loop = true;
$__foreach_c2_2_saved_local_item = $_smarty_tpl->tpl_vars['c2'];
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['c2']->value['pid'];?>
-<?php echo $_smarty_tpl->tpl_vars['c2']->value['id'];?>
">&nbsp;&nbsp;&nbsp;&nbsp;|－<?php echo $_smarty_tpl->tpl_vars['c2']->value['cate_name'];?>
</option>
                                                        <?php
$_smarty_tpl->tpl_vars['c2'] = $__foreach_c2_2_saved_local_item;
}
if ($__foreach_c2_2_saved_item) {
$_smarty_tpl->tpl_vars['c2'] = $__foreach_c2_2_saved_item;
}
?>
                                                        <?php }?>
                                                    <?php
$_smarty_tpl->tpl_vars['c'] = $__foreach_c_1_saved_local_item;
}
if ($__foreach_c_1_saved_item) {
$_smarty_tpl->tpl_vars['c'] = $__foreach_c_1_saved_item;
}
?>
                                                    <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>单价 *</label>
                                                    <input name="price" type="text" required class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>库存 *</label>
                                                    <input name="stock" type="text" required class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>排序</label>
                                                    <input name="sort_weight" required type="text" class="form-control" value="0">
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
                                            <input type="hidden" name="g_small_pic" type="text">
                                            <input type="hidden" name="g_big_pic" type="text">
                                            <div class="well">
                                                <div id="Pic_pass">
                                                    <p style="font-size: 20px;font-weight: bold;">请上传商品图片 </p>
                                                    <p><span style="color: red">注：每张照片大小不可超过1M，且尽量上传2~3张，最多可上传10张</span></p>
                                                    <div class="picDiv">
                                                        <div class="addImages">
                                                            <input id="files" class="file" accept="image/png, image/jpeg, image/gif, image/jpg" type="file">
                                                            <div class="text-detail" name="pic">
                                                                <span>+</span>
                                                                <p>点击上传</p>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                    <h5>商品详情</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <textarea id="goods_details" name="goods_details" style="z-index:999"></textarea>
                                        </div>
                                        <div id="temp-img-list" class="hidden">临时数据</div>
                                    </div>
                                </div>
                                <div class="col-sm-8" style="margin-bottom:100px;margin-left: 100px">
                                    <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-up"></i> 提交</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>
        <!--右侧部分结束-->
    </div>

</body>
<!-- UEditor 配置文件 -->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/ueditor/ueditor.config.js"><?php echo '</script'; ?>
>
<!-- 编辑器源码文件 -->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/ueditor/ueditor.all.js"><?php echo '</script'; ?>
>
<!-- 实例化编辑器 -->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/server/goodsadd.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/jquery.form.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
//图片上传预览功能
var userAgent = navigator.userAgent; //用于判断浏览器类型
$(".file").change(function() {
    // 1.formdata 创建个对象
    var formData = new FormData(document.querySelector("form"));

    $this = $(this);
    //获取选择图片的对象
    var docObj = $(this)[0];
    // console.log(docObj);
    var picDiv = $(this).parents(".picDiv");
    //得到所有的图片文件
    var fileList = docObj.files;
    // console.log(fileList);
    //循环遍历
    // console.log(fileList.length);
    var tmp_file_name = [];
    for (var i = 0; i < fileList.length; i++) {
        // 2.formdata 赋值数据
        formData.append('file'+i,$this[0].files[i]);
        //动态添加html元素
        var picHtml = "<div class='imageDiv' ><img id='img" + fileList[i].name + "' tmp-picname='"+fileList[i].name + "' /> <div class='cover'><i class='delbtn'>删除</i></div></div>";
        // console.log(picHtml);
        picDiv.prepend(picHtml);
        //获取图片imgi的对象
        var imgObjPreview = document.getElementById("img" + fileList[i].name);
        if (fileList && fileList[i]) {
            //图片属性
            imgObjPreview.style.display = 'block';
            imgObjPreview.style.width = '160px';
            imgObjPreview.style.height = '130px';
            //imgObjPreview.src = docObj.files[0].getAsDataURL();
            //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要以下方式
            if (userAgent.indexOf('MSIE') == -1) {
                //IE以外浏览器
                imgObjPreview.src = window.URL.createObjectURL(docObj.files[i]); //获取上传图片文件的物理路径;
                // console.log(imgObjPreview.src);
                // var msgHtml = '<input type="file" id="fileInput" multiple/>';
            } else {
                //IE浏览器
                if (docObj.value.indexOf(",") != -1) {
                    var srcArr = docObj.value.split(",");
                    imgObjPreview.src = srcArr[i];
                } else {
                    imgObjPreview.src = docObj.value;
                }
            }
        }
    }
    var r = do_upload(formData);
});

// 删除功能
$("div").delegate('.delbtn','click',function() {
    var _this = $(this);
    var img_name = _this.parents(".imageDiv").find('img').attr("tmp-picname");
    // alert(img_name);return false;
    var d_res = del_img(img_name);
    _this.parents(".imageDiv").remove();
});


function do_upload(filedata){
    var url = module + '/goods/ajaxUpload';
    $.ajax({
        async: false,
        url: url,
        type: 'POST',
        data: filedata,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend : function(XMLHttpRequest){
            load_index = layer.msg('上传中', {
                icon: 16,
                shade: [0.5,'#000']
            });
        },
        complete : function(XMLHttpRequest, r){
            layer.close(load_index);
        },
        success : function(res){
            if(res.success==true){
                $("form input[name='g_big_pic']").val(res.data.big_url);
                $("form input[name='g_small_pic']").val(res.data.small_url);
                $("#Pic_pass").find('.imageDiv:first').children('img').attr('tmp-picname',res.data.tmp_filename);
                layer.msg('已上传');
            }else{
                layer.msg(res.msg);
            }
        },
        error : function(){
            layer.msg('异常，请重新尝试。');
        }
    });
}

function del_img(filepath){
    var url = module + '/goods/ajaxDelImg';
    $.ajax({
        async: false,
        url: url,
        type: 'POST',
        data: {file_path:filepath},
        beforeSend : function(XMLHttpRequest){
            load_index = layer.msg('删除中', {
                icon: 16,
                shade: [0.5,'#000']
            });
        },
        complete : function(XMLHttpRequest, r){
            layer.close(load_index);
        },
        success : function(res){
            if(res.success==true){
                $("form input[name='g_big_pic']").val(res.data.big_url);
                $("form input[name='g_small_pic']").val(res.data.small_url);
                layer.msg('已删除');
            }else{
                layer.msg(res.msg);
            }
        },
        error : function(){
            layer.msg('异常，请重新尝试。');
        }
    });
}
// 删除功能
$("div").delegate('.certdelbtn','click',function() {
    var _this = $(this);
    var img_name = _this.parents(".imageDiv").find('img').attr("tmp-picname");
    
    var d_res = del_img_cert(img_name);
    _this.parents(".imageDiv").remove();
});

// 判断数组有无重复元素
function mm(a){
    var nary=a.sort();
    for(var i=0;i<a.length;i++){
        if (nary[i]==nary[i+1]){
            return false;
        }else{
            return true;
        }
    }
}


<?php echo '</script'; ?>
>
</html>
<?php }
}
