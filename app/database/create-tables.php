<?php

require('connection.php');

function createUsersTable()
{
    $connection = connectDefaultDatabase();

    $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100) UNIQUE NOT NULL,
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

function createExpensesTable()
{
    $connection = connectDefaultDatabase();

    $sql = "CREATE TABLE IF NOT EXISTS expenses (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            value FLOAT(6,2) NOT NULL,
            note VARCHAR(100) NOT NULL,
            date DATETIME NOT NULL,
            category_id INT(6) UNSIGNED NOT NULL, 
            FOREIGN KEY (category_id) REFERENCES categories(id)
            )";

    if ($connection->query($sql) === TRUE) {
        echo 'The expenses table was created successfully.';
    } else {
        echo 'There is a problem with the database, please contact an administrator.';
    }

    disconnect($connection);
}

function createCategoriesTable()
{
    $connection = connectDefaultDatabase();

    $sql = "CREATE TABLE IF NOT EXISTS categories (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(40) UNIQUE NOT NULL,
            level INT(6) UNSIGNED,
            parent_id INT(6) UNSIGNED
            )";

    if ($connection->query($sql) === TRUE) {
        echo 'The categories table was created successfully.';
    } else {
        echo 'There is a problem with the database, please contact an administrator.';
    }

    disconnect($connection);
}

function createIncomesTable()
{
    $connection = connectDefaultDatabase();

    $sql = "CREATE TABLE IF NOT EXISTS incomes (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            value FLOAT(6,2) NOT NULL,
            note VARCHAR(100) NOT NULL,
            date DATETIME NOT NULL,
            category_id INT(6) UNSIGNED NOT NULL, 
            FOREIGN KEY (category_id) REFERENCES categories(id)
            )";

    if ($connection->query($sql) === TRUE) {
        echo 'The incomes table was created successfully.';
    } else {
        echo 'There is a problem with the database, please contact an administrator.';
    }

    disconnect($connection);
}

function dropTable($table)
{
    $connection = connectDefaultDatabase();

    $sql = "DROP TABLE $table";

    if ($connection->query($sql) === TRUE) {
        echo 'The table was dropped successfully.';
    } else {
        echo 'There is a problem with the database, please contact an administrator.';
    }

    disconnect($connection);
}