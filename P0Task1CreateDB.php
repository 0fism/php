<?php

    $servername = "127.0.0.1";
    $username   = "root";
    $password   = "";

// Create connection
    $conn = new mysqli($servername, $username, $password) or die("Connection Failed");


// Create database
    $sql = "CREATE DATABASE hkmaStudent";
    $result = $conn->query($sql);

    if  ($result == TRUE) 
    {
        echo "Database created successfully";
	echo "<p><a href='/P1Task1CreateTables.php'>Next Create Tables</a></p>";
    } 
    else 
    {
        echo "Error creating database: " . $conn->error;
	?>
	<br>
	<?php
	echo "<p><a href='/P1Task1CreateTables.php'>Next Create Tables</a></p>";
    }

    $conn->close();

?> 

