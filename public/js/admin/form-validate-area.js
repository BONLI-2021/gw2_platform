// 创建
$.validator.setDefaults({
    highlight: function(e) {
        $(e).closest(".form-group").removeClass("has-success").addClass("has-error")
    },
    success: function(e) {
        e.closest(".form-group").removeClass("has-error").addClass("has-success")
    },
    errorElement: "span",
    errorPlacement: function(e, r) {
        e.appendTo(r.is(":radio") || r.is(":checkbox") ? r.parent().parent().parent() : r.parent())
    },
    errorClass: "help-block m-b-none",
    validClass: "help-block m-b-none"
}),
$().ready(function() {
    $("#commentForm").validate();
    var e = "<i class='fa fa-times-circle'></i> ";
    $("#signupForm-add").validate({
        rules: {
            area_name: {
                required: !0,
            },
            area_id: {
                required: !0,
            }
        },
        messages: {
            area_name: {
                required: e + "请输入新增区域名称",
            },
            area_id: {
                required: e + "请选择所属区域",
            }
        }
    })
    
});