<?php
$host = 'localhost';//127.0.0.1
$username = 'root';
$password = '';
$dbname = 'flower_db';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>