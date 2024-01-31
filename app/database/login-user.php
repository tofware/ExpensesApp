<?php

require("connection.php");
require("service.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(validateSize($username, 100)){
        redirectWithMessage('Username must have between 1 and 100 characters.', 'username');
    }

    if(validateSize($password, 100)){
        redirectWithMessage('Password must have between 1 and 100 characters.', 'password');
    }

    $connection = connectDefaultDatabase();

    $sql = "SELECT * FROM users WHERE username = ?";

    $statement = $connection->prepare($sql);
    $statement->bind_param("s", $username);
    $statement->execute();

    $result = $statement->get_result();
    $user = $result->fetch_assoc();

    if(password_verify($password, $user['password'])){
        session_start();

        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];

        header('Location: http://localhost:63342/ExpensesApp/views/login.php');
    }else{
        redirectWithMessage('Datele sunt incorecte.', 'invalid');
    }

    disconnect($connection);
}