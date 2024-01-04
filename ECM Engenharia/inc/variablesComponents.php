<?php

function acf_all($type,$idPage = '', $limit = '',$order = ''){
    $acf_posts = array();

    $allcontent = new WP_Query(array(
        'post_type' => array( $type ),
        'posts_per_page' => ($limit) ? $limit : -1,
        'page_id' => ($idPage) ? $idPage : '',
        'order' => ($order) ? $order : 'DESC',
    ));

    $allcontent = $allcontent->posts;

    foreach($allcontent as $index => $item){
        $acf_posts = array(
            'ACF' => get_fields($item->ID),
        );
    }
    

    return $acf_posts;
}

function adapted_acfvue($acf,$whichPage){
    $adapted_acf = array();

    switch ($whichPage) {
        case 'LandingPage':

            $heroBanners = array();
            $textDecorationCarrossel = array();
            $dataEnvironments = array();//ambientes
            $roomsList = array();//apresentação ambientes
            $exclusiveData = array();
            $aboutUs = array();
            $galeryImages = array();
            $formLandingPage = array();
            $socialMedia = array();
            $contactFooter = array();
            $faqImage = array();
            $faqQuestionList = array();
            # code...
            
            foreach($acf['ACF']['carrossel_imagem'] as $index => $item) {
                $heroBanners[] = array(
                    'id' => ++$index,
                    'image' => array(
                        'desktop' => $item['imagem_desktop'],
                        'mobile' => $item['imagem_mobile'],
                    ),
                    'link' => $item['link_imagem'],
                    'button' => $item['texto_do_botao'],
                );
            }

            foreach($acf as $index => $item) {
                $aboutUs = array(
                    'image' => $item['quem_somos']['imagem'],
                    'title' => $item['quem_somos']['titulo'],
                    'text' => $item['quem_somos']['texto']
                );
            }
            
            
            foreach($acf['ACF']['ambiente'] as $index => $item) {
                $dataEnvironments[] = array(
                    'title' => $item['name'],
                    'image' => $item['imagem'],
                    'link' => $item['link'],
                    'blank' => true,
                );
            }

            foreach($acf['ACF']['apresenta_ambiente'] as $index => $item) {
                $apresenta_ambiente = array(
                    'id' => ++$index,
                    'title' => $item['title'],
                    'image' => $item['imagem'],
                    'itens' => [],
                    
                );

                foreach($item['itens'] as $index => $item) {
                    $apresenta_ambiente['itens'][]  = $item['texto'];
    
                    
                }

                $roomsList[] = $apresenta_ambiente;
            }

            foreach($acf['ACF']['exclusividade']['exclusividade_itens'] as $index => $item) {
                $exclusiveData[]  = array(
                    'id' => ++$index,
                    'title' => $item['titulo'],
                    'icon' => $item['icone'],
                    'text' => $item['texto'],
                    
                );

                
            }

            foreach($acf['ACF']['galeria_de_imagens'] as $index => $item) {
                $galeryImages[]  = array(
                    $item['imagens'],
                    
                    
                );

                
            }

            foreach($acf as $index => $item) {
                $formLandingPage = array(
                    'title' => $item['formulario']['titulo'],
                    'image' => $item['formulario']['imagem'],
                    'text' => $item['formulario']['texto'],
                    
                );
            }

            foreach($acf['ACF']['footer_landingpage']['socialmedialist'] as $index => $item){
                $socialMedia[] = array(
                    'link' => $item['link'],
                    'icon' => $item['icone'],
                );
            }

            foreach($acf['ACF']['footer_landingpage']['contato'] as $index => $item){
                $contactFooter[] =  $item['telefone'];

                
            }

            foreach($acf['ACF']['faqimage'] as $index => $item) {
                $faqImage = array(
                    'desktop' => $item['desktop'],
                    'mobile' => $item['mobile'],
                    
                );
            }

            foreach($acf['ACF']['faqquestionlist'] as $index => $item) {
                $faqQuestionList[] = array(
                    'id' => ++$index,
                    'title' => $item['title'],
                    'text' => $item['text'],
                    
                );
            }


            $adapted_acf = array(
                'heroBanners' => $heroBanners,
                'roomsList' => $roomsList,
                'aboutUs' => $aboutUs,
                'dataEnvironments' => $dataEnvironments,
                'galeryImages' => $galeryImages,
                'exclusiveData' => $exclusiveData,
                'textDecorationCarrossel' => $textDecorationCarrossel,
                'formLandingPage' => $formLandingPage,
                'socialMedia' => $socialMedia,
                'contact' => $contactFooter,
                'faqImage' => $faqImage,
                'faqQuestionList' => $faqQuestionList,
            );
            break;
        
        default:
            # code...
            break;
    }

    return $adapted_acf;
}

$nav = menu_arrayConvert('Menu LandingPage');
$navFooter = menu_arrayConvert('Menu Footer');
 
?>
<script>
    var navigationMenu = <?php echo json_encode($nav); ?>;
    var navigationFooter = <?php echo json_encode($navFooter); ?>;

    
</script>