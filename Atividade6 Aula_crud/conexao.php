<<?php
// conexao.php
$host = '127.0.0.1';
$db = 'db_meublog'; // O banco da Aula 5
$user = 'root'; // Usuário padrão do XAMPP
$pass = ''; // Senha padrão do XAMPP
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
 PDO::ATTR_EMULATE_PREPARES => false,
];
try {
 // Esta é a variável que usaremos em todos os outros arquivos
 $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
 throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>

