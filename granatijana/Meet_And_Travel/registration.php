<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
    <title>Document</title>
</head>
<body>
   <div class="content" >
       
          <h2 > <img src="relayfinal.png" height="150px" width="150px" > </h2>
        <form name="registration_form" method="POST" action="registration_script.php">
        <div class="user-box">
            <input type="text" name="First_name" value="<?php echo $_SESSION['fname']??"";?>" required="required" onchange="this.setCustomValidity('')" oninvalid="this.setCustomValidity('First name is required')">
            <label>First name</label>
        </div>
        <div class="user-box">
            <input type="text" name="Last_name" value="<?php echo $_SESSION['lname']??"";?>" required="required" onchange="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Last name is required')">
            <label>Last name</label>
        </div>
        <div class="user-box">
            <input type="email" name="e-mail" value="<?php echo $_SESSION['email']??"";?>"  required="required" onchange="this.setCustomValidity('')" oninvalid="this.setCustomValidity('E-mail is required')">
            <label>E-mail</label>
        </div>
        <div class="user-box">
            <input type="text" name="username" value="<?php echo $_SESSION['user_reg']??"";?>" required="required" onchange="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Username is required')">
            <label><?php
      if(!empty($_SESSION['error_user_exists'])){
          echo "<span>".$_SESSION['error_user_exists']."</span";
      }
 else {
          echo 'Username';   
}
      ?></label>
        </div>
        <div class="user-box">
            <input type="password" name="password" value="<?php echo $_SESSION['password_reg']??"";?>"  required="required" onchange="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Password is required')">
            <label>Password</label>
        </div>
        <div class="user-box">
            <input type="password" name="Confirm_password" value="<?php echo $_SESSION['password_conf_reg']??"";?>"  required="required" onchange="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Password confirmation is required')">
            <label>
                <?php
                if(!empty($_SESSION['error_pass_conf'])){
          echo "<span>".$_SESSION['error_pass_conf']."</span";
      }
          else {
          echo 'Confirm password';   
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
            <input type="submit" class="submit" name="sub_reg" value="SIGN UP"/>
                
            <!--<a href="login.php" class="submit">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              Submit
            </a>-->
          </div>
    </form>
   </div>
</body>
</html>
<?php
  session_destroy();
?>