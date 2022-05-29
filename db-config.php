<?php

$server = getenv('SERVER');
$username = getenv('USERNAME');
$database = getenv('DATABASE');
$password = getenv('PASSWORD');

try {
    $db_connection = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connection Successfully!";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
