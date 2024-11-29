<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calculator_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $expression = $_POST['expression'];
    $result = $_POST['result'];
    
    $sql = "INSERT INTO history (expression, result) VALUES ('$expression', '$result')";
    
    if ($conn->query($sql) === TRUE) {
        echo "History saved successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
