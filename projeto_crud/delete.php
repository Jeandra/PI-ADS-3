<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
    <!-- Inclua a biblioteca do Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Excluir Aluno</h2>
    <?php
    include 'includes/conexao.php'; // Inclui o arquivo de conexão ao banco de dados

    // Verifica se o ID do aluno foi passado via GET na URL
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        
        // Query SQL para excluir o aluno com o ID fornecido
        $sql = "DELETE FROM aluno WHERE id = $id";
        
        if ($conn->query($sql) === TRUE) {
            echo "<p>O aluno com ID ".$id." foi excluído com sucesso!</p>";
        } else {
            echo "<p>Ocorreu um erro ao excluir o aluno: " . $conn->error . "</p>";
        }
        
        $conn->close(); // Fecha a conexão com o banco de dados
    } else {
        echo "<p>ID do aluno não fornecido.</p>";
    }
    ?>
    <!-- Botão de Voltar -->
    <a href="read.php" class="btn btn-primary" role="button" data-bs-toggle="button">Voltar</a>
</div>


</body>
</html>