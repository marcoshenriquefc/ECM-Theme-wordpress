<?php //TEMPLATE NAME: Checkout ?>

<?php get_header(); ?>

<main id="main-base-account" class="center-section full-width">
    <section id="content-account">
        <?php
            defined('ABSPATH') || exit;

            wc_get_template('checkout/form-checkout.php');
        ?>

    </section>
</main>



<style>
    #nav-menu {
        padding-bottom: 0;
    }
    .social-media-area {
        display: none;
    }
</style>