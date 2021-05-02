<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        require_once("../../database/config.php");
        require_once("./functions/userInput.php");
        $outgoing_id = test_input($_POST["outgoing-id"]);
        $incoming_id = test_input($_POST["incoming-id"]);
        $message = test_input($_POST["message"]);

        if(!empty($message)){
            $stmt = $conn -> prepare("INSERT INTO messages (incoming_msg_id,outgoing_msg_id, msg)
                                        VALUES(:incoming_id, :outgoing_id, :msg)") or die();
            $stmt -> bindParam(':incoming_id', $incoming_id);
            $stmt -> bindParam(':outgoing_id', $outgoing_id);
            $stmt -> bindParam(':msg', $message);
            $stmt -> execute();
        }
    }else{
        header("../login.php");
    }
?>