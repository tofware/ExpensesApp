<!doctype html>
<html lang="en">
<head>
    <?php include("includes/head-tag-content.php") ?>
</head>
<body>
<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="d-flex flex-column card text-center custom-card">
        <form action="../app/database/login-user.php" method="post">
            <?php
                session_start();

                if (!empty($_SESSION['message'])) {
                    $message = $_SESSION['message'];
                    unset($_SESSION['message']);
                    echo $message;
                }
            ?>
            <h1>Login</h1>
            <div>
                <label class="d-block mt-3" for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <div>
                <label class="d-block mt-3" for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <button class="mt-3" type="submit">Login</button>
        </form>
    </div>
</div>
<?php include("includes/footer-tag-content.php") ?>
</body>
</html>