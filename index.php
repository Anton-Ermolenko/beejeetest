<?php
session_start();
include_once("App/Controller.php");
$controller = new Controller();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>TinyTable</title>
    <link rel="stylesheet" href="/css/style.css"/>
</head>
<body>

<?

$controller->invoke('Login');
$controller->invoke('TaskTable');
$controller->invoke('Pagination');
$controller->invoke('AddTask');

?>


<div id="my_modal" class="modal">
    <div class="modal_content">
        <span class="close_modal_window">×</span>
        <p>
        <h3 id="addText"></h3></p>
    </div>
</div>


<script type="text/javascript" src="/js/script.js"></script>

</body>
</html>
