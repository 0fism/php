<?php
    $host   = "127.0.0.1";
    $user   = "root";
    $pass   = "";
    $dbname = "hkmaStudent";

// Create connection
    $conn = new mysqli($host, $user, $pass, $dbname) or die("Connection failed");
    
    $query = "set foreign_key_checks=0";
    $ret = $conn->query($query); 
    
    $query = "DROP TABLE Users";
    $ret = $conn->query($query);    

    $query = "CREATE TABLE Users ( UserID Varchar(20), UserPassword VarChar(20), UserName Varchar(20), UserEmail Varchar(50), LoginLimit INT, LockTime time NOT NULL default'00:00:00', AccountLock Boolean default False, PRIMARY KEY ( UserID ) )";
    $ret = $conn->query($query); 

    $query = "INSERT INTO Users ( UserID, UserPassword, UserName, UserEmail, LoginLimit) VALUES ('admin', 'adminpass', 'Admin','admin@gmail.com', 0)";
    $ret = $conn->query($query); 
    
    $query = "INSERT INTO Users ( UserID, UserPassword, UserName, UserEmail, LoginLimit) VALUES ('U01', 'P01', 'Peter','abc@gmail.com', 0)";
    $ret = $conn->query($query); 

    $query = "INSERT INTO Users ( UserID, UserPassword, UserName, UserEmail, LoginLimit) VALUES ('U02', 'P02', 'John', 'john123@gmail.com',0)";
    $ret = $conn->query($query); 

    $query = "INSERT INTO Users ( UserID, UserPassword, UserName, UserEmail, LoginLimit) VALUES ('U03', 'P03', 'Mary', 'mary456@gmail.com', 0)";
    $ret = $conn->query($query); 

 
    $query = "DROP TABLE Members";
    $ret = $conn->query($query);    

    $query = "CREATE TABLE Members ( MemberID MEDIUMINT NOT NULL AUTO_INCREMENT,  ParentName Varchar(50), ParentAddr Varchar(100), ParentEmail Varchar(50), ParentMobile Varchar(50), ChildName Varchar(50), ChildDOB DATE, UserID Varchar(20), PRIMARY KEY ( MemberID ), FOREIGN KEY (UserID) REFERENCES Users(UserID))";
    $ret = $conn->query($query);
    
    $query = "INSERT INTO Members ( ParentName, ParentAddr, ParentEmail, ParentMobile, ChildName, ChildDOB, UserID) VALUES ('PeterChan', 'HK', 'peter@gmail.com', '46709394', 'Peterson', '2012-4-10', 'U01')";
    $ret = $conn->query($query);

    $query = "INSERT INTO Members ( ParentName, ParentAddr, ParentEmail, ParentMobile, ChildName, ChildDOB, UserID) VALUES ('John Wong', 'Kln', 'john@gmail.com', '12345674', 'Johnson', '2014-3-8', 'U02')";
    $ret = $conn->query($query);

    $query = "INSERT INTO Members ( ParentName, ParentAddr, ParentEmail, ParentMobile, ChildName, ChildDOB, UserID) VALUES ('Mary Lee', 'NT', 'maryl@gmail.com', '87423134', 'Jackson', '2010-11-10', 'U03')";
    $ret = $conn->query($query);

    $query = "INSERT INTO Members ( ParentName, ParentAddr, ParentEmail, ParentMobile, ChildName, ChildDOB, UserID) VALUES ('PeterChan', 'HK', 'peter@gmail.com', '46709394', 'Peterdaughter', '2011-7-10', 'U01')";
    $ret = $conn->query($query);

    $query = "DROP TABLE MyClasses";
    $ret = $conn->query($query);    

    $query = "CREATE TABLE MyClasses ( ClassID MEDIUMINT NOT NULL AUTO_INCREMENT,  ClassDesc Varchar(50), ClassStartDate DATE, PRIMARY KEY ( ClassID ) )";
    $ret = $conn->query($query);
    
    $query = "INSERT INTO MyClasses ( ClassDesc, ClassStartDate ) VALUES ('Physics', '2018-10-8')";
    $ret = $conn->query($query);

    $query = "INSERT INTO MyClasses ( ClassDesc, ClassStartDate ) VALUES ('Maths', '2019-1-3')";
    $ret = $conn->query($query);

    $query = "INSERT INTO MyClasses ( ClassDesc, ClassStartDate ) VALUES ('History', '2019-3-8')";
    $ret = $conn->query($query);

    $query = "DROP TABLE MyClassChild";
    $ret = $conn->query($query);    

    $query = "CREATE TABLE MyClassChild ( ClassChildID MEDIUMINT NOT NULL AUTO_INCREMENT,  ClassID  INT, ClassChildName Varchar(50), PRIMARY KEY ( ClassChildID ) )";
    $ret = $conn->query($query);
    
    $query = "INSERT INTO MyClassChild ( ClassID, ClassChildName ) VALUES (1, 'Peterson')";
    $ret = $conn->query($query);

    $query = "INSERT INTO MyClassChild ( ClassID, ClassChildName ) VALUES (2, 'Johnson')";
    $ret = $conn->query($query);


    $query = "DROP TABLE MyEvents";
    $ret = $conn->query($query);    

    $query = "CREATE TABLE MyEvents ( EventID MEDIUMINT NOT NULL AUTO_INCREMENT,  EventDesc Varchar(50), EventStartDate DATE, PRIMARY KEY ( EventID ) )";
    $ret = $conn->query($query);
    
    $query = "INSERT INTO MyEvents ( EventDesc, EventStartDate ) VALUES ('Event 1', '2018-10-8')";
    $ret = $conn->query($query);
    
    $query = "INSERT INTO MyEvents ( EventDesc, EventStartDate ) VALUES ('Event 2', '2018-7-4')";
    $ret = $conn->query($query);
   
    $conn->close();

    echo "Finished";

?>
<br>
<a href="P2Task2Register.php">Next page</a>