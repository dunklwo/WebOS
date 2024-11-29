<?php
$host = 'localhost';
$db = 'text_editor';
$user = 'root'; 
$pass = '';     

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'] ?? null;
if (!$id) {
    echo json_encode(['error' => 'Document ID is required.']);
    exit;
}

$sql = "SELECT title, content FROM documents WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($title, $content);

if ($stmt->fetch()) {
    echo json_encode(['title' => $title, 'content' => $content]);
} else {
    echo json_encode(['error' => 'Document not found']);
}

$stmt->close();
$conn->close();
?>
