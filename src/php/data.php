<?php
  while($row = mysqli_fetch_assoc($sql)){
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
            OR outgoing_msg_id = {$row['unique_id']}) AND 
            (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    if(mysqli_num_rows($query2) > 0){
      $result = $row2['msg'];
    }else{
      $result = "No message available";
    }

    //trimming if we have more than 18 chars
    (strlen($result) > 10) ? $msg = substr($result, 0, 10).'...' : $msg = $result;
    //adding you
    ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "" : $you = "You: " ;
    //checking user status
    ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";


    $output .= '  <a href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
                      <img src="/Applications/XAMPP/xamppfiles/htdocs/PSI/php/images/'. $row['picture']. '" alt="">
                      <div class="details">
                        <span>'. $row['username'] .'</span>
                        <p>'. $you . $msg .'</p>
                      </div>
                    </div>
                    <div class="status-dot '. $offline .'">
                      <i class="fas fa-circle"></i>
                    </div>
                  </a>';
  }
?>