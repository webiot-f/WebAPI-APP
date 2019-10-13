<?php
//TODO POST後の処理

use API\LineNotifySender;
use API\DatabaseManager;
use API\CloseTask;

require_once './API/LineNotifySender.php';
require_once './API/DatabaseManager.php';
require_once './API/CloseTask.php';

$LineNotify = new LineNotifySender(true);
$DB = new DatabaseManager(true);
$CloseTask = new CloseTask(true);

/**
 * $contents jsonで受け取ったセンサ等の値
 */
$json_string = file_get_contents("php://input");
$contents = json_decode($json_string);
/*
##################センサ側ラズパイ(update時のjson)#######################
data = {
        "token": "",            # access token
        "type": "update",       # 処理の種類 (update)
        "ratio": "",            # ホコリの比率[%]
        "concent": "",          # ホコリの濃度[pcs/0.01cf]
        "temp": "",             # 気温[℃]
        "humid": "",            # 湿度[%]
        "press": "",            # 気圧[hPa]
        "light": "",            # 明るさ
        "wind": "",             # 風が強いか(bool)
        "rain": "",             # 雨(センサ, bool)
        "current": "",          # 現在雨が降っているか(気象予報API, bool)
        "forecast": ""          # この後雨が降るか(bool)
    }
*/
if($_SERVER['SCRIPT_FILENAME'] !== "/var/www/html/iot/index.php"){
	if(!isset($contents["token"])){
		die("必要な情報が入力されていません");
	}elseif($contents["token"] === "token"){
		if(!isset($contents["type"])){
			die("必要な情報が入力されていません");
		}elseif($contents["type"] === "update"){
			$this->Update($contents);
		}else{
			die("不正なリクエストを検出しました");
		}
	}else{
		die("不正なリクエストを検出しました");
	}
}

//TODO
function Update(array $values) :void{
	//ここで$valuesを分解する
	$DB->saveSensorValues($values);
	//ここで閉めるかどうかの判断をする
	$this->close($values, $reason);
}

function close(array $values, string $reason) :void{
	$result = $CloseTask->close();
	$settings = $DB->getSettings();
	$token = $settings[""];
	if(isset($settings)){
		if($result !== false){
			$message = $reason;
			$LineNotify->post_message($message, $token);
			$DB->saveCloseHistory($values);
		}else{
			$message = "[Error] 窓を閉めるのに失敗しました";
			$LineNotify->post_message($message, $token);
		}
	}
}
?>
