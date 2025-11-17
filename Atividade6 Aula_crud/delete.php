<?php
// excluir.php
require_once 'conexao.php'; // Inclui a conexão
// --- LÓGICA DO DELETE (D) ---
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM usuarios WHERE id = ?";
     $stmt = $pdo->prepare($sql);

     $stmt->execute([$id]);
}
// Redireciona de volta para o index.php
header("Location: index.php");
exit;
?>

