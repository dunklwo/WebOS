<?php
$host = 'localhost';
$db = 'text_editor';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, last_modified FROM documents";
$result = $conn->query($sql);

$documents = [];
while ($row = $result->fetch_assoc()) {
    $documents[] = $row;
}

echo json_encode($documents);

$conn->close();
?>
