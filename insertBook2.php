<?php
//session_start();
include "conn_test.php";

function valid($data){
        $data = stripslashes($data);
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
}

/*
$EncodedData=file_get_contents("php://input");
$DecodedData=json_decode($EncodedData,true);
$userid = $DecodedData["userid"];
$title = $DecodedData["title"];
$author = $DecodedData["author"];
$page = $DecodedData["page"];
$relatedsites = $DecodedData["relatedSites"];

*/
$userid = $_POST["userid"];
$title = $_POST["title"];
$author = $_POST["author"];
$page = $_POST["page"];
$relatedsites = $_POST["relatedSites"];

$title = valid($title);
$author = valid($author);



$date = date("Y-m-d");
//print($date);


$sql = "INSERT IGNORE INTO BOOKS_$userid VALUES ('', '$title', '$author', '$date', '$date', '$page', '$relatedsites') ";
//echo "$sql\n";

if (mysqli_query($conn, $sql)){
    //print("\ninserted\n");
    echo (1);
}
else{
    //print(mysqli_error($conn));
    //print("\nnot inserted\n");
    echo mysqli_error($conn);
}
/*
if ($result){
    echo "\nBook added. Click Refresh to view.";
    echo (1);
}
else{
    //header("Location: home.php？error=Book not added, Check if there's any invalid chars in input field.");
    //exit();
    echo mysqli_error($conn);
    echo (0);
}
*/
