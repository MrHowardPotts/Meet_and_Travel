<?php
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header('location: login.php');
  }
?>

<?php include_once "header.php";?>
  <body>
    <table>
      <tr>
        <td>
          <input type="checkbox" id="check">
          <div class="header">
            <h2><img src="relayfinal.png" width="50px" height="50px"></h2>
            <div class="navigation">
              <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>Home</a>
              <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>About</a>
              <a href="#">
               <span></span>
               <span></span>
               <span></span>
               <span></span>Info</a>
              <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>Services</a>
              <a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>" class="logout">
                <span></span>
                <span></span>
                <span></span>
                <span></span>Logout</a>
            </div>
            <label for="check">
              <i class="fas fa-bars menu-btn"></i>
              <i class="fas fa-times close-btn"></i>
            </label>
          </div> 
        </td>
      </tr>
      <tr>
        <td>
          <div class="wrapper">
            <table>
              <tr>
                <td height="643px" width="36%"><!--FIX HEIGHT IT DOESNT WORK FOR SOME REASON-->
                  <section class="users">
                    <header>
                      <?php
                        include_once "/Applications/XAMPP/xamppfiles/htdocs/PSI/php/config.php";
                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                        if(mysqli_num_rows($sql)>0){
                          $row = mysqli_fetch_assoc($sql);
                        }
                      ?>
                      <div class="content">
                        <img src="/Applications/XAMPP/xamppfiles/htdocs/PSI/php/images/<?php echo $row['picture']?>" alt=""><!--You need to change permission to read/write-->
                        <div class="details">
                          <span><?php echo $row['username'];?></span>
                          <p><?php echo $row['status']?></p>
                        </div>
                      </div>
                    </header>
                    <div class="search">
                      <span class="text">Select an user to start chat</span>
                      <input type="text" placeholder="Enter name to search...">
                      <button><i class="fa fa-search"></i></button>
                    </div>
                    <div class="users-list">  
                    </div>
                  </section>
                </td>
                <td width="64%">
                  <section class="chat-area">
                      <header>
                        <?php
                          include_once "/Applications/XAMPP/xamppfiles/htdocs/PSI/php/config.php";
                          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                          if(mysqli_num_rows($sql)>0){
                            $row = mysqli_fetch_assoc($sql);
                          }
                        ?>
                        <img src="/Applications/XAMPP/xamppfiles/htdocs/PSI/php/images/<?php echo $row['picture']?>" alt="">
                        <div class="details">
                          <span><?php echo $row['username'];?></span>
                          <p><?php echo $row['status']?></p>
                        </div>
                      </header>
                        <div class="chat-box">
                        </div>
                      <form action="#" class="typing-area" autocomplete="off">
                        <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id'];?>"hidden>
                        <input type="text" name="incoming_id" value="<?php echo $user_id;?>"hidden>
                        <input type="text" name="message" class="input-field" placeholder="Type a message here">
                        <button><i class="fab fa-telegram-plane" aria-hidden="true"></i></button>
                      </form>
                    </section>
                  </td>
                </tr>
              </table>
            </div>
        </td>
      </tr>
    </table>
    <script src="javascript/users.js"></script>
    <script src="javascript/chat.js"></script>
  </body>
</html>
