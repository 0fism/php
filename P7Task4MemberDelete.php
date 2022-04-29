<?php
ob_start();
session_start();
if (isset($_SESSION['check'])==False) {
    echo '<p> <a href ="P4Task2Login.php">Please login first</a> </p>';
    echo '<p> After 2s redirect to login page. </p>';
    header("refresh:2;url=P4Task2Login.php" );
    die();
}

echo 'Login account as'. ' '.$_SESSION['check'];

function return_Members($A, $B) { 
if ($_SESSION['check']=='admin'){
$mytable = "<table border = \"1\">";
    $mytable = $mytable . "<tr>";
    $mytable = $mytable . "<th>Member ID</th>";
    $mytable = $mytable . "<th>Parent Name</th>";
    $mytable = $mytable . "<th>Parent Address</th>";
    $mytable = $mytable . "<th>Parent Email</th>";
    $mytable = $mytable . "<th>Parent Mobile</th>";
    $mytable = $mytable . "<th>Child Name</th>";
    $mytable = $mytable . "<th>Child DOB</th>";
$mytable = $mytable . "<th>UserID</th>";
    $mytable = $mytable . "</tr>";
	
 for ($i = 0; $i < $B; $i++) 
    {
        $row = $A->fetch_assoc();

        $mytable = $mytable . "<tr>";

          $mytable = $mytable . "<td>" . $row["MemberID"]      . "</td>";
          $mytable = $mytable . "<td>" . $row["ParentName"]    . "</td>";
          $mytable = $mytable . "<td>" . $row["ParentAddr"]    . "</td>";
          $mytable = $mytable . "<td>" . $row["ParentEmail"]   . "</td>";
          $mytable = $mytable . "<td>" . $row["ParentMobile"]  . "</td>";
          $mytable = $mytable . "<td>" . $row["ChildName"]     . "</td>";
          $mytable = $mytable . "<td>" . $row["ChildDOB"]      . "</td>";
          $mytable = $mytable . "<td>" . $row["UserID"]      . "</td>";
 
        $mytable = $mytable . "</tr>";
    }

    $mytable = $mytable . "</table>";
    
    return $mytable;


}else{

 $mytable = "<table border = \"1\">";
    $mytable = $mytable . "<tr>";
    $mytable = $mytable . "<th>Member ID</th>";
    $mytable = $mytable . "<th>Parent Name</th>";
    $mytable = $mytable . "<th>Parent Address</th>";
    $mytable = $mytable . "<th>Parent Email</th>";
    $mytable = $mytable . "<th>Parent Mobile</th>";
    $mytable = $mytable . "<th>Child Name</th>";
    $mytable = $mytable . "<th>Child DOB</th>";
    $mytable = $mytable . "</tr>";

    for ($i = 0; $i < $B; $i++) 
    {
        $row = $A->fetch_assoc();

        $mytable = $mytable . "<tr>";

          $mytable = $mytable . "<td>" . $row["MemberID"]      . "</td>";
          $mytable = $mytable . "<td>" . $row["ParentName"]    . "</td>";
          $mytable = $mytable . "<td>" . $row["ParentAddr"]    . "</td>";
          $mytable = $mytable . "<td>" . $row["ParentEmail"]   . "</td>";
          $mytable = $mytable . "<td>" . $row["ParentMobile"]  . "</td>";
          $mytable = $mytable . "<td>" . $row["ChildName"]     . "</td>";
          $mytable = $mytable . "<td>" . $row["ChildDOB"]      . "</td>";
 
        $mytable = $mytable . "</tr>";
    }

    $mytable = $mytable . "</table>";
    
    return $mytable;
}
;
}

$host   = "127.0.0.1";
$user   = "root";
$pass   = "";
$dbname = "hkmaStudent";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname) or die("Connection failed");

$myPID         = $_GET["PID"];

$query= "DELETE from Members where MemberID = " .  $myPID ;

$ret = $conn->query($query);   

$query = "SELECT * from Members";

$results = $conn->query($query);
$num_results = $results->num_rows;

if ($num_results == 0) 
{
   echo "No record !";
}
else
{
    echo return_Members($results, $num_results);
}

$conn->close();

?>
