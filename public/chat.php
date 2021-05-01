<?php 
session_start();
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
            if($stmt -> rowCount() > 0){
                $data = $stmt -> fetch(PDO::FETCH_ASSOC);
            }
            ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $data['img'] ?>" alt="">
                <div class="details">
                    <span><?php echo $data['fname']. " " . $data['lname'] ?></span>
                    <p><?php echo $data['status'] ?></p>
                </div>          
            </header>
            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>This is a outgoing message by the sender.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="images/img.jpg" alt="">
                    <div class="details">
                        <p>This is a incoming message recieved.</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>This is a outgoing message by the sender.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="images/img.jpg" alt="">
                    <div class="details">
                        <p>This is a incoming message recieved.</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>This is a outgoing message by the sender.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="images/img.jpg" alt="">
                    <div class="details">
                        <p>This is a incoming message recieved.</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>This is a outgoing message by the sender.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="images/img.jpg" alt="">
                    <div class="details">
                        <p>This is a incoming message recieved.</p>
                    </div>
                </div>
            </div>
            <form action="#" class="typing-area">
                <input type="text" placeholder="Type your message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

</body>
</html>