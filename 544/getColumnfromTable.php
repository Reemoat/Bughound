<?php
$con = \mysql_connect("localhost", "root", "root") or die(\mysql_error());
$db = \mysql_select_db("BugHound",$con) or die(\mysql_error());
$column = $_REQUEST['name'];

    $result = \mysql_query("Select " . $column . " from Bugs;");
    $output = "";
    $num = \mysql_num_rows($result);

    for($i = 0; $i < $num; $i++)
    {
        $row = \mysql_fetch_row($result);
        if($i)
        {
            $output .= ",";
        }
        $output .= $row[0];
    }
    echo $output;
?>


