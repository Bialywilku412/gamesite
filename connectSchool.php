<?php
// lemar/emircan
$servername = "localhost";
$dbname = "school";
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
    echo "connected  <br>";
}
catch(PDOException $e){
    echo "Disconnected :" . $e->getMessage(). "<br>";;
}