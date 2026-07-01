<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $conn->real_escape_string($_POST['task'] ?? '');
    if ($task !== '') {
        $conn->query("INSERT INTO todos (task) VALUES ('$task')");
    }
}
header('Location: /');
exit;