<?php
ob_start();
session_start();
?>
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

    $uID   = $_POST["uid"];
    $uPswd = $_POST["pswd"];

    $query = "select * from Users where UserID='$uID' ";
    //$queryLoginLimit = "select LoginLimit FROM `Users` WHERE UserID='$uID' ";
    //$queryLockTime = "SELECT LockTime FROM `Users` WHERE UserID='$uID' ";

    $results = $conn->query($query);
    $num_results = $results->num_rows;

    if  ($num_results > 0) 
    {
        $myRow = $results->fetch_assoc();
        $pass = $myRow["UserPassword"];
        $loginLimit = $myRow["LoginLimit"];
        $lockTime = $myRow["LockTime"];
        $accountLock = $myRow["AccountLock"];
        $time = date("H:i:s");
        $times = date("H:i:s",time() +180);

        if($loginLimit >= 2){
                if($accountLock == True){
                    if($time > $lockTime){
                        $updateAccountLock = "update USERS set AccountLock =False WHERE UserID='$uID' ";
                        $update_result  = $conn->query($updateAccountLock); 
                        $updateLoginLimit = "update USERS set LoginLimit ='0' WHERE UserID='$uID' ";
                        $update_result  = $conn->query($updateLoginLimit);  
                        if  ($pass == $uPswd) 
                        {
                            $_SESSION['check']=$uID;
                            echo "<p>Login successful. " .  " Click <a href = \"P6Task2MainMenu.php\">here</a> to go to Main Menu.</p>";
                        }
                        else 
                        {
                            $updateLoginLimit = "update USERS set LoginLimit ='1' WHERE UserID='$uID' ";
                            $update_result  = $conn->query($updateLoginLimit);   
                            echo "<p>Invalid login</p>";
                            echo "<a href = \"P4Task2Login.php\">Try again</a>";
                        }
                    }else{
                        echo "<p>Login failed more than 2 times</p>";
                        echo "<a href = \"P4Task2Login.php\">Try again</a>"; 
                    }
                }elseif($accountLock == False && $pass == $uPswd){
                    $updateLoginLimit = "update USERS set LoginLimit ='0' WHERE UserID='$uID' ";
                    $update_result  = $conn->query($updateLoginLimit);  
                    $_SESSION['check']=$uID; 
                    echo "<p>Login successful. " .  " Click <a href = \"P6Task2MainMenu.php\">here</a> to go to Main Menu.</p>";
                }
                else{
                    $updateAccountLock = "update USERS set AccountLock =True WHERE UserID='$uID' ";
                    $update_result  = $conn->query($updateAccountLock); 
                    $updateLockTime = "update USERS set LockTime ='$times' WHERE UserID='$uID' ";
                    $update_result  = $conn->query($updateLockTime); 
                    echo "<p>Login failed more than 2 times</p>";
                    echo "<a href = \"P4Task2Login.php\">Try again</a>"; 
                }
            }else{
            if  ($pass == $uPswd) 
            {
                $updateLoginLimit = "update USERS set LoginLimit ='0' WHERE UserID='$uID' ";
                $update_result  = $conn->query($updateLoginLimit);  
                $_SESSION['check']=$uID;
                echo "<p>Login successful. " .  " Click <a href = \"P6Task2MainMenu.php\">here</a> to go to Main Menu.</p>";
            }
            else 
            {
                $loginLimit +=1;
                $updateLoginLimit = "update USERS set LoginLimit =$loginLimit WHERE UserID='$uID' ";
                $update_result  = $conn->query($updateLoginLimit);   
                echo "<p>Invalid login, failed $loginLimit time(s).</p>";
                echo "<a href = \"P4Task2Login.php\">Try again</a>";
            }
        }
       
    }
    else
    {
        echo "<p>Invalid login</p>";
        echo "<a href = \"P4Task2Login.php\">Try again</a>";
    }
?>
</body>
</html>