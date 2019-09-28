<?php
#WebAPI

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
 * まだメモ段階です
 * 
 * token = アクセスを許可するトークン
 * type = 処理の種類
 * sensorvalue = センサーの値
 * dboption = DBの操作の種類
 * settings = DBの設定
 */
$json_string = file_get_contents("php://input");
$contents = json_decode($json_string);
if(!isset($contents["token"])){
	die("必要な情報が入力されていません");
}elseif($contents["token"] === "---省略---"){
	if(!isset($contents["type"])){
		die("必要な情報が入力されていません");
	}elseif($contents["type"] === "update"){
		//TODO 引数未定
		if(!isset($TODO)){
			die("必要な情報が入力されていません");
		}else{
			//TODO 引数未定
			$this->Update($TODO);
		}
	}elseif($contents["type"] === "database"){
		if(!isset($contents["dboption"])){
			die("必要な情報が入力されていません");
		}else{
			if($contents["dboption"] === "getSensorValue"){
				return $DB->getSensorValue();
			}elseif($contents["dboption"] === "getCloseHistory"){
				return $DB->getCloseHistory();
			}elseif($contents["dboption"] === "setSettings"){
				if(!isset($contents["settings"])){
					//$contents["settings"] は配列にする予定
					die("必要な情報が入力されていません");
				}else{
					return $DB->setSettings($contents["settings"]);
				}
			}
		}
	}else{
		die("不正なリクエストを検出しました");
	}
}else{
	die("不正なリクエストを検出しました");
}

//TODO
function Update(string $TODO){
	$DB->saveSensorValues($TODO);
	if($TODO === "true"){
		$result = $CloseTask->close();
		$settings = $DB->getSettings();
		if(isset($settings)){
			$token = $TODO;
			if($result !== false){
				$message = "窓を閉めた時のメッセージ";
				$LineNotify->post_message($message, $token);
				$DB->saveCloseHistory($TODO);
			}else{
				$message = "窓を閉めるのに失敗したときのメッセージ";
				$LineNotify->post_message($message, $token);
			}
		}
	}
}

?>
