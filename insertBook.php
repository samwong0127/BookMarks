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
$userid = $DecodedData["userid"];
$title = $DecodedData["title"];
$author = $DecodedData["author"];
$page = $DecodedData["page"];
$relatedsites = $DecodedData["relatedSites"];

/*
$userid = $_POST["userid"];
$title = $_POST["title"];
$author = $_POST["author"];
$page = $_POST["page"];
$relatedsites = $_POST["relatedSites"];
*/
$title = valid($title);
$author = valid($author);

if($page == ''){
    $page = 0;
}
if($relatedsites == '' || $relatedsites == null){
    $relatedsites = '';
}
$date = date("Y-m-d");
//print($date);

$sql_rowCount = "SELECT * FROM BOOKS_$userid";
$result1 = mysqli_query($conn, $sql_rowCount);
if(!$result1){
    //echo mysqli_error($conn);
    $sql = "CREATE TABLE BOOKS_$userid (id int(255) AUTO_INCREMENT PRIMARY KEY, title varchar(255), author varchar(255), date_created DATE, date_modified DATE, page int(255), related_sites varchar(255));";
    if (mysqli_query($conn, $sql)){
        
    }
    else{
        
    }
}

$sql = "INSERT INTO BOOKS_$userid (title, author, date_created, date_modified, page, related_sites ) VALUES ( '$title', '$author', '$date', '$date', '$page', '$relatedsites') ";
//echo "$sql";
//$result = mysqli_query($conn, $sql);


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
