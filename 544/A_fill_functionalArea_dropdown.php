<?php
     //echo "The argument i recieved is:" . $_POST['Program_id'];
     /* Open a connection to the MySQL server */
     $con = \mysql_connect("localhost", "root", "root") or die(\mysql_error());
     /* Open connection to database named: BugHound */
     $db = \mysql_select_db("BugHound",$con) or die(\mysql_error());
     $results = \mysql_query("Select name from FunctionalArea where Program_id='" . $_POST['Program_id'] . "'");
     $num = \mysql_num_rows($results);
     $response = "";
     
     for($i = 0; $i < $num; $i++)
     {
         $row = \mysql_fetch_row($results);
         $response .= "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
     }
     echo $response;


