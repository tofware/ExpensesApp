<?php

require("connection.php");
require("service.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $created_at = date("Y-m-d");

    if(validateSize($username, 100)){
        redirectWithMessage('Username must have between 1 and 100 characters.', 'username');
    }

    if(validateSize($password, 100)){
        redirectWithMessage('Password must have between 1 and 100 characters.', 'password');
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $connection = connectDefaultDatabase();

    if ($statement->execute() === TRUE) {
        session_start();

        $_SESSION['message'] = 'The user was registered successfully. You can log in now.';

        header('Location: http://localhost:63342/ExpensesApp/views/login.php');
    } else {
        $_SESSION['message'] = 'There is a problem with the database, please contact an administrator.';
    }

    disconnect($connection);
}