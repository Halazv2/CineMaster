<?php
// require_once "../../app/controller/UserController.php"; 
if (isset($_POST["submit"])) {
    $login = new UserController();
    $login->login();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/Assets/style/login.css">
</head>

<body>

    <div class="container">
        <div class="forms">
            <div class="form-content">
                <div class="login-form" id="login">
                    <?php
                    // session_start();
                    if (isset($_SESSION['message'])) : ?>
                        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                            <?php echo $_SESSION['message'];
                            unset($_SESSION['message']); ?>
                        </div>
                    <?php endif ?>
                    <div class="title">Login</div>
                    <form action="user/login" method="post">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" placeholder="Enter your email" name="email">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Enter your password" name="password">
                            </div>
                            <div class="text"><a href="#">Forgot password?</a></div>
                            <div class="button input-box">
                                <input type="submit" value="Sumbit" name="submit">
                            </div>
                            <div class="text sign-up-text">Don't have an account? <label for="flip" id="check">Create an account</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="signup-form" id="signup" style="display: none;">
                    <?php
                    if (isset($_SESSION['message'])) : ?>
                        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                            <?php echo $_SESSION['message'];
                            unset($_SESSION['message']); ?>
                        </div>
                    <?php endif ?>
                    <div class="title">Sign-up</div>
                    <form action="user/create" method="POST">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Enter your first name" name="first_name">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Enter your last name" name="last_name">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" placeholder="Enter your email" name="email">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Enter your password" name="password">
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Sumbit" name="submiit">
                            </div>
                            <div class="text sign-up-text">Already have an account? <label id="log">Login now</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./public/Assets/js/login.js"></script>
</body>

</html>