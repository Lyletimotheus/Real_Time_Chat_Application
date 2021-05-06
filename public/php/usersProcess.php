<?php
    session_start();
    require_once("../../database/config.php");
    $outgoing_id = $_SESSION['unique_id'];
    $output = "";

    $stmt = $conn -> prepare("SELECT * FROM users");
    $stmt -> execute();
    $data = $stmt -> fetch();
    if($stmt -> rowCount() == 1){
        $output .= "There are currently no users available to chat.";
    }elseif($stmt -> rowCount() > 0){
        include("data.php");
    }
    echo $output;

?>