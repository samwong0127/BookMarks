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


/*

$userid = $_POST["userid"];
$id = $_POST["id"];
$oldurl = $_POST["oldurl"];
$oldname = $_POST["oldname"];
*/
$userid = $DecodedData["userid"];
$oldtitle = $DecodedData["oldTitle"];
$oldauthor = $DecodedData["oldAuthor"];
$oldpage = $DecodedData["oldPage"];
$oldrelatedsites = $DecodedData["oldRelatedSites"];
$newtitle = $DecodedData["newTitle"];
$newauthor = $DecodedData["newAuthor"];
$newpage = $DecodedData["newPage"];
$newrelatedsites = $DecodedData["newRelatedSites"];




/*
if (isset($_POST["newurl"])){
    $newurl = valid($_POST["newurl"]);
    if (empty($newurl)){
        header("Location: home.php?error=New url is required");
        exit();
    }
}
if (isset($_POST["newname"])){
    $newname = valid($_POST["newname"]);
    if (empty($newname)){
        header("Location: home.php?error=New bookmark name is required");
        exit();
    }
}
*/

$date = date("Y-m-d");
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


$sql = "UPDATE BOOKS_$userid SET title='$newtitle', author='$newauthor', date_modified='$date', page='$newpage', related_sites='$newrelatedsites' WHERE title='$oldtitle' AND author='$oldauthor'";
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
