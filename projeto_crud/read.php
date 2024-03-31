<?php
include 'includes/conexao.php'; // Inclui o arquivo de conexão ao banco de dados

// Seleciona todos os alunos da tabela aluno
$sql = "SELECT * FROM aluno";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibe os dados em uma tabela
    echo "<h2>Lista de Alunos</h2>";
    echo "<table class='table'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Idade</th><th>Email</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["nome"]."</td><td>".$row["idade"]."</td><td>".$row["email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Não há alunos cadastrados.";
}
$conn->close();
?>