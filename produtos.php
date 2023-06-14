<?php
// Adicione aqui a lógica de autenticação e verificação de nível de acesso do usuário, se necessário

// Exemplo de array de produtos (substitua com a lógica de obtenção de produtos do banco de dados)
$produtos = array(
    array("id" => 1, "nome" => "Salgado de Frango", "preco" => 7.00,),
    array("id" => 2, "nome" => "Salgado de Presunto/Muzarela", "preco" => 7.00),
    array("id" => 3, "nome" => "Coxinha", "preco" => 5.00),
    array("id" => 4, "nome" => "Combo Salgado/Refri", "preco" => 10.00),
);

// Verifica se o produto foi adicionado ao carrinho
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["produto_id"])) {
    $produto_id = $_POST["produto_id"];
    // Adicione aqui a lógica para adicionar o produto ao carrinho, como armazenar em sessão ou banco de dados
    // Exemplo fictício: adiciona o produto ao carrinho de compras em uma variável de sessão chamada "carrinho"
    session_start();
    if (!isset($_SESSION["carrinho"])) {
        $_SESSION["carrinho"] = array();
    }
    $_SESSION["carrinho"][$produto_id] = 1; // O valor 1 representa a quantidade do produto (pode ser ajustado conforme necessário)
    header("Location: carrinho.php"); // Redireciona para a página do carrinho após adicionar o produto
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Comércio de Comidas - Produtos</title>
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
                    <a class="nav-link" href="carrinho.php">Carrinho</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Pagina Inicial</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <h1>Produtos Disponíveis</h1>
        <div class="row">
            <?php foreach ($produtos as $produto) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $produto["nome"]; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Preço: R$ <?php echo number_format($produto["preco"], 2, ",", "."); ?></h6>
                            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                <input type="hidden" name="produto_id" value="<?php echo $produto["id"]; ?>">
                                <button type="submit" class="btn btn-primary">Adicionar ao Carrinho</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div class="footer">
        <p>Todos os direitos reservados S. Alexandre Emprendimento &copy; <?php echo date('Y'); ?></p>
    </div>
</body>
</html>
