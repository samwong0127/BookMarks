<?php

$servername = "localhost";
$username = "id16494475_test2";
$password = "dvSr+RhcNGjb0_ca";
$dbname = "id16494475_webapp";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
/*
$result = $conn -> query("SELECT * FROM `USERS`") or die($conn->error);
while ($row = $result->fetch_assoc()) // 當該指令執行有回傳
    {
        $output[] = $row; // 就逐項將回傳的東西放到陣列中
    }

    // 將資料陣列轉成 Json 並顯示在網頁上，並要求不把中文編成 UNICODE
    print(json_encode($output, JSON_UNESCAPED_UNICODE));
    $conn -> close(); // 關閉資料庫連線
    
    */
