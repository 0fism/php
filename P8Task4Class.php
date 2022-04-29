<?php
session_start();
?>
<html>
<head>
    <title>Classes Management</title>
</head>

<body onLoad="setupTable()">

<h1>Classes Management</h1>

<script language="JavaScript">

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
	   setupAjax("P8Task4ClassQuery.php","XYZ");
    }


    function insertClass() 
    {
	   var myText="P8Task4ClassInsert.php?CDesc=" + document.aForm.CDesc.value + "&CStartDate=" + document.aForm.CStartDate.value; 

	   setupAjax (myText,"XYZ");

    }

    function updateClass() 
    {
	   var myText="P8Task4ClassUpdate.php?CID=" + document.bForm.CID.value + "&CDesc=" + document.bForm.CDesc.value + "&CStartDate=" + document.bForm.CStartDate.value; 

	   setupAjax (myText,"XYZ");

    }


    function deleteClass() 
    {
	   var myText="P8Task4ClassDelete.php?CID=" + document.cForm.CID.value; 

	   setupAjax (myText, "XYZ");

    }

</script>

<BR>

<h4 ID="XYZ">Hello World!</h4>


<INPUT TYPE="button" NAME="mybutton1" Value="Review Classes" onClick="getClasses()">


<br>

<form name = "aForm">
    Insert Class: <br>
    Class Description : 
    <input type = "text" name = "CDesc">
    Class Start Date : 
    <input type = "text" name = "CStartDate">

    <br>
    <br>

    <INPUT TYPE="button" NAME="mybutton" Value="Insert Class" onClick="insertClass()">
</form>

<hr />

<form name = "bForm">
    Update Class: <br>

    Class ID: 
    <input type = "text" name = "CID">
    Class Description : 
    <input type = "text" name = "CDesc">
    Class Start Date : 
    <input type = "text" name = "CStartDate">

    <br>
    <br>

    <INPUT TYPE="button" NAME="mybutton2" Value="Update Class" onClick="updateClass()">
</form>


<hr />

<form name = "cForm">
    Delete Class: <br>

    Class ID: 
    <input type = "text" name = "CID">
    
    <br>
    <br>

    <INPUT TYPE="button" NAME="mybutton3" Value="Delete Class" onClick="deleteClass()">
</form>

</body>
</html>