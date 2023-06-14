<?php
session_start();

// Verifica se o usuário já está logado
if (isset($_SESSION["usuario"])) {
    header("Location: home.php"); // Redireciona para a página inicial, caso já esteja logado
    exit();
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica as credenciais do usuário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verifica as credenciais no banco de dados (exemplo fictício)
    // Você precisará adaptar esse código para verificar as credenciais corretamente no seu banco de dados
    $conexao = mysqli_connect("localhost", "root", "", "comercio_comidas");
    $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $resultado = mysqli_query($conexao, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);
        $_SESSION["usuario"] = $usuario;
        header("Location: index.php"); // Redireciona para a página inicial após o login
        exit();
    } else {
        $erro = "Credenciais inválidas. Tente novamente.";
    }

    mysqli_close($conexao);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Casa dos Salgados - Login</title>
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
                    <a class="nav-link" href="cadastro.php">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produtos.php">Produtos</a>
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
        <h1>Login</h1>
        <h5>Para ter acesso ao carinho faça login</h5>
        <?php if (isset($erro)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erro; ?>
            </div>
        <?php } ?>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
