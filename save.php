<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$db = 'text_editor';
$user = 'root';
$pass = '';


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$title = $_POST['title'] ?? null;
$content = $_POST['content'] ?? null;

if (!$title || !$content) {
    echo "Error: Title or content is missing.";
    exit;
}


$sql = "INSERT INTO documents (title, content) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error);
}


$stmt->bind_param("ss", $title, $content);

if ($stmt->execute()) {
    echo "Document saved successfully.";
} else {
    die("Error executing statement: " . $stmt->error);
}
$stmt->close();
$conn->close();
