<?php
include 'includes/conexao.php';

// Verifica se o ID do aluno foi fornecido via GET
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara e executa a consulta SQL para selecionar o aluno com o ID fornecido
    $sql = "SELECT * FROM aluno WHERE id = $id";
    $result = $conn->query($sql);

    // Verifica se a consulta foi bem-sucedida e se retornou pelo menos um resultado
    if ($result !== false && $result->num_rows > 0) {
        // Extrai os dados do aluno do resultado da consulta
        $aluno = $result->fetch_assoc();
    } else {
        // Se não houver resultados, exibe uma mensagem de erro
        echo "Nenhum aluno encontrado com o ID fornecido.";
        exit; // Encerra a execução do script
    }
} else {
    // Se o ID do aluno não foi fornecido via GET, exibe uma mensagem de erro
    echo "ID do aluno não fornecido.";
    exit; // Encerra a execução do script
}

// Verifica se o formulário foi submetido via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];

    // Prepara e executa a consulta SQL para atualizar os dados do aluno
    $sql = "UPDATE aluno SET nome='$nome', idade=$idade, email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Dados do aluno atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar dados do aluno: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Aluno</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Atualizar Aluno</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=$id"); ?>">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $aluno['nome']; ?>" required>
        </div>
        <div class="form-group">
            <label for="idade">Idade:</label>
            <input type="number" class="form-control" id="idade" name="idade" value="<?php echo $aluno['idade']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $aluno['email']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Aluno</button>
    </form>
</div>

</body>
</html>