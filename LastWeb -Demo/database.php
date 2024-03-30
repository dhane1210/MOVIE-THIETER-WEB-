<?php
$port = 4306;
$hostName = "localhost";
$dbUser = "root";
$dbPassword = ""; 
$dbName = "moviethieter";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName, $port);
function getConnection(){
    global $conn;
    if(!$conn){
        exit();
    }
    return $conn;
}

?>