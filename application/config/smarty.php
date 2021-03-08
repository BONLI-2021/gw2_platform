<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config['theme']        = 'default';
$config['cache_lifetime'] = 60;
$config['caching'] = true;
// 模板文件存放路径
if(strpos($_SERVER['REQUEST_URI'],'admin') !==false)
{
    $config['template_dir'] = APPPATH.'views/admin';
    $config['compile_dir'] = APPPATH .'views/admin/template_c';
	$config['cache_dir'] = APPPATH . 'views/admin/cache';
	$config['config_dir'] = APPPATH . 'views/admin/config';
}
else
{
    $config['template_dir'] = APPPATH.'views/home';
    $config['compile_dir'] = APPPATH .'views/admin/template_c';
	$config['cache_dir'] = APPPATH . 'views/admin/cache';
	$config['config_dir'] = APPPATH . 'views/admin/config';
}


$config['use_sub_dirs'] = false; //子目录变量(是否在缓存文件夹中生成子目录)
$config['left_delimiter'] = '{{';
$config['right_delimiter'] = '}}';
$config['template_ext'] = '.html';



