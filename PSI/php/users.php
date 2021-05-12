<?php
  session_start();
  include_once "/Applications/XAMPP/xamppfiles/htdocs/PSI/php/config.php";
  $sql = mysql_query("SELECT * FROM users");
  $output ="";

  if(mysqli_num_rows($sql) == 1){
    $output .= "No users are available to chat"; 
  }elseif(mysqli_num_rows($sql)>0){
    while($row = mysqli_fetch_assoc($sql)){
      $output .= '';
    }
  }
?>