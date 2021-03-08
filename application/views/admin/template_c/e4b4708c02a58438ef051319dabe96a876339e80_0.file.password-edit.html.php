<?php
/* Smarty version 3.1.29, created on 2021-03-08 15:33:43
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/password-edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045d357c85b07_18026273',
  'file_dependency' => 
  array (
    'e4b4708c02a58438ef051319dabe96a876339e80' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/password-edit.html',
      1 => 1615172106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6045d357c85b07_18026273 ($_smarty_tpl) {
?>

<div id="modal-form-password" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-11">
                        <div class="m-b-md">
                            <h5>修改密码</h5>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <button class="close" type="button" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="col-sm-12">

                        <div class="ibox float-e-margins mb0">
                            <div class="ibox-content">
                                <div class="form-horizontal m-t">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">账号：</label>
                                        <div class="col-sm-8">
                                            <input name="account" class="form-control" type="email" value="<?php echo $_SESSION['login']['account'];?>
" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">原始密码：</label>
                                        <div class="col-sm-8">
                                            <input name="password" class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">新密码：</label>
                                        <div class="col-sm-8">
                                            <input name="newpassword" class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">确认新密码：</label>
                                        <div class="col-sm-8">
                                            <input name="confirm_newpassword" class="form-control" type="password">
                                            <br>
                                            <span id="password-error-msg" class="hidden help-block m-b-none" style="color:#a94442"><i class="fa fa-info-circle"></i> <span>请再次输入您的新密码</span></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-3">
                                            <button class="btn btn-w-m btn-primary edit_pass_btn" type="submit">提交</button>
                                            <button class="btn btn-w-m btn-default pass-cancel-btn" type="reset">取消</button>
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
</div> 

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(function(){
    $('.edit_pass').click(function(){
        $('input[name="password"]').val('');
        $('input[name="newpassword"]').val('');
        $('input[name="confirm_newpassword"]').val('');
        $('.edit_pass_btn').removeAttr('disabled');
    })
	$(".pass-cancel-btn").click(function(){
		$("#modal-form-password .close").trigger('click');
	});

	$("#modal-form-password input[name='newpassword'],#modal-form-password input[name='confirm_newpassword']").keyup(function(){
		var n_pwd = $("input[name='newpassword']").val();
		var c_n_pwd = $("input[name='confirm_newpassword']").val();
		if(n_pwd !== c_n_pwd){
			$("#password-error-msg").removeClass('hidden').children('span').html('与新的密码不一致！');
		}else{
			$("#password-error-msg").addClass('hidden');
		}
	});

	$("#modal-form-password button[type='submit']").click(function(){
        var n_pwd = $("input[name='newpassword']").val();
        var c_n_pwd = $("input[name='confirm_newpassword']").val();
        if(n_pwd !== c_n_pwd){
            $("#password-error-msg").removeClass('hidden').children('span').html('与新的密码不一致！');
            return false;
        }else{
            $("#password-error-msg").addClass('hidden');
        }
		$(this).attr('disabled','disabled');
		var url = module + '/power/ajaxPasswordEdit';
		var jsonData={};
	    $(this).parents('#modal-form-password').find('input').each(function(){
	    	jsonData[this.name]=this.value;
	    });
	    $this = $(this);
        post(url,{jsonData},function(r){
            if(r.success==true){
                $("#password-error-msg").addClass('hidden');
                $(".pass-cancel-btn").trigger('click');
                toastr.success(r.msg);
            }else{
                $this.removeAttr('disabled');
                toastr.error(r.msg);
            }
        })
	});
})
<?php echo '</script'; ?>
>




<?php }
}
