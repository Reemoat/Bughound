<?php
// Here, the variable name can be anything you want but the name of the 
// $_POST[] array element has to match the name you gave it when you passed
// it from javascript
    $arg1 = $_POST["arg1"];
    $arg2 = $_POST["arg2"];
    
    $response="";
    
    if($arg1 && $arg2)
    {
        $response.= "<table border \"1\"><tr><td><b>F_Name</b></td><td><b>L_Name</b></td></tr>";
        $response.= "<tr><td>" . $arg1 . "</td><td>" . $arg2 . "</td></tr></table>"; 
        echo $response;        
    }
    else
        echo "I didn't recieve any arguments :(";

?>



