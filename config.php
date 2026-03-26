<?php
// Database config
$host = "localhost";
$user = "root";
$pass = "";
$db   = "core_php_db";

$conn = new mysqli($host, $user, $pass, $db);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>