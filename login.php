<?php
session_start();
include "conn_test.php";

/*
$servername = "localhost";
$username = "id16494475_test2";
$password = "dvSr+RhcNGjb0_ca";
$dbname = "id16494475_webapp";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
*/

if (isset($_POST["userid"]) && isset($_POST["password"])) {
    function valid($data){
        $data = stripslashes($data);
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $userid = valid($_POST["userid"]);
    $password = valid($_POST["password"]);
    
    if (empty($userid)) {
        header("Location: index.php?error=ID is required");
        exit();
    }
    else if (empty($password)) {
        header("Location: index.php?error=Password is required");
        exit();
    }
    else {
        //echo "Valid input";
        $sql = "SELECT * FROM `USERS` WHERE id='$userid' AND password='$password'";
        
        $result = $conn -> query($sql) or die($conn->error);
        
        //print($result);
        
        
        if (mysqli_num_rows($result) === 1) {
            //echo "Logged in";
            $row = mysqli_fetch_assoc($result);
            //print_r($row);
            $_SESSION['username'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['password'] = $row['password'];
            //print("$_SESSION['username']");
            
            header("Location: home.php");
            exit();
            
            
        }
        else {
            header("Location: index.php?error=Incorrect Username/ID or Password");
            exit();
        }
        
        
        
    }
}
else {
    header("Location: index.php");
    exit();
}





$EncodedData=file_get_contents("php://input");

$DecodedData=json_decode($EncodedData,true);

//$userid = $DecodedData["userid"];
//$password = $DecodedData["password"];

