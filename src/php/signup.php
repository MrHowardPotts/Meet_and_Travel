<?php
//signUp backend part
  session_start();
  require_once "../DB.php";
  
  $fname =  $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm = $_POST['confirm'];
  $type = $_POST['gender'];

  $pictureName = $_FILES['picture']['name'];

  $errors = 0;
  if($fname === '' || $fname == null){
     echo"First name is required ";
     $errors++;
    }
  if($lname === '' || $lname == null){
     echo"Last name is required ";
     $errors++;
  }
  if($username === '' || $username == null){
     echo"Username is required ";
     $errors++;
    }

  if($email === '' || $email == null){
     echo"Email is required ";
     $errors++;
  }
  if($password === '' || $password == null){
     echo"Password is required ";
     $errors++;
  }

  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) echo "Please enter a valid email ";
    else {
        if(count(DB::getRows("SELECT email FROM user WHERE email = '{$email}'")) > 0){
          echo "This email address is already in use for another account, please enter different one";
          $errors++;
        }
    }
    if(count(DB::getRows("SELECT * FROM user WHERE username = '{$username}'")) > 0){
      echo "That username is already in use ";
      $errors++;
    }
  if((preg_match('/[0-9]/', $fname))){
      echo "First name cannot contain numbers ";
      $errors++;
  }
  if((preg_match('/[0-9]/', $lname))){
     echo "Last name cannot contain numbers ";
     $errors++;
  }
  if(strlen($password) <= 6) {
    echo "Password must be longer than 6 characters ";
    $errors++;
  }
  if(strlen($password) >= 25){
    echo "Password must be less than 25 characters ";
    $errors++;
  }
  if(!preg_match('/[0-9]/',$password)){
    echo "Password must contain atleast one number ";
    $errors++;
  }
  if(!preg_match('/[\'^£$%&*!()}{@#~?><>,|=_+¬-]/', $password)){
    echo "Password must contain at least one special character ";
    $errors++;
  }
  if($password !== $confirm){
    echo "Passwords do not match";
    $errors++;
  }
  $mime = array('image/gif' => 'gif',
                  'image/jpeg' => 'jpeg',
                  'image/png' => 'png',
                  'application/x-shockwave-flash' => 'swf',
                  'image/psd' => 'psd',
                  'image/bmp' => 'bmp',
                  'image/tiff' => 'tiff',
                  'image/tiff' => 'tiff',
                  'image/jp2' => 'jp2',
                  'image/iff' => 'iff',
                  'image/vnd.wap.wbmp' => 'bmp',
                  'image/xbm' => 'xbm',
                  'image/vnd.microsoft.icon' => 'ico');

  $image_extensions_allowed = array('jpg', 'jpeg', 'png', 'gif','bmp','JPG', 'JPEG', 'PNG', 'GIF','BMP');

  
  if(isset($_FILES['picture'])){
      if($_FILES['picture']['error'] == 0){
        $img_explode = explode('.', $pictureName);
        $pictureExtension = end($img_explode);
        $boolExtension = false;
        foreach($image_extensions_allowed as $ext){
          if ($ext == $pictureExtension) $boolExtension = true;
        }
        if($boolExtension == true){//dozvoljena extenzija slike
          $dir = './images';
          $filename =  + strval(time()) . '.' .$pictureExtension;
          $newfile = $dir . '/' . $filename;
          if(move_uploaded_file($_FILES['picture']['tmp_name'],$newfile)){
            if($errors == 0){
              $sql = "INSERT INTO `user` (firstname, lastname, username, password, email, image, type)
                      VALUES ('{$fname}', '{$lname}', '{$username}', '{$password}', '{$email}', '{$newfile}', '{$type}')";
              DB::Execute($sql);
              $row = DB::getRows("SELECT * FROM user WHERE email = '{$email}'")[0];
              $_SESSION['unique_id'] = $row['iduser'];
              
            }
          }
        }
      }
    }
    echo "success";
?>