function insertEmployee()
{
    var table = "Employees";
    var val1 = document.getElementById('emp_name').value;
    var val2 = document.getElementById('emp_cur').value;
    var val3 = document.getElementById('emp_user').value;
    var val4 = document.getElementById('emp_pass').value;
    var query = "Insert into " + table + " values('','" + val1 + "','" + val2 + "','" + val3 + "','"+ val4 + "')";
    //alert(query);
    ajax_send_query_to_server(query,table);
    return false;
}

function insertProgram()
{
    var table = "Programs";
    var val1 = document.getElementById('pgm_name').value;
    var val2 = document.getElementById('pgm_version').value;
    var val3 = document.getElementById('pgm_release').value;
    var query = "Insert into " + table + " values('','" + val1 + "','" + val2 + "','" + val3 + "')";
    //alert(query);
    ajax_send_query_to_server(query,table);
    return false;
}

function insertFunctionalArea()
{
    var table = "FunctionalArea";
    var val1 = document.getElementById('fun_num').value;
    var val2 = document.getElementById('fun_name').value;
    var query = "Insert into " + table + " values('','" + val1 + "','" + val2 + "')";
    //alert(query);
    ajax_send_query_to_server(query,table);
    return false;
}
function updateEmployee()
{
    var table = "Employees";
    alert("Still here 1");
    //var val1 = document.forms['editArea']['emp_num'].value;
    var val1 = document.getElementById('emp_num').value;
    var val2 = document.getElementById('emp_name').value;
    //alert("Still here 2: val1 = " + val1 +"val2= " +val2);
    var val3 = document.getElementById('emp_cur').value;
    var val4 = document.getElementById('emp_user').value;
    var val5 = document.getElementById('emp_pass').value;
     
    ajax_send_query_to_server("Update " + table + " set Name = '" + val2 + "',"+"Current = '" + val3 + "'," + "User_Name='" + val4 + "',Password='"+ val5  + "' Where Employee_Number = " + val1,table);
    //ajax_send_query_to_server("Update " + table + " set Current = '" + val3 + "'" + " Where Emp_num = " + val1,table);
    //alert("Still here 2: val1 = " + val1 +"val2= " +val2);            
    return false;
}
function updateProgram()
{
    var table = "Programs";
    var val1 = document.getElementById('pgm_num').value;
    var val2 = document.getElementById('pgm_name').value;
    var val3 = document.getElementById('pgm_release').value;
    var val4 = document.getElementById('pgm_version').value;
    //var query = "Update " + table + " set Name = '" + val2 + "',"+"Release = '" + val3 + "',Version='" + val4 + "' Where Emp_num = " + val1;
    ajax_send_query_to_server("Update " + table + " set Name = '" + val2 + "',"+"b_Release = '" + val3 + "',Version='" + val4 + "' Where Program_Number = " + val1,table);
    //alert("Still here 2: query = " + query);     
                
    return false;
}

function ajax_send_query_to_server(query,showTable){
            // Create our XMLHttpRequest object
            var hr = new XMLHttpRequest();
            // What we are gonna send to the server as a $_POST[] element.
            // notice: we name the post element 'query' (the hard coded 'query=') 
            // so the server should see it as $_POST['query']
            var vars = "query=" + query;
            hr.open("POST","http://localhost/544/RunQuery.php", true);
            // Set content type header information for sending url encoded variables in the request
            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // Access the onreadystatechange event for the XMLHttpRequest object
            hr.onreadystatechange = function() {
            if(hr.readyState === 4 && hr.status === 200) 
            {
		    var return_data = hr.responseText;
                    getTable(showTable);
                    //alert("Sever Response:\n"+return_data);
	    }
        }
        // Send the data to PHP now... and wait for response
        // which 
        hr.send(vars); // Actually execute the request
}

