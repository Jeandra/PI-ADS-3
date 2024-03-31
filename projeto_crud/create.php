<?php
include 'includes/conexao.php'; // Inclui o arquivo de conexão ao banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o formulário foi submetido

    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];

    // Insere os dados na tabela aluno
    $sql = "INSERT INTO aluno (nome, idade, email) VALUES ('$nome', '$idade', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Aluno adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar aluno: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Aluno</title>
    <!-- Adicione o link para o Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Adicionar Aluno</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="idade">Idade:</label>
            <input type="number" class="form-control" id="idade" name="idade" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</div>

</body>
</html>