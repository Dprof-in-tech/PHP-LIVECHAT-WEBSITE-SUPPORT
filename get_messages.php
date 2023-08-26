<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    $conn = new mysqli("localhost", "root", "", "testchat");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM chat_messages WHERE (sender = 'Admin' AND receiver = '$username') OR (sender = '$username' AND receiver = 'Admin') ORDER BY created_at";
    $result = $conn->query($sql);

    $messages = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
    }

    $conn->close();

    echo json_encode($messages);
} else {
    echo "Session expired or user not logged in.";
}
?>
