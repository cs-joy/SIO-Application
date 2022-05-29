<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$server = $_ENV['SERVER'];
$username = $_ENV['USERNAME'];
$database = $_ENV['DATABASE'];
$password = $_ENV['PASSWORD'];

try {
    $db_connection = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Database Connection Successfull!";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

/*
$con = new mysqli($server, $username, $password, $database);
if($con->connect_error){
    echo "Connection failed: " . $con->connect_error;
}
echo "Connection Successfully!";
*/