<?php
include 'includes/conexao.php'; // Inclui o arquivo de conexão ao banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o formulário foi submetido

    // Obtém os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];

    // Atualiza os dados na tabela aluno
    $sql = "UPDATE aluno SET nome='$nome', idade='$idade', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Dados do aluno atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar dados do aluno: " . $conn->error;
    }
}

// Obtém o ID do aluno a ser atualizado
$id = $_GET['id'];

// Seleciona os dados do aluno com base no ID
$sql = "SELECT * FROM aluno WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Aluno</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Atualizar Aluno</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>
        </div>
        <div class="form-group">
            <label for="idade">Idade:</label>
            <input type="number" class="form-control" id="idade" name="idade" value="<?php echo $row['idade']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

</body>
</html>
