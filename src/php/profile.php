<?php
session_start();
require_once "../DB.php";

$json_string=file_get_contents("php://input");
$json_obj=json_decode($json_string);
$obj=get_object_vars($json_obj);
  


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

  $pictureName = $_FILES['picture']['name'];

if(isset($_FILES['picture'])){
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
            $newfile="php/images/".$filename;

          }
    }

}


$sql = "UPDATE `user` SET `username`='{$obj['username']}',`firstname`='{$obj['firstname']}',`lastname`='{$obj['lastname']}',`bio`='{$obj['bio']}', `image`='{$newfile}' WHERE iduser = '{$_SESSION['unique_id']}'";


if(isset($sql)) DB::Execute($sql);


echo "success";