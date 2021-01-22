<?php


class Login
{
	public function getResult()
	{
		$login = $_POST['username'] ?? '';
		$password = $_POST['password'] ?? '';
		if (isset($_POST['logout'])) {
			$_SESSION['USER'] = "guest";
		}
		$auth = $this->checkAuth($login, $password);
		if ($auth)
			$_SESSION['USER'] = "admin";

		unset($_REQUEST['username']);
		unset($_REQUEST['password']);

		$result = ['auth' => $auth,
			'user' => $_SESSION['USER'],
			'userName' => $_POST['username'],
			'request' => $_REQUEST];

		unset($_POST['username']);
		unset($_POST['password']);
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
}