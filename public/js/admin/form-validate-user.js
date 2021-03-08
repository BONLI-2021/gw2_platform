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
    $("#signupForm-adduser").validate({
        rules: {
            account: {
                required: !0,
            },
            user_name: {
                required: !0
            },
            area_id: {
                required: !0
            }
        },
        messages: {
            account: {
                required: e + "请输入您的账号",
            },
            user_name: {
                required: e+ "请填写用户名"
            },
            area_id: {
                required: e + "请选择用户所属区域"
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
            account: {
                required: !0
            },
            user_name: {
                required: !0
            },
            area_id: {
                required: !0
            }
        },
        messages: {
            account: {
                required: e + "请输入您的账号"
            },
            user_name: {
                required: e+ "请填写用户名"
            },
            area_id: {
                required: e + "请选择用户所属区域"
            }
        }
    })
});

// 操作充值
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
    $("#signupForm-recharge").validate({
        rules: {
            deal_amount:{
                required: !0
            },
            explain: {
                required: !0
            }
        },
        messages: {
            deal_amount: {
                required: e + "充值金额需大于0"
            },
            explain: {
                required: e + "请输入操作备注"
            }
        }
    })
    
});
// 账户余额扣减操作
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
    $("#signupForm-reduce").validate({
        rules: {
            deal_amount:{
                required: !0
            },
            explain: {
                required: !0
            }
        },
        messages: {
            deal_amount: {
                required: e + "扣减金额需大于0"
            },
            explain: e + "请输入操作备注"
        }
    })
    
});