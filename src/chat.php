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
                <!-- todo -->
                <!-- Bug when loging out -->
              <a href="php/logout.php?logout_id=<?php echo $_SESSION['unique_id']?>" class="logout">
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
                        require_once "DB.php";
                        $rows=DB::getRows("SELECT * FROM user WHERE iduser = {$_SESSION['unique_id']}");
                        if(count($rows)==1){
                          $row = $rows[0];
                        }
                      ?>
                      <div class="content">
                        <!-- Ovde moramo da dodamo putanju do image-a -->
                        <img src="php/images/1620843858relayfinal.png" alt=""><!--You need to change permission to read/write-->
                        <div class="details">
                          <span><?php echo $row['username'];?></span>
                          
                        </div>
                      </div>
                    </header>
                    <div class="search">
                      <span class="text">Select a user to start chat</span>
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
                          require_once "DB.php";
                          $user_id =$_SESSION['unique_id'];
                          $rows=DB::getRows("SELECT * FROM user WHERE iduser = {$user_id}");
                          if(count($rows)>0){
                            $row =$rows[0];
                          }
                        ?>
                        <img src="php/images/1620843858relayfinal.png" alt="">
                        <div class="details">
                          <span><?php echo $row['username'];?></span>
                        </div>
                      </header>
                        <div class="chat-box">
                        </div>
                      <form action="#" class="typing-area" autocomplete="off">
                        <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id'];?>"hidden>
                        
                        <!-- ovo treba da bude groupID -->
                        <input type="text" name="incoming_id" value="<?php echo $user_id;?>"hidden>
                        <input type="text" name="message" class="input-field" placeholder="Type a message here">
                        
                        <button onclick="send()"><i class="fab fa-telegram-plane" aria-hidden="true"></i></button>
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
