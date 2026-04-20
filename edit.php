<?php
require 'db.php';

// Check if ID exists
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();

// If student not found
if (!$student) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email, $course, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Edit Student</h1>

    <form method="POST">
        <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required>
        <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>
        <input type="text" name="course" value="<?= htmlspecialchars($student['course']) ?>" required>
        <button type="submit">Update Student</button>
    </form>
</div>

</body>
</html>