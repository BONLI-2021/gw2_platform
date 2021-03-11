<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	date_default_timezone_set('Asia/Shanghai');
    // 加载PHPExcel
    require_once APPPATH.'libraries/PHPExcel/PHPExcel.php';
    require_once APPPATH.'libraries/PHPExcel/PHPExcel/Writer/Excel2007.php';

    //设定缓存模式为经gzip压缩后存入cache  
    $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip;  
    $cacheSettings = array();  
    PHPExcel_Settings::setCacheStorageMethod($cacheMethod,$cacheSettings);

    /**
     * 为CI扩展Excel类
     */
    class CI_Excel extends PHPExcel {

        public function __construct(){

            parent::__construct();

            /*$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_memcache; 
            $cacheSettings = array(
                'memcacheServer'  => 'memcachehost1', 
                'memcachePort'    => 11211,
                'cacheTime'       => 60
            ); 
            PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);*/

           /* $cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;  
            $cacheSettings = array(
                'memoryCacheSize '  => '8MB'
            );  
            PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);*/

            $this->setExcelAttr();
        }

        /**
         * setExcelAttr
         * PHPExcel 属性设置
         */
        protected function setExcelAttr(){
            //创建人
            $this->getProperties()->setCreator("Bonli Admin");
            //最后修改人
            $this->getProperties()->setLastModifiedBy("Bonli Admin");
            //标题
            // $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
            //题目
            // $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
            //描述
            // $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");
            //关键字
            // $objPHPExcel->getProperties()->setKeywords("office 2007 openxml php");
            //种类
            // $objPHPExcel->getProperties()->setCategory("Test result file");
        }


        



    }