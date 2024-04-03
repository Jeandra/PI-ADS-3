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
    
    <?php
    include 'includes/conexao.php';
    include 'dark.php';

    if (isset($_GET['id'])) 
        // Recuperar o ID do item a ser editado
        $id = $_GET['id'];
    // Verifica se o formulário foi submetido via POST
    if (isset($_POST['nome']) && isset($_POST['valor'])){
        // Obtém os dados do formulário
        $novoNome = $_POST['nome'];
        $novoValor = $_POST['valor'];

        // Prepara e executa a consulta SQL para atualizar os dados do aluno
        $sqlUpdate = "UPDATE produto SET nome = '$novoNome', valor = '$novoValor' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Dados do aluno atualizados com sucesso!";
        } else {
            echo "Erro ao atualizar dados do aluno: " . $conn->error;
        }
    } else {
        // Se o formulário não foi enviado via POST, exibe o formulário de atualização com os dados do aluno
        ?>

        <!-- Formulário para atualizar as informações do aluno -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($aluno['nome']) ? $aluno['nome'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="idade">Idade:</label>
                <input type="number" class="form-control" id="idade" name="idade" value="<?php echo isset($aluno['idade']) ? $aluno['idade'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($aluno['email']) ? $aluno['email'] : ''; ?>">
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="read.php" class="btn btn-dark" role="button" data-bs-toggle="button">Voltar</a>
        </form>
        
    <?php } ?>
</div>

</body>
</html>