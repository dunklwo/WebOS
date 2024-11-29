<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'] ?? '';
    if (!$id) {
        echo json_encode(['error' => 'Document ID is required.']);
        exit;
    }

    $file = "files/$id.txt"; 
    if (!file_exists($file)) {
        echo json_encode(['error' => 'Document not found.']);
        exit;
    }

    $content = file_get_contents($file);
    $title = pathinfo($file, PATHINFO_FILENAME);
    echo json_encode(['title' => $title, 'content' => $content]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $content = $_POST['content'] ?? '';

    if (!$id || !$content) {
        echo "Error: Both ID and content are required.";
        exit;
    }

    $file = "files/$id.txt"; 

    if (!file_exists($file)) {
        echo "Error: Document not found.";
        exit;
    }

    
    file_put_contents($file, $content);
    echo "Document updated successfully.";
}
?>
