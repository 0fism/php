<?php
session_start();
?>
<html>
<head>
    <title>Upcoming Events</title>
</head>

<body onLoad="setupTable()">

<h1>Upcoming Events</h1>

<script language="JavaScript">

	function start()
	{
    setupTable();
	}

    function setupAjax(query, myLocation) 
    {
        if  (window.XMLHttpRequest) 
        {
            // Code for modern browsers
            request=new XMLHttpRequest();
        }
        else 
        {
            // code for older versions of Internet Explorer
            request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        request.onreadystatechange=function() 
        {
            if  (request.readyState==4 && request.status==200) 
            {
                document.getElementById(myLocation).innerHTML = request.responseText;
            }
        }

        request.open ("GET", query, true);
        request.send();
    }


    function setupTable() 
    {
	   getClasses();
    }

    function getClasses() 
    {
	   setupAjax("P9Task3EventQuery.php","XYZ");
    }

</script>

<BR>

<h4 ID="XYZ">Hello World!</h4>

<INPUT TYPE="button" NAME="mybutton1" Value="Review Events" onClick="getClasses()">

<br>
<hr />
<button onclick="goBack()">Go Back To Main Menu</button>

<script>
function goBack() {
  window.history.back();
}
</script>

</body>
</html>