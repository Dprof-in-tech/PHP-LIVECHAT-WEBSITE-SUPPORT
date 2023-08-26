<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    $sender = $_POST['sender'];
    $message = $_POST['message'];

    // Insert message into the database
    $conn = new mysqli("localhost", "root", "", "testchat");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // You need to determine the receiver here, it could be "Admin" or the user's username
    $receiver = $_POST['reciever']; // Replace this with the correct receiver username if needed

    $sql = "INSERT INTO chat_messages (sender, receiver, message) VALUES ('$sender', '$receiver', '$message')";
    $conn->query($sql);
    $conn->close();
}
?>