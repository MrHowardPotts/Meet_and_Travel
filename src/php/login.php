<?php
//backend za login
  session_start();
  include_once "/Applications/XAMPP/xamppfiles/htdocs/PSI/php/config.php";
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if(!empty($username) && !empty($password)){
    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '{$username}' AND password = '{$password}'");
    if(mysqli_num_rows($sql) > 0){
      $row = mysqli_fetch_assoc($sql);
      $status = "Active now";
      //updating user status
      $sql2 = mysqli_query($conn,"UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
      if($sql2){
        $_SESSION['unique_id'] = $row['unique_id'];
        echo "success";
      }
    }else{
      echo "Username or Password is incorrect";
    }
  }else{
    echo "All fields are required";
  }
?>