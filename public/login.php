<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatter Messenger</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
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