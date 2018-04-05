<?php
function getConnect()
{
    $config = include __DIR__ . "/config.php";
    $config = $config['db'];

    $host = $config["host"];
    $db = $config["dbname"];
    $charset = $config["charset"];
    $user = $config["user"];
    $password = $config["password"];

    $dsn = "mysql:host=$host; dbname=$db;charset=$charset";

    $DBH = new \PDO($dsn, $user, $password);
    return $DBH;
}



