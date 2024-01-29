<?php

require('connection.php');

/**
 * @return void
 */
function createUsersTable()
{
    $connection = connectDefaultDatabase();

    $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100) NOT NULL,
            password VARCHAR(100) NOT NULL,
            created_at DATE NOT NULL
            )";

    if ($connection->query($sql) === TRUE) {
        echo 'The users table was created successfully.';
    } else {
        echo 'There is a problem with the database, please contact an administrator.';
    }

    disconnect($connection);
}