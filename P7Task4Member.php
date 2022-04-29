<?php
session_start();
if (isset($_SESSION['check'])==False) {
    echo '<p> <a href ="P4Task2Login.php">Please login first</a> </p>';
    echo '<p> After 2s redirect to login page. </p>';
    header("refresh:2;url=P4Task2Login.php" );
    die();
}
?>
<html>
<head>
    <title>Member Management</title>
</head>

<body onLoad="setupTable()">

<h1>Member Management</h1>

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
	   getMembers();
    }

    function getMembers() 
    {
	   setupAjax("P7Task4MemberQuery.php","XYZ");
    }

    function insertMember() 
    {
	   var myText="P7Task4MemberInsert.php?PName=" + document.aForm.PName.value + "&PAddr=" + document.aForm.PAddr.value + "&PEmail=" + document.aForm.PEmail.value + "&PMobile=" + document.aForm.PMobile.value + "&PChildName=" + document.aForm.PChildName.value + "&PChildDOB=" + document.aForm.PChildDOB.value; 

	   setupAjax (myText,"XYZ");

    }


    function insertMember2() 
    {
	   var myText="P7Task4MemberInsert.php?PName=" + document.aForm.PName.value + "&PAddr=" + document.aForm.PAddr.value + "&PEmail=" + document.aForm.PEmail.value + "&PMobile=" + document.aForm.PMobile.value + "&PChildName=" + document.aForm.PChildName.value + "&PChildDOB=" + document.aForm.PChildDOB.value + "&PChildUID=" + document.aForm.PChildUID.value; 

	   setupAjax (myText,"XYZ");

    }

    function updateMember() 
    {
	   var myText="P7Task4MemberUpdate.php?PID=" + document.bForm.PID.value + "&PName=" + document.bForm.PName.value + "&PAddr=" + document.bForm.PAddr.value + "&PEmail=" + document.bForm.PEmail.value + "&PMobile=" + document.bForm.PMobile.value + "&PChildName=" + document.bForm.PChildName.value + "&PChildDOB=" + document.bForm.PChildDOB.value; 

	   setupAjax (myText,"XYZ");

    }


    function updateMember2() 
    {
	   var myText="P7Task4MemberUpdate.php?PID=" + document.bForm.PID.value + "&PName=" + document.bForm.PName.value + "&PAddr=" + document.bForm.PAddr.value + "&PEmail=" + document.bForm.PEmail.value + "&PMobile=" + document.bForm.PMobile.value + "&PChildName=" + document.bForm.PChildName.value + "&PChildDOB=" + document.bForm.PChildDOB.value + "&PChildUID=" + document.bForm.PChildUID.value; 

	   setupAjax (myText,"XYZ");

    }


    function deleteMember() 
    {
	   var myText="P7Task4MemberDelete.php?PID=" + document.cForm.PID.value; 

	   setupAjax (myText, "XYZ");

    }

</script>

<BR>

<h4 ID="XYZ">Hello World!</h4>


<INPUT TYPE="button" NAME="mybutton1" Value="Review Members" onClick="getMembers()">


<br>

<?php
if ($_SESSION['check']=='admin'){
?>
<form name = "aForm">
    Insert Member: <br>
    Parent Name: 
    <input type = "text" name = "PName">
    Parent Address: 
    <input type = "text" name = "PAddr">
    Parent Email: 
    <input type = "text" name = "PEmail">
    Parent Mobile: 
    <input type = "text" name = "PMobile">
    Child Name: 
    <input type = "text" name = "PChildName">
    Child Date of Birth: 
    <input type = "text" name = "PChildDOB">
    Child User ID: 
    <input type = "text" name = "PChildUID"> 

    <br>
    <br>

    <INPUT TYPE="button" NAME="mybutton" Value="Insert Member" onClick="insertMember2()">
</form>

<hr />

<form name = "bForm">
    Update Member: <br>

    Parent ID: 
    <input type = "text" name = "PID">
    Parent Name: 
    <input type = "text" name = "PName">
    Parent Address: 
    <input type = "text" name = "PAddr">
    Parent Email: 
    <input type = "text" name = "PEmail">
    Parent Mobile: 
    <input type = "text" name = "PMobile">
    Child Name: 
    <input type = "text" name = "PChildName">
    Child Date of Birth: 
    <input type = "text" name = "PChildDOB"> 
    Child User ID: 
    <input type = "text" name = "PChildUID"> 


    <br>
    <br>

    <INPUT TYPE="button" NAME="mybutton2" Value="Update Member" onClick="updateMember2()">
</form>


<hr />

<form name = "cForm">
    Delete Member: <br>

    Parent ID: 
    <input type = "text" name = "PID">
    
    <br>
    <br>

    <INPUT TYPE="button" NAME="mybutton3" Value="Delete Member" onClick="deleteMember()">
</form>

<hr />

<p> <a href ="P7Task2Logout.php">Log Out</a> </p>
<?php
}else{
?>
<form name = "aForm">
    Insert Member: <br>
    Parent Name: 
    <input type = "text" name = "PName">
    Parent Address: 
    <input type = "text" name = "PAddr">
    Parent Email: 
    <input type = "text" name = "PEmail">
    Parent Mobile: 
    <input type = "text" name = "PMobile">
    Child Name: 
    <input type = "text" name = "PChildName">
    Child Date of Birth: 
    <input type = "text" name = "PChildDOB">    

    <br>
    <br>

    <INPUT TYPE="button" NAME="mybutton" Value="Insert Member" onClick="insertMember()">
</form>

<hr />

<form name = "bForm">
    Update Member: <br>

    Parent ID: 
    <input type = "text" name = "PID">
    Parent Name: 
    <input type = "text" name = "PName">
    Parent Address: 
    <input type = "text" name = "PAddr">
    Parent Email: 
    <input type = "text" name = "PEmail">
    Parent Mobile: 
    <input type = "text" name = "PMobile">
    Child Name: 
    <input type = "text" name = "PChildName">
    Child Date of Birth: 
    <input type = "text" name = "PChildDOB">  

    <br>
    <br>

    <INPUT TYPE="button" NAME="mybutton2" Value="Update Member" onClick="updateMember()">
</form>


<hr />

<form name = "cForm">
    Delete Member: <br>

    Parent ID: 
    <input type = "text" name = "PID">
    
    <br>
    <br>

    <INPUT TYPE="button" NAME="mybutton3" Value="Delete Member" onClick="deleteMember()">
</form>

<hr />

<p> <a href ="P7Task2Logout.php">Log Out</a> </p>
<?php }?>





</body>
</html>