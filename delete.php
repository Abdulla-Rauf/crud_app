<?php
include 'db.php';

$id = $_GET['id'];

$sql = "SELECT image FROM users WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['image']) {
    unlink("images/" . $row['image']);
}

$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully!";
} else {
    echo "Error deleting record: " . $conn->error;
}
header("Location: index.php");
?>
