<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="profile2.css">
  <title>Document</title>
</head>
<body>
    <table width="100%">
         <tr>
            <td height="30px">
                <?php include_once "navbar.php";?>
            </td>
        </tr>
        <tr>
            <td>
                <div class="container rounded bg-white mt-5">
                    <div class="row">
                        <div class="col-md-4 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <div> <img src="<?php echo $row['image']; ?>" width="100%" height="100%" class="" id="profile_img" alt="relayfinal.png"> </div>
                            <div><input class="slika" type="file" id="file" accept="image/jpg, image/jpeg, image/png" onchange="readURL(this);" disabled="true"></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <form id="form" action="#" enctype="multipart/form-data">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3" style="float:right;">
                                    <button class="btn btn-primary profile-button text-right edit" type="button" style="float:right;">Edit Profile</button>
                                    </div>
                                    <div class="row mt-2 name">
                                        <div class="col-md-6 info"><input id="fname" type="text" class="form-control" placeholder="First name" readonly></div>
                                        <div class="col-md-6 info"><input id="lname" type="text" class="form-control" placeholder="Last name" readonly></div>
                                    </div>
                                    <div class="row mt-3 logInfo">
                                        <div class="col-md-6 info"><input id="mail" type="text" class="form-control" placeholder="Email" readonly></div>
                                        <div class="col-md-6 info"><input id="user" type="text" class="form-control" placeholder="Username" readonly></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 info"><textarea id="bio"class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Biography" readonly></textarea></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4 info"><input type="text" class="form-control" placeholder="Password" id="password" style="display:none;"></div>
                                        <div class="col-md-4 info"><input type="text" class="form-control" placeholder="New password" id="newPassword" style="display:none;"></div>
                                        <div class="col-md-4 info"><input type="text" class="form-control" placeholder="Confirm passowrd" id="confPassword" style="display:none;"></div>
                                    </div>
                                    <div class="mt-5 text-right"><button id="save" style="display:none; float:right;" class="btn btn-primary profile-button save" type="button">Save Profile</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <script src="profile2.js"></script>
</body>
</html>