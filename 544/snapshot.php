<?php
            
            $con = \mysql_connect("localhost", "root", "root") or die(\mysql_error());
            $db = \mysql_select_db("BugHound",$con) or die(\mysql_error());
            //$field = $_POST['arg1'];
            //$value = $_POST['arg2'];
            

            //$query = "Select * from SnapShot where " . $field . "='" . $value . "';";
            $query=$_POST['query'];
            //echo "<h2>Query = " . $query . "</h2>";
            
            $results = \mysql_query($query);
            $response = "";
            $num= mysql_num_rows($results);
            $j=0;
            //echo "<table border=\"1\" align=\"center\">";
            $response.= "<table border=\"1\" align=\"center\">";
            //echo "<tr>";
            $response.= "<tr>";
            while ($j < mysql_num_fields($results))
            {
		$meta = mysql_fetch_field($results, $j);
		//echo '<td><b>'. $meta->name .'</b></td>';
                $response.= '<td><b>'. $meta->name .'</b></td>';
		$j = $j + 1;
	    }
            //echo "</tr>";
             $response.= "</tr>";
            for($i = 0; $i<$num; $i = $i+1)
            {
                $row = mysql_fetch_row($results);
               
                //echo "<tr>";
                //echo "<td>";
                $response.= "<tr>";
                $response.= "<td>";
                $temp = $row[0];
                
                //printf("%s%s%s%s%s","<A HREF=\"http://localhost/544/EditReport.php?name=",$temp,"\">",$temp,"</A>");
                $response.= sprintf("%s%s%s%s%s","<A HREF=\"http://localhost/544/EditReport.php?name=",$temp,"\">",$temp,"</A>");
                
                //echo "</td>";
                $response.= "</td>";
                //<A HREF="demo.html"> demo.html</A>
                for($j=1; $j<sizeof($row);$j=$j+1)
                {
                    //printf("%s%s%s","<td>",$row[$j],"</td>");
                    $response.= sprintf("%s%s%s","<td>",$row[$j],"</td>");
                }
                //echo "</tr>";
                $response.= "</tr>";
            }
            //echo "</table>";
            $response.= "</table>";
            
            echo $response;
                
?>
    