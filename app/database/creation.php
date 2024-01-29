<?php

require ('connection.php');

/**
 * @param $name
 * @return void
 */
function createDatabase($name){
    $serverName = 'localhost';
    $username = "root";
    $password = '';

    $connection = connect($serverName, $username, $password, null);

    $sql = "CREATE DATABASE IF NOT EXISTS `$name`";

    if($connection->query($sql) === TRUE){
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $connection->error;
    }

    disconnect($connection);
}