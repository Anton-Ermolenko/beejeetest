<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/model/lib/DbControl.php');

use lib\DbControl;

$param = json_decode($_REQUEST["param"]);

$db = new DbControl();

$name = htmlspecialchars(mysqli_real_escape_string($db::$connection, $param->name));
$email = htmlspecialchars(mysqli_real_escape_string($db::$connection, $param->email));
$task = htmlspecialchars(mysqli_real_escape_string($db::$connection, $param->task));

$setTask = $db::query("INSERT INTO `tasks`(`id`, `name`, `еmail`, `task`, `completed`) VALUES (NULL, '$name', '$email', '$task', NULL)");

if ($setTask) {
	$result = json_encode(true);
	echo $result;
} else {
	$result = json_encode(false);
	echo $result;
}