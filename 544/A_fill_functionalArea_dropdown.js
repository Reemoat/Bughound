/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getFunctionalAreas()
{
    var hr = new XMLHttpRequest();
    
    //var vars = "column=" + column + "&table=" + table;
    var args = "Program_id="+ document.getElementById("b_program").value;

    hr.open("POST","http://localhost/544/A_fill_functionalArea_dropdown.php", true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState === 4 && hr.status === 200) 
        {
            //alert("Server response:\n" + hr.responseText);
            document.getElementById("b_functional").innerHTML = hr.responseText;
        }
    }
        // Send the data to PHP now... and wait for response 
        hr.send(args); // Actually execute the request
}


