<?php

require(__DIR__ . "/../connection.php");
require(__DIR__ . "/../service.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $level = 0;

    if (validateSize($name, 40)) {
        redirectWithMessage('Name must have between 4 and 40 characters.', 'name');
    }

    $connection = connectDefaultDatabase();

    $sql = "INSERT INTO categories (name, level) VALUES (?, ?)";

    $statement = $connection->prepare($sql);

    $statement->bind_param("ss", $name, $level);

    try {
        $result = $statement->execute();
    } catch (Exception $exception) {
        redirectWithMessage('The name already exists.', 'name-unique');
    }

    session_start();

    if ($result === TRUE) {
        $_SESSION['message'] = 'The category was created successfully.';

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = 'There is a problem with the database, please contact an administrator.';
    }

    disconnect($connection);
}