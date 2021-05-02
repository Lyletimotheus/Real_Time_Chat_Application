<?php 
session_start();
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$unique_id = $_SESSION['unique_id'];
if(!isset($unique_id)){
    header("location:login.php");
}
require_once("php/partials/header.php");
require_once("../database/config.php");
require_once("php/functions/userInput.php");
?>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
            <?php 
            $user_id = test_input($_GET['user_id']);
            $stmt = $conn -> prepare("SELECT * FROM users WHERE unique_id = :unique_id");
            $stmt -> bindParam(':unique_id', $user_id);
            $stmt -> execute();
            // $data = $stmt -> fetchAll();
            if($stmt -> rowCount() > 0){
                $data = $stmt -> fetch();
            }
            
            ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $data['img'] ?>" alt="">
                <div class="details">
                    <span><?php echo $data['fname']. " " . $data['lname'] ?></span>
                    <p><?php echo $data['status'];?></p>
                </div>          
            </header>
            <div class="chat-box">
            </div>
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing-id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming-id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type your message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="javascript/chat.js"></script>
</body>
</html>