<?php
    $response = "";
    /* Open a connection to the MySQL server */
    $con = \mysql_connect("localhost", "root", "root") or die(\mysql_error());
    /* Open connection to database named: BugHound */
    $db = \mysql_select_db("BugHound",$con) or die(\mysql_error());
    $result = \mysql_query("Select " . $_GET['column'] . " from " . $_GET['table']);
    $num = \mysql_num_rows($result);
    
    for($i = 0; $i < $num; $i++)
    {
        $row = \mysql_fetch_row($result);
        if($i)
        {
            $response .= ",";
        }
        $response .= $row[0];
    }
    echo $response;
           
?>

