<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calculator";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM history ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>Expression:</strong> " . $row["expression"]. " <strong>Result:</strong> " . $row["result"]. " <strong>Time:</strong> " . $row["created_at"]. "</p>";
    }
} else {
    echo "No history found.";
}

$conn->close();
?>
