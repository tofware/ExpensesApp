<?php

/**
 * @param $string
 * @param $maxSize
 * @return bool
 */
function validateSize($string, $maxSize){
    if(strlen($string) >= 4 && strlen($string) <= $maxSize){
        return false;
    }

    return true;
}

function validateFloatSize($value, $maxSize){
    if($value > 0 && $value < $maxSize){
        return false;
    }

    return true;
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