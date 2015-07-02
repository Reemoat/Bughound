<?php
    
        $con = \mysql_connect("localhost", "root", "root") or die(\mysql_error());
        $db = \mysql_select_db("BugHound",$con) or die(\mysql_error());
        
        //echo $_POST['query'];
        $response = \mysql_query($_POST['query']);
        echo $response;

?>

