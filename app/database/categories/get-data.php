<?php

require(__DIR__ . "/../connection.php");
require(__DIR__ . "/../service.php");

function indexLevel0Categories(){
    $connection = connectDefaultDatabase();

    $sql = "SELECT * FROM categories WHERE level = 0";

    $result = $connection->query($sql);

    $results = [];

    while ($entry = $result->fetch_assoc()) {
        $row['id'] = $entry['id'];
        $row['name'] = $entry['name'];
        $results[] = $row;
    }

    return $results;
}

function indexLevel1Categories($category_id){
    $connection = connectDefaultDatabase();

    $sql = "SELECT * FROM categories WHERE level = 1 AND parent_id = ?";

    $statement = $connection->prepare($sql);
    $statement->bind_param("s", $category_id);
    $statement->execute();
    $result = $statement->get_result();

    $results = [];

    while ($entry = $result->fetch_assoc()) {
        $row['id'] = $entry['id'];
        $row['name'] = $entry['name'];
        $results[] = $row;
    }

    return $results;
}

function retrieveAllLevel1Categories(){
    $connection = connectDefaultDatabase();

    $sql = "SELECT * FROM categories WHERE level = 1";

    $statement = $connection->prepare($sql);
    $statement->execute();

    $result = $statement->get_result();

    $results = [];

    while ($entry = $result->fetch_assoc()) {
        $row['id'] = $entry['id'];
        $row['name'] = $entry['name'];
        $results[] = $row;
    }

    return $results;
}
