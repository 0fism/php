<html>
<head>
<title>Simple Login</title>
</head>
<body>
<?php
    $host   = "127.0.0.1";
    $user   = "root";
    $pass   = "";
    $dbname = "hkmaStudent";

// Create connection
    $conn = new mysqli($host, $user, $pass, $dbname) or die("Connection failed");

    $uName     = $_POST["uName"];
    $uEmail    = $_POST["uEmail"];
    $uID       = $_POST["uid"];
    $uPswd     = $_POST["pswd"];

    $query_check = "select * from Users where UserID='$uID'";
    $results = $conn->query($query_check);

    if  (!$results) 
    {
        echo "<p>" . mysql_error() . "</p>";
    }

    $num_results = $results->num_rows;

    if  ($num_results != 0) 
    {
        echo "<p>That userID  already exists</p>";
        echo "<p><a href = \"P2Task2Register.php\">register</a><p>";
        echo "<a href = \"P4Task2Login.php\">login</a>";
    }
    else
    {
        $query = "INSERT INTO Users (UserID, UserPassword, UserName, UserEmail) VALUES ('$uID', '$uPswd', '$uName', '$uEmail') ";

        $ret = $conn->query($query);

        if  (!$ret) 
        {
            echo "<p>" . mysql_error() . "</p>";
            echo "<p><a href = \"P2Task2Register.php\">register</a><p>";
            echo "<a href = \"P4Task2Login.php\">login</a>";
        }
        else
        {
            echo "<p>Registration successful</p>";
            echo "<a href = \"P4Task2Login.php\">login</a>";
        }
    }

?>

</body>
</html>