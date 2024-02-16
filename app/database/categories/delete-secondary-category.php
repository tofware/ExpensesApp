<?php

require(__DIR__ . "/../connection.php");
require(__DIR__ . "/../service.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryId = $_POST['category_id'];

    $connection = connectDefaultDatabase();

    $sql = "DELETE FROM categories WHERE id = ?";

    $statement = $connection->prepare($sql);
    $statement->bind_param("s", $categoryId);

    $result = $statement->execute();

    session_start();

    if ($result === TRUE) {
        $_SESSION['message'] = 'The category was deleted successfully.';

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = 'There is a problem with the database, please contact an administrator.';
    }

    disconnect($connection);
}