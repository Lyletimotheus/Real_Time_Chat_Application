<?php
while($data = $stmt -> fetch()){
    $stmt = $conn -> prepare("SELECT * FROM messages WHERE (incoming_msg_id = :incoming_unique_id
                            OR outgoing_msg_id = :outgoing_unique_id) AND 
                            (outgoing_msg_id = :incoming_unique_id 
                            OR incoming_msg_id = :outgoing_unique_id)");
                            
    $stmt -> bindParam(':incoming_unique_id', $data['unique_id']);
    $stmt -> bindParam(':outgoing_unique_id', $data['unique_id']);
    $stmt -> execute();

    $output .= '<a href="chat.php?user_id='.$data['unique_id'].'">
    <div class="content">
        <img src="php/images/'. $data["img"].'" alt="">
        <div class="details">
           <span>'.$data["fname"]. ' ' . $data["lname"] .'</span>
           <p>This is a message from someone.</p>
       </div>        
    </div>
    <div class="status-dot"><i class="fas fa-circle"></i></div>
</a>
';
}
?>