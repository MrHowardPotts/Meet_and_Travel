<?php
session_start();
echo 'nesto';
$first=$_POST['first'];
$last=$_POST['last'];
$user=$_POST['user'];
$country=$_POST['country'];
$bio=$_POST['bio'];


$_SESSION['first']=$first;
$_SESSION['last']=$last;
$_SESSION['user']=$user;
$_SESSION['country']=$first;
$bio="Volim da jedem sladoled!";
$_SESSION['bio']=$bio;
header("Location:profil.php");
exit();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

