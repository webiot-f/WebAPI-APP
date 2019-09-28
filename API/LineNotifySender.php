<?php
#LineSend

namespace API;

if($_SERVER['SCRIPT_FILENAME'] !== "/var/www/html/iot/API.php"){
	die("不正なリクエストを検出しました");
}

class LineNotifySender{
	public function post_message(string $message, string $token) :bool{
		define('LINE_API_URL'  ,"https://notify-api.line.me/api/notify");
		define('LINE_API_TOKEN',$token);
    	$data = array("message" => $message);
    	$data = http_build_query($data, "", "&");
    	$options = array(
        	'http'=>array(
            	'method'=>'POST',
            	'header'=>"Authorization: Bearer " . LINE_API_TOKEN . "\r\n"
                      	. "Content-Type: application/x-www-form-urlencoded\r\n"
                      	. "Content-Length: ".strlen($data)  . "\r\n" ,
            	'content' => $data
        	)
    	);
    	$context = stream_context_create($options);
    	$resultJson = file_get_contents(LINE_API_URL,FALSE,$context );
    	$resutlArray = json_decode($resultJson,TRUE);
    	if( $resutlArray['status'] != 200)  {
        	return false;
    	}
    	return true;
	}
}
?>