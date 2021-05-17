<?php
  session_start();
  require_once "../DB.php";
  $user_id = $_SESSION['unique_id'];
  

  //todo
  //Ovo modifikujemo!
  $sql = "SELECT * FROM member INNER JOIN meetandtravel.group where member.iduser={$user_id}";
  
  $rows=DB::getRows($sql);
  $output = "";
  if(count($rows) == 0){
    $output .= "No users are available to chat";
  }else{
    include "data.php";
  }
  echo $output;

?>