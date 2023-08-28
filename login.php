<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require "connect.php";

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    
    if(!empty($username)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}'");
        
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            
            if($username == "Admin"){ // Check if username is "Admin"
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE username = '{$username}'");
                
                if($sql2){
                    echo "success";
                    header("location: users.php");
                } else {
                    echo "Something went wrong. Please try again!";
                }
            } else {
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE username = '{$username}'");
                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE username LIKE '%$username%'");
                
                if(mysqli_num_rows($sql3) > 0){
                    $row = mysqli_fetch_assoc($sql3);
                    if($sql3){
                        echo "success";
                        header("location: chat.php");
                    }
                } else {
                    echo "Something went wrong. Please try again!";
                }
            }
        } else {
            echo "$username - User not found!!";
        }
    } else {
        echo "All input fields are required!";
    }
// declare session variable username
    $_SESSION['username'] = $username;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Realtime Chat App </title>
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>PeakTradeMining Live Support</header>
      <form  method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Username</label>
          <input type="text" name="username" placeholder="Enter your username" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
    </section>
  </div>
</body>
</html>
