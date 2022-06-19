<?php
//session_start();
include "conn_test.php";

//echo "hello\n";


$EncodedData=file_get_contents("php://input");

$DecodedData=json_decode($EncodedData,true);


//$userid = $_POST["userid"];
$userid = $DecodedData["userid"];
$order = $DecodedData["order"];
$attribute = $DecodedData["attribute"];

if ($order == 1){
    $ORDER =  "DESC";
}
else {
     $ORDER =  "ASC";
}

if ($attribute == 1){
    $ATTRIBUTE =  "date_created";
}
else {
     $ATTRIBUTE =  "date_modified";
}


$sql = "SELECT * FROM WEBSITES_$userid ORDER BY $ATTRIBUTE $ORDER";
//print($sql);
$result = mysqli_query($conn, $sql);
$cases_location = array(array());

if (mysqli_query($conn, $sql)){
    //echo "asdasdasd\n";
    $n=0;
    while($row = mysqli_fetch_assoc($result)){
        foreach($row as $colname => $colvalue){
            //echo "$colname: $colvalue\t";
            $cases_location[$n][$colname] = $colvalue;
        }
        $n++;
    }
    //print($cases_location);
}
else{
    echo "connection error\n";
    echo mysqli_error($conn);
}

echo json_encode($cases_location);



