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
        <link rel="stylesheet" type="text/css" href="stylesheet1.css">
    </head>
    <body>
        <script type='text/javascript'>
            function getTable(table)
            {
                //alert("inside getReportData, reportNumber = " + reportNumber);
                
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() 
                {
                    if (xmlhttp.readyState === 4) 
                    {   
                    //tmp = xmlhttp.responseText.split(",");
                    document.getElementById("table").innerHTML = xmlhttp.responseText;
                    }
                }
                //alert("calling open, str == " + str);
                xmlhttp.open("GET", "http://localhost/544/getTableData.php?table=" + table, true);
                xmlhttp.send();
    }
            
        </script>
        
        <script type='text/javascript' src='manageTables.js'></script>
        

        
        <h2><b>View Table:       </b>
        <input type='button' onclick='getTable("Employees")' value='Employees'/>
        <input type='button' onclick='getTable("Programs")' value='Programs'/>
        <input type='button' onclick='getTable("FunctionalArea")' value='Functional Area'/>
        </h2>
        
        
        <form name ='editArea' id ='editArea'>
        <table border='2'>
            <tr>
                <th><b>Table:</b></th>
                <th colspan="4"><b>Fields:</b></th>
                <th><b>Action:</b></th>
            </tr>
            <tr>
                <td><b>Employees:</b></td>
                <td>
                    Number<input type='text' id='emp_num' name ='emp_num' size='3' value='not needed for Insert'/>
                </td><td>
                    Name<input type='text' id='emp_name' name = 'emp_name' size='9'/>
                </td><td>
                    Current<select id='emp_cur' name = 'emp_cur'>
                
                        <option value='yes'>Yes</option>
                        <option value='no'>No</option>
                    </select>
                </td><td>
                    User Name<input type='text' id='emp_user' name = 'emp_user' size='9'/>
                    Password<input type='text' id='emp_pass' name = 'emp_pass' size='9'/>
                </td>
                <td>
                   <input type='button' onclick='insertEmployee()' value='Insert'/>
                   <input type='button' onclick='updateEmployee()' value='Update'/>
                </td>
            </tr>
            <tr>
                <td><b>Programs:</b></td>
                <td>
                    Number<input type='text' id='pgm_num' name ='pgm_num' size='3' value='not needed for Insert'/>
                </td><td>
                    Name<input type='text' id='pgm_name' name = 'pgm_name' size='9'/>
                </td><td>
                    Release<input type='text' id='pgm_release' name = 'pgm_release' size='3'/>
                </td><td>
                    Version<input type="text" id='pgm_version' name = 'pgm_version' size='3'/> 
               
                </td>
                
                <td>
                   <input type='button' onclick='insertProgram()' value='Insert'/>
                   <input type='button' onclick='updateProgram()' value='Update'/>
                </td>
            </tr>
            <tr>
                <td><b>Functional Area:</b></td>
                <td>
                    Area_Id<input type='text' id='fun_id' name ='fun_id' size='3'/>
                </td><td>
                    Program Id<input type='text' id='fun_num' name ='fun_num' size='3'/>
                </td><td>
                    Name<input type='text' id='fun_name' name = 'emp_name' size='9'/>
                    
                </td><td>
                </td><td>
                
                   <input type='button' onclick='insertFunctionalArea()' value='Insert'/>
                   <input type='button' onclick='updateFunctionalArea()' value='Update'/>
                </td>
            </tr>
            
        </table>
        </form>
        <form name = 'table' id ='table'></form>
        <?php
        // put your code here
        ?>
    </body>
</html>
