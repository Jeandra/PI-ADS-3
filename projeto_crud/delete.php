<?php
include 'includes/conexao.php'; // Inclui o arquivo de conexão ao banco de dados

// Obtém o ID do aluno a ser excluído
$id = $_GET['id'];

// Exclui o aluno com base no ID
$sql = "DELETE FROM aluno WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Aluno excluído com sucesso!";
} else {
    echo "Erro ao excluir aluno: " . $conn->error;
}

$conn->close();
?>