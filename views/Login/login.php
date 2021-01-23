<?php

$param = json_decode($_REQUEST["param"], true);
require_once($_SERVER['DOCUMENT_ROOT'] . '/App/Login.php');

$login = new Login();

if($param['param'] == 'login') {

	$isLogin = $login->truyLogin($param);

	if ($isLogin) {
		$result = json_encode(true);
		echo $result;
	} else {
		$result = json_encode(false);
		echo $result;
	}
} elseif ($param['param'] == 'logout') {
	$login->logout();
	$result = json_encode(true);
	echo $result;
}