<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require "send_message.php";
require "connect.php";
//retreive session variable
$username = $_SESSION['username'];

//query to get user details
$sql = "SELECT * FROM users WHERE username = '$username'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$user_name = $row['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PeakTradeMining Customer Support</title>
</head>
<body>
<form method="post" class="livechat">
<div id="chat-box">
            <div class="user">
                <h3>Admin</h3>
            </div>
            <div id="chat-messages" class="clearfix">

            </div>
            <div class="submit_area">
                <input type="hidden" id="reciever" name="reciever" value="Admin">
                <input type="hidden" id="sender" name="sender" value="<?php echo $user_name;?>">
                <input name="message" id="message-input" placeholder="Type your message...">
                <input type="submit" id="send-button" value="&#9829;" name="submit">
            </div>
        </div>
    </form>


    <script src="script.js"></script>    
</body>
</html>
