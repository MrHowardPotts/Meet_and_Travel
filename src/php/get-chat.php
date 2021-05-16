<?php
   session_start();
   if(isset($_SESSION['unique_id'])){
     require_once "../DB.php";
     //todo
     //Ovde odraditi poreveru podataka
     $outgoing_id =$_POST['outgoing_id'];
     $group_id = $_POST['incoming_id'];
     $output = "";

     $sql = "SELECT * FROM message where idgroup= {$group_id}";
     $rows=DB::getRows($sql);
     if($rows>0){
        for($i=0;$i<count($rows);$i++){
          $row=$rows[$i];
          if($row['idsender'] == $outgoing_id){ //if true he is receiving
            $output .= '<div class="chat incoming">
                      <img src="php/images/1620843858relayfinal.png" alt="">
                      <div class="details">
                        <p>'. $row['message'] .'</p>
                      </div>
                    </div>';
          }else{ //he is sending
            $output .='<div class="chat outcoming">
                        <div class="details">
                          <p>'. $row['message'] .'</p>
                        </div>
                      </div>';
          }
        }
        echo $output;
     }
     
   }else{
     header("../login.php");
   }
 
?>