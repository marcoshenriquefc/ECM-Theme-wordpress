<?php //template name: aboutUs ?>
<?php get_header() ?>

<?php $page_id = get_the_id(); ?>



<?php
    $banners = get_field('top_banner', $page_id);
    $image_about = get_field('area_image_about', $page_id);
    $text_description = get_field('about-us', $page_id);
    $cards_List = get_field('cards_gray_scale', $page_id);
?>

<?php if($banners) : ?>
    <section id="top-banner">
        <div class="center-section banner-area">
            <img class="desktop" src="<?php echo $banners['image_desktop']?>" alt="">
            <img class="mobile" src="<?php echo $banners['image_mobile']?>" alt="">
        </div>
    </section>
<?php endif ?>

<main id="main-about-us" class="center-section">
    <section id="text-about-us">
        <h1 class="title-base-eng cursive">Conheça nossa<br> <span>história</span></h1>

        <div class="content-card">
            <div class="description">
                <?php echo $text_description ?>
            </div>
        </div>
    </section>

    <section id="cards-about">

        <?php foreach($cards_List as $card ) : ?>
            
            <?php
                $class_color = '';

                switch ($card['type']) {
                    case 'Preto':
                        $class_color = 'black-card' ;
                        break;

                    case 'Cinza Escuro':
                        $class_color = 'dark-gray-card' ;
                        break;

                    case 'Cinza Claro':
                        $class_color = 'light-gray-card' ;
                        break;

                    case 'Branco':
                        $class_color = 'white-card' ;
                        break;
                    
                    default:
                        $class_color = 'poha' ;
                        break;
                }
            ?>

            <div class="<?php echo $class_color ?> card-about-us">
                <div class="title-area-card">
                    <h1><?php echo $card['title'] ?></h1>
                    <hr>
                </div>

                <div class="content-card">
                    <p> <?php echo $card['description'] ?> </p>
                </div>
            </div>
        <?php endforeach ?>

    </section>

    <section class="image-area-about">
        <img src="<?php echo $image_about ?>" alt="">
    </section>
</main>

<?php get_footer() ?>