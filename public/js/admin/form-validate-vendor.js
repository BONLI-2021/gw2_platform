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
            vendor_name: {
                required: !0,
            },
            contactor: {
                required: !0,
            },
            phone: {
                required: !0,
                number:true,
                minlength:11,
                maxlength:11
            },
            account:{
                required:!0
            },
            password:{
                required:!0
            }
        },
        messages: {
            vendor_name: {
                required: e + "请输入供应商名称",
            },
            contactor: {
                required: e + "请输入联系人姓名",
            },
            phone: {
                required: e + "请输入联系人电话",
                minlength:"手机号为11位",
                maxlength:"手机号为11位"
            },
            account: {
                required: e + "请输入供应商管理员账号",
            },
            password: {
                required: e + "请输入管理员密码",
            },
        }
    })
});
// 编辑
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
    $("#signupForm-edit").validate({
        rules: {
            vendor_name: {
                required: !0,
            },
            contactor: {
                required: !0,
            },
            phone: {
                required: !0,
                number:true,
                minlength:11,
                maxlength:11
            }
        },
        messages: {
            vendor_name: {
                required: e + "请输入供应商名称",
            },
            contactor: {
                required: e + "请输入联系人姓名",
            },
            phone: {
                required: e + "请输入联系人电话",
                minlength:"手机号为11位",
                maxlength:"手机号为11位"
            }
        }
    })
    
});