<?php
session_start();

// Verifica se o formulário de pagamento foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lógica para processar o pagamento

    // Após o processamento do pagamento, você pode limpar o carrinho
    unset($_SESSION['cart']);

    // Exibir mensagem de confirmação
    $_SESSION['mensagem'] = "Pagamento confirmado com sucesso. Obrigado por sua compra!";
    
    // Redireciona para uma página de confirmação ou para a página inicial
    header("Location: confirmacao.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Comércio de Comidas - Confirmação de Pagamento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Confirmação de Pagamento</h1>
        <?php if (isset($_SESSION['mensagem'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['mensagem']; ?>
            </div>
            <?php unset($_SESSION['mensagem']); ?>
        <?php } ?>
        <p>Por favor, confirme seu pagamento:</p>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <!-- Formulário de pagamento -->
            <button type="submit" class="btn btn-primary">Confirmar Pagamento</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div class="footer">
        <p>Todos os direitos reservados S. Alexandre Emprendimento &copy; <?php echo date('Y'); ?></p>
    </div>
</body>
</html>
