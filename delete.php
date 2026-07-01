<?php
include "db.php";

$id = intval($_GET['id'] ?? 0);
if ($id) {
    $conn->query("DELETE FROM todos WHERE id = $id");
}
header('Location: /');
exit;
