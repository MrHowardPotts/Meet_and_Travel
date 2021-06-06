<?php
//backend za login
  session_start();
  require_once "../DB.php";
  $conn=DB::getInstance();

  //treba parsirati podatke
  $username =  $_POST['username'];
  $password = $_POST['password'];
  
  if(!empty($username) && !empty($password)){
    $sql = 'SELECT * FROM user WHERE username = :username AND password = :password';
    $res=$conn->prepare($sql);
    $res->execute(array(':username'=>$username,':password'=>$password));
    $rows=$res->fetchAll();
    if(count($rows) > 0){
      // $row = mysqli_fetch_assoc($sql);
      // $status = "Active now";
      // //updating user status
      // $sql2 = mysqli_query($conn,"UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
      
        $_SESSION['unique_id'] = $rows[0]['iduser'];
        echo "success";
      
    }else{
      echo "Username or Password is incorrect";
    }
  }else{
    echo "All fields are required";
  }
?>