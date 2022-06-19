<?php
session_start();

$servername = "localhost";
$username = "id16494475_test2";
$password = "dvSr+RhcNGjb0_ca";
$dbname = "id16494475_webapp";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    //echo "connected\n";
}
$userid = $_POST["userid"];
$password = $_POST["password"];
$name = $_POST["name"];


/*
$EncodedData=file_get_contents("php://input");

$DecodedData=json_decode($EncodedData,true);


$userid = $DecodedData["userid"];
$password = $DecodedData["password"];
$name = $DecodedData["name"];
*/


if (isset($_POST["userid"]) && isset($_POST["password"]) && isset($_POST["name"]) ) {
    function valid($data){
        $data = stripslashes($data);
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $userid = valid($_POST["userid"]);
    $password = valid($_POST["password"]);
    $name = valid($_POST["name"]);
    
    if(!ctype_digit($userid)){
        header("Location: index.php?error=ID must be an integer");
        exit();
    }
    
    if (empty($userid)) {
        header("Location: index.php?error=ID is required");
        exit();
    }
    else if (empty($password)) {
        header("Location: index.php?error=Password is required");
        exit();
    }
    else if (empty($name)) {
        header("Location: index.php?error=Name is required");
        exit();
    }
    else {
        

        /*
           check if id, name, password is used by another user and insert to table if not.
        */
        $sql1 = "SELECT * FROM `USERS` WHERE id='$userid'";
        //echo "$sql1";
        //$sql2 = "SELECT * FROM `USERS` WHERE name='$name'";
        $sql3 = "SELECT * FROM `USERS` WHERE password='$password'";
        //echo "$sql3";
        $result1 = $conn -> query($sql1) or die($conn->error);
        //$result1 = mysqli_query($conn, $sql1);
        //$result2 = mysqli_query($sql2);
        //$result3 = mysqli_query($conn, $sql3);
        $result3 = $conn -> query($sql3) or die($conn->error);
        
        if ( $row1 = $result1->fetch_assoc() || $row3 = $result3->fetch_assoc() ){
            //echo "$row1";
            //echo "\n$row3";
            //echo "found duplicate";
            //return false;
            header("Location: index.php?error=ID or Password is used by another user.");
            exit();
        }
        else{
        
            $sql5 = "INSERT IGNORE INTO `USERS` VALUES ('$userid', '$password', '$name') ";
            //echo "$sql5";
            //print($sql5);
            if (mysqli_query($conn, $sql5)){
                //return true;
                //echo "insert successfully";
                header("Location: index.php?complete=Successful registration");
                exit();
            }
            else{
                //return false;
                //echo mysqli_error($conn);
                header("Location: index.php?error=Error in inserting to database. Check if there's invalid characters in your input.");
                exit();
            }
        }
            //echo "Valid input";
        
            //echo "You have signed up!";
            
    }
}
else {
    header("Location: index.php");
    exit();
}
    
    //print(json_encode($output, JSON_UNESCAPED_UNICODE));
//$conn -> close();

