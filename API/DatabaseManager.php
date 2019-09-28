<?php
#Database

namespace API;

if($_SERVER['SCRIPT_FILENAME'] !== "/var/www/html/iot/API.php"){
	die("不正なリクエストを検出しました");
}

class DatabaseManager{
	public function setSettings(array $value) :bool{
		//TODO
	}

	public function saveCloseHistory(array $value) :bool{
		//TODO
	}

	public function saveSensorValues(array $value) :bool{
		//TODO
	}

	public function getSettings() :array{
		//TODO
	}

	public function getCloseHistory() :array{
		//TODO
	}

	public function getSensorValue() :array{
		//TODO
	}
}
?>