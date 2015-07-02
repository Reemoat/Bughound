<?php
$con = \mysql_connect("localhost", "root", "root") or die(\mysql_error());
$db = \mysql_select_db("BugHound",$con) or die(\mysql_error());
$column = $_REQUEST['name'];

?>


