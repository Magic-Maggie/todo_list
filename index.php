<?php
include "db.php";

$result = $conn->query("SELECT * FROM todos");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>To-Do List</h1>
    <form action="create.php" method="POST">
        <input type="text" name="task" placeholder="Enter a task" required>
        <button type="submit">Add</button>
    </form>

    <?php while($row = $result->fetch_assoc()) { ?>
        <div class="task">
            <span><?= htmlspecialchars($row['task']) ?></span>
            <div class="actions">
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this task?')">Delete</a>
            </div>
        </div>
    <?php } ?>
</div>
</body>
</html>
