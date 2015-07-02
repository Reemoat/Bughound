<?php
    //ini_set('display_errors',1);
    //ini_set('display_startup_errors',1);
    //error_reporting(-1);
    $file_display = array('jpg', 'jpeg', 'png', 'gif');
    $filename = $_REQUEST['filename'];
    $www_root = 'http://localhost/attachments/';
    //$filename = "Screen.png";
    $fileType = $file_type = strtolower(end(explode('.', $filename)));
    
    /* if file type is an image */
    if(in_array($fileType,$file_display))
    {
        echo '<img src="'. $www_root. '/'. $filename. '" alt="'. $filename. '"/>';
    }
    else 
    {
        $handle = fopen($_SERVER['DOCUMENT_ROOT']."/attachments/" . $filename, "r");
        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) 
            {
                echo $buffer . "<br>";
            }
            if (!feof($handle)) 
            {
                echo "Error: unexpected fgets() fail\n";
            }
        fclose($handle);
}
 else 
{
     echo "Error opening file:" . $filename;
}
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

