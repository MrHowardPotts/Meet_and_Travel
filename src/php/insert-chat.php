<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
    require_once "../DB.php";
    //todo
    //parsiranje podataka
    //razmisliti da li je ovo groupID
    $outgoing_id = $_POST['outgoing_id'];
    $group_id = $_POST['incoming_id'];
    $message = $_POST['message'];

    if(!empty($message)){
      DB::Execute("INSERT INTO message (idsender, idgroup, message)
                                  VALUES({$outgoing_id}, {$group_id}, '{$message}')");
    }
  }else{
    header("../login.php");
  }

?>