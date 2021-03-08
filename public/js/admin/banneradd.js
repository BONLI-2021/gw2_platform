$(function(){
    // 删除图片
    $(".del-img").click(function(){
        $(this).siblings('input[name="Banner"]').attr('hasimg','n');
        $(this).addClass('hidden');
        $(this).next('.img-t').attr('src','/public/images/admin/banner.jpg');
        $(this).next('.img-t').attr('onClick','clickInputFileForAlbum(this)').addClass('cursor-pointer');
        $(this).siblings('.pic-name').html('请选择图片...');
        $(this).siblings('.pic-name').css('display','block');
    });
})
// 图片上传实时显示
function clickInputFileForAlbum(a){
    $(a).next('input:file').trigger('click');
}

function changeInputFileForAlbum(a){
    var d,s;
    d=new Date();
    s=d.getSeconds();

    var $this=$(a);
    var name=$this.val();
    $this.attr('hasimg','y');
    $this.next('span').css('display','none');
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
            $this.prev('.img-t').attr("src", this.result).removeAttr('onClick').removeClass('cursor-pointer');
            $('.del-img').removeClass('hidden').addClass('cursor-pointer');
            $this.parent('.my-thumbnail').removeClass('last-pic');
            $this.parents('.form-group').addClass('has-feedback');
        }
    }
}


function callbackImg(imgName) {
    var names = imgName.split(",");
    for (var i = 0; i < names.length; i++) {
        $("#show-img-name").append($("<div></div>").html($("<a></a>").html(names[i]).attr("href", "/upload/image/" + names[i] + "").attr("target", "_blank")));
    }
}