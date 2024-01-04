<?php //template name: Rentability ?>
<?php get_header() ?>


<?php
    $page_id = get_the_ID();
    $data_content = get_field('content_list', $page_id);
    $banners = get_field('top_banner', $page_id);
?>


<section id="top-banner">
    <div class="center-section banner-area">
        <img class="desktop" src="<?php echo $banners['image_desktop']?>" alt="">
        <img class="mobile" src="<?php echo $banners['image_mobile']?>" alt="">
    </div>
</section>

<main id="body-page-eng" class="polaroid-area">
    <?php if(!empty($data_content)) : ?>

        <?php foreach ($data_content as $content) : ?>

            <section class="box-rentability <?php echo  $content['background_color'] ? 'colored' : ''; ?>" style="background-color: <?php echo $content['background_color'] ?>;">
                <div class="text-rentability center-section <?php echo $content['reverse'] ? 'reverse' : '' ?>">
                    <div class="image-area">
                        <img class="polaroid" src="<?php echo $content['image'] ?>" alt="">
                    </div>
            
                    <div class="text-area">
                        <p><?php echo $content['text'] ?></p>
                    </div>
                </div>
            </section>

        <?php endforeach ?>
    <?php endif ?>
</main>

<?php get_footer() ?>