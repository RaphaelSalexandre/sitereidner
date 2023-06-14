<?php
session_start();

// Verifica se o carrinho está vazio
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: carrinho.php"); // Redireciona de volta para o carrinho se estiver vazio
    exit();
}

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redireciona para a página de login se não estiver logado
    exit();
}

// Limpa o carrinho
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Casa dos Salgados - Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Checkout</h1>
        <div class="alert alert-success" role="alert">
            Obrigado por comprar conosco! Sua compra foi concluída com sucesso.
        </div>
        <p>Agradecemos por escolher nossos produtos. Esperamos vê-lo novamente em breve!</p>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
