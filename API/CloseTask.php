<?php
#WindowsClose

namespace API;

if($_SERVER['SCRIPT_FILENAME'] !== "/var/www/html/iot/API.php"){
	die("不正なリクエストを検出しました");
}
class CloseTask{
	/**
	 * 窓が開いている→閉める→センサが閉まっているのを確認→終了
	 * https://tutorial.chirimen.org/raspi3/
	 * http://www.feijoa.jp/laboratory/programming/gpioWithPhp/
	 */
	public function close() :bool{
		//TODO
	}
}
?>