<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o ID do produto
    $produtoId = $_POST["produtoId"];

    // Verifica se o botão de adicionar ao carrinho foi clicado
    if (isset($_POST["adicionarCarrinho"])) {
        // Chama a função para adicionar o produto ao carrinho
        adicionarAoCarrinho($produtoId);
    }

    // Verifica se o botão de remover do carrinho foi clicado
    if (isset($_POST["removerCarrinho"])) {
        // Chama a função para remover o produto do carrinho
        removerDoCarrinho($produtoId);
    }

    // Redireciona para a página do carrinho após a ação
    header("Location: carrinho.php");
    exit();
}

?>

<!-- HTML do carrinho de compras -->
<!DOCTYPE html>
<html>
<head>
    <title>Comércio de Comidas - Carrinho</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Casa dos Salgados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cadastro.php">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produtos.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Pagina Inicial</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-4">Carrinho de Compras</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Salgado de Frango</td>
                    <td>R$7.00</td>
                    <td>
                        <form method="post" action="carrinho.php">
                            <input type="hidden" name="produtoId" value="1">
                            <button type="submit" name="removerCarrinho" class="btn btn-danger btn-sm">Remover</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>Combo Salgado/Refri</td>
                    <td>R$10.00</td>
                    <td>
                        <form method="post" action="carrinho.php">
                            <input type="hidden" name="produtoId" value="2">
                            <button type="submit" name="removerCarrinho" class="btn btn-danger btn-sm">Remover</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="produtos.php" class="btn btn-primary">Continuar Comprando</a>
        <a href="metodo_pagamento.php" class="btn btn-success">Finalizar Compra</a>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div class="footer">
        <p>Todos os direitos reservados S. Alexandre Emprendimento &copy; <?php echo date('Y'); ?></p>
    </div>
</body>
</html>

