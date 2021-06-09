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
              <!-- //////////////////////remove terminate/////////////////////////////////////////// -->
              <?php
              require("links.php");
              ?>
            </div>
            <label for="check">
              <i class="fas fa-bars menu-btn"></i>
              <i class="fas fa-times close-btn"></i>
            </label>
          </div> 
        </td>
      </tr>
      <tr>
        <td align="center" valign="center">
          <div class="wrapper">
            <table>
              <tr>
                <td height="643px" width="36%"><!--FIX HEIGHT IT DOESNT WORK FOR SOME REASON-->
                  <section class="users">
                    <header>
                      <?php
                        require_once "DB.php";
                        //ovde treba da bude ulogovan user
                        $rows=DB::getRows("SELECT * FROM user WHERE iduser = {$_SESSION['unique_id']}");
                        
                        if(count($rows)==1){
                          $row = $rows[0];
                        }
                      ?>
                      <div class="content">
                        <!-- Ovde moramo da dodamo putanju do image-a -->
                        
                        <img src="<?php echo $row['image'] ?>" alt=""><!--You need to change permission to read/write-->
                        <div class="details">
                          <span><?php echo $row['firstname'];?></span>
                          
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
                          
                          //ovde treba da bude grupa -> name
                          if(isset($_GET['group_id'])){
                            require_once "DB.php";
                            $group_id =$_GET['group_id']; 
                            $rows=DB::getRows("SELECT * FROM groups WHERE idgroup = {$group_id}");
                            if(count($rows)>0){
                              $row =$rows[0];
                            }
                          }
                          else $group_id=-1; // it's not set in GET
                        ?>
                        <img src="<?php 
                        if(isset($row['name']))echo $row['image'];
                        else echo "php/images/1620843972relayfinal.png";
                        ?>"  alt="">
                        <div class="details">
                          <span><?php 
                          if(isset($row['name']))$name=$row['name'];
                          else $name="Select group";
                          echo $name;?></span>
                        </div>
                      </header>
                        <div class="chat-box">
                        </div>
                      <form action="#" class="typing-area" autocomplete="off">
                        <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id'];?>"hidden>
                        
                        <!-- ovo treba da bude groupID -->
                        <input type="text" name="incoming_id" value="<?php echo $group_id;?>"hidden>
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
    <?php
    if($group_id!=-1){
      echo "<script>
      createListener({$group_id});      
      </script>";
    }
    ?>
    
  </body>
</html>
