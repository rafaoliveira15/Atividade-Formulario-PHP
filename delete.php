<?php
include 'conexao.php'; // garante que a conexão foi feita corretamente

if (isset($_GET['id'])) { 
    $id = intval($_GET['id']); // converte para número, evita SQL injection

    $sql = "DELETE FROM pilotos_f1 WHERE id = $id"; // ✅ nome da tabela correto

    if ($conn->query($sql) === TRUE) {
        header("Location: atividade.php"); // redireciona para a lista
        exit(); // sempre finalize após header
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
} else {
    echo "ID não informado!";
}
?>