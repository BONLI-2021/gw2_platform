<?php
/* Smarty version 3.1.29, created on 2021-03-08 15:33:43
  from "/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/navbar.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_6045d357c7dc23_26156667',
  'file_dependency' => 
  array (
    'b0f67897d0b854bb48394a1ba35cbf4b8be23b8e' => 
    array (
      0 => '/System/Volumes/Data/home/wwwroot/Documents/BONLI/gw2_platform/application/views/admin/public/navbar.html',
      1 => 1615172106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./password-edit.html' => 1,
  ),
),false)) {
function content_6045d357c7dc23_26156667 ($_smarty_tpl) {
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="nav-close"><i class="fa fa-times-circle"></i></div>
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img class="img-circle mb10 " style="border-radius:0%" width="140" alt="image" src="<?php echo $_smarty_tpl->tpl_vars['public']->value;?>
/images/admin/logo.png" /></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold"><?php echo $_SESSION['login']['account'];?>
</strong>
                            </span>
                            <span class="text-muted text-xs block"><?php echo $_SESSION['login']['real_name'];?>

                                <b class="caret"></b>
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a data-toggle="modal" class="edit_pass" href="#modal-form-password">修改密码</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/login/loginOut">安全退出</a></li>
                    </ul>
                </div>
                <div class="logo-element">L</div>
            </li>
            <?php if (!empty($_smarty_tpl->tpl_vars['navbar_list']->value)) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['navbar_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_n_0_saved_item = isset($_smarty_tpl->tpl_vars['n']) ? $_smarty_tpl->tpl_vars['n'] : false;
$_smarty_tpl->tpl_vars['n'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['n']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['n']->value) {
$_smarty_tpl->tpl_vars['n']->_loop = true;
$__foreach_n_0_saved_local_item = $_smarty_tpl->tpl_vars['n'];
?>
            <li class="<?php if ($_smarty_tpl->tpl_vars['title']->value != '管理员') {?> <?php if (in_array($_smarty_tpl->tpl_vars['title']->value,$_smarty_tpl->tpl_vars['n']->value['active']) !== false) {?>active<?php }
} else {
if (in_array($_smarty_tpl->tpl_vars['title']->value,$_smarty_tpl->tpl_vars['n']->value['active']) !== false) {?>active<?php }
}?>">
                <a class="J_menuItem" href="<?php echo $_smarty_tpl->tpl_vars['module']->value;
echo $_smarty_tpl->tpl_vars['n']->value['navbar_url'];?>
">
                    <i class="fa <?php echo $_smarty_tpl->tpl_vars['n']->value['icon'];?>
"></i>
                    <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['n']->value['name'];?>
</span>
                </a>
                <?php if (!empty($_smarty_tpl->tpl_vars['n']->value['child'])) {?>
                <ul class="nav nav-second-level">
                <?php
$_from = $_smarty_tpl->tpl_vars['n']->value['child'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_cn_1_saved_item = isset($_smarty_tpl->tpl_vars['cn']) ? $_smarty_tpl->tpl_vars['cn'] : false;
$_smarty_tpl->tpl_vars['cn'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['cn']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cn']->value) {
$_smarty_tpl->tpl_vars['cn']->_loop = true;
$__foreach_cn_1_saved_local_item = $_smarty_tpl->tpl_vars['cn'];
?>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['title']->value == $_smarty_tpl->tpl_vars['cn']->value['name']) {?>active<?php }?>"><a class="J_menuItem" href="<?php echo $_smarty_tpl->tpl_vars['module']->value;
echo $_smarty_tpl->tpl_vars['cn']->value['navbar_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['cn']->value['name'];?>
</a></li>
                <?php
$_smarty_tpl->tpl_vars['cn'] = $__foreach_cn_1_saved_local_item;
}
if ($__foreach_cn_1_saved_item) {
$_smarty_tpl->tpl_vars['cn'] = $__foreach_cn_1_saved_item;
}
?>
                </ul>
                <?php }?>
            </li>
            <?php
$_smarty_tpl->tpl_vars['n'] = $__foreach_n_0_saved_local_item;
}
if ($__foreach_n_0_saved_item) {
$_smarty_tpl->tpl_vars['n'] = $__foreach_n_0_saved_item;
}
?>
            <?php } else { ?>
            <li class="<?php if ($_smarty_tpl->tpl_vars['nav']->value == 'h-m') {?>active<?php }?>">
                <a class="J_menuItem" href="javascript:;">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">主页2</span>
                </a>
            </li>
            <?php if ($_SESSION['login']['account'] == 'lyne007@163.com') {?>

            <li class="<?php if ($_smarty_tpl->tpl_vars['nav']->value == 'a-l' || $_smarty_tpl->tpl_vars['nav']->value == 'a-a' || $_smarty_tpl->tpl_vars['nav']->value == 'r-l' || $_smarty_tpl->tpl_vars['nav']->value == 'r-a' || $_smarty_tpl->tpl_vars['nav']->value == 'p-l') {?>active<?php }?>">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span class="nav-label">权限管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li <?php if ($_smarty_tpl->tpl_vars['nav']->value == 'a-l') {?>class="active"<?php }?>>
                        <a class="J_menuItem" href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/power/admin">管理员查询</a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['nav']->value == 'r-l') {?>class="active"<?php }?>>
                        <a class="J_menuItem" href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/power/role">角色查询</a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['nav']->value == 'p-l') {?>class="active"<?php }?>>
                        <a class="J_menuItem" href="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/power/menu">菜单查询</a>
                    </li>
                </ul>
            </li>
            <?php }?>
            <?php }?>
            <br>
            <br>
            <br>
        </ul>
    </div>
</nav>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:./password-edit.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
