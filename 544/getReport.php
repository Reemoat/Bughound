<?php
    
    $con = \mysql_connect("localhost", "root", "root") or die(\mysql_error());
    $db = \mysql_select_db("BugHound",$con) or die(\mysql_error());
    $report_num = $_REQUEST['name'];
    $result = \mysql_query("Select * from present_Report where Report_num ='" . $report_num . "';");
    $row = \mysql_fetch_row($result);
    $output="";
    for($i = 0; $i < sizeof($row); $i++)
    {
        if($i)
        {
            $output .= ",";
        }
        $output .= $row[$i];
    }
    echo $output;
    
?>


