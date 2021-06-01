<?php


  //$rows contains each row of joined tables members and group 
  for($i=0;$i<count($rows);$i++){
    //get the last message for given chat
    $row=$rows[$i];
    $group_id=$row['idgroup'];
    $sql2 = "SELECT * FROM message WHERE idgroup={$group_id} order by idmessage desc limit 1";
    
    $row2 = DB::getRows($sql2);
    if(count($row2)> 0){
      $result = $row2[0]['message'];
    }else{
      $result = "No message available";
    }

    //trimming if we have more than 18 chars
    (strlen($result) > 10) ? $msg = substr($result, 0, 10).'...' : $msg = $result;
    //adding you
    if(count($row2)>0)
    ($user_id == $row2[0]['idsender']) ? $you = "" : $you = "You: " ;
    else $you="";


    $output .= '  <a href="chat.php?group_id='. $row['idgroup'] .'">
                    <div class="content">
                      <img src="php/images/1620843858relayfinal.png" alt="">
                      <div class="details">
                        <span>'. $row['name'] .'</span>
                        <p>'. $you . $msg .'</p>
                      </div>
                    </div>
                  </a>';
  }
?>