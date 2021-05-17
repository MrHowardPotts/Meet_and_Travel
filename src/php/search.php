<?php
//searching groups by name
  session_start();
  require_once "../DB.php";
  $user_id = $_SESSION['unique_id'];
  $searchTerm = $_POST['searchTerm'];
  $output = "";
  $sql="SELECT * FROM member INNER JOIN meetandtravel.group where member.iduser={$user_id} AND (name LIKE '%{$searchTerm}%')";
  //$sql = mysqli_query($conn, "SELECT * FROM member WHERE NOT unique_id = {$outgoing_id} AND (username LIKE '%{$searchTerm}%')");
  $rows=DB::getRows($sql);
  if(count($rows) >0){
    include "data.php";
  }else{
    $output .= "No groups found";
  }
  echo $output;
?>