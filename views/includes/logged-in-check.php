<?php

session_start();

if (!empty($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && !empty($_SESSION['user_id'])) {
//    unset($_SESSION['logged_in']);
//    unset($_SESSION['user_id']);
//    echo 'here';
}else{
    if($_SERVER['PHP_SELF'] != '/ExpensesApp/views/register.php' && $_SERVER['PHP_SELF'] != '/ExpensesApp/views/login.php'){
        header('Location: http://localhost:63342/ExpensesApp/views/login.php');
    }
}