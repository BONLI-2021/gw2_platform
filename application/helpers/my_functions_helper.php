<?php

// 自定义函数库

/**
 * 将十进制数字转换为二十六进制字母串  导excel使用
 * @author lyne
 */
function num2alpha($intNum, $isLower=true)
{
    $num26 = base_convert($intNum, 10, 26);
    $addcode = $isLower ? 49 : 17;
    $result = '';
    for ($i=0; $i<strlen($num26); $i++) {
        $code = ord($num26{$i});
        if ($code < 58) {
            $result .= chr($code+$addcode);
        } else {
            $result .= chr($code+$addcode-39);
        }
    }
    return $result;
}


/**
 * 将二十六进制字母串转换为十进制数字  导excel使用
 * @author lyne
 */
function alpha2num($strAlpha)
{
    if (ord($strAlpha{0}) > 90) {
        $startCode = 97;
        $reduceCode = 10;
    } else {
        $startCode = 65;
        $reduceCode = -22;
    }
    $num26 = '';
    for ($i=0; $i<strlen($strAlpha); $i++) {
        $code = ord($strAlpha{$i});
        if ($code < $startCode+10) {
            $num26 .= $code-$startCode;
        } else {
            $num26 .= chr($code-$reduceCode);
        }
    }
    return (int)base_convert($num26, 26, 10);
}

/**
 * trim_all 去除首尾空格及特殊空白字符
 * @param string $str
 * @return string $str
 * @author lyne
 */
function trim_all($str, $type = ''){
    if ($type == 'strict') $qian=array(" ","　","\t","\n","\r");
    else $qian=array("\t","\n","\r");
    return str_replace($qian, '', trim($str));
}
function trimall($str)//删除空格
{
    $qian=array(" ","　","\t","\n","\r");
    $hou=array("","","","","");
    return str_replace($qian,$hou,$str); 
}

function xml2array($xml) {
    $array = array();
    $tmp = null;
    try {
        $tmp = (array) simplexml_load_string($xml);
    } catch(Exception $e) { }
    if ($tmp && is_array($tmp)) {
        foreach ( $tmp as $k => $v) {
            $array[$k] = (string) $v;
        }
    }
    return $array;
}

//发送短信接口 【营销短息】
function sendSmsApi($mobile, $content){
    $content = preg_replace("/ /", "%20", $content); //用正则把空格替换成%20
    //企业ID $userid
    $userid = '1039';
    //用户账号 $account
    $account = 'xiangXin';
    //用户密码 $password
    $password = '123456';
    
    //发送短信（其他方法相同）
    $gateway = "http://sh2.ipyy.com/sms.aspx?action=send&userid={$userid}&account={$account}&password={$password}&mobile={$mobile}&content={$content}&sendTime=&extno=";
    $result = file_get_contents($gateway);
    return xml2array($result);
}

// 自定义函数库

if (!function_exists('_save_session'))
{
    function _save_session($data){
        $ci =& get_instance();
        $ci->session->set_tempdata($data, null, 3600*24*30);
        $ci->input->set_cookie('ci_session', session_id(), 3600*24*30);
    }
}