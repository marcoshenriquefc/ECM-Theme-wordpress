<!DOCTYPE html>
<html lang="<?php echo get_locale(); ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    <title><?php echo get_bloginfo('title'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css" rel="stylesheet">
    <!-- Fontes -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/scotland/configFont.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/gotham/font-import-gotham.css">
    
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/styles/style.css" type="text/css" media="all">
    
    <?php wp_head(); ?>
</head>

<body>

<?php
    $menu_header_name = 'EcmEng';
    $menu_header_object = wp_get_nav_menu_object($menu_header_name);

    $menu_header_id = $menu_header_object->term_id;
    $social_list = get_field('list_social', 'menu_' . $menu_header_id);
?>

    <header id="nav-menu" class="center-section">
        <div class="nav-area">
            <div class="logo-area">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/logotipo/ecmDefault.webp" alt="Logotipo da ECM Engenharia">
                </a>
            </div>


            <nav class="nav-links">
                <ul class="nav-list">
                    <?php echo wp_nav_menu(array('container' => '', 'menu' => 'header', 'items_wrap' => '%3$s', 'container_class' => '')); ?>
                </ul>
            </nav>

            <div class="burguer-menu" onClick="toggleMenu()">
                <div class="burguer"></div>
                <div class="burguer"></div>
                <div class="burguer"></div>
            </div>
        </div>
        <div class="social-media-area">
            <?php foreach ($social_list as $value) : ?>
                <a class="link-social" target="_blank" href="<?php echo $value['link'] ?>">
                    <img src="<?php echo $value['icon'] ?>" alt="">
                </a>
            <?php endforeach ?>
        </div>
    </header>
