<?php
//session_start();
include "conn_test.php";

function valid($data){
        $data = stripslashes($data);
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
}

$EncodedData=file_get_contents("php://input");

$DecodedData=json_decode($EncodedData,true);


//$userid = $DecodedData["userid"];
//$url = $DecodedData["url"];
//$name = $DecodedData["name"];

$userid = $_POST["userid"];
$name = $_POST["name"];


if (isset($_POST["name"])){
    $name = valid($_POST["name"]);
    if (empty($name)){
        header("Location: home.php?error=Group name is required");
        exit();
    }
    $sql = "SELECT COUNT(*) FROM WEBSITELIST_$userid WHERE name='$name'";
    $result = mysqli_query($conn, $sql_rowCount);
    $row = mysqli_fetch_assoc($result);
    if ($row['COUNT(*)'] > 0){
        header("Location: home.php?error=Group name already exists");
        exit();
    }
}


//$date = date("Y-m-d");
//print($date);

/*
$sql_rowCount = "SELECT COUNT(*) FROM WEBSITES_$userid";
$result = mysqli_query($conn, $sql_rowCount);
$row = mysqli_fetch_assoc($result);

foreach($row as $cname => $cvalue){
    print "$cname: $cvalue\t";
}
print($row['COUNT(*)']);

$id = $row['COUNT(*)']+1;
*/


$sql = "INSERT IGNORE INTO WEBSITELIST_$userid VALUES ('', '$name', '') ";
//print($sql);

if (mysqli_query($conn, $sql)){
    //print("\ninserted\n");
    echo json_encode(1);
}
else{
    //print(mysqli_error($conn));
    //print("\nnot inserted\n");
    echo json_encode(0);
}

