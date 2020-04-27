<?php


session_start();
$connection_host = '127.0.0.1';
$connection_db = 'GitLearning';
$connection_user = 'root';
$connection_pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$connection_host;dbname=$connection_db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $connection_user, $connection_pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
$GLOBALS["pdo"] = $pdo;
