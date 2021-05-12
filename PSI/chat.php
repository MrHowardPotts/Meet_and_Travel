

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
              <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>Contact</a>
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
                <td>
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
                        <img src="php/images/<?php echo $row['picture']?>" alt="">
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
                      <a href="#">
                        <div class="content">
                          <img src="relayfinal.png" alt="">
                          <div class="details">
                            <span>Neko</span>
                            <p>Test poruka</p>
                          </div>
                        </div>
                        <div class="status-dot">
                          <i class="fas fa-circle"></i>
                        </div>
                      </a>
                    </div>
                  </section>
                </td>
                <td>
                  <section class="chat-area">
                      <header>
                        <a href="#" class="back-icon"><i class="fas fa-arrow-left"></i></a> 
                        <img src="relayfinal.png" alt="">
                        <div class="details">
                          <span>Nesto</span>
                          <p>Active now</p>
                        </div>
                      </header>
                        <div class="chat-box">
                          <div class="chat outcoming">
                            <div class="details">
                              <p>Lorem ipsum dolor do sit amer, consetestur adipistilincg emit</p>
                            </div>
                          </div>
                          <div class="chat incoming">
                            <img src="relayfinal.png" alt="">
                            <div class="details">
                              <p>Lorem ipsum dolor do sit amer, consetestur adipistilincg emit</p>
                            </div>
                          </div>
                          <div class="chat outcoming">
                            <div class="details">
                              <p>Lorem ipsum dolor do sit amer, consetestur adipistilincg emit</p>
                            </div>
                          </div>
                          <div class="chat incoming">
                            <img src="relayfinal.png" alt="">
                            <div class="details">
                              <p>Lorem ipsum dolor do sit amer, consetestur adipistilincg emit</p>
                            </div>
                          </div>
                          <div class="chat outcoming">
                            <div class="details">
                              <p>Lorem ipsum dolor do sit amer, consetestur adipistilincg emit</p>
                            </div>
                          </div>
                          <div class="chat incoming">
                            <img src="relayfinal.png" alt="">
                            <div class="details">
                              <p>Lorem ipsum dolor do sit amer, consetestur adipistilincg emit</p>
                            </div>
                          </div>
                          <div class="chat outcoming">
                            <div class="details">
                              <p>Lorem ipsum dolor do sit amer, consetestur adipistilincg emit</p>
                            </div>
                          </div>
                          <div class="chat incoming">
                            <img src="relayfinal.png" alt="">
                            <div class="details">
                              <p>Lorem ipsum dolor do sit amer, consetestur adipistilincg emit</p>
                            </div>
                          </div>
                        </div>
                      <form action="#" class="typing-area">
                        <input type="text" placeholder="Type a message here">
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
  </body>
</html>
