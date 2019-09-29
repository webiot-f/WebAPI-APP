<?php

namespace API;

if($_SERVER['SCRIPT_FILENAME'] !== "/var/www/html/iot/API.php"){
	die("不正なリクエストを検出しました");
}

class DatabaseManager{

	/**
	 * [setSettings description]
	 * @param array $value センサの値等
	 * @return bool          結果を論理値で返します
	 */
	public function setSettings(array $value) :bool{
		//TODO
		$db = new mysqli('localhost', '', '', '');
		if ($db->connect_error){
			die($db->connect_error);
		}else{
			$db->set_charset("utf8");
		}
		$sql = "";
		$result = $db->query($sql);
		if($result){
			return true;
		}else{
			return false;
		}
		$result->close();
	}

	/**
	 * [saveCloseHistory description]
	 * @param  array  $value センサの値等
	 * @return bool          結果を論理値で返します
	 */
	public function saveCloseHistory(array $value) :bool{
		//TODO
		$db = new mysqli('localhost', '', '', '');
		if ($db->connect_error){
			die($db->connect_error);
		}else{
			$db->set_charset("utf8");
		}
		$sql = "";
		$result = $db->query($sql);
		if($result){
			return true;
		}else{
			return false;
		}
		$result->close();
	}

	/**
	 * [saveSensorValues description]
	 * @param  array  $value センサの値等
	 * @return bool          結果を論理値で返します
	 */
	public function saveSensorValues(array $value) :bool{
		//TODO
		$db = new mysqli('localhost', '', '', '');
		if ($db->connect_error){
			die($db->connect_error);
		}else{
			$db->set_charset("utf8");
		}
		$sql = "";
		$result = $db->query($sql);
		if($result){
			return true;
		}else{
			return false;
		}
		$result->close();
	}

	/**
	 * [getSettings description]
	 * @return array 値を配列で返します
	 */
	public function getSettings() :array{
		//TODO
		$db = new mysqli('localhost', '', '', '');
		if ($db->connect_error){
			die($db->connect_error);
		}else{
			$db->set_charset("utf8");
		}
		$sql = "";
		$result = $db->query($sql);
		if($result){
			return $result;
		}else{
			return false;
		}
		$result->close();
	}

	/**
	 * [getCloseHistory description]
	 * @return array 値を配列で返します
	 */
	public function getCloseHistory() :array{
		//TODO
		$db = new mysqli('localhost', '', '', '');
		if ($db->connect_error){
			die($db->connect_error);
		}else{
			$db->set_charset("utf8");
		}
		$sql = "";
		$result = $db->query($sql);
		if($result){
			return $result;
		}else{
			return false;
		}
		$result->close();
	}

	/**
	 * [getSensorValue description]
	 * @return array 値を配列で返します
	 */
	public function getSensorValue() :array{
		//TODO
		$db = new mysqli('localhost', '', '', '');
		if ($db->connect_error){
			die($db->connect_error);
		}else{
			$db->set_charset("utf8");
		}
		$sql = "";
		$result = $db->query($sql);
		if($result){
			return $result;
		}else{
			return false;
		}
		$result->close();
	}
}
?>