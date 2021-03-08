<?php
/* Smarty version 3.1.29, created on 2021-03-08 15:00:18
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/footer.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045cb824c3041_53876619',
  'file_dependency' => 
  array (
    'd5e062d5ac72f865b3be5713fa741b7ae61e30de' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/footer.html',
      1 => 1615186173,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6045cb824c3041_53876619 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '15346637126045cb824bd570_39678894';
?>
<div class="footer">
    <div class="pull-right">&copy; 2016-2017 <a href="http://www.51bonli.com/" target="_blank">51bonli.com</a>
    </div>
</div>
<div  id="loading" class="hidden"><div class=" mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active" style="margin-left: 40%"></div></div>
<div id="bg" class="hidden" >
    <div class="masking"></div>
    <div class="bg-loading" >
        <div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"><br>正在处理中...  请耐心等待。</div>
    </div>
</div>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/bootstrap.min.js?v=3.3.6"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/material.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/contabs.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/pace/pace.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/toastr/toastr.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/slimscroll/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/jquery.cookie.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/plugins/metisMenu/jquery.metisMenu.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/layer/layer.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/hplus.min.js?v=4.1.0"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/js/admin/server/ajax.common.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
// 
$(function(){
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "7000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
    // $("#showtoast").click(function(){
    //     toastr.success('祝贺你成功了');
    //     toastr.info('这是一个提示信息');
    //     toastr.warning('警告你别来烦我了');
    //     toastr.error('出现错误，请更改');
    // });
})
<?php echo '</script'; ?>
><?php }
}
