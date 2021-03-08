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
            git_name: {
                required: !0,
            },
            consignee: {
                required: !0,
            },
            phone: {
                required: !0,
                number:true,
                minlength:11,
                maxlength:11
            },
            addr2: {
                required: !0,
            }
        },
        messages: {
            git_name: {
                required: e + "请输入新增仓库名称",
            },
            consignee: {
                required: e + "请输入仓库收货人姓名",
            },
            phone: {
                required: e + "请输入收货人电话",
                minlength:"手机号为11位",
                maxlength:"手机号为11位"
            },
            addr2: {
                required: e + "请填写详细地址",
            }
        }
    })
    
});