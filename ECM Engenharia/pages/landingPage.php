<?php /* Template Name: Landing_Page */ ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecm Decor</title>

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
        <decorpage/>
    </div>
  </body>
</html>
<script>
    const imageAboutUs = '<?php echo get_stylesheet_directory_uri(); ?>/assets/image/landingPage/images/about-img.png';
    const banner1 = '<?php echo get_stylesheet_directory_uri(); ?>/assets/image/landingPage/images/banner.jpg';
    const banner2 = '<?php echo get_stylesheet_directory_uri(); ?>/assets/image/landingPage/images/banner-2.jpg';
    const banner3 = '<?php echo get_stylesheet_directory_uri(); ?>/assets/image/landingPage/images/banner-3.jpg';
    const icon    = '<?php echo get_stylesheet_directory_uri(); ?>/assets/image/landingPage/images/icon2.png';
    var logo    = '<?php echo get_stylesheet_directory_uri(); ?>/assets/image/landingPage/images/ecmDecor.svg';
    var logoVupes = '<?php echo get_stylesheet_directory_uri(); ?>/assets/image/landingPage/images/vupes-logo.webp';

    const textDecorationCarrossel = <?php echo json_encode($adapted_acf['textDecorationCarrossel']); ?>;
    
    
    const exclusiveData = <?php echo json_encode($adapted_acf['exclusiveData']); ?>;
    const exclusiveDataImg = '<?php echo $acf['ACF']['exclusividade']['image'];?>';
    const dataEnvironments = <?php echo json_encode($adapted_acf['dataEnvironments']); ?>;
    const aboutUs = <?php echo json_encode($adapted_acf['aboutUs']); ?>;
    const heroBanners = <?php echo json_encode($adapted_acf['heroBanners']); ?>;
    const galeryImages = <?php echo json_encode($adapted_acf['galeryImages']); ?>;
    const roonsList = <?php echo json_encode($adapted_acf['roomsList']); ?>;
    const form7 =`
        <section id="register-form" class="default-center">
            <div class="register-form-content">
                <div class="register-form-image">
                    <img src="<?php echo $adapted_acf['formLandingPage']['image']?>" alt="" />
                </div>
                <div class="register-form-area">
                    <h1 class="section-title left">
                        Queremos atender você, também de forma<br>
                        <span style="color:#608FAD;">personalizada</span>
                    </h1>

                    <div class="register-form-text">
                        <p class="section-subtitle left" style="color :#8D9A98 ; maargin-bottom:20px;">
                            Para isso, precisamos que se cadastre para apresentarmos as <strong> 
                                novidades</strong>  e <strong> todas as soluções</strong> que preparamos para personalizar o seu imóvel. 
                        </p>
                    </div>

                    <form class="register-form" action="">
                        <?php echo do_shortcode( '[contact-form-7 id="249" title="Formulário de contato 1"]' ); ?>
                    </form>
                </div>
            </div>
        </section>`;
    
    const textsExclusiveData = <?php echo json_encode($acf['ACF']['exclusividade']); ?>;
    const gliderCarrosselTemplate = `<section id="glider-carrossel" class="default-center">
            <div
                class="glider-carrossel-area"
                ref="carrosselArea"
            >
            <?php foreach($acf['ACF']['datacarrossel'] as $index => $itemCarrossel) : ?>
                
                    
                <?php echo $itemCarrossel['link'] ? '<a' : '<div';?>
                    href="<?php echo $itemCarrossel['link'];?>"
                    class="card-carrossel-glider"
                >
                <img src="<?php echo $itemCarrossel['imagem'];?>" alt="Imagem referente ao produto">
            
                <?php echo $itemCarrossel['link'] ? '</a>' : '</div>';?>
            <?php endforeach; ?>
            </div>

            <div class="glider-prev glider-arrow"> &lt; </div>
            <div class="glider-next glider-arrow"> &gt; </div>
        </section>`;
    const socialMedia = <?php echo json_encode($adapted_acf['socialMedia']); ?>;
    const contactFooter = <?php echo json_encode($adapted_acf['contact']); ?>;
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>


<!-- Import components  -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/NavMenu.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/CarrosselHero.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/InfoRoons.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/AboutUs.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/EnvironmentsArea.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/DetailsArea.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/GaleryArea.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/GliderCarrossel.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/RegisterFormArea.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/FooterDecor.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/PopupArea.js"></script>

<style>
    .form-button-decor {
        padding: 4px 12px;
        background-color :#608FAD;
        color:white;
        font-size:16px;
    }
    
    .wpcf7-response-output {
        padding: 8px 12px;
        color: #fff;
        background-color: #976241;
        margin-top: 12px;
        font-size: 12px;


    }
    
    .screen-reader-response {
        display:none;
    }
</style>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/decorPage.js"></script>


<script>

new Vue({
    el: '#app',
    data() {
        return {
            imageAboutUs,

            textDecorationCarrossel : textDecorationCarrossel,

        }
    },
})

// var behavior = function (val) {
//     return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
// },
// options = {
//     onKeyPress: function (val, e, field, options) {
//         field.mask(behavior.apply({}, arguments), options);
//     }
// };

// $('.mascara-telefone').mask(behavior, options);
$(document).ready(function() {
    $('.mascara-telefone').mask("(99) 99999-9999");
    $('.cpf').mask("999.999.999-99");
    $('.rg').mask("999999999-9");
});
</script>
