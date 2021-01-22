<?php


namespace lib;


class DbControl
{
	static $connection = null;

	function __construct()
	{
		self::$connection = mysqli_connect('localhost', 'mysql', 'mysql', 'BeeJeeTest');
		if (self::$connection) {
			self::$connection;
		}
		return false;
	}

	public static function query($query)
	{
		$result = mysqli_query(self::$connection, $query);
		if (is_object($result)) {
			for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row) ;
			return $data;
		} elseif (is_bool($result)) {
			return $result;
		}

	}

}