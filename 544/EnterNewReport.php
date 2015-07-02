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
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body style="background-color:#C8C8C8">
        <script type='text/javascript'>
            function goToHomePage(){window.location.href = "index.php";}
        </script>
        <script type='text/javascript' src='A_fill_dropdown.js'></script>
        <script type='text/javascript' src='A_fill_functionalArea_dropdown.js'></script>
      <script type ='text/javascript'>
          function init()
          {
              getDropDownOptions("b_reportedBy","Employees","Name");
              getDropDownOptions("b_program","Programs","Program_id");
              //getDropDownOptions("b_release","Programs","b_Release");
              //getDropDownOptions("b_version","Programs","Version");
          }
      </script>
      <script type='text/javascript'>
          function validate()
          {
              //alert("Inside Validate()!");
              //var a = document.forms["Input"]["b_release"].value;
              var b = document.forms["Input"]["b_summary"].value.trim();
              var c = document.forms["Input"]["b_problem"].value.trim();
              //var b = document.forms["Input"]["b_release"].value;
              //if(a==null || a=="")
              //{
              //    alert("Release cannot be left blank");
              //    return false;
              //}
              if(b==null || b=="")
              {
                  alert("Problem summary cannot be left blank");
                  return false;
              }
              if(c==null || c=="" || c==" ")
              {
                  alert("Problem cannot be left blank");
                  return false;
              }
              //return true;
              document.forms["Input"].submit();
              
          }
      </script>
      <script type='text/javascript'>
          function reset()
          {
              var program = document.getElementById("p_program").value.trim();
              var summary = document.getElementById("p_summary").value.trim();
              
              if(program === "" || summary === "" )
              {
                  return false;
              }
              else
              {
                  location.reload(true);
              }
          }
      </script>
      <script type='text/javascript'>
          function viewAttachment()
          {
              
          }
      </script>
      
        <h1><b>Report New Bug</b> </h1>
        
        <form name='Input' action='Bug_Insert.php' method='post' enctype="multipart/form-data">
            <label><b>Program:</b> </label>
            
            <select name='b_program' id='b_program' onchange='getFunctionalAreas()'>
                
            </select>
<!--                <label><b>Release:</b></label> 
                <select
                       name='b_release'
                       id='b_release'></select>
                <label><b>Version:</b></label> 
                <select
                       name='b_version'
                       id='b_version'></select>
                <br>
                <br>-->
            <label><b>Functional Area:</b> </label>
            <select name='b_functional' id ='b_functional'>
                <option value=""></option>
            </select>
            <label><b>Report Type:</b> </label>
            <select name='b_report'>
                <option value='Coding Error'>Coding Error</option>
                <option value='Design Issue'>Design Issue</option>
                <option value='Suggestion'>Suggestion</option>
                <option value='Documentation'>Documentation</option>
                <option value='Hardware'>Suggestion</option>
                <option value="Query">Query</option>
            </select>
            
            <label><b>Severity:</b> </label>
            <select name='b_severe' id = 'b_severe'>
            <option value='low'>Low</option>
            <option value='moderate'>Moderate</option>
            <option value='High'>High</option>
            </select>
            <br>
            
            <p>
                <label><b>Problem Summary:</b></label>
            
            <textarea
                  name = 'b_summary'
                  rows = '1'
                  cols = '65'>
              
            </textarea>
            </p>
            <div> 
            
                <label for='b_problem'><b>Problem:</b></label>
            
            <textarea
                  name = 'b_problem'
                  rows = '3'
                  cols = '65'>
              
            </textarea>
            
            </div>
            <label for='b_reproduce'><b>Reproducible:</b></label>
            <select name ='b_reproduce' id ='b_reproduce'>
                <option value='yes'>Yes</option>
                <option value='no'>No</option>
                <option value='sometimes'>Sometimes</option>
            </select>
            
            <p>
                <label><b>Suggested Fix:</b></label>
            
            <textarea
                  name = 'b_sugestion'
                  rows = '2'
                  cols = '65'>No idea
              
            </textarea>
            </p>
            
        <label><b>Reported By:</b> </label>
            <select name='b_reportedBy' id ='b_reportedBy'></select>  
        <b>Date:</b><input type="date" name='b_date'>
        <b>Attachment:</b><input type="file" name="b_attach" onmouseup=""/>
        <input type='button' value='Submit' onclick='return validate()'>
        <input type='button' value='Reset' onclick='return reset()'>
        <input type='button' value='Cancel' onclick='goToHomePage()'>
        </form>
        <?php
         echo '<script type="text/javascript">'
        , 'init();'
                , '</script>';
        ?>
    </body>
</html>
