<?php
// Incluir a conexão com o banco de dados aqui
// Exemplo:
// include_once 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];

    // Chama a função para cadastrar o produto
    cadastrarProduto($nome, $preco);

    // Redireciona para a página de produtos após o cadastro
    header("Location: produtos.php");
    exit();
}
session_start();

// Verifica se o usuário não está logado
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php"); // Redireciona para a página de login
    exit();
}
?>

<!-- HTML do formulário de cadastro de produto -->
<!DOCTYPE html>
<html>
<head>
    <title>Comércio de Comidas - Cadastro de Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Cadastro de Produto</h1>
        <form method="post" action="cadastro_produto.php">
            <div class="form-group">
                <label for="nome">Nome do Produto:</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
            </div>

            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" class="form-control" name="preco" id="preco" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
