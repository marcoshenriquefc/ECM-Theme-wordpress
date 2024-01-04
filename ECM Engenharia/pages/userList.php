<?php //template name: userList  
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
    <?php
    $users = get_users(array('role' => 'customer'));
    ?>

    <header id="menuMain" class="no-bg">
        <div class="center-menu center-section">
            <a id="menulogo" href="<?php echo home_url(); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/logotipo/logotipo.svg" alt="Logotipo da ECM engenharia">
            </a>

            <div id="burger-menu" class="menu-hamburguer">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="menu-nav">
                <ul>
                    <?php wp_nav_menu(array('container' => '', 'menu' => 'header', 'items_wrap' => '%3$s', 'container_class' => ''));  ?>
                    <!-- <li><a href="#" class="menu-item"> Início </a></li>
                    <li><a href="#" class="menu-item"> Lançamento </a></li>
                    <li><a href="#" class="menu-item"> Empreendimentos </a></li> -->
                    <li><a href="<?php echo home_url(); ?>#form-section" class="buttonBase primary"> Fale conosco </a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main id="main-base-account" class="center-section">
        <?php
            get_template_part(
                'pages/components/aside-admin',
                null,
                array(
                    'class' => 'featured-home',
                    'data'  => array(
                        'size' => 'large',
                        'is-active' => true,
                    )
                )
            );
        ?>

        <section id="content-account">

            <h1 class="title-default-account">Clientes ECM</h1>

            <ul class="client-list">
                <?php foreach ($users as $user) : ?>
                    <?php
                    $user_data = [
                        'full_name' => get_user_meta($user->ID, 'nome', true) . ' ' . get_user_meta($user->ID, 'sobrenome', true),
                        'cpf' => get_user_meta($user->ID, 'cpf', true),
                    ];
                    ?>
                    <li>
                        <p class="cpf">
                            <?php echo $user_data['cpf']; ?>
                        </p>
                        <p class="name">
                            <?php echo $user_data['full_name']; ?>
                        </p>

                        <p class="email">
                            <?php echo $user->user_email; ?>
                        </p>
                        <p class="button-edit">
                            <a href="<?php echo get_site_url() . '/editar-usuario/?id=' . $user->ID; ?>">
                                Editar
                            </a>
                        </p>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="button-area-client">
                <a class="button-decor-account primary" href="<?php echo get_site_url() . '/criar-usuario' ?>">
                    Criar novo usuário
                </a>
            </div>

            <?php
            // Obtém todos os métodos de pagamento disponíveis
            $available_payment_gateways = WC()->payment_gateways->get_available_payment_gateways();

            // Verifica se há métodos de pagamento disponíveis
            if ($available_payment_gateways) {
                echo '<h2>Métodos de Pagamento Disponíveis:</h2>';

                foreach ($available_payment_gateways as $gateway) {
                    echo '<p>' . esc_html($gateway->get_title()) . '</p>';
                }
            } else {
                echo 'Nenhum método de pagamento disponível.';
            }

            ?>
        </section>
    </main>

</body>