<?php
require 'db.php';

// Check if ID is provided
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];


$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();


if (!$student) {
    header("Location: index.php");
    exit;
}


$stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
$stmt->execute([$id]);


header("Location: index.php");
exit;
?>