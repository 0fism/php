<?php
ob_start();
session_start();

if (isset($_SESSION['check'])) {
    echo 'Login account as'. ' '.$_SESSION['check'];
}else{
    echo '<p> <a href ="P4Task2Login.php">Please login first</a> </p>';
    echo '<p> After 2s redirect to login page. </p>';
    header("refresh:2;url=P4Task2Login.php" );
    die();
}
?>

<html>
<head>
<title>Main Menu</title>
</head>
<body>
<p> <a href ="P7Task4Member.php">Add / Change / Delete Members</a> </p>

<p> <a href ="P8Task4Class.php">Add / Change / Delete Classes</a> </p>

<p> <a href ="P7Task2Logout.php">Log Out</a> </p>

</body>
</html>