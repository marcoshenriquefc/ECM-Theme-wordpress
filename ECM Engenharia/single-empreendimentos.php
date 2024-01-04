<?php get_header(); ?>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
<?php $page_id = get_the_id(); ?>

<section id="hero-banner-image">
    <div class="banner-area">
        <div class="overflow-banner">
            <img class="logo-banner" src="<?php echo get_field('logo_do_empreendimento', $page_id) ?>" alt="Logo empreendimento">
        </div>
        <img class="banner" src="<?php echo get_field('imagem_principal_empreendimento', $page_id) ?>" alt="Foto do empreendimento">
    </div>
</section>



<section id="info-menu-empreendimento">
    <div class="menu-area default-center">
        <ul class="menu">
            <?php if (get_field('descricao_do_empreendimento', $page_id)) : ?>
                <li class="menu-item" data-menu="description-area">
                    <a href="#description-area">VISÃO GERAL</a>
                </li>
            <?php endif ?>

            <?php if (count(get_field('galeria_de_imagens_do_empreendimento', $page_id)) > 0) : ?>
                <li class="menu-item" data-menu="profile-area">
                    <a href="#single-galery">GALERIA</a>
                </li>
            <?php endif ?>

            <?php if (get_field('plantas_das_unidades', $page_id) && count(get_field('plantas_das_unidades', $page_id)) > 0) : ?>
                <li class="menu-item" data-menu="photo-galery">
                    <a href="#">PLANTAS</a>
                </li>
            <?php endif ?>

            <?php if (get_field('video_do_empreendimento', $page_id)) : ?>
                <li class="menu-item" data-menu="photo-galery">
                    <a href="#video-single-area">VÍDEO</a>
                </li>
            <?php endif ?>
            
            <?php if (get_field('plants_data', $page_id)) : ?>
                <li class="menu-item" data-menu="photo-galery">
                    <a href="#plantas-area">PLANTAS</a>
                </li>
            <?php endif ?>
        </ul>
    </div>
</section>


<section id="description-area" class="default-center">
    <div class="description">
        <h2 class="title-description">Sobre</h2>

        <?php if (get_field('sobre_o_empreendimento', $page_id)) : ?>
            <p class="description-text">
                <?php echo get_field('sobre_o_empreendimento', $page_id) ?>
            </p>
        <?php endif; ?>
    </div>

    <div class="status">
        <?php if (get_field('status_do_empreendimento', $page_id)) : ?>
            <h2 class="title-status">
                Status
            </h2>
            <?php
            $classe_css = get_field('status_do_empreendimento', $page_id);
            ?>

            <ul class="status-list">
                <li>
                    <span class="circle <?php echo ($classe_css === 'Lançamento') ? 'active' : ''; ?>"></span>
                    Lançamento
                </li>
                <li>
                    <span class="circle <?php echo ($classe_css === 'Em obras') ? 'active' : ''; ?>"></span>
                    Em obras
                </li>
                <li>
                    <span class="circle <?php echo ($classe_css === 'Entregue') ? 'active' : ''; ?>"></span>
                    Entregue
                </li>
            </ul>
        <? endif; ?>
    </div>
</section>

<?php if (count(get_field('galeria_de_imagens_do_empreendimento', $page_id)) > 0) : ?>
    <section id="single-galery">
        <div class="default-center">
            <div class="title-area">
                <h1 class="title-galery">GALERIA <span>></span> <strong>PERSPECTIVAS</strong></h1>
            </div>

            <section class="grid-galery">
                <?php foreach (get_field('galeria_de_imagens_do_empreendimento', $page_id) as $key => $galeria) : ?>
                    <a target="_blank" href="<?php echo $galeria['imagens_do_empreendimento'] ?>" class="item-galery">
                        <img src="<?php echo $galeria['imagens_do_empreendimento'] ?>" alt="">
                    </a>
                <?php endforeach ?>
            </section>
        </div>
    </section>
<?php endif ?>

<!-- Profile area -->
<?php if (get_field('perfil_do_empreendimento', $page_id)) : ?>
    <section id="profile-area" class="default-center">
        <div class="profile">
            <h2 class="title-profile">Perfil</h2>

            <ul class="list-profile">
                <?php foreach (get_field('perfil_do_empreendimento', $page_id) as $key => $topico) : ?>
                    <li><?php echo $topico['topicos']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>

<!-- Characteristics -->
<?php if (get_field('caracteristicas_do_empreendimento', $page_id) && count(get_field('caracteristicas_do_empreendimento', $page_id)) > 0) : ?>
    <section id="characteristics-empreendimento">
        <section class="characteristics-area default-center">
            <h2 class="title-characteristics">Características</h2>
            <div class="cards-area">
                <?php foreach (get_field('caracteristicas_do_empreendimento', $page_id) as $key => $caracteristica) : ?>
                    <div class="characteristics-card-item">
                        <div class="icon-box">
                            <img class="icon" src="<?php echo $caracteristica['empreendimento'] ?>" alt="Icone representando texto ao lado">
                        </div>
                        <p class="text"><?php echo $caracteristica['texto_empreendimento'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </section>
<?php endif; ?>

<?php
    function getIdByVideo($link) {
        // Regex to get ID Video
        $regex = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
        $match = preg_match($regex, $link, $matches);

        // Verify if exist data on regex
        if ($match && isset($matches[1])) {
            return $matches[1];
        } else {
            return null;
        }
    }

    $videoId = '';
    $linkVideo = get_field('video_do_empreendimento', $page_id);
    if ($linkVideo) {
        $videoId = getIdByVideo($linkVideo);
    }
?>

<?php if ($videoId) : ?>
    <section id="video-single-area" class="video-area" v-if="videoLink && idVideo" @click="toggleVideoPlayback">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $videoId; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </section>
<?php endif ?>


<?php
    $plants_data = get_field('plants_data', $page_id);
?>



<?php $plants = get_field('plants', $page_id); ?>
<?php if($plants) : ?>
    <div id="app" class="default-center">
        <plantarea
            :plant-data-list="plantList"
            :title-section="titlePlant"
            :descriptio-section="descriptionPlant"
        />
    </div>
<?php    
    $plant_list = [];

    foreach ($plants['plant_list'] as $current_plant) {

        $array_plants = [
            'id'        => $current_plant['plant_title'],
            'name'      => $current_plant['plant_title'],
            'imagePlant' => $current_plant['plant_image'],
            'listInfo' => [],            
        ];

        foreach ($current_plant['plant_info'] as $info) {
            $curent_info = [
                'icon'  => $info['plant_icon'],
                'title'  => $info['plant_description'],
            ];

            $array_plants['listInfo'][] = $curent_info;
        }

        $plant_list[] = $array_plants;
    }

    $json_plant_list = json_encode($plant_list);
    $json_plant_title = json_encode($plants['plant_title']);
    $json_plant_description = json_encode($plants['plants_description']);
?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/vue/eng/PlantsArea.js"></script>
    <script>
    new Vue({
        el: '#app',
        data() {
            return {
                plantList: <?php echo $json_plant_list; ?>,
                titlePlant : <?php echo $json_plant_title ?>,
                descriptionPlant : <?php echo $json_plant_description ?>,
            }
        },
    });
</script>

<?php endif ?>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/menuToggle.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/galeryCarrossel.js"></script>
<?php get_footer(); ?>