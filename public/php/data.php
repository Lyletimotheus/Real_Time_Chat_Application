<?php
while($data = $stmt -> fetch()){

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