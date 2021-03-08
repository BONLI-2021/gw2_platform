 <?php 
header("Content-Type:text/html;charset=utf-8");
/**
* 根据快递100接口，封装通用类
* 参考：https://poll.kuaidi100.com/pollquery/pollTechWord.jsp
* @author lyne
*/
class Kuaidi {
	// private $apiurl = 'http://www.kuaidi100.com/test/poll';
	// private $key = 'testkuaidi1031';
	private $apiurl = 'http://www.kuaidi100.com/poll';
	private $key = 'adrLWpEJ6173';
	private $callbackurl = 'http://sanai.51bonli.com/admin/callback/inlet';
	/**
	 * 快递单号订阅
	 * @author lyne
	 */
	public function subscribe($company=null,$number=null,$from=null,$to=null,$tel=null){
		$post_data = array();
	    $post_data["schema"] = 'json';

	    //callbackurl请参考callback.php实现，key经常会变，请与快递100联系获取最新key
	    $post_data["param"]='{"company":"'.$company.'", "number":"'.$number.'","from":"'.$from.'", "to":"'.$to.'",';
	    $post_data["param"]=$post_data["param"].'"key":"'.$this->key.'",';
	    $post_data["param"]=$post_data["param"].'"parameters":{"callbackurl":"'.$this->callbackurl.'","mobiletelephone":"'.$tel.'"}}';
	    @$this->my_log4php_kd('快递100找问题，请求报文：'.json_encode($post_data,JSON_UNESCAPED_UNICODE).'||','debug',__CLASS__);
	    $url=$this->apiurl;

	    $o="";
	    foreach ($post_data as $k=>$v)
	    {
	        $o.= "$k=".urlencode($v)."&";		//默认UTF-8编码格式
	    }

	    $post_data=substr($o,0,-1);

	    $ch = curl_init();
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_HEADER, 0);
	        curl_setopt($ch, CURLOPT_URL,$url);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  // 不直接输出结果
	    $result = curl_exec($ch);		//返回提交结果，格式与指定的格式一致（result=true代表成功）
	    return $result;
	}

	/**
	 * 接收快递100推送的信息
	 * @author lyne
	 */
	public function receive(){

		//订阅成功后，收到首次推送信息是在5~10分钟之间，在能被5分钟整除的时间点上，0分..5分..10分..15分....
		$param=$_POST['param'];

		// try{
		// 	//$param包含了文档指定的信息，...这里保存您的快递信息,$param的格式与订阅时指定的格式一致

		// 	echo  '{"result":"true",	"returnCode":"200","message":"成功"}';
		// 	//要返回成功（格式与订阅时指定的格式一致），不返回成功就代表失败，没有这个30分钟以后会重推
		// } catch(Exception $e){

		// 	echo  '{"result":"false",	"returnCode":"500","message":"失败"}';
		// 	//保存失败，返回失败信息，30分钟以后会重推
		// }
		return $param;
	}


     /**
 	 * my_log4php_kd 日志记录方法  for  kuaidi100
 	 */
    public function my_log4php_kd($content,$level,$class){
        require_once LOG4PHP_DIR.'Logger.php';  
        Logger::configure(LOG4PHP_DIR.'kuaidi.php'); 
        $c = 'log4'.$level;
        $this->$c = Logger::getLogger($class);  
        $this->$c->$level($content);
    }

}


?>