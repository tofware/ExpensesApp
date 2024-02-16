<?php

require(__DIR__ . "/../connection.php");
require(__DIR__ . "/../service.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value = $_POST['value'];
    $note = $_POST['note'];
    $date = $_POST['date'];
    $categoryId = $_POST['category_id'];

    if (validateFloatSize($value, 100000)) {
        redirectWithMessage('Value must be between 0 and 100000.', 'value');
    }

    if (validateSize($note, 100)) {
        redirectWithMessage('Value must be between 4 and 100.', 'note');
    }

    $connection = connectDefaultDatabase();

    $sql = "INSERT INTO expenses (value, note, date, category_id) VALUES (?, ?, ?, ?)";

    $statement = $connection->prepare($sql);

    $statement->bind_param("ssss", $value, $note, $date, $categoryId);

    try {
        $result = $statement->execute();
    } catch (Exception $exception) {
        redirectWithMessage($exception, 'error');
    }

    session_start();

    if ($result === TRUE) {
        $_SESSION['message'] = 'The expense was added successfully.';

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = 'There is a problem with the database, please contact an administrator.';
    }

    disconnect($connection);
}