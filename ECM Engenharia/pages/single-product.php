<?php //template name: singleProductBuild ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha conta - </title>

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/styles/style.css" type="text/css" media="all">
    <script src="https://kit.fontawesome.com/7862a94653.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
</head>

<body>

    <?php
    // $menuNavegation = menu_arrayConvert('Menu LandingPage');

    // echo json_encode($menuNavegation);

    if (is_user_logged_in()) {
        $user_id = get_current_user_id();
        $retorno = "";
        // Obtém os metadados do usuário
        $user_data = array(
            'nome'      => get_user_meta($user_id, 'nome', true),
            'lista_unidades'     => unserialize(get_user_meta($user_id, 'lista_unidades', true)),
        );

        $lancamento = '';
        $query = new WP_Query(array('post_type' => 'Lancamentos'));
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                $lancamento = get_the_ID();
            endwhile;
        endif;
        wp_reset_postdata();

        $parsed_url = parse_url($_SERVER['REQUEST_URI']);
        $current_path = $parsed_url['path'];
    }
    else {
        wp_redirect('/auth-login');
        exit();
    }

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

    <main id="main-base-account" class="center-section full-width">
        <section id="content-account">
            <section id="build-area">
                <div class="build-header">
                    <p class="build-title">Unidade 000</p>
                    <button class="return-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                            <path d="M0.475032 5.28327C0.179207 5.5732 0.17443 6.04805 0.464362 6.34388L5.18907 11.1646C5.47901 11.4604 5.95386 11.4652 6.24968 11.1753C6.54551 10.8854 6.55028 10.4105 6.26035 10.1147L2.06061 5.82958L6.34571 1.62983C6.64154 1.3399 6.64632 0.865053 6.35638 0.569228C6.06645 0.273403 5.5916 0.268626 5.29578 0.558558L0.475032 5.28327ZM13.0075 5.18967L1.00754 5.06895L0.992455 6.56887L12.9925 6.6896L13.0075 5.18967Z" fill="black" />
                        </svg>
                        VOLTAR
                    </button>
                </div>
                <hr>
                <section class="build-content">
                    <div class="build-preview">
                        <p class="build-classification">
                            CLASSIC
                        </p>
                        <img src="../assets/image/buildImages/buildPreview.jpg" alt="empreendimento" class="build-preview-image">
                        <p class="build-price">TOTAL <span class="value">R$ 0,00</span></p>
                    </div>
                    <div class="build-gallery">
                        <p class="gallery-title">GALERIA</p>
                        <div class="build-gallery-images">
                            <img src="" alt="" class="gallery-image">
                        </div>
                        <div class="build-products">
                            <p class="product-text">QUERO ADICIONAR TAMBÉM</p>
                            <div class="products-items">
                                <div class="product-input">
                                    <input type="checkbox" name="" id="product-checkbox">
                                    <label class="product-label" for="product-checkbox">produto 1 (+R$ 0,00)</label>
                                </div>
                                <div class="product-input">
                                    <input type="checkbox" name="" id="product-checkbox">
                                    <label class="product-label" for="product-checkbox">produto 2 (+R$ 0,00)</label>
                                </div>
                                <div class="product-input">
                                    <input type="checkbox" name="" id="product-checkbox">
                                    <label class="product-label" for="product-checkbox">produto 3 (+R$ 0,00)</label>
                                </div>
                            </div>
                        </div>
                        <button class="end-shopping-button">FINALIZAR COMPRA</button>
                    </div>
                </section>
            </section>
        </section>
    </main>

</body>