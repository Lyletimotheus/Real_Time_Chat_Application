<?php
    session_start();
    require_once("../../database/config.php");

    $output = "";

    $stmt = $conn -> prepare("SELECT * FROM users");
    $stmt -> execute();
    if($stmt -> rowCount() == 1){
        $output .= "There are currently no users available to chat.";
    }elseif($stmt -> rowCount() > 0){
        while($data = $stmt -> fetch()){

            $output .= '<a href="#">
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
    }
    echo $output;

?>