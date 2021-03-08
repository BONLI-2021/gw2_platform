$(function(){
    // 实例化富文本编辑器
    var des = UE.getEditor('goods_details', {
        toolbars: [['fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'directionalityltr', 'directionalityrtl', 'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
            'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
            'print', 'preview', 'searchreplace', 'help', 'drafts']
            // ['fullscreen', 'source', 'undo', 'redo','simpleupload','insertimage','link'],
            // ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
        ],
        initialFrameHeight: 280,
    });
    des.addListener('afterExecCommand', function () {
        var img = des.getPlainTxt();
        if (img != "") { 
            //把编辑器中的内容放到临时div中，然后进行获取文件名称。
            $("#temp-img-list").html(img);
            var images = new Array();
            //循环获取文件名称
            $("#temp-img-list img").each(function () {
                var name = $(this).attr("src");
                images.push(name);
            });
            /*//调用callbackImg获取懂图片名称
            if (typeof callbackImg === "function") {
                eval("callbackImg('" + array + "')");
            }*/
            var tmp=JSON.stringify(images);
            var url=module+'/goods/cacheDescription';
            $.post(url,{images:tmp},function(r){return true;});
              
        }
        // console.log(typeof images);
          
    });
    // var spec = UE.getEditor('specification', {
    //     toolbars: [
    //         ['source', 'undo', 'redo', 'insertimage']
    //     ],
    // });

    
    var pageMark = $(".selfMark");
    pageMark.click(function(){
        var step = $(".steps ul li");
        var tstep = step.eq(3);
        if(tstep.hasClass("current")==true){

        toastr.success('祝贺你成功了');

            $('.last-pic').remove();
            $('.album-upload-btn').remove();
        }
    })

    $(document).on("click",'.img-del',function(){
        var $this = $(this);
        $this.parent('div').remove();
    })

    
});


// 商品相册图片上传实时显示
function clickInputFileForAblum(a){
    $(a).next('input:file').trigger('click');
}

function changeInputFileForAblum(a){
    var d,s;
    d=new Date();
    s=d.getSeconds();
    $('.album-upload-btn input:file').attr('name','album'+s);
    $('.album-upload-btn input:checkbox').val('album'+s);
    var v=$('.album-upload-btn').html();
    $('.album-upload').append(v);
    $(a).parent().find('.img-del').css('display','block');
    var $this=$(a);
    var name=$this.val();
    if(name) $this.next('input:checkbox').attr('checked','checked').next('.pic-name').html(name);

    // 实时显示/预览图片
    // Get a reference to the fileList
    var files = !!a.files ? a.files : [];
    // alert(files);
  
    // If no files were selected, or no FileReader support, return
    if (!files.length || !window.FileReader) return;
  
    // Only proceed if the selected file is an image
    if (/^image/.test( files[0].type)){
  
        // Create a new instance of the FileReader
        var reader = new FileReader();
  
        // Read the local file as a DataURL
        reader.readAsDataURL(files[0]);
  
        // When loaded, set image data as background of div
        reader.onloadend = function(){
            $this.prev('.img-thumbnail').attr("src", this.result).addClass('del-pic').removeAttr('onClick');
            $this.parent('.my-thumbnail').removeClass('last-pic');
        }
    }


}
// 提交
$(function(){
    var options_add = {
        async:false,
        type:"post",
        timeout:10000, // 超时时间 10s
        beforeSend: function(){
            loading = layer.msg('正在处理中, 请稍等', {  //通过layer插件来进行提示正在加载
                        icon: 16,
                        shade: [0.5,'#000']
                    });
            return false;
        },
        complete:function(XMLHttpRequest,textStatus){
            if(XMLHttpRequest.statusText=='timeout'){
                var xmlhttp = window.XMLHttpRequest ? new window.XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHttp");
                xmlhttp.abort();
                toastr.error("失败！网络超时。");
            }
            // 请求完成后回调函数
            layer.close(loading);
            return false;
        },
        success:function(res){
            if(res.retcode==1){
                layer.alert(res.msg, {
                    icon: 1,
                    skin: 'layer-ext-moon',
                    yes: function(index2){
                        layer.close(index2);
                        window.location.reload();
                    },cancel: function(index2){
                        layer.close(index2);
                    }
                })
            }else{
                layer.msg(res.msg, {icon: 2})
            }
        },
        error:function(XMLHttpRequest,textStatus){
            if(XMLHttpRequest.statusText=='timeout'){
                toastr.warning('失败！超时了 timeout。');
            }else{
                toastr.warning('异常！请联系开发人员寻求帮助。');
            }
            return false;
        }
    };

    $("#content-main form").submit(function(){
        var $this = $(this);
        if($this.find('div').hasClass('has-error')==true){
            return false;
        }
        if($this.find("input[name='g_big_pic']").val()==''){
            layer.msg('请上传商品主图',{icon:2});
            return false;
        }
        var des = $this.find("textarea[name='goods_details']").val();
        if(des==''){
            layer.msg('请填写商品详情',{icon:2});
            return false;
        }
        
        $this.ajaxSubmit(options_add);

        return false;
    });


})

