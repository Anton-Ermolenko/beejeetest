<?php


class Login
{
	public function getResult()
	{
		if ($_SESSION['USER'] == "admin") {
			$auth = true;
		}

		$result = ['auth' => $auth,
			'user' => $_SESSION['USER'],
			'userName' => $_POST['username'],
			'request' => $_REQUEST];

		return $result;
	}

	public function checkAuth(string $login, string $password): bool
	{
		$users = require $_SERVER['DOCUMENT_ROOT'] . '/usersDB.php';
		if ($_SESSION['USER'] == "admin")
			return true;

		foreach ($users as $user) {
			if ($user['Login'] === $login
				&& $user['password'] === $password
			) {
				return true;
			}
		}

		return false;
	}

	public function truyLogin(array $param)
	{
		$isLogin = $this->checkAuth($param['name'], $param['password']);
		if ($isLogin){
			session_id($_COOKIE['PHPSESSID']);
			session_start();
			$_SESSION['USER'] = $param['name'];
		}
		return $isLogin;
	}

	public function logout()
	{
		session_id($_COOKIE['PHPSESSID']);
		session_start();
		$_SESSION['USER'] = 'guest';
	}
}