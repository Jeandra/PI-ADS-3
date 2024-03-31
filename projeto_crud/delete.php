<?php
include 'includes/conexao.php';

// Verifica se o ID do aluno foi fornecido via GET
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara e executa a consulta SQL para excluir o aluno com o ID fornecido
    $sql = "DELETE FROM aluno WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Aluno excluído com sucesso!";
    } else {
        echo "Erro ao excluir aluno: " . $conn->error;
    }
} else {
    // Se o ID do aluno não foi fornecido via GET, exibe uma mensagem de erro
    echo "ID do aluno não fornecido.";
}
?>