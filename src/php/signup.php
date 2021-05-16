<?php
//signUp backend part
  session_start();
  require_once "../DB.php";
  //todo
  //Parsiranje podataka
  $fname =  $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if(!empty($fname) && !empty($lname) && !empty($username) && !empty($password) && !empty($email)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $rows= DB::getRows("SELECT email FROM user WHERE email = '{$email}'");
      if(count($rows)>0){
        echo "$email - ALREADY EXISTS";
      }else{
        //Check if picture is inserted
        if(isset($_FILES['picture'])){//if fiel is uploaded
          $img_name = $_FILES['picture']['name'];//getting user uploaded img name
          $tmp_name = $_FILES['picture']['tmp_name'];// used to save file

          //exploding image for extension
          $img_explode = explode('.', $img_name);
          $img_ext = end($img_explode);

          $extensions = ['png','jpeg','jpg'];
          if(in_array($img_ext, $extensions) === true){
            $time = time();
            $new_img_name = $time.$img_name;
            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
              $status = "Active now";
              $random_id = rand(time(), 10000000);

              $sql2= mysqli_query($conn, "INSERT INTO `users` (unique_id, fname, lname, username, email, password, picture, status)
                                          VALUES ({$random_id}, '{$fname}', '{$lname}', '{$username}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
              if($sql2){
                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                if(mysqli_num_rows($sql3)>0){
                  $row = mysqli_fetch_assoc($sql3);
                  $_SESSION['unique_id'] = $row['unique_id'];
                  echo "success";
                }
              }else{
                echo "Something went wrong";
              }
            };//We save picture in some folder in DB we save its URL
          }else{
            echo "UPLOAD IMAGE FILE";
          }
        }else{
          echo "ENTER IMAGE FILE";
        }
      }
    }else{
      echo "$email - This is not a valid email";
    }
  }else{
    echo "ALL INPUT FILES ARE REQUIRED";
  }
?>