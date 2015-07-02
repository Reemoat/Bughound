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
        <script type='text/javascript'>
            function sendAjaxRequest()
            {
                /* arguments we want to send to the server */
                var fname = "Daniel";
                var lname = "Hardy";
                /* When sending them to the server, they to be in the form: */
                /* "name=what&title=ever"  */
                /* Look at line below, the name in the string part has to be
                 * consistent with the name of the $_POST[] element.
                 * In this case it would be $_POST['arg1']....etc.  */
                var vars = "arg1=" + fname +"&arg2="+ lname;
                
                /* Create an XMLHttpRequest() object to handle the Request */
                var xmlhttp = new XMLHttpRequest();
                /* Open a connection, args: method, url/to/PHP/File, synchronous/asynchronous */
                xmlhttp.open("POST", "http://localhost/544/Example_ajax.php", true);
                /* not sure about this line but i know it's needed.  I think this is where 
                 * we tell the server how to expect the arguments? */
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.setRequestHeader("Content-length", vars.length);
                xmlhttp.setRequestHeader("Connection", "close");
                
                /* Upon recieving a response from server, the 'onreadystatechange'
                 * event fires.  Here, we say when it does, do this... */
                xmlhttp.onreadystatechange = function() 
                {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) 
                    {
                        /* Here I'm just showing a popUp showing the string the
                         * server sent */
                        alert("Recieved a response from server:\n"+xmlhttp.responseText);
                        /* In HTML, the string is interpreted as a table. Put it in form1  */
                        document.getElementById("form1").innerHTML = xmlhttp.responseText;
                    }
                }
                /* Now that we got everything setup, send the request */
                xmlhttp.send(vars);
            }
        </script>
        <input type='button' onclick='sendAjaxRequest()' value='Click'/>
        <form name ='form1' id='form1'></form>
        <?php
        // put your code here
        ?>
    </body>
</html>
