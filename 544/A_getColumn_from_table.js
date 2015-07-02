function A_getColumn_from_Table(id,table,column)
{
    /* id    = dropdown in which to store the values    */
    /* table = the table in which the column will be got*/
    /* column= the column to get */
    var xmlhttp = new XMLHttpRequest();
            //alert("inside A_getColumn_from_Table:");
            xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4) 
            {
                //alert("inside A_getColumn_from_Table:");
                var tmp = new Array();
                /* Split the response from the server (sent as 'value1,value2... */
                /* into an array */
                tmp = xmlhttp.responseText.split(",");
                
                /* selector = the drop down we wish to set with the values  */
                /* that correspond to the to the column returned from the server
                 * as a string (which we have parsed to an array)
                 */ 
                var selecter = document.getElementById(id);
                //alert("dropdown = " +id+" Domain = " + table+ " tmp.length = " + tmp.length);
                
                /* Load dropdown with new list of entries from server side query */
                var el = document.createElement("option");
                el.textContent = '';
                el.value = '';
                selecter.appendChild(el);
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
        
        xmlhttp.open("GET", "http://localhost/544/A_getColumnfrom_table.php?table=" + table +"&column="+column, true);
        xmlhttp.send();
}


