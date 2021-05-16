<?php
//nesto drka kurac proverite 
  session_start();
  if(isset($_SESSION['unique_id'])){// if user logged in
    require_once "../DB.php";
    $logout_id =$_GET['logout_id'];
    if(isset($logout_id)){ //if logout id is set
      $status = "Offline now";
      //once logged out update his status and well stop the session
      //$sql = mysqli_query($conn,"UPDATE users SET status = '{$status}' WHERE unique_id = {$logout_id}");
      //if($sql){
        session_unset();
        session_destroy();
        header("location: ../login.php");
      //}
    //}else{
      //header("location: ../chat.php");
   // }
  }
}
else{
    header("location: ../login.php");
      }
?>