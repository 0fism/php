<?php 
ob_start();
session_start();


if (isset($_SESSION['check'])) {
        header("Location:P6Task2MainMenu.php");
    }

?>
<html> 
<head> 
<title>Login</title> 
</head> 
<body> 
   <form action = "P5Task2LoginUser.php" method = "post"> 
       <p>Username : 
       <input type = "text" name = "uid"> 
       </p>

       <p>Password : 
       <input type = "text" name = "pswd"> 
       </p>

       <input type = "submit" value = "login"> 
       <input type = "reset" value = "clear">
   </form> 
</body> 
</html> 