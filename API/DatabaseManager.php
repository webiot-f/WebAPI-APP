<?php
//TODO DB処理

namespace API;

if($_SERVER['SCRIPT_FILENAME'] !== "/var/www/html/iot/API.php" && $_SERVER['SCRIPT_FILENAME'] !== "/var/www/html/iot/index.php" && $_SERVER['SCRIPT_FILENAME'] !== "/var/www/html/iot/Data.php"){
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
		/*
		$db = new mysqli('localhost', 'user', 'pass', 'WebAPI');
		if ($db->connect_error){
			die($db->connect_error);
		}else{
			$db->set_charset("utf8");
		}
		$sql = "UPDATE table_name /SET id = 2, name = 'yamato'/ WHERE id = 1;";
		$result = $db->query($sql);
		if($result){
			return true;
		}else{
			return false;
		}
		$result->close();
		*/
		return true;
	}

	/**
	 * [saveCloseHistory description]
	 * @param  array  $value センサの値等
	 * @return bool          結果を論理値で返します
	 */
	public function saveCloseHistory(array $value) :bool{
		//TODO
		/*
		$db = new mysqli('localhost', 'user', 'pass', 'WebAPI');
		if ($db->connect_error){
			die($db->connect_error);
		}else{
			$db->set_charset("utf8");
		}
		$sql = "INSERT INTO table_name /(id, name) VALUES (1, 'yamada')/;";
		$result = $db->query($sql);
		if($result){
			return true;
		}else{
			return false;
		}
		$result->close();
		*/
		return true;
	}

	/**
	 * [saveSensorValues description]
	 * @param  array  $value センサの値等
	 * @return bool          結果を論理値で返します
	 */
	public function saveSensorValues(array $value) :bool{
		//TODO
		/*
		$db = new mysqli('localhost', 'user', 'pass', 'WebAPI');
		if ($db->connect_error){
			die($db->connect_error);
		}else{
			$db->set_charset("utf8");
		}
		$sql = "UPDATE table_name /SET id = 2, name = 'yamato'/ WHERE id = 1;";
		$result = $db->query($sql);
		if($result){
			return true;
		}else{
			return false;
		}
		$result->close();
		*/
		return true;
	}

	/**
	 * [getSettings description]
	 * @return array 値を配列で返します
	 */
	public function getSettings() :array{
		//TODO
		/*
		$db = new mysqli('localhost', 'user', 'pass', 'WebAPI');
		if ($db->connect_error){
			die($db->connect_error);
		}else{
			$db->set_charset("utf8");
		}
		$sql = "select * from table_name where /name=a/";
		$result = $db->query($sql);
		if($result){
			return $result;
		}else{
			return false;
		}
		$result->close();
		*/
		return [];
	}

	/**
	 * [getCloseHistory description]
	 * @return array 値を配列で返します
	 */
	public function getCloseHistory() :array{
		//TODO
		/*
		$db = new mysqli('localhost', 'user', 'pass', 'WebAPI');
		if ($db->connect_error){
			die($db->connect_error);
		}else{
			$db->set_charset("utf8");
		}
		$sql = "select * from table_name";
		$result = $db->query($sql);
		if($result){
			return $result;
		}else{
			return false;
		}
		$result->close();
		*/
		return [];
	}

	/**
	 * [getSensorValue description]
	 * @return array 値を配列で返します
	 */
	public function getSensorValue() :array{
		//TODO
		/*
		$db = new mysqli('localhost', 'user', 'pass', 'WebAPI');
		if ($db->connect_error){
			die($db->connect_error);
		}else{
			$db->set_charset("utf8");
		}
		$sql = "select * from table_name where /name=a/";
		$result = $db->query($sql);
		if($result){
			return $result;
		}else{
			return false;
		}
		$result->close();
		*/
	return ["temp"=>mt_rand(1,500),"humid"=>mt_rand(1,500),"press"=>mt_rand(1,500),"rain"=>mt_rand(1,500),"current"=>mt_rand(1,500),"forecast"=>mt_rand(1,500),"wind"=>mt_rand(1,500),"ratio"=>mt_rand(1,500),"concent"=>mt_rand(1,500),"light"=>mt_rand(1,500)];
	}
}
?>
