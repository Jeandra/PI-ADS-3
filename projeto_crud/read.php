<?php
include 'includes/conexao.php'; // Inclui o arquivo de conexão ao banco de dados
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <!-- Inclua a biblioteca do Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Lista de Alunos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Seleciona todos os alunos da tabela aluno
            $sql = "SELECT * FROM aluno";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["nome"]."</td>";
                    echo "<td>".$row["idade"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo "<td><a href='delete.php?id=".$row["id"]."' class='btn btn-danger'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Não há alunos cadastrados.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-primary" role="button" data-bs-toggle="button">Voltar</a>
</div>

</body>
</html>