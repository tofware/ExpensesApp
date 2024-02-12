<?php

require(__DIR__ . "/../connection.php");
require(__DIR__ . "/../service.php");

function indexIncomes()
{
    $connection = connectDefaultDatabase();

    $sql = "SELECT * FROM incomes";

    $result = $connection->query($sql);

    $results = [];

    while ($entry = $result->fetch_assoc()) {
        $row['id'] = $entry['id'];
        $row['value'] = $entry['value'];
        $row['note'] = $entry['note'];
        $row['date'] = $entry['date'];
        $results[] = $row;
    }

    return $results;
}
