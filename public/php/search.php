<?php
require_once("../../database/config.php");
require_once("./functions/userInput.php");
$searchTerm = test_input($_POST["searchTerm"]);
$output = "";

$stmt = $conn -> prepare("SELECT * FROM users WHERE fname LIKE '%$searchTerm%' OR lname LIKE '%$searchTerm%'");
$stmt -> execute();
$result = $stmt -> fetch(PDO::FETCH_ASSOC);
    if($stmt -> rowCount() > 0){
        // $output .=  "Name:" .$result['fname'];
    }else {
        $output .= "No users found!";
    }

echo $output;
?>