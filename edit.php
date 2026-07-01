<?php
include "db.php";

$id = intval($_GET['id'] ?? 0);
if (!$id) {
    header('Location: /');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $conn->real_escape_string($_POST['task'] ?? '');
    if ($task !== '') {
        $conn->query("UPDATE todos SET task = '$task' WHERE id = $id");
    }
    header('Location: /');
    exit;
}

$result = $conn->query("SELECT * FROM todos WHERE id = $id");
$row = $result->fetch_assoc();
if (!$row) {
    header('Location: /');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Edit Task</h1>
    <form action="edit.php?id=<?= $id ?>" method="POST">
        <input type="text" name="task" value="<?= htmlspecialchars($row['task']) ?>" required>
        <button type="submit">Save</button>
    </form>
    <p><a href="/">Back</a></p>
</div>
</body>
</html>
