<?php

while($data = $stmt -> fetch()){
    $stmt = $conn -> prepare("SELECT * FROM messages WHERE (incoming_msg_id = :unique_id
                            OR outgoing_msg_id = :outgoing_unique_id) AND 
                            (outgoing_msg_id = :outgoing_id 
                            OR incoming_msg_id = :incoming_outgoing_id) ORDER BY msg_id DESC LIMIT 1");
                            
    $stmt -> bindParam(':unique_id', $data['unique_id']);
    $stmt -> bindParam(':outgoing_unique_id', $data['unique_id']);
    $stmt -> bindParam(':outgoing_id', $outgoing_id);
    $stmt -> bindParam(':incoming_outgoing_id', $outgoing_id);
    $stmt -> execute();

    $result = $stmt -> fetch();
    if($stmt -> rowCount() == 1){
        $result = $result['msg'];
    }else{
        $result = "No messages available";
    }

    // (strlen($result) > 28) ? msg = substr($result, 0, 28) : $msg = $result;

    if(strlen($result) > 28){
        $msg = substr($result, 0, 28);
    }else{
        $msg = $result;
    }

    $output .= '<a href="chat.php?user_id='.$data['unique_id'].'">
    <div class="content">
        <img src="php/images/'. $data["img"].'" alt="">
        <div class="details">
           <span>'.$data["fname"]. ' ' . $data["lname"] .'</span>
           <p>'.$msg.'</p>
       </div>        
    </div>
    <div class="status-dot"><i class="fas fa-circle"></i></div>
</a>
';
}
?>