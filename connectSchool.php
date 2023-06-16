<?php
// lemar/emircan
$servername = "localhost";
$dbname = "school";
$username = "root";
$password = "";

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
}
catch (PDOException $e)
{
    echo "Disconnected :" . $e->getMessage() . "<br>";
    ;
}