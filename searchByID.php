<?php

include "conn_test.php";

$EncodedData=file_get_contents("php://input");

$DecodedData=json_decode($EncodedData,true);


$userid = $DecodedData["userid"];
$idlist = $DecodedData["idlist"];
//$stage = $DecodedData["stage"];

$IDs = explode(",", $idlist);
$cases_location = array(array());

for ($i=0; $i < count($IDs); $i++){
    $sql = "SELECT * FROM WEBSITES_$userid WHERE id=$IDs[$i]" ;
    //echo "$sql<br>";
    $result = mysqli_query($conn, $sql);
    if ($result){
    //echo "asdasdasd\n";
    
    
        $row = mysqli_fetch_assoc($result);
        foreach($row as $colname => $colvalue){
                //echo "$colname: $colvalue\t";
            $cases_location[$i][$colname] = $colvalue;
        }
    
    
    //print($cases_location);
    
    }
    else{
        print(mysqli_error($conn));
        echo "connection error\n";
    }

}
echo json_encode($cases_location);



