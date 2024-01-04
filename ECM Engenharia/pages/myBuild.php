<?php //template name: myBuild ?>

    <?php get_header(); ?>
    <?php
        if (is_user_logged_in()) {
            $user_id = get_current_user_id();
            $retorno = "";
            // Obtém os metadados do usuário
            $user_data = array(
                'nome'      => get_user_meta($user_id, 'nome', true),
                'lista_unidades'     => unserialize(get_user_meta($user_id, 'lista_unidades', true)),
            );

            $parsed_url = parse_url($_SERVER['REQUEST_URI']);
            $current_path = $parsed_url['path'];
        }
        else {
            wp_redirect('/auth-login');
            exit();
        }
    ?>
    <main id="main-base-account" class="center-section">
        <?php
            get_template_part(
                'pages/components/aside-user',
                null,
            );
        ?>

        <section id="content-account">
            <h1 class="title-default-account">Minhas unidades</h1>
            <ul class="product-list">
                <?php $products_list = $user_data['lista_unidades'] ?>
                <?php if(is_array($products_list) && count($products_list) > 0 )  : ?>
                    <?php foreach ($products_list as $key => $productData) : ?>
                        <?php
                            $productID = $productData['id'];
                            $fullDataProduct = wc_get_product($productID);
                            $productName = $fullDataProduct->get_title();
                            $product_categories = get_the_terms($fullDataProduct->get_id(), 'product_cat');
                            $formatted_date = date('m/Y', strtotime($productData['data_entrega']));
                            $product_link = $fullDataProduct->get_permalink();
                            $blocked_product = false;
                            $first_category_name = "";
                            if ($product_categories && !is_wp_error($product_categories)) {
                                $first_category_name = reset($product_categories)->name;
                            }

                            if($productData['data_entrega']) {
                                // Date
                                $data_atual = new DateTime();
                                $data_entrega = new DateTime($productData['data_entrega']);
    
                                $diferenca_meses = $data_atual->diff($data_entrega)->m + ($data_atual->diff($data_entrega)->y * 12);
                                if($diferenca_meses > 5) {
                                    $product_link = get_permalink($fullDataProduct->get_id());
                                }
                                else {
                                    $blocked_product = true;
                                }
    
                                // Image
                                $image_url = '';
                                if ($fullDataProduct->get_image_id()) {
                                    $image_url = wp_get_attachment_image_url($fullDataProduct->get_image_id(), 'full');
                                }
                            }
                            else {
                                $blocked_product = true;
                            }
                        ?>

                        <div class="card-product-account <?php echo $blocked_product ? 'disabled' : '' ?>">
                            <div class="image-product">
                                <?php if($blocked_product) : ?>
                                    <span class="tag-finished">Decoração Encerrada</span>
                                <?php endif ?>
                                <img src="<?php echo $image_url; ?>" alt="">
                            </div>

                            <p class="card-product-date"><span><?php echo $productData['data_entrega'] ? 'Entrega:' . $formatted_date : 'Data não adicionada' ?></span></p>

                            <div class="card-product-content">
                                <div class="text-content">
                                    <h2 class="card-title"><?php echo $productName; ?></h2>
                                    <p class="card-category"><?php echo $first_category_name; ?></p>
                                </div>

                                <?php if(!$blocked_product) : ?>
                                    <a target="_blank" class="card-button" href="<?php echo $product_link; ?>">Decorar</a>
                                <?php else : ?>
                                    <button class="card-button" disabled>Decorar</button>
                                <?php endif ?>
                            </div>
                        </div>

                    <?php endforeach ?>
                <?php else : ?>
                    <li class="no-products-message">Nenhuma unidade disponível.</li>
                <?php endif ?>
            </ul>
        </section>
    </main>
</body>


<style>
    #nav-menu {
        padding-bottom: 0;
    }
    .social-media-area {
        display: none;
    }
</style>