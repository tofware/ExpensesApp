<?php

require(__DIR__ . "/../connection.php");
require(__DIR__ . "/../service.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $parent_id = $_POST['parent_id'];
    $level = 1;

    if (validateSize($name, 40)) {
        redirectWithMessage('Name must have between 4 and 40 characters.', 'name');
    }

    $connection = connectDefaultDatabase();

    $sql = "INSERT INTO categories (name, level, parent_id) VALUES (?, ?, ?)";

    $statement = $connection->prepare($sql);

    $statement->bind_param("sss", $name, $level, $parent_id);

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