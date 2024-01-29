<!doctype html>
<html lang="en">
<head>
    <?php
    include("includes/head-tag-content.php");
    session_start();

    function checkSession($field){
        if (!empty($_SESSION[$field])) {
            $message = $_SESSION[$field];
            unset($_SESSION[$field]);
            echo $message;
        }
    }
    ?>
</head>
<body>
<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="d-flex flex-column card text-center custom-card">
        <form action="../app/database/register-user.php" method="post">
            <h1>Register</h1>
            <div>
                <label class="d-block mt-3" for="username">Username</label>
                <input class="d-block" type="text" id="username" name="username" required>
                <?php
                    checkSession('username-message');
                ?>
            </div>
            <div>
                <label class="d-block mt-3" for="password">Password</label>
                <input class="d-block" type="password" id="password" name="password" required>
                <?php
                    checkSession('password-message');
                ?>
            </div>
            <div>
                <label class="d-block mt-3" for="password-confirmation">Password Confirmation</label>
                <input class="d-block" type="password" id="password-confirmation" name="password-confirmation" required>
                <?php
                    checkSession('password-confirmation-message');
                    checkSession('password-matching-message');
                ?>
            </div>
            <button class="mt-3" type="submit">Register</button>
        </form>
    </div>
</div>
<?php include("includes/footer-tag-content.php") ?>
</body>
</html>