<?php
session_start();
//$string=metod();
// $first="sec";
//$string=metoda();
//list($first,$last,$user,$country,$bio)= explode(",", $string);

//TODO PROMENITI OVO
// $_SESSION['first']=$first;
// $_SESSION['last']=$first;
// $_SESSION['user']=$first;
// $_SESSION['country']=$first;
// $bio="Volim da putujem!";
// $_SESSION['bio']=$bio;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/profile.css">
    <!-- <link rel="stylesheet" href="css/results.css"> -->
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="javascript/profil.js"></script>
</head>
<body>
<table>
    <tr>
        <td>
        <div class="header">
            <h2><img src="final1.png" ></h2>
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
<tr>
<td>
    <form name="profile_form" method="POST" action="php/profile.php">
    <!-- <form name="profile_form" method="POST"> -->
    <div class="container">
    <?php require_once "DB.php";
        $user_id = $_SESSION['unique_id'];
        $rows=DB::getRows("SELECT * FROM user WHERE iduser = {$_SESSION['unique_id']}");
        if(count($rows)==1){
            $row = $rows[0];
          }
    ?>
        <div class="row">   
            <div class="col-xs-12 col-sm-12 col-md-6 order-sm-0 order-md-0 center">
            
                <div> <img src="<?php echo $row['image']; ?>" width="100%" height="100%" class="" id="profile_img" alt="login.png"> </div>
                <div><input type="file" id="file" accept="image/jpg, image/jpeg, image/png" onchange="readURL(this);" disabled="true"></div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-4 order-xs-2 order-sm-1 order-md-1 offset-md-1" style = "float:left;">
            <div id="error" class="errorMsg"></div>
                <input type="text" class="text" id="first_name" name="first" value="<?php echo $row['firstname']; ?>" readonly><br>
                <input type="text" class="text" id="last_name" name="last" value="<?php echo $row['lastname']; ?>" readonly><br>
                <input type="text" id="username" class="text" name="user" value="<?php echo $row['username']; ?>" readonly><br>    
                <input type="text"class="text"  name="country" value="<?php echo "Country not specified";?>" readonly><br>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-1 order-xs-4 order-sm-2 order-md-2 dugme" style = "margin-right:10px;" >
                <button id="editbut" name="editsavebutton" class="edit" onclick = "editSave()">Edit</button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-10">
              
                <textarea class="textarea biography" name="bio" id="biography" placeholder="Write something about yourself ..." readonly><?php echo $row['bio']?></textarea>
            </div>
        </div>
    </div>
    </form>
    </td>
    </tr>
    </table>
</body>
</html>
