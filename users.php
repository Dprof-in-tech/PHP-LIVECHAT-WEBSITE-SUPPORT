<?php 
  session_start();
  include_once "connect.php";
?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users ");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
        </div>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
      </div>
      <div class="users-list">
              <?php 
                $sql = mysqli_query($conn, "SELECT * FROM users ");
                if(mysqli_num_rows($sql) > 0){
                  echo "<ul>";
                  while($row = mysqli_fetch_assoc($sql)){
                    echo "<li><a href=adminchat.php?id=" . $row['id'] . ">" . " " . $row['username']."</a></li>";
                  }
                  echo "</ul>";
                }
            ?>
      </div>
    </section>
  </div>

  <script src="users.js"></script>

</body>
</html>
