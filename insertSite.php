<?php
//session_start();
include "conn_test.php";

function valid($data){
        $data = stripslashes($data);
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = str_replace('"', "", $data);
        $data = str_replace("'", "", $data);
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

$name=valid($name);


if (isset($_POST["url"])){
    $url = valid($_POST["url"]);
    if (empty($url) || strcmp("",$url)==0){
        header("Location: home.php?error=Url is required");
        exit();
    }
}
if (isset($_POST["name"])){
    $name = valid($_POST["name"]);
    if (empty($name) || strcmp("",$name)==0){
        header("Location: home.php?error=Bookmark name is required");
        exit();
    }
}


$date = date("Y-m-d");
//print($date);


$sql_rowCount = "SELECT COUNT(*) FROM WEBSITES_$userid";
$result = mysqli_query($conn, $sql_rowCount);
if(!$result){
    //echo mysqli_error($conn);
    $sql = "CREATE TABLE WEBSITES_$userid (id int(255) AUTO_INCREMENT PRIMARY KEY, url varchar(255), name varchar(255), date_created DATE, date_modified DATE);";
    if (mysqli_query($conn, $sql)){
        
    }
    else{
        
    }
}

/*
foreach($row as $cname => $cvalue){
    print "$cname: $cvalue\t";
}
print($row['COUNT(*)']);
*/
//$id = $row['COUNT(*)']+1;

$sql_existance = "SELECT * FROM WEBSITES_$userid WHERE name=$name";

if (mysqli_query($conn, $sql_existance)){
    //print("\ninserted\n");
    echo (0);
    exit();
}

$sql = "INSERT IGNORE INTO WEBSITES_$userid VALUES ('', '$url', '$name', '$date', '$date') ";
//echo "$sql";

if (mysqli_query($conn, $sql)){
    //print("\ninserted\n");
    echo (1);
}
else{
    //print(mysqli_error($conn));
    //print("\nnot inserted\n");
    echo mysqli_error($conn);
}

