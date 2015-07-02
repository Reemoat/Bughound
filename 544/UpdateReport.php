<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $con = \mysql_connect("localhost", "root", "root") or die(\mysql_error());
        $db = \mysql_select_db("BugHound",$con) or die(\mysql_error());
        //echo "<h1>Hello from Bug Update!!!!</h1>";
        $num = $_POST['ReportNumber'];
        //echo "You want to update Report Number: " . $num;
        if($_POST['ResolutionDate'] != '')\mysql_query(sprintf("Update Bugs set ResolutionDate = '%s' where Report_num = '%s'",$_POST['ResolutionDate'],$num)) or die(\mysql_error());
        if($_POST['Status'] != '')\mysql_query(sprintf("Update Bugs set Status = '%s' where Report_num = '%s'",$_POST['Status'],$num)) or die(\mysql_error());
        if($_POST['Resolution'] != '')\mysql_query(sprintf("Update Bugs set Resolution = '%s' where Report_num = '%s'",$_POST['Resolution'],$num)) or die(\mysql_error());
        if($_POST['Priority'] != '')\mysql_query(sprintf("Update Bugs set Priority = '%s' where Report_num = '%s'",$_POST['Priority'],$num)) or die(\mysql_error());
        if($_POST['Tester'] != '')\mysql_query(sprintf("Update Bugs set Tester = '%s' where Report_num = '%s'",$_POST['Tester'],$num)) or die(\mysql_error());
        if($_POST['deferred'] != '')\mysql_query(sprintf("Update Bugs set deferred = '%s' where Report_num = '%s'",$_POST['deferred'],$num)) or die(\mysql_error());
        if($_POST['Resolver'] != '')\mysql_query(sprintf("Update Bugs set Resolver = '%s' where Report_num = '%s'",$_POST['Resolver'],$num)) or die(\mysql_error());
           
//        echo sprintf("<br>Update Bugs set ResolutionDate = '%s' where Report_num = '%s'",$_POST['ResolutionDate'],$num);
                 echo '<script type="text/javascript">'
        , 'window.location.href = "SearchBugReports.php";'
                , '</script>'
;
        ?>
    </body>
</html>
