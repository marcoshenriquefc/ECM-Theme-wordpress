<?php //template name: teste  
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes ECM</title>

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/styles/style.css" type="text/css" media="all">
    <script src="https://kit.fontawesome.com/7862a94653.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
</head>

<body>
    <h2>Checkout</h2>
    <form action="processar_checkout.php" method="post">
        <!-- Campos do formulário (exemplo) -->
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" required>

        <!-- Adicione um campo oculto para o ID do produto -->
        <input type="hidden" name="produto_id" value="1"> <!-- Substitua 1 pelo ID do seu produto -->

        <!-- Adicione mais campos conforme necessário -->

        <input type="submit" value="Finalizar Compra">
    </form>
</body>

<?php
// Inclua o arquivo wp-load.php para ter acesso às funcionalidades do WordPress
include_once('wp-load.php');

// Verifique se o WooCommerce está ativo
if (class_exists('WooCommerce')) {
    // Lógica para processar os dados do formulário (exemplo)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = sanitize_text_field($_POST['nome']);
        $email = sanitize_email($_POST['email']);
        $endereco = sanitize_text_field($_POST['endereco']);
        $produto_id = sanitize_text_field($_POST['produto_id']);

        // Crie um novo pedido no WooCommerce
        $order = wc_create_order();

        // Adicione itens ao pedido (usando o ID do produto do formulário)
        $product = wc_get_product($produto_id);
        if ($product) {
            $order->add_product($product, 1);
        }

        // Adicione detalhes do cliente
        $order->set_address(array(
            'first_name' => $nome,
            'email' => $email,
            'address_1' => $endereco,
            // Adicione mais detalhes conforme necessário
        ), 'billing');

        // Calcular totais e salvar o pedido
        $order->calculate_totals();
        $order_id = $order->get_id();

        // Exemplo: redirecionar para uma página de confirmação
        header('Location: confirmacao.php?order_id=' . $order_id);
        exit;
    }
} else {
    echo 'O WooCommerce não está ativo.';
}
?>
