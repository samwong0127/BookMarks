<?php
/******

This file can delete site.

******/
//session_start();
include "conn_test.php";
/*
$userid = $_POST['userid'];
$id = $_POST['id'];
$name = $_POST['name'];
$url = $_POST['url'];
*/
$EncodedData=file_get_contents("php://input");

$DecodedData=json_decode($EncodedData,true);


//$userid = $_POST["userid"];
$userid = $DecodedData["userid"];
//$id = $DecodedData["id"];
$name = $DecodedData["name"];
$url = $DecodedData["url"];
$stage = $DecodeData["stage"];

//console.log($url);
$sql = "DELETE FROM WEBSITES_$userid WHERE name='$name' AND url='$url' ";


echo "$sql";
//return;
if (mysqli_query($conn, $sql)){
    //print("\ninserted\n");
    echo json_encode(1);
}
else{
    //print(mysqli_error($conn));
    //print("\nnot inserted\n");
    echo json_encode(mysqli_error($conn));
}