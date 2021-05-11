<?php
session_start();

$user=$_POST['username'];
$password=$_POST['password'];

if($poruka!=""){
    $_SESSION['poruka']=$poruka;

    header ("Location:login.php");
    exit();
}    

//$rez=metod();
$rez=2;
if($rez==0){
    $_SESSION['user']=$user;
    header("Location:profil.php");
}
else if($rez==1){
    $error_user="";
    $_SESSION['error_user']="Username is invalid";
    header("Location:login.php");
    exit();
}
else if($rez==2){
    $error_pass="";
    $password="";
    $_SESSION['user']=$user;
    $_SESSION['error_pass']="Password is invalid";
    header("Location:login.php");
    exit();
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

