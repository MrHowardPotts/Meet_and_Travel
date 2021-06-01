<?php
session_start();
//$string=metod();
$first="sec";
//$string=metoda();
//list($first,$last,$user,$country,$bio)= explode(",", $string);
$_SESSION['first']=$first;
$_SESSION['last']=$first;
$_SESSION['user']=$first;
$_SESSION['country']=$first;
$bio="Volim da putujem!";
$_SESSION['bio']=$bio;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="profil.js"></script>
</head>
<body>

    <form name="profile_form" method="POST" action="profile_script.php">
    <div class="container">
        <div class="navbar">

        </div>
        <div class="row">
            <div class="col-xs-10 col-sm-9 col-md-5 order-sm-0 order-md-0 center">
                <img src="login.png" width="100%" height="100%" class="" id="profile_img" alt="login.png">
                <input type="file" id="file" accept="image/jpg, image/jpeg, image/png" onchange="readURL(this);" disabled="true">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 order-xs-2 order-sm-2 order-md-1">
                <input type="text" class="text" id="first_name" name="first" value="<?php echo $_SESSION['first']??"";?>" readonly><br>
                <input type="text" class="text" name="last" value="<?php echo $_SESSION['last']??"";?>" readonly><br>
                <input type="text" id="username" class="text" name="user" value="<?php echo $_SESSION['user']??"";?>" readonly><br>    
                <input type="text"class="text"  name="country" value="<?php echo $_SESSION['country']??"Country";?>" readonly><br>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-2 order-xs-4 order-sm-1 order-md-2 dugme">
                <button id="editbut" class="edit">Edit</button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-10">
              
                <textarea class="textarea biography" name="bio" id="biography" placeholder="Write something about yourself ..." readonly><?php echo $_SESSION['bio']??"BIO";?></textarea>
            </div>
        </div>
    </div>
    </form>
</body>
</html>
