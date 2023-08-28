<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "connect.php"; // Include your database connection

session_start();
if (isset($_SESSION['username'])) {
    $receiver = $_SESSION['username']; // Use the session username as the receiver
} else {
    echo json_encode([]); // Return empty array if session username is not set
    exit();
}

// Query to retrieve chat messages
$sql = "SELECT * FROM chat_messages WHERE (sender = 'Admin' AND receiver = '$receiver') OR (sender = '$receiver' AND receiver = 'Admin') ORDER BY created_at";

$result = mysqli_query($conn, $sql);

$messages = [];
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
    }
}

mysqli_close($conn);

echo json_encode($messages); // Return messages as JSON
?>
