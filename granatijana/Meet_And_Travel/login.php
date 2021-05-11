<?php
session_start();
?>
<!DOCTYPE html>
<!-- Code By Webdevtrick ( https://webdevtrick.com ) -->
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
 
<div class="login-box">
  <h2><img src="relayfinal.png" width="150px" height="150px"></h2>
  <form name="login_form" method="POST" action="login_script.php">
    <div class="user-box">
        <input type="text" name="username" value="<?php echo $_SESSION['user']??"";?>" required="required"  oninvalid="this.setCustomValidity('Username is required')" onchange="this.setCustomValidity('')">
      <label><?php
      if(!empty($_SESSION['error_user'])){
          echo "<span>".$_SESSION['error_user']."</span";
      }
       else {
          echo 'Username';   
       }
      ?>
      </label>
    </div>
    <div class="user-box">
        <input type="password" name="password" value="<?php echo $_SESSION['password']??"";?>" required="required" onchange="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Password is required')">
      <label><?php
      if(!empty($_SESSION['error_pass'])){
          echo "<span>".$_SESSION['error_pass']."</span";
      }
 else {
          echo 'Password';   
}
      ?></label>
      
    </div>
    <div align="center">
        <a href="welcome.php" class="back">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Back
        </a>
        <input type="submit" class="submit" name="sub_login" value="Login"/>
      <!--</a>
        
        <a href="profil.php" class="submit" onclick="this.closest('login_form').submit();return false;">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Submit
      </a>
     -->
    </div>
  </form>
</div>
  
</body>
</html>
<?php
session_destroy();
?>