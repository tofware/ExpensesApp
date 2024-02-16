<?php
require("connection.php");
require("service.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['password-confirmation'];
    $created_at = date("Y-m-d");

    if($password != $passwordConfirmation){
       redirectWithMessage('Passwords are not matching.', 'password-matching');
    }

    if(validateSize($username, 100)){
        redirectWithMessage('Username must have between 4 and 100 characters.', 'username');
    }

    if(validateSize($password, 100)){
        redirectWithMessage('Password must have between 4 and 100 characters.', 'password');
    }

    if(validateSize($passwordConfirmation, 100)){
        redirectWithMessage('Password must have between 4 and 100 characters.', 'password-confirmation');
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $connection = connectDefaultDatabase();

    $sql = "INSERT INTO users (username, password, created_at) VALUES (?, ?, ?)";

    $statement = $connection->prepare($sql);
    $statement->bind_param("sss", $username, $hashedPassword, $created_at);

    try{
        $result = $statement->execute();
    }catch (Exception $exception){
        redirectWithMessage('The username already exists.', 'username-unique');
    }

    session_start();

    if ($result === TRUE) {
        $_SESSION['message'] = 'The user was registered successfully. You can log in now.';

        header('Location: http://localhost:63342/ExpensesApp/views/login.php');
    } else {
        $_SESSION['message'] = 'There is a problem with the database, please contact an administrator.';
    }

    disconnect($connection);
}