<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlvc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM sender";
$result = $conn->query($sql);

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Create a prepared statement
    $stmt = $conn->prepare("DELETE FROM sender WHERE R_ID = ?");

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }

    $stmt->close();
    $conn->close();
} else {
    echo 0; // No ID
}
?>