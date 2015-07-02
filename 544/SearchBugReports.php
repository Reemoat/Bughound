<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Search</title>
        <link rel="stylesheet" type="text/css" href="stylesheet1.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <script type='text/javascript' src ='A_fill_dropdown.js'></script>
        <script type='text/javascript'>
            function goToHomePage()
            {
                alert("in goToHomePage()");
                window.location.href = "index.php";
            }
        </script>
        <script type='text/javascript'>
            function reset()
            {
                window.location.reload(true);
            }
        </script>
        <script type='text/javascript'>
            function setDropDown(str)
            {
                var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4) 
            {
                var tmp = new Array();
                tmp = xmlhttp.responseText.split(",");  
                var selecter = document.getElementById(str);   
                /* Load dropdown with new list of names */
                for(var i = 0; i < tmp.length; i++) 
                {
                    var opt = tmp[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    selecter.appendChild(el);
                }
            }
        }
        
        xmlhttp.open("GET", "http://localhost/544/getColumnfromTable.php?name=" + str, true);
        xmlhttp.send();
            }
        </script>
        <script type='text/javascript'>
            function init()
            {
//                setDropDown("Program");
                getDropDownOptions("Program_id","Bugs","Program_id");
                getDropDownOptions("ReportType","Bugs","ReportType");
                getDropDownOptions("Severe","Bugs","Severe");
                getDropDownOptions("Reporter","Bugs","Reporter");
                getDropDownOptions("B_Date","Bugs","B_Date");
                getDropDownOptions("Status","Bugs","Status");
                getDropDownOptions("Priority","Bugs","Priority");
                getDropDownOptions("Resolver","Bugs","Resolver");
                
            }
        </script>
        <script type='text/javascript'>
            function showSnapShot(str)
            {
                var query = "query="+buildQuery();
                //var tmp = document.getElementById(str).value;
                //var vars = "arg1=" + str +"&arg2="+tmp+"";
                //alert("In showSnapShot(), vars to send to server: " + query);
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST", "http://localhost/544/snapshot.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) 
            {
                //alert("Recieved a response from server:\n"+xmlhttp.responseText);
                document.getElementById("table").innerHTML = xmlhttp.responseText;
            }
        }
        
        
        xmlhttp.send(query);
    
        }
        </script>
        <script type="text/javascript">
        
            function buildQuery()
            {
                var query = "Select * from snapshot where ";
                var check ="c_";
                var numberOfSelected = -1;
                /* find out how many check boxes are checked
                 * because we need to know how many 'and' to apppend to query 
                 * note numberOfSelected = -1 becuase if only a single checkbox
                 * is selected, it's incremented to 0 and thats how many 'and's we need*/
                for (var i =0; i<8;i++)
                {
                    if(document.getElementById(check + i).checked)
                    {
                       numberOfSelected++;
                    }
                }
                
                for (var i =0; i<8;i++)
                {
                    if(document.getElementById(check + i).checked)
                    {
                        query += getField(i);
                        if(numberOfSelected)
                        {
                            query += " and ";
                            numberOfSelected--;
                        }
                    }
                }
                //alert(query);
                return query;
            }
        </script>
        <script type="text/javascript">
            function getField(str)
            {
                var response;
               
                if(str === 0)
                    response = "Program_id='" + document.getElementById("Program_id").value + "'";
                if(str === 1)
                    response = "ReportType='" + document.getElementById("ReportType").value + "'";
                else if(str === 2)
                    response = "Severe='" + document.getElementById("Severe").value + "'";
                else if(str === 3)
                    response = "Reporter='" + document.getElementById("Reporter").value + "'";
                else if(str === 4)
                    response = "B_Date='" + document.getElementById("B_Date").value + "'";
                else if(str === 5)
                    response = "Status='" + document.getElementById("Status").value + "'";
                else if(str === 6)
                    response = "Priority='" + document.getElementById("Priority").value + "'";
                else if(str === 7)
                    response = "Resolver='" + document.getElementById("Resolver").value + "'";
                
                return response;
            }
               
        </script>
        <h1>Search bug reports:</h1>
        <table><tr><td>
        <form>
            <table border="1">
                <tr><td><input type="checkbox" id="c_0"/></td>
                    <td><label>Program Name:</label></td><td><select name='Program_id' id='Program_id'></select></td>
                </tr>
                <tr>
                    <tr><td><input type="checkbox" id="c_1"/></td>
                    <td><label>Report type:</label></td><td><select name='ReportType' id='ReportType'></select></td>
                </tr>
                <tr>
                    <td><input type="checkbox" id ="c_2"/></td>
                    <td><label>Severity:</label></td><td><select name='Severe' id='Severe'></select></td>
                </tr>
                <tr>
                    <td><input type="checkbox" id ="c_3"/></td>
                    <td><label>Reporter:</label></td><td><select name='Reporter' id='Reporter'></select></td>
                </tr>
                <tr>
                    <td><input type="checkbox" id ="c_4"/></td>
                    <td><label>Date:</label></td><td><select name='B_Date' id='B_Date'></select></td>
                </tr>
                <tr>
                    <td><input type="checkbox" id ="c_5"/></td>
                    <td><label>Status:</label></td><td><select name='Status' id='Status'></select></td>
                </tr>
                <tr>
                    <td><input type="checkbox" id ="c_6"/></td>
                    <td><label>Priority:</label></td><td><select name='Priority' id='Priority'></select></td>
                </tr>
                <tr>
                    <td><input type="checkbox" id ="c_7"/></td>
                    <td><label>Resolved By:</label></td><td><select name='Resolver' id='Resolver'></select></td>
                </tr>
                <tr>
                    
                    <td><input type='button' onclick='showSnapShot()' value="Search"/></td>
                    <td><input type='button' onclick='reset()' value="Reset"/></td>
                    <td><input type='button' onclick='goToHomePage()' value="Cancel"/></td>
                </tr>
                    
                    
<!--        <label>Severity~~~~:</label><select name='Sev_select' id='Sev_select'></select><input type='button'/>
        <label>Reporter~~~~:</label><select name='Reporter' id='Reporter'></select><input type='button'/>
        <label>Date~~~~~~~~:</label><select name='Sev_select' id='Sev_select'></select><input type='button'/>-->
            </table>
        </form>
                </td>
                <td>
        <form name = 'table' id ='table'></form>
                </td></tr>
        </table>
      
        <?php
                 echo '<script type="text/javascript">'
        , 'init();'
                , '</script>'
        ?>
    </body>
    
</html>
