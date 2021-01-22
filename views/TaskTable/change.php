<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/lib/DbControl.php');

use lib\DbControl;

session_id($_COOKIE['PHPSESSID']);
session_start();

if ($_SESSION['USER'] == 'admin') {
	$param = json_decode($_REQUEST["param"]);

	$db = new DbControl();
	$name = htmlspecialchars(mysqli_real_escape_string($db::$connection, $param->name));
	$value = htmlspecialchars(mysqli_real_escape_string($db::$connection, $param->value));
	$setTask = $db::query("UPDATE `tasks` SET `$name` = '$value' WHERE `tasks`.`id` = $param->id");

	if ($setTask) {
		$result = json_encode(true);
		echo $result;
	}
} else {
	$result = json_encode(false);
	echo $result;
}


