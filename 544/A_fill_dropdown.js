function getDropDownOptions(id,table,column)
{
    var hr = new XMLHttpRequest();
    
    var vars = "column=" + column + "&table=" + table;

    hr.open("POST","http://localhost/544/A_fill_dropdown.php", true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState === 4 && hr.status === 200) 
        {
            //alert("Server response:\n" + hr.responseText);
            document.getElementById(id).innerHTML = hr.responseText;
        }
    }
        // Send the data to PHP now... and wait for response 
        hr.send(vars); // Actually execute the request
}


