<?php
include_once("../../database/config.php");
include_once("./functions/userInput.php");

$fname = test_input($_POST["fname"]);
$lname = test_input($_POST["lname"]);
$email = test_input($_POST["email"]);
$password = test_input($_POST["password"]);

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $stmt = $conn -> prepare("SELECT email FROM users WHERE email = :email");
        $stmt -> bindParam(':email', $email);
        $data = $stmt -> fetch();
            if($data > 0){
                echo "$email - This email already exist!";
            }else{
                if(isset($_FILES['file'])){

                }else{
                    echo "Please upload a profile photo!";
                }
            }
    }else{
        echo "$email - This is not a valid email address!";
    }

}else{
    echo "Complete all the fields before clicking continue!";
}




?>