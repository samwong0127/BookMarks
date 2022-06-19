<?php
//session_start();
include "conn_test.php";
/*
$userid = $_POST['userid'];
$title = $_POST['title'];
$author = $_POST['author'];
*/
$EncodedData=file_get_contents("php://input");

$DecodedData=json_decode($EncodedData,true);


$userid = $DecodedData["userid"];
//$id = $DecodedData["id"];
$stage = $DecodedData["stage"];
$title = $DecodedData["title"];
$author = $DecodedData["author"];


$sql = "DELETE FROM BOOKS_$userid WHERE title='$title' AND author='$author' ";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo json_encode(1);
}
else {
    echo json_encode(mysqli_error($conn));
}