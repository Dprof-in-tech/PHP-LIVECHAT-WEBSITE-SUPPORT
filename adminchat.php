<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
//retrieve user id from users.php page
$user_id = $_GET['id'];
require "connect.php";
//query to get user details
$sql = "SELECT * FROM users WHERE id = $user_id";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$user_name = $row['username'];


?>

<!DOCTYPE html>
<html>
<head>
    <title>Live Chat Support</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
    require "admsend_message.php";
    ?>
    <form method="post" class="livechat">
        <div id="chat-box">
            <div class="user">
                <h3><?php echo "$user_name";?></h3>
            </div>
            <div id="chat-messages" class="clearfix">

            </div>
            <div class="submit_area">
                <input type="hidden" name="reciever" value="<?php echo $user_name;?>">
                <input type="hidden" name="sender" value="Admin">
                <input name="message" id="message-input" placeholder="Type your message...">
                <input type="submit" id="send-button" value="&#9829;" name="submit">
            </div>
        </div>
    </form>
    <script src="script2.js"></script>
</body>
</html>


