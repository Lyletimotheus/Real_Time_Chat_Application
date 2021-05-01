<?php
    session_start();
    require_once("../../database/config.php");

    $output = "";

    $stmt = $conn -> prepare("SELECT * FROM users");
    $stmt -> execute();
    if($stmt -> rowCount() == 1){
        $output .= "There are currently no users available to chat.";
    }elseif($stmt -> rowCount() > 0){
        include("data.php");
    }
    echo $output;

?>