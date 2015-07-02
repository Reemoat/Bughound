<html>
    <head>
        
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(-1);
        /* Open a connection to the MySQL server */
        $con = \mysql_connect("localhost", "root", "root") or die(\mysql_error());
        /* Open connection to database named: BugHound */
        $db = \mysql_select_db("BugHound",$con) or die(\mysql_error());
        
        $filename = basename($_FILES["b_attach"]["name"]);
        echo "Here is filename:: " . $filename . "<br>";
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/attachments/";
        $target_file = $target_dir . basename($_FILES["b_attach"]["name"]);
        echo "<br>".$_FILES["b_attach"]["tmp_name"] . "<br>";
        //echo $target_file . "<br>PHP version: " . phpversion(). "<br>";
        
        if($filename)
        {
            move_uploaded_file($_FILES["b_attach"]["tmp_name"], $target_file);
        }



        
        $output = sprintf("Insert into Bugs VALUES('','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
        $_POST["b_program"],
        //$_POST["b_release"],
        //$_POST["b_version"],
        $_POST["b_functional"],
        $_POST["b_report"],        
        $_POST["b_severe"],
        $_POST["b_summary"],
        $_POST["b_problem"],
        $_POST["b_reproduce"],
        $_POST["b_sugestion"],
        $_POST["b_reportedBy"],
        $_POST["b_date"],
        /*$_POST["b_status"],*/"",
        /*$_POST["b_priority"],*/"",
        /*$_POST["b_resolution"],*/"",
        /*$_POST["b_resolver"],*/"",
        /*$_POST["b_res_date"],*/"",        
        /*$_POST["b_testedBy"],*/"",
        /*$_POST["b_deferred"]);*/"",
        /*$_POST["b_attachment"]*/$filename);
        
        /* Run Query: Insert into Bugs VALUES(....) */
        \mysql_query($output) or die(\mysql_error());
        
        /* Tell the browser to go back to the home page */
        /* by echoing a javascript to the browser */
//         echo '<script type="text/javascript">'
//        , 'window.location.href = "index.php";'
//                , '</script>'
;
        //echo $output;
        ?>
        
    
        
        
         
    </body>
    
</html>