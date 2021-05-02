<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        require_once("../../database/config.php");
        require_once("./functions/userInput.php");
        $outgoing_id = test_input($_POST["outgoing-id"]);
        $incoming_id = test_input($_POST["incoming-id"]);
        $output = "";

        $stmt = $conn -> prepare("SELECT * FROM messages 
        LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
        WHERE (outgoing_msg_id = :outgoing_msg_id AND incoming_msg_id = :incoming_msg_id) OR (outgoing_msg_id = :incoming_msg_id AND incoming_msg_id = :outgoing_msg_id) ORDER BY msg_id ASC");
        $stmt -> bindParam(':outgoing_msg_id', $outgoing_id);
        $stmt -> bindParam(':incoming_msg_id', $incoming_id);
        $stmt -> bindParam(':incoming_msg_id', $incoming_id);
        $stmt -> bindParam(':outgoing_msg_id', $outgoing_id);
        $stmt -> execute();

        if($stmt -> rowCount() > 0){
            while($data = $stmt -> fetch()){
                if($data['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'.$data["msg"].'</p>
                                    </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                    <img src="php/images/'.$data['img'].'" alt="">
                                    <div class="details">
                                        <p>'.$data["msg"].'</p>
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