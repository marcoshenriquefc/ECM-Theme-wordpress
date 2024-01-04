
<?php /* Template Name: FormPageBase */ ?>
<?php get_header(); ?>
<?php
    $page_id = get_the_id();
    $text_form_page  = get_field('text_form_page', $page_id);
    $form_short_code = get_field('shortcode_form', $page_id);
?>
<section class="center-section">

    <?php  if(!empty($text_form_page)) :?>
        <section class="text-form">
                <h1 class="title-base-eng"><?php echo $text_form_page['title'] ?></h1>

            <article>
                <?php echo $text_form_page['description'] ?>
            </article>
        </section>
    <?php endif ?>

    <?php
    if (!empty($form_short_code) && function_exists('do_shortcode')) {
        echo do_shortcode($form_short_code);
    }

?>
</section>

<?php get_footer(); ?>