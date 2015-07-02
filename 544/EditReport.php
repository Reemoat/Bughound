<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>This is where the title goes?</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body style="background-color:#C8C8C8">
        <script type='text/javascript'>
            function getReportData(reportNumber)
            {
                //alert("inside getReportData, reportNumber = " + reportNumber);
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState === 4) 
                {   
                    //alert("(xmlhttp.readyState == 4) == TRUE");
                    var tmp = new Array();
                    tmp = xmlhttp.responseText.split(",");
                    document.getElementById("b_program").value = tmp[1];
                    document.getElementById("b_release").value = tmp[2];
                    document.getElementById("b_version").value = tmp[3];
                    document.getElementById("b_function").value = tmp[4];
                    document.getElementById("b_report").value = tmp[5];
                    document.getElementById("b_severe").value = tmp[6];
                    document.getElementById("b_summary").value = tmp[7];
                    document.getElementById("b_problem").value = tmp[8];
                    document.getElementById("b_reproduce").value = tmp[9];
                    document.getElementById("b_sugestion").value = tmp[10];
                    document.getElementById("b_repeortedBy").value = tmp[11];
                    document.getElementById("b_date").value = tmp[12];
                    document.getElementById("b_status").value = tmp[13];
                    document.getElementById("b_priority").value = tmp[14];
                    document.getElementById("b_resolution").value = tmp[15];
                    document.getElementById("b_resolver").value = tmp[16];
                    document.getElementById("b_res_date").value = tmp[17];
                    document.getElementById("b_testedBy").value = tmp[18];
                    document.getElementById("b_deferred").value = tmp[19];
                    if(tmp[20])
                    {
                      document.getElementById("attachment").value = tmp[20];  
                    }
                    //document.getElementById("b_date").value = tmp[12];
                    
  
                }
            }
                //alert("calling open, str == " + str);
                xmlhttp.open("GET", "http://localhost/544/getReport.php?name=" + reportNumber, true);
                xmlhttp.send();
    }
            
        </script>
       
        <script type='text/javascript'>
            function init(reportNumber)
            {
                document.forms['form1']['ReportNumber'].value = reportNumber;
                getReportData(reportNumber);
                A_getColumn_from_Table("Resolution","Resolution","Name");
                A_getColumn_from_Table("Tester","Employees","Name");
                A_getColumn_from_Table("Resolver","Employees","Name");
                
                
            }
        </script>
        <script type='text/javascript' src='A_getColumn_from_table.js'></script>
        <script type='text/javascript'>
            function setInputValue(id,target)
            {
                document.getElementById(target).value = document.getElementById(id).value;
            }
        </script>
        <script type='text/javascript'>
            function viewAttacment()
            {
                window.location = "http://localhost/544/viewAttachment.php?filename=" + document.getElementById("attachment").value;
            }
        </script>
        <h1 id='hearder'><b>View/Edit Bug Report</b> </h1>
        <form>
            
            <label><b>Program:</b> </label>
            <input type='text' id='b_program' name='b_program' disabled/>
                
                <label><b>Release:</b></label> 
                <input type='text' name='b_release' id='b_release' disabled/>
                
                <label><b>Version:</b></label> 
                <input type='text' name='b_version' id='b_version' disabled/>
                
                <label><b>Functional Area:</b></label> 
                <input type='text' name='b_function' id='b_function' disabled/>
                <br>
                <br>
            <label><b>Report Type:</b> </label>
            <input type='text' name='b_report' id='b_report' disabled/>
            
            
            <label><b>Severity:</b> </label>
            <input type='text' name='b_severe' id='b_severe' disabled/>
            
            <br>
            
            <p>
                <label><b>Problem Summary:</b></label>
            
            <textarea disabled
                  name = 'b_summary'
                  id='b_summary'
                  rows = '1'
                  cols = '65'>Problem Summary
                  
              
            </textarea>
            </p>
            <div> 
            
                <label for='b_problem'><b>Problem:</b></label>
            
            <textarea  disabled
                  name = 'b_problem'
                  id='b_problem'
                  rows = '3'
                  cols = '65'>Problem
              
            </textarea>
            </div>
            <label><b>Reproducible?:</b></label>
            <INPUT TYPE='text' name='b_reproduce' id ='b_reproduce'>
            
            <p>
                <label><b>Suggested Fix:</b></label>
            
            <textarea disabled
                  name = 'b_sugestion'
                  id='b_sugestion'
                  rows = '2'
                  cols = '65'>Suggested Fix
              
            </textarea>
            </p>
            
        <label><b>Reported By:</b> </label>
        <input type='text' name='b_repeortedBy' id='b_repeortedBy' disabled/>
             
        <b>Date:</b><input type="date" name='b_date' id='b_date'>
        <b>Attachment:</b><input id ="attachment" onmouseup="return viewAttacment()"/>
        
        <br>
        <label><b>Status:</b> </label>
        <input type='text' name='b_status' id='b_status' disabled/>
        
        <label><b>Priority:</b> </label>
        <input type='text' name='b_priority' id='b_priority' disabled/>
        <br>
        <label><b>Resolution:</b> </label>
        <input type='text' name='b_resolution' id='b_resolution' disabled/>
        
        <label><b>Resolved By:</b> </label>
        <input type='text' name='b_resolver' id='b_resolver' disabled/>
        
        <label><b>Resolution Date:</b> </label>
        <input type='text' name='b_res_date' id='b_res_date' disabled/>
        <br>
        <label><b>Tested By:</b> </label>
        <input type='text' name='b_testedBy' id='b_testedBy' disabled/>
        
        <label><b>Treat as Deferred:</b> </label>
        <input type='text' name='b_deferred' id='b_deferred' disabled/>
        </form>
        
        <form name='form1' id='form1' action='UpdateReport.php' method='POST'>
            <input type='text' name='ReportNumber' id='ReportNumber' hidden/>
            <br>
            <br>
            <br>
            <table border = "1">
                <caption><b>Edit Area</b></caption>
                <tr>
                    <td><b>Field:</b></td><td><b>New Value</b></td>
                </tr>
                <tr>
                <td><b>Status:</b></td>
                        <td><select name='Status' id ='Status' onclick='setInputValue("Status","b_status")'>
                                <option value=''></option>
                                <option value='open'>Open</option>
                                <option value='closed'>Closed</option>
                    </select></td>
                </tr>
                <tr>
                <td><b>Priority:</b></td>
                <td><select name='Priority' id ='Priority' onclick='setInputValue("Priority","b_priority")'>
                                <option value=''></option>
                                <option value='low'>Low</option>
                                <option value='moderate'>Moderate</option>
                                <option value='high'>High</option>
                            </select></td>
                </tr>
                <tr>
                <td><b>Resolution:</b></td>
                <td><select name='Resolution' id ='Resolution' onclick='setInputValue("Resolution","b_resolution")'></select></td>
                </tr>
                <tr>
                <td><b>Resolved By:</b></td>
                <td><select name='Resolver' id ='Resolver' onclick='setInputValue("Resolver","b_resolver")'></select></td>
                </tr>
                <tr>
                <td><b>Resolution Date:</b></td>
                <td><input name='ResolutionDate' id ='ResolutionDate' onkeyup='setInputValue("ResolutionDate","b_res_date")'/></td>
                </tr>
                <tr>
                <td><b>Tested By:</b></td>
                <td><select name='Tester' id ='Tester' onclick='setInputValue("Tester","b_testedBy")'></select></td>
                </tr>
                <tr>
                <td><b>Treat as Deferred:</b></td>
                        <td><select name='deferred' id ='deferred' onclick='setInputValue("deferred","b_deferred")'>
                                <option value=''></option>
                                <option value='yes'>Yes</option>
                                <option value='no'>No</option>
                    </select></td>
                </tr>
            </table>
            <input type='submit' value='Submit'>
        </form>
        
        <?php
            $num = $_GET['name'];
            //$num=1;
            //echo "Here is num::" . $num;
            echo '<script type="text/javascript">'
        , 'init(' . $num . ');'
                , '</script>';
        ?>
    </body>
</html>
