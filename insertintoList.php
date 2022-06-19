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
$url = $_POST["url"];
$name = $_POST["name"];



if (isset($_POST["url"])){
    $url = valid($_POST["url"]);
    if (empty($url)){
        header("Location: home.php?error=Url is required");
        exit();
    }
}
if (isset($_POST["name"])){
    $name = valid($_POST["name"]);
    if (empty($name)){
        header("Location: home.php?error=Bookmark name is required");
        exit();
    }
}
