<?php
session_start();
require "send_message.php";
require "connect.php";
//retreive session variable
$username = $_SESSION['username'];
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
                <input type="hidden" id="sender" name="sender" value="<?php echo $username;?>">
                <input name="message" id="message-input" placeholder="Type your message...">
                <input type="submit" id="send-button" value="&#9829;" name="submit">
            </div>
        </div>
    </form>


    <script src="script2.js"></script>    
</body>
</html>

