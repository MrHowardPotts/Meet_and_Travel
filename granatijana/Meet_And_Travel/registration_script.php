<?php
session_start();

$fname=$_POST['First_name'];
$lname=$_POST['Last_name'];
$user_reg=$_POST['username'];
$email=$_POST['e-mail'];
$password_reg=$_POST['password'];
$password_conf_reg=$_POST['Confirm_password'];  

//$rez_user=check_username($user);



if(empty($fname)){
 $_SESSION['user_reg']=$user_reg;
 $_SESSION['lname']=$lname;
 $_SESSION['email']=$email;
 $_SESSION['password_reg']=$password_reg;
 $_SESSION['password_conf_reg']=$password_conf_reg;
 header("Location:registration.php");
 exit();
} 
if(empty($lname)){
 $_SESSION['fname']=$fname;
 $_SESSION['user_reg']=$user_reg;
 $_SESSION['email']=$email;
 $_SESSION['password_reg']=$password_reg;
 $_SESSION['password_conf_reg']=$password_conf_reg; 
 header("Location:registration.php");
exit();
 
} 
if(empty($user_reg)){ 
 $_SESSION['fname']=$fname;
 $_SESSION['lname']=$lname;
 $_SESSION['email']=$email;
 $_SESSION['password_reg']=$password_reg;
 $_SESSION['password_conf_reg']=$password_conf_reg;
 header("Location:registration.php");
  exit();
}
if(empty($email)){
 $_SESSION['fname']=$fname;
 $_SESSION['lname']=$lname;
 $_SESSION['user_reg']=$user_reg;
 $_SESSION['password_reg']=$password_reg;
 $_SESSION['password_conf_reg']=$password_conf_reg;  
 header("Location:registration.php");
exit();
 
}
if(empty($password_reg)){
 $_SESSION['fname']=$fname;
 $_SESSION['lname']=$lname;
 $_SESSION['email']=$email;
 $_SESSION['user_reg']=$user_reg;
 $_SESSION['password_conf_reg']=$password_conf_reg;
 header("Location:registration.php");
 exit();
 
}
if(empty($password_conf_reg)){
 $_SESSION['fname']=$fname;
 $_SESSION['lname']=$lname;
 $_SESSION['email']=$email;
 $_SESSION['password_reg']=$password_reg;
 $_SESSION['user_reg']=$user;
 header("Location:registration.php");
exit();
}
 if($password_reg!=$password_conf_reg){
 $_SESSION['fname']=$fname;
 $_SESSION['lname']=$lname;
 $_SESSION['email']=$email;
 $_SESSION['user_reg']=$user_reg;
 $_SESSION['password_reg']=$password_reg;
 $error_pass_conf="Please confirm th right password";
 $_SESSION['error_pass_conf'];
 header("Location:registration.php");
 exit();
    
}
$rez_user=0;

if($rez_user==1){
 $_SESSION['fname']=$fname;
 $_SESSION['lname']=$lname;
 $_SESSION['email']=$email;
 $_SESSION['password_reg']=$password_reg;
 $_SESSION['password_conf_reg']=$password_conf_reg;
 $user_reg="";
 $error_user_exists="";
 $_SESSION['error_user_exists']="This username already exists.Choose another one.";
 header("Location:registration.php");
 exit();
         
}

//send_info_to_database($fname,$lname,$email,$user_reg,$password_reg);

if($password_reg!=$password_conf_reg){
 $_SESSION['fname']=$fname;
 $_SESSION['lname']=$lname;
 $_SESSION['email']=$email;
 $_SESSION['user_reg']=$user_reg;
 $_SESSION['password_reg']=$password_reg;
 $password_conf_reg="";
 $error_pass_conf="";
 $_SESSION['error_pass_conf']="Passwords do not match.";
 header("Location:registration.php");
 exit();
}
header("Location:profil.php");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

