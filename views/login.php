<!doctype html>
<html lang="en">
<head>
    <?php include("includes/head-tag-content.php") ?>
    <?php include("includes/logged-in-check.php") ?>
</head>
<body>
<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="d-flex flex-column card text-center custom-card">
        <form action="../app/database/login-user.php" method="post">
            <?php
            function checkSession($field)
            {
                if (!empty($_SESSION[$field])) {
                    $message = $_SESSION[$field];
                    unset($_SESSION[$field]);
                    echo $message;
                }
            }

            checkSession('message');
            ?>
            <h1>Login</h1>
            <div>
                <label class="d-block mt-3" for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <div>
                <?php
                checkSession('username-message');
                ?>
            </div>
            <div>
                <label class="d-block mt-3" for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <?php
                checkSession('password-message');
                ?>
            </div>
            <div>
                <a href="register.php">Create an account</a>
            </div>
            <button class="mt-3" type="submit">Login</button>
            <div>
                <?php
                checkSession('invalid-message');
                ?>
            </div>
        </form>
    </div>
</div>
<?php include("includes/footer-tag-content.php") ?>
</body>
</html>