<?php
$mysql_server = "sql204.pergig.ir";
$mysql_database = "pergi_31040142_fast_driving";
$mysql_username = "pergi_31040142";
$mysql_password = "673opspx2zZ";

$connection = null;

try {
    // Connect to database.
    $connection = new PDO("mysql:host=$mysql_server;dbname=$mysql_database;charset=utf8mb4", $mysql_username, $mysql_password);
    // Set PDO error mode.
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

function store($str)
{
    global $connection;

    $sql = "INSERT INTO users (fullName)  VALUES ('$str')";

    return $connection->exec($sql);
}

if (!empty($_GET['name'])) {
    if (strlen($_GET["name"]) < 64) {
        echo store($_GET["name"]);
    }
}