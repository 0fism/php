<?php

function return_Classes($A, $B) 
{
    $mytable = "<table border = \"1\">";
    $mytable = $mytable . "<tr>";
    $mytable = $mytable . "<th>EventID</th>";
    $mytable = $mytable . "<th>EventDesc</th>";
    $mytable = $mytable . "<th>EventStartDate</th>";
    $mytable = $mytable . "</tr>";

    for ($i = 0; $i < $B; $i++) 
    {
        $row = $A->fetch_assoc();

        $mytable = $mytable . "<tr>";

          $mytable = $mytable . "<td>" . $row["EventID"]      . "</td>";
          $mytable = $mytable . "<td>" . $row["EventDesc"]    . "</td>";
          $mytable = $mytable . "<td>" . $row["EventStartDate"]    . "</td>";
 
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

$query = "SELECT * from myevents";

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