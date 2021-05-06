<?php
session_start();
require_once("../../database/config.php");
require_once("./functions/userInput.php");
$email = test_input($_POST["email"]);
$password = test_input($_POST["password"]);

if(!empty($email) && !empty($password)){
    $stmt = $conn -> prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $stmt -> bindParam(':email', $email);
    $stmt -> bindParam(':password', $password);
    $stmt -> execute();
    if($stmt -> rowCount() > 0){
        $data = $stmt -> fetch();
        $_SESSION['unique_id'] = $data['unique_id'];
        echo "Success";

    }else{
        echo "Password or email do not match!";
    }

}else{
    echo "Complete all the fields before clicking continue!";
}

?>