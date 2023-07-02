<?php 
    // session_start();
    // include_once "config.php";
     while($row = mysqli_fetch_assoc($sql))
    {
         $sql3 = "SELECT * FROM messages WHERE  (incomin_msg_id = {$row['unique_id']}
         OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
         OR incomin_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query3 = mysqli_query($conn,$sql3);
        $row3 = mysqli_fetch_assoc($query3);
        if($row3 > 0){
            $result = $row3['msg'];
        }else{
            $result = "No message available";
        }
        $you = "";
        (strlen($result)>28)? $msg = (substr($result,0,28)).'...' : $msg = $result;
        ($outgoing_id == $row3['outgoing_msg_id']) ? $you = "You: " : $you = "";

        //check user is online or offline
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        
         $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                     <div class="content">
                         <img src="php/images/'. $row['img'] . '" alt="">
                         <div class="details">
                             <span>'.$row['fname']." ".$row['lname'].'</span>
                             <p>' . $you .$msg. '</p>
                         </div>
                     </div>
                     <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                     </a>';
     }
?>