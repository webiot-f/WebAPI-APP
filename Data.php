<?php
//OK

use API\DatabaseManager;
require_once './API/DatabaseManager.php';
$DB = new DatabaseManager(true);
$content = $DB->getSensorValue();
$contents = json_encode($content);
print($contents);
?>