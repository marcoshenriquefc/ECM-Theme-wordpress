<?php /* Template Name: EmpreendimentosAll */ ?>
<?php get_header(); ?>
<?php
$paginaPrincipal = get_the_id();

// categorias junto
$args = array(
    'post_type' => 'empreendimento',
    'taxonomy'  => 'empreendimentos_categories',
    'hide_empty' => false,
);
$categories = get_terms($args);
$slugs = [];
$singlesCategory = [];
foreach ($categories as $category) {
    $slugs[] = [
        'nameCategory' => $category->name,
        'slugCategory' => $category->slug,
        'description' => $category->description,
    ];
}

$empreendimentos_posts = new WP_Query(array(
    'post_type' => array('empreendimentos'),
    'posts_per_page' => -1,
    'order' => 'DESC',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy'         => 'empreendimentos_categories',
            'terms'            => $slugs['slugCategory'],
            'field'            => 'slug',
            'operator'         => 'IN',
            //  'hide_empty' => false,
        ),
    ),
    //  'orderby' => 'menu_order'
));
//  echo '<pre>';
//  print_r($empreendimentos_posts);
//  echo '</pre>';

?>
<section id="all-ventures" class="black-section">
    <div class="center-section">
        <div id="info-area">
            <h1 class="main-title"><?php echo get_field('titulo_home_empreendimento', $paginaPrincipal) ?></h1>
            <!-- Praia 1  -->
            <?php foreach ($slugs as $categoria) : ?>
                <?php

                $args = array(
                    'order'    => 'asc',
                    'post_type' => 'empreendimentos',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy'         => 'empreendimentos_categories',
                            'terms'            => $categoria,
                            'field'            => 'slug',
                            'operator'         => 'IN',
                        ),
                    ),
                );
                $query = new WP_Query($args);

                ?>
                <?php if (count($query->posts) >= 1) : ?>
                    <section class="group-venture">
                        <div class="title-box">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/icons/location.svg" alt="localização icone">
                            <h2 class="title-venture"><?php echo $categoria['nameCategory']; ?></h2>
                        </div>
                        <section class="cards-empreendimento">
                            <?php foreach ($query->posts as $post) : ?>

                                <div class="card">
                                    <div class="image-area">
                                        <img src="<?php echo get_field('imagem_principal_empreendimento', $post->ID); ?>" alt="Imagem do empreendimento">
                                    </div>

                                    <div class="info-area">
                                        <img class="logotipo" src="<?php echo get_field('logo_do_empreendimento', $post->ID); ?>" alt="Logotipo do empreendimento">

                                        <div class="text-area">
                                            <div class="tags-area">
                                                <?php if (get_field('vendido', $post->ID)) : ?>
                                                    <span class="tag"><?php echo get_field('porcentagem_vendido', $empreendimentos_posts->posts[$i]->ID) ?>% Vendido</span>
                                                <?php endif; ?>
                                                <span class="tag"><?php echo get_field('status_do_empreendimento', $post->ID) ?></span>
                                            </div>
                                            <p class="text">
                                                <?php echo get_field('descricao_do_empreendimento', $post->ID) ?>
                                            </p>
                                        </div>
                                        <a href="<?php echo get_post_permalink(); ?>" class="buttonBase primary"><?php echo get_field('botao_texto_empreendimentos', $paginaPrincipal) ?></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </section>
                    </section>

                    <section class="about-venture content-info">
                        <h1 class="title">Sobre <?php echo $categoria['nameCategory']; ?></h1>
                        <p class="text"><?php echo $categoria['description']; ?></p>
                    </section>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>