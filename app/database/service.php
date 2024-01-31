<?php

/**
 * @param $string
 * @param $maxSize
 * @return bool
 */
function validateSize($string, $maxSize){
    if(strlen($string) <= 0 || strlen($string) >= $maxSize){
        return true;
    }

    return false;
}

/**
 * @param $message
 * @param $field
 * @return void
 */
function redirectWithMessage($message, $field){
    session_start();

    $_SESSION[$field . '-message'] = $message;

    header('Location: ' . $_SERVER['HTTP_REFERER']);

    die();
}