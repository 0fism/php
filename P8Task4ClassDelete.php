<?php

function return_Classes($A, $B) 
{
    $mytable = "<table border = \"1\">";
    $mytable = $mytable . "<tr>";
    $mytable = $mytable . "<th>Class ID</th>";
    $mytable = $mytable . "<th>Class Description</th>";
    $mytable = $mytable . "<th>Class Start Date</th>";
    $mytable = $mytable . "</tr>";

    for ($i = 0; $i < $B; $i++) 
    {
        $row = $A->fetch_assoc();

        $mytable = $mytable . "<tr>";

          $mytable = $mytable . "<td>" . $row["ClassID"]      . "</td>";
          $mytable = $mytable . "<td>" . $row["ClassDesc"]    . "</td>";
          $mytable = $mytable . "<td>" . $row["ClassStartDate"]    . "</td>";
 
        $mytable = $mytable . "</tr>";
    }

    $mytable = $mytable . "</table>";
    
    return $mytable;
}

$host   = "127.0.0.1";
$user   = "root";
$pass   = "";
$dbname = "hkmaStudent";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname) or die("Connection failed");

$myCID         = $_GET["CID"];

$query= "DELETE from MyClasses where ClassID = " .  $myCID ;

$ret = $conn->query($query);   

$query = "SELECT * from MyClasses";

$results = $conn->query($query);
$num_results = $results->num_rows;

if ($num_results == 0) 
{
   echo "No record !";
}
else
{
    echo return_Classes($results, $num_results);
}

$conn->close();

?>
