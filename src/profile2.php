<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
  
  <title>Document</title>
</head>
<?php include_once "header.php";?>
<body style="align-items: start;">
    <table width="100%" height="100%" style="margin: top -100px;">
    <tr>    
        <td>
          <input type="checkbox" name="checkbox" id="check">
          <div class="header">
            <h2><img src="relayfinal.png" width="50px" height="50px"></h2>
            <div class="navigation">
              <?php
              require('links.php');
              ?>
            </div>
            <label for="check">
              <i class="fas fa-bars menu-btn"></i>
              <i class="fas fa-times close-btn"></i>
            </label>
          </div> 
        </td>
      </tr>
            <td>
                <div class="container rounded bg-white mt-5">
                <?php require_once "DB.php";
                $user_id = $_SESSION['unique_id'];
                $rows=DB::getRows("SELECT * FROM user WHERE iduser = {$_SESSION['unique_id']}");
                if(count($rows)==1){
                    $row = $rows[0];
                }
                ?>
                    <div class="row">
                        <div class="col-md-4 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <div> <img src="<?php echo $row['image']; ?>" width="100%" height="100%" class="" id="profile_img" alt="images/default.png"> </div>
                            <div><input class="slika" type="file" id="file"  onchange="readURL(this);" name="picture" disabled="true"></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <form id="form" action="#" enctype="multipart/form-data">
                                <div class="p-3 py-5">
                                
                                    <div class="row mt-2 name">
                                        <div class="col-md-6 info"><input name="fname" id="fname" type="text" class="form-control" placeholder="First name"  value="<?php echo $row['firstname']; ?>" readonly></div>
                                        <div class="col-md-6 info"><input name="lname" id="lname" type="text" class="form-control" placeholder="Last name" value="<?php echo $row['lastname']; ?>" readonly></div>
                                    </div>
                                    <div class="row mt-3 logInfo">
                                        <div class="col-md-6 info"><input id="mail" name="email" type="text" class="form-control" placeholder="Email" value="<?php echo $row['email']; ?>" readonly></div>
                                        <div class="col-md-6 info"><input id="user" name="username" type="text" class="form-control" placeholder="Username" value="<?php echo $row['username']; ?>" readonly></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 info"><textarea id="bio"class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Biography" name="biografija" readonly><?php echo $row['bio'];?></textarea></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4 info"><input type="text" class="form-control" placeholder="Password" name="password" id="password" style="display:none;"></div>
                                        <div class="col-md-4 info"><input type="text" class="form-control" placeholder="New password" name="newpassword" id="newPassword" style="display:none;"></div>
                                        <div class="col-md-4 info"><input type="text" class="form-control" placeholder="Confirm passowrd" name="confirm" id="confPassword" style="display:none;"></div>
                                    </div>
                                    
                                    <div class="mt-5 text-right"><button id="save" style="display:none; float:right;" class="btn btn-primary profile-button save" type="button">Save Profile</button></div>
                                    <div class="d-flex justify-content-between align-items-center mb-3" style="float:right;">
                                    <button class="btn btn-primary profile-button text-right edit" type="button" style="float:right; margin-right:10px">Edit Profile</button>   
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <script src="javascript/profile2.js"></script>
</body>
</html>