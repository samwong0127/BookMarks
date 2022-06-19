<?php

include "conn_test.php";

$EncodedData=file_get_contents("php://input");

$DecodedData=json_decode($EncodedData,true);


$userid = $DecodedData["userid"];
$keyword = $DecodedData["keyword"];
$stage = $DecodedData["stage"];
if ($stage == 0){
    $sql = "SELECT * FROM WEBSITES_$userid WHERE name LIKE '%$keyword%' OR url LIKE '%$keyword%'";
}
else{
    $sql = "SELECT * FROM BOOKS_$userid WHERE title LIKE '%$keyword%' OR author LIKE '%$keyword%'";
}

$cases_location = array(array());
$result = mysqli_query($conn, $sql);
if ($result){
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
    echo json_encode($cases_location);
}
else{
    print(mysqli_error($conn));
    echo "connection error\n";
}



