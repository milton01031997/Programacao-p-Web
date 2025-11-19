<?php
// registrar.php

require_once 'conexao.php'; // Arquivo de conexão PDO

$mensagem = "";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Criar hash seguro da senha
    $hash_senha = password_hash($senha, PASSWORD_DEFAULT);

    // Salvar no banco
    try {
        $sql = "INSERT INTO usuarios (nome_completo, email, senha_hash) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $email, $hash_senha]);

        $mensagem = "Usuário registrado com sucesso!";

    } catch (PDOException $e) {
        $mensagem = "Erro ao registrar: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registrar</title>
</head>
<body>

<h1>Registre-se</h1>

<?php if ($mensagem): ?>
    <p><?= $mensagem ?></p>
<?php endif; ?>

<form method="POST">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Registrar</button>
</form>

<br>
<a href="login.php">Já tem conta? Faça login</a>

</body>
</html>
