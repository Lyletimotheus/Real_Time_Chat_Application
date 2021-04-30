<?php
require_once("../../database/config.php");
require_once("./functions/userInput.php");
$searchTerm = test_input($_POST["searchTerm"]);
$output = "";

$stmt = $conn -> prepare("SELECT * FROM users WHERE fname LIKE '%$searchTerm%'");
$stmt -> execute();
$result = $stmt -> fetchAll();


if(count($result) > 0){
    $output .=  "Name:" .$result['fname'];
}else {
    $output .= "No users found!";
}

echo $output;
?>