<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name'])) {
    $stmt = $conn->prepare("INSERT INTO records (name) VALUES (?)");
    $stmt->bind_param("s", $_POST['name']);
    $stmt->execute();
    header("Location: index.php");
    exit;
}

$result = $conn->query("SELECT id, name, created_at FROM records ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head><title>LAMP App</title></head>
<body>
<h1>Records</h1>
<form method="post">
  <input type="text" name="name" placeholder="Enter a name" required>
  <button type="submit">Add</button>
</form>
<ul>
<?php while ($row = $result->fetch_assoc()): ?>
  <li><?= htmlspecialchars($row['name']) ?> (<?= $row['created_at'] ?>)</li>
<?php endwhile; ?>
</ul>
<p><strong>Database connected.</strong></p>
</body>
</html>
