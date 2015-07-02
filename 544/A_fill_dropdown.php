<?php

    $column = $_POST["column"];
    $table  = $_POST["table"];
    $response = "";
    $where = "";
    
    $con = \mysql_connect("localhost", "root", "root") or die(\mysql_error());
    $db = \mysql_select_db("BugHound",$con) or die(\mysql_error());
    
    if($column == "Program_id")
    {
        $results;
        if($table == "Programs")$results = \mysql_query("Select * from " . $table. ";");
        if($table == "Bugs")
        {
            $results = \mysql_query("Select distinct b.Program_id,p.Name,p.Version,p.b_Release from Bugs b INNER JOIN Programs p On b.Program_id = p.Program_number");
        }
        $num = \mysql_num_rows($results);
    
        for($i = 0; $i < $num; $i++)
        {
            $row = \mysql_fetch_row($results);
            $response .= "<option value='". $row[0] ."'>" . $row[1] . "  V:" . $row[2] . "." . $row[3] . "</option>";
        }

        echo $response;
    }
     
    else if($table == "Employees")
    {
        $where = " where current = 'yes'";
        $results = \mysql_query("Select distinct " . $column . " from " . $table . $where . ";");
        //$results = \mysql_query("Select Name from Programs");
        $num = \mysql_num_rows($results);
        //echo "There are " . $num . " " . $column ." in the table:" . $table;
    
        for($i = 0; $i < $num; $i++)
        {
            $row = \mysql_fetch_row($results);
            $response .= "<option value='". $row[0] ."'>" . $row[0] . "</option>";
        }

        echo $response;
    }
 else {
         
        $results = \mysql_query("Select distinct " . $column . " from " . $table . $where . ";");
        //$results = \mysql_query("Select Name from Programs");
        $num = \mysql_num_rows($results);
        //echo "There are " . $num . " " . $column ." in the table:" . $table;
    
        for($i = 0; $i < $num; $i++)
        {
            $row = \mysql_fetch_row($results);
            $response .= "<option value='". $row[0] ."'>" . $row[0] . "</option>";
        }

        echo $response;
 }
