<?php
        $con = \mysql_connect("localhost", "root", "root") or die(\mysql_error());
        /* Open connection to database named: BugHound */
        $db = \mysql_select_db("BugHound",$con) or die(\mysql_error());
        $results = \mysql_query("Select * From " . $_GET['table']);
        $response = "<h2 align='center'><b>Table:</b>" . $_GET['table'] . "</h2>";
        $j = 0;

        $num= mysql_num_rows($results);

        
        $response .= "<table border=\"1\" align=\"center\">";
        $response .= "<tr>";
            while ($j < mysql_num_fields($results))
            {
		$meta = mysql_fetch_field($results, $j);
		$response .= "<td align=\"center\" valign=\"middle\"><b>". $meta->name .'</b></td>';
		$j = $j + 1;
	    }
            $response .= "</tr>";
             
            for($i = 0; $i<$num; $i = $i+1)
            {
                $row = mysql_fetch_row($results);
                
                $response .= "<tr>";
                
                for($j=0; $j<sizeof($row);$j=$j+1)
                {
                    $response .= sprintf("%s%s%s","<td>",$row[$j],"</td>");
                }
                $response .= "</tr>";
            }
            $response .= "</table>";
        echo $response;

?>

