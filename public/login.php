<?php require_once("php/partials/header.php")?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Chatter Messenger</header>
            <form action="#" action="POST">

                <div class="error-txt"></div>

                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" placeholder="Enter your email address" name="email">
                </div>

                <div class="field input">
                    <label>Password</label>
                    <input type="password" placeholder="Enter your password" name="password">
                    <i class="fas fa-eye"></i>
                </div>
                
                <div class="field button">
                    <input type="submit" value="Continue to chat">
                </div>
                
            </form>
            <div class="link">Not yet a member? <a href="index.php">Sign Up</a></div>
        </section>
    </div>
        <script src="javascript/pass-show-hide.js"></script>
        <script src="javascript/login.js"></script>



</body>
</html>