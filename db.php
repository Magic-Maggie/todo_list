<?php
$host = "mysql";
$user = "todo";
$password = "todo123";
$database = "todo_db";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
