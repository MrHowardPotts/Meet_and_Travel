<?php
  session_start();
  require_once "../DB.php";
  $userid = $_SESSION['unique_id'];
  

  //todo
  //Ovo modifikujemo!
  $sql = "SELECT * FROM member WHERE iduser = {$userid}";
  
  $rows=DB::getRows($sql);
  $output = "";
  if(count($rows) == 0){
    $output .= "No users are available to chat";
  }else{
    //include "data.php";
  }
  echo $output;

?>