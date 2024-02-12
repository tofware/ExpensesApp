<?php

function indexExpenses(){
    $connection = connectDefaultDatabase();

    $sql = "SELECT * FROM expenses";

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
