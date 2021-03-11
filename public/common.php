<?php
// 公共目录路径存放js、css、images等文件
define('BASEURL','/');
define('PUBLICURL',BASEURL.'public');
// 服务器根
define('ROOTPATH', rtrim(substr(BASEPATH, 0, strpos(BASEPATH, '/')), '/'));
define('WWWROOTPATH', rtrim(FCPATH, '/'));

// 初始化时区
date_default_timezone_set('Asia/Shanghai');

// 图片上传配置（本地）
define('PIC_D_URL', 'http://'.$_SERVER['HTTP_HOST'].'/images/');//http默认图片访问地址
define('PIC_O_URL', 'http://'.$_SERVER['HTTP_HOST'].'/upload/original/');//http图片原图访问地址
define('PIC_T_URL', 'http://'.$_SERVER['HTTP_HOST'].'/upload/thumb/');//http缩略图访问地址

define('PIC_O_PATH', '/upload/original/');//图片原图上传路径
define('PIC_T_PATH', '/upload/thumb/');//缩略图上传路径

// 临时文件上传路径
define('TF_EXPRESS_PATH', FCPATH.'upload/excel_goods/');
define('TF_EXPRESS_URL', '//'.$_SERVER['HTTP_HOST'].'/upload/excel_goods/');

// 企业logo上传配置(本地)
define('UP_URL', 'http://'.$_SERVER['HTTP_HOST'].'/upload/logo/');//http图片原图访问地址
define('UP_PATH', WWWROOTPATH.'/upload/logo/');//图片原图上传路径

// 公共目录
define('PUBLIC_PATH', FCPATH);

// 图片规格
define("PICINDEX_S",'156_163');//首页小图片
define("PICINDEX_B",'217_163');//首页大图片
define("PICGOOD_S",'46_46');//商品详情小图片
define("PICGOOD_B",'318_318');//商品详情大图片
define("PIC436X436",'436X436');// 商品相册缩略图
define("PIC211X211",'211X211');// 商品相册缩略图

define("SALT_LEFT", md5('cmiles'));
define('SALT_RIGHT', md5('continental'));