<?php
session_start();

// Verifica se o usuário já está logado
if (isset($_SESSION["usuario"])) {
    header("Location: index.php"); // Redireciona para a página inicial, caso já esteja logado
    exit();
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verifique se os campos estão preenchidos
    if (empty($nome) || empty($email) || empty($senha)) {
        $erro = "Todos os campos são obrigatórios. Por favor, preencha-os.";
    } else {
        // Insira os dados do usuário no banco de dados (exemplo fictício)
        // Você precisará adaptar esse código para inserir os dados corretamente no seu banco de dados
        $conexao = mysqli_connect("localhost", "root", "", "comercio_comidas");
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

        if (mysqli_query($conexao, $query)) {
            $_SESSION["mensagem"] = "Cadastro realizado com sucesso. Faça login para acessar.";
            header("Location: login.php"); // Redireciona para a página de login após o cadastro
            exit();
        } else {
            $erro = "Erro ao realizar o cadastro. Tente novamente.";
        }

        mysqli_close($conexao);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Casa dos Salgados - Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Cadastro</h1>
        <?php if (isset($erro)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erro; ?>
            </div>
        <?php } ?>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
