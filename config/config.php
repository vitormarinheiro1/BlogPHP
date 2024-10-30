<?php
// Obtendo a URL de conexão do JawsDB
$dbUrl = parse_url(getenv("JAWSDB_URL"));

// Extraindo as informações de conexão
$host = $dbUrl["host"];
$db = ltrim($dbUrl["path"], '/'); // Remove a barra inicial
$user = $dbUrl["user"];
$pass = $dbUrl["pass"];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
