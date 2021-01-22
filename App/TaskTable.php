<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/lib/DbControl.php');

use lib\DbControl;

class TaskTable
{
	public function getResult()
	{
		$db = new DbControl();

		if ($_GET['pagen']) {
			$offset = (int)($_GET['pagen'] - 1) * 3;
		} else {
			$offset = 0;
		}

		if ($_GET['sort']) {
			$sort = mysqli_real_escape_string($db::$connection, $_GET['sort']);
			$path = mysqli_real_escape_string($db::$connection, $_GET['path']);
		} else {
			$sort = "name";
			$path = "asc";
		}


		$tasks = $db::query("select * from (select * from tasks order by " . $sort . " " . $path . ") as decks limit 3 offset " . $offset);
		$result = ['user' => $_SESSION['USER'],
			'offset' => $offset,
			'sort' => $sort,
			'path' => $path,
			'tasks' => $tasks];

		return $result;

	}

}