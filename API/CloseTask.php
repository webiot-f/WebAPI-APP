<?php
//TODO 窓を閉める処理

/**
* 窓が開いている→閉める→センサが閉まっているのを確認→終了
* https://tutorial.chirimen.org/raspi3/
* http://www.feijoa.jp/laboratory/programming/gpioWithPhp/
*/
namespace API;

if($_SERVER['SCRIPT_FILENAME'] !== "/var/www/html/iot/API.php" && $_SERVER['SCRIPT_FILENAME'] !== "/var/www/html/iot/index.php"){
	die("不正なリクエストを検出しました");
}
class CloseTask{
	/**
	 * [close description]
	 * @return bool 窓を閉めた結果を論理値で返します
	 */
	public function close() :bool{
		//TODO PHPでGPIO操作
	}
}
?>
