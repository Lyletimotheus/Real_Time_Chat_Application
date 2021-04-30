<?php 
session_start();
$unique_id = $_SESSION['unique_id'];
if(!isset($unique_id)){
    header("location:login.php");
}
require_once("php/partials/header.php");
require_once("../database/config.php");
?>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
            <?php 
            $stmt = $conn -> prepare("SELECT * FROM users WHERE unique_id = :unique_id");
            $stmt -> bindParam(':unique_id', $unique_id);
            $stmt -> execute();
            if($stmt -> rowCount() > 0){
                $data = $stmt -> fetch();
            }
 
            ?>
                <div class="content">
                <img src="php/images/<?php echo $data['img'] ?>" alt="">
                <div class="details">
                    <span><?php echo $data['fname']. " " . $data['lname'] ?></span>
                    <p><?php echo $data['status'] ?></p>
                </div>
                </div>
                <a href="#" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select a user to start chatting!</span>
                <input type="text" placeholder="Enter name to search..." name="searchTerm">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
            </div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
</body>
</html>