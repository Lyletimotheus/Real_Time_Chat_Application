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
        <section class="form signup">
            <header>Chatter Messenger</header>
            <form action="#" enctype="multipart/form-data" method="POST" autocomplete="off">

                <div class="error-txt"></div>
                
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" placeholder="First Name" name="fname">
                    </div>

                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" placeholder="Last Name" name="lname">
                    </div>
                </div> <!-- /.name-details -->

                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" placeholder="Enter your email address" name="email">
                </div>

                <div class="field input">
                    <label>Password</label>
                    <input type="password" placeholder="Enter your password" name="password">
                    <i class="fas fa-eye"></i>
                </div>
                
                <div class="field image">
                    <label>Select Image</label>
                    <input type="file" name="image" required>
                </div>

                <div class="field button">
                    <input type="submit" value="Continue to chat">
                </div>

            </form>
            <div class="link">Already a member? <a href="login.php">Login</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>

</body>
</html>