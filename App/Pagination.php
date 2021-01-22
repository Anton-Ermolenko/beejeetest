<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/lib/DbControl.php');
use lib\DbControl;

class Pagination
{
	public function getResult()
	{
		$db = new DbControl();

		$tableResult = $db::query("SELECT COUNT(*) as count FROM tasks");
		foreach ($tableResult as $result) {
			if (is_array($result)) {
				foreach ($result as $key => $value) {
					if ($key = "count")
						$count = (int)$value;
				}
			}
		}


		$result = ['count' => $count,
			'pagen' => $_REQUEST['pagen'],
		];

		return $result;

	}
}