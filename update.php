<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;

    if (!$id || !$title || !$content) {
        echo "ID, title, and content are required.";
        exit;
    }

    $conn = new mysqli('localhost', 'root', '', 'text_editor');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE documents SET title = ?, content = ?, last_modified = NOW() WHERE id = ?");
    $stmt->bind_param("ssi", $title, $content, $id);

    if ($stmt->execute()) {
        echo "Document updated successfully.";
    } else {
        echo "Error updating document: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
