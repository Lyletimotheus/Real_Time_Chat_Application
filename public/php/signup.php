<?php
session_start();
require_once("../../database/config.php");
require_once("./functions/userInput.php");

$fname = test_input($_POST["fname"]);
$lname = test_input($_POST["lname"]);
$email = test_input($_POST["email"]);
$password = test_input($_POST["password"]);

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $stmt = $conn -> prepare("SELECT email FROM users WHERE email = :email");
        $stmt -> bindParam(':email', $email);
        $stmt -> execute();
            if($stmt -> rowCount() > 0){
                echo "$email - This email already exist!";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['png', 'jpg', 'jpeg'];
                    if(in_array($img_ext, $extensions) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;

                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
                            $status = "Active Now";
                            $random_id = rand(time(),10000000);

                            $stmt = $conn -> prepare("INSERT INTO users(unique_id, fname, lname, email, password, img, status) VALUES (:random_id, :fname, :lname, :email, :password, :new_img_name, :status)");
                            $stmt -> bindParam(':random_id', $random_id);
                            $stmt -> bindParam(':fname', $fname);
                            $stmt -> bindParam(':lname', $lname);
                            $stmt -> bindParam(':email', $email);
                            $stmt -> bindParam(':password', $password);
                            $stmt -> bindParam(':new_img_name', $new_img_name);
                            $stmt -> bindParam(':status', $status);
                            $stmt -> execute();

                            if($stmt){
                                $stmt = $conn -> prepare("SELECT * FROM users WHERE email = :email");
                                $stmt -> bindParam(':email', $email);
                                $stmt -> execute();
                                $data = $stmt -> fetch();
                                if($data > 0){
                                    $_SESSION['unique_id'] = $data['unique_id'];
                                    echo "Success";
                                }
                            }else{
                                echo "Something went wrong!";
                            }

                        }
                    }else{
                        echo "Please select an image file (jpg, jpeg or png)";
                    }
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