<?php
require 'database.php';

$id = $_GET['id'];

$stmt = $mysqli->prepare("DELETE FROM contacts_table WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header('Location: index.php');
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
?>