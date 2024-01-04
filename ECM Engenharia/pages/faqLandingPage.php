<?php /* Template Name: Faq_Landing_Page */ ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecm Decor Faq</title>

  <!-- Css -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/styles/cssLandingPage/style.css" type="text/css" media="all">
    <link href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css" rel="stylesheet">
    
  <!-- Fontes  -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/gotham/font-import-gotham.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/scotland/configFont.css">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
</head>
<body>

<?php require_once get_template_directory().'/inc/variablesComponents.php'; ?>

<?php 
    $acf = acf_all('page',get_the_ID());
    $adapted_acf = adapted_acfvue($acf,'LandingPage');
?>
    <div id="app">
        <faqpage />
    </div>
  </body>
</html>
<script>
    const socialMedia = <?php echo json_encode($adapted_acf['socialMedia']); ?>;
    const contactFooter = <?php echo json_encode($adapted_acf['contact']); ?>;
    const faqImage = <?php echo json_encode($adapted_acf['faqImage']); ?>;
    const faqQuestionList = <?php echo json_encode($adapted_acf['faqQuestionList']); ?>;
</script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/NavMenu.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/FooterDecor.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/AccordeonArea.js"></script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/faqPage.js"></script>

<script>

    new Vue({
        el: '#app',
        data() {
            return {}
        },
    })
</script>