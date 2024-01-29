<?php

/**
 * @param $host
 * @param $username
 * @param $password
 * @param $databaseName
 * @return mysqli|void
 */
function connect($host, $username, $password, $databaseName)
{
    try{
        if($databaseName){
            $connection = new mysqli($host, $username, $password, $databaseName);
        }else{
            $connection = new mysqli($host, $username, $password);
        }
    } catch (\Exception $exception){
        die("Connect failed: " . $exception);
    }

    return $connection;
}

/**
 * @param $connection
 * @return void
 */
function disconnect($connection)
{
    $connection->close();
}

/**
 * @return mysqli|null
 */
function connectDefaultDatabase()
{
    $serverName = 'localhost';
    $username = "root";
    $password = '';
    $databaseName = 'expenses-app';

    return connect($serverName, $username, $password, $databaseName);
}