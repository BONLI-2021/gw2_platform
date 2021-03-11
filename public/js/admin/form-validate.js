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
            // firstname: "required",
            // lastname: "required",
            real_name: {
                required: !0,
                minlength: 2
            },
            account: {
                required: !0
            },
            password: {
                required: !0,
                minlength: 6
            },
            confirm_password: {
                required: !0,
                minlength: 6,
                equalTo: "#password-add"
            }
        },
        messages: {
            // firstname: e + "请输入你的姓",
            // lastname: e + "请输入您的名字",
            real_name: {
                required: e + "请输入您的用户名",
                minlength: e + "用户名必须两个字符以上"
            },
            account: e + "请输入您的账号",
            password: {
                required: e + "请输入您的密码",
                minlength: e + "密码必须6个字符以上"
            },
            confirm_password: {
                required: e + "请再次输入密码",
                minlength: e + "密码必须6个字符以上",
                equalTo: e + "两次输入的密码不一致"
            }
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
            // firstname: "required",
            // lastname: "required",
            real_name: {
                required: !0,
                minlength: 2
            },
            account: {
                required: !0
            },
            password: {
                required: !0,
                minlength: 6
            },
            confirm_password: {
                required: !0,
                minlength: 6,
                equalTo: "#password-edit"
            }
        },
        messages: {
            // firstname: e + "请输入你的姓",
            // lastname: e + "请输入您的名字",
            real_name: {
                required: e + "请输入您的用户名",
                minlength: e + "用户名必须两个字符以上"
            },
            account: e + "请输入您的账号",
            password: {
                required: e + "请输入您的密码",
                minlength: e + "密码必须6个字符以上"
            },
            confirm_password: {
                required: e + "请再次输入密码",
                minlength: e + "密码必须6个字符以上",
                equalTo: e + "两次输入的密码不一致"
            }
        }
    })
    
});