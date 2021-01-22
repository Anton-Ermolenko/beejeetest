<?php


class Controller {
	public $model;

	public function invoke($name)
	{

		include_once($_SERVER['DOCUMENT_ROOT'] . "/App/" . $name . ".php");
		$this->control = new $name();
		$result = $this->control->getResult();
		include 'views/' . $name . '/template.php';

	}
}

?>