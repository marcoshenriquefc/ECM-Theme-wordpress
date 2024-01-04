<?php get_header(); ?>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>

<body id="eng">
    <?php
    $empreendimentos_posts = new WP_Query(array(
        'post_type' => array('empreendimentos'),
        'posts_per_page' => -1,
        'order' => 'DESC',
        //  'orderby' => 'menu_order'
    ));
    ?>
    <div id="app">
        <carrosselhero :itens-carrossel="heroBanners" :max-width="false" />
    </div>

    <main id="body-page-eng">
        <?php if ($empreendimentos_posts->posts) : ?>
            <section id="projects" class="default-center">
                <div class="projects-title">
                    <h1 class="title-base-eng">Conheça os nossos <span>empreendimentos</span></h1>
                </div>


                <div class="projects-options-area">
                    <?php for ($i = 0; $i < count($empreendimentos_posts->posts); $i++) : ?>
                        <?php if ($empreendimentos_posts->posts[$i]->post_status == 'publish') : ?>
                            <a href="<?php echo $empreendimentos_posts->posts[$i]->guid; ?>" class="options">
                                <div class="project-option">
                                    <div class="image-area">
                                        <div class="overlay-hover-options">
                                            <img src="<?php echo get_field('logo_do_empreendimento', $empreendimentos_posts->posts[$i]->ID); ?>" alt="Logotipo do empreendimento" class="options-logotype">
                                        </div>

                                        <img src="<?php echo get_field('imagem_principal_empreendimento', $empreendimentos_posts->posts[$i]->ID); ?>" alt="Imagem do empreendimento">
                                    </div>

                                    <h1 class="option-title"><?php echo $empreendimentos_posts->posts[$i]->post_title; ?></h1>
                                    <p class="option-status"><?php echo get_field('status_do_empreendimento', $empreendimentos_posts->posts[$i]->ID) ?></p>
                                    <button href="<?php echo $empreendimentos_posts->posts[$i]->guid; ?>" class="option-link">
                                        <svg width="553" height="551" viewBox="0 0 553 551" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M190.025 380.052C238.621 380.052 282.957 361.811 316.557 331.802L535.738 550.985L552.709 534.015L333.418 314.724C362.465 281.352 380.051 237.743 380.051 190.026C380.051 85.0774 294.975 0 190.025 0C85.0781 0 0 85.0774 0 190.026C0 294.974 85.0781 380.052 190.025 380.052ZM190.025 356.052C281.719 356.052 356.051 281.719 356.051 190.026C356.051 98.3323 281.719 24 190.025 24C98.332 24 24 98.3323 24 190.026C24 281.719 98.332 356.052 190.025 356.052Z" fill="black" />
                                        </svg>

                                        Veja mais
                                    </button>
                                </div>
                            </a>
                        <?php endif ?>
                    <?php endfor ?>

                    <?php
                    $ebook_link = get_field('ebook_data', 'option');

                    $ebook_data = [
                        'link_book'     => $ebook_link['ebook_pdf'],
                        'image_ebook'    => $ebook_link['image_ebook'],
                    ];
                    ?>

                    <?php if ($ebook_data['link_book']) : ?>
                        <div class="ebook-area">
                            <div class="ebook">
                                <img src="<?php echo $ebook_data['image_ebook']; ?>" alt="Ebook">
                                <a class="button-base" href="<?php echo $ebook_data['link_book']; ?>" download="ebook ECM Engenharia" target="_blank">Baixe agora</a>
                                <p class="ebook-descriptions">
                                    Clique no botão<br>
                                    e tenha acesso ao nosso <br>
                                    <strong>book digital</strong>
                                </p>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </section>
        <?php endif ?>

        <?php
        $knowMoreList = get_field('card_saber_mais', 'option');
        $knowBackgroundImage = get_field('know_imagem_do_fundo', 'option');
        $knowMoreButton = get_field('button_know_more', 'option');
        ?>
        <?php if (isset($knowMoreList) && is_array($knowMoreList) && count($knowMoreList) > 0) : ?>
            <section id="know-more" style="background-image: url(<?php echo $knowBackgroundImage; ?>);">
                <div class="know-more-section default-center">
                    <div class="know-more-title">
                        <h1 class="title-base-eng">
                            <svg width="120" height="30" viewBox="0 0 120 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1275_8)">
                                    <path d="M33.0946 5.935C33.0235 2.94336 32.6767 2.04739 31.2021 1.04297C30.3272 0.447253 30.227 0.441109 21.3045 0.452062L12.2907 0.462747L6.1504 4.793L0.0103084 9.12298L0.00502204 19.3408L0 29.5587H15.1591H30.3182L31.2021 28.9569C32.1418 28.3168 32.9617 27.1008 33.0481 26.2195C33.0769 25.9257 33.0867 24.6934 33.07 23.4814L33.0396 21.2775H28.9427H24.8458V22.7468C24.8458 24.3373 24.3552 25.1342 23.2004 25.4195C22.8698 25.5012 19.3877 25.5343 15.4626 25.4932L8.32599 25.4181L8.25304 21.3443L8.18009 17.2705H16.513H24.8458V15.1372V13.0039L16.5859 12.9333L8.32599 12.8628L8.24617 10.1915C8.15101 7.00327 8.31489 5.92859 9.00159 5.23457C9.48502 4.74598 9.93568 4.71526 16.606 4.71526C23.6757 4.71526 23.6981 4.71713 24.2712 5.33341C24.7094 5.8049 24.8458 6.28227 24.8458 7.34386V8.7359L29.0017 8.66217L33.1575 8.58871L33.0946 5.935Z" fill="black" />
                                    <path d="M71.7777 2.27767C71.4233 1.75035 70.7213 1.12151 70.218 0.880025C69.4256 0.499893 68.1201 0.44139 60.4882 0.443795L51.6735 0.446198L45.5324 4.78473L39.3915 9.12299L39.387 19.3409L39.3828 29.5588L54.5149 29.5577C69.1483 29.5569 69.6754 29.5393 70.5085 29.0259C72.0524 28.0746 72.4203 27.1111 72.4214 24.0158L72.4224 21.2776H68.3255H64.2286V22.6339C64.2286 23.7783 64.1073 24.1127 63.4517 24.7752L62.6749 25.5601L55.1918 25.4893L47.7088 25.4182V15.6288C47.7088 6.37711 47.7365 5.80865 48.2123 5.27732C48.7007 4.7321 48.9325 4.71527 55.9243 4.71527H63.133L63.6806 5.41917C64.0644 5.91203 64.2286 6.51228 64.2286 7.42268V8.72229H68.3255H72.4224V5.97935C72.4224 3.5121 72.3577 3.14025 71.7777 2.27767Z" fill="black" />
                                    <path d="M102.961 2.48207C102.658 2.02767 102.009 1.38254 101.518 1.04863C100.672 0.47215 100.382 0.441162 95.8185 0.441162H91.0101L84.8885 4.7658L78.7666 9.09044V19.3246V29.5588H82.8635H86.9605V17.841C86.9605 3.48943 86.5761 4.71531 91.0767 4.71531C95.579 4.71531 95.1543 3.36602 95.1543 17.6713V29.5588H99.3834H103.612V17.6713C103.612 3.36602 103.188 4.71531 107.69 4.71531C112.19 4.71531 111.806 3.48943 111.806 17.841V29.5588H115.903H120L119.999 16.4024C119.998 3.74561 119.978 3.21295 119.473 2.37548C118.405 0.605717 117.799 0.442231 112.335 0.451848L107.445 0.460663L105.478 1.88449L103.512 3.30832L102.961 2.48207Z" fill="black" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1275_8">
                                        <rect width="120" height="30" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                            <span class="divisor">></span>
                            SINÔNIMO DE <span>PIONEIRISMO</span> E <span>RENTABILIDADE</span>
                        </h1>
                    </div>

                    <div class="know-more-element-area">

                        <?php for ($i = 0; $i < count($knowMoreList); $i++) : ?>
                            <div class="know-more-element animation-section">
                                <div class="info-element">
                                    <img class="element-icon" src="<?php echo $knowMoreList[$i]['know_icon'] ?>" alt="Icone">
                                    <p class="element-title text-card"><?php echo $knowMoreList[$i]['know_title_card'] ?></p>
                                    <p class="element-description text-card"><?php echo $knowMoreList[$i]['know_text_card'] ?></p>
                                </div>

                                <img class="element-background-image" src="<?php echo $knowMoreList[$i]['know_image_card'] ?>" alt="Icone">
                            </div>
                        <?php endfor ?>

                    </div>

                    <?php if (isset($knowMoreButton) && is_array($knowMoreButton)) : ?>
                        <a class="button-base <?php echo $knowMoreButton['button_type']; ?>" href="<?php echo $knowMoreButton['button_link']; ?>">
                            <?php echo $knowMoreButton['title_button']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php
        function getIdByVideo($link)
        {
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

        $linkVideo = get_field('video_principal', 'option');
        $videoId = getIdByVideo($linkVideo);
        ?>
        <?php if ($videoId) : ?>
            <section class="video-area default-center">
                <iframe stylw="width:100%;" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $videoId; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </section>
        <?php endif ?>


        <?php $ecmHouse = get_field('ecm_house', 'option'); ?>
        <?php if (isset($ecmHouse) && is_array($ecmHouse)) : ?>
            <section id="ecm-house" class="default-center">
                <div class="projects-title">
                    <h1 class="title-base-eng"><?php echo $ecmHouse['title'] ?></h1>
                </div>

                <section class="info-ecm-house">
                    <?php if ($ecmHouse['imagem_lateral']) : ?>
                        <div class="image-area">
                            <img src="<?php echo $ecmHouse['imagem_lateral'] ?>" alt="">
                        </div>
                    <?php endif; ?>

                    <div class="content-area">
                        <article>
                            <?php echo $ecmHouse['description'] ?>
                        </article>

                        <section class="cards-area">
                            <?php foreach ($ecmHouse['details'] as $key => $value) : ?>
                                <div class="card-ecm-house">
                                    <img class="icon-house" src="<?php echo $value['icon_details'] ?>" alt="">
                                    <div>
                                        <?php echo $value['title_details'] ?>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </section>
                    </div>
                </section>
            </section>
        <?php endif ?>


        <?php
        $horizontal_galery  = get_field('galeria_horizontal', 'option');
        $bottom_galery      = get_field('galeria_abaixo', 'option');
        ?>
        <section id="experience-area" class="default-center">
            <h1 class="title-base-eng cursive">Viva as melhores <br><span>experiências</span></h1>
            <p class="subtitle">
                Natureza, gastronomia, lazer, arte, história... <br>
                Tudo isso reunido nessa terra cheia de oportunidades.
            </p>

            <section class="galery-horizontal">
                <?php foreach ($horizontal_galery as $value) : ?>
                    <a href="<?php echo $value ?>" target="_blank" class="image-area">
                        <img src="<?php echo $value ?>" alt="">
                    </a>
                <?php endforeach ?>
                <!-- <div class="image-area">
                    <img src="https://picsum.photos/1421" alt="">
                </div>
                <div class="image-area">
                    <img src="https://picsum.photos/1200" alt="">
                </div>
                <div class="image-area">
                    <img src="https://picsum.photos/1430" alt="">
                </div>
                <div class="image-area">
                    <img src="https://picsum.photos/1442" alt="">
                </div>
                <div class="image-area">
                    <img src="https://picsum.photos/1440" alt="">
                </div> -->
            </section>

            <section class="galery-double">
                <?php foreach ($bottom_galery as $value) : ?>
                    <a href="<?php echo $value ?>" target="_blank" class="image-area">
                        <img src="<?php echo $value ?>" alt="">
                    </a>
                <?php endforeach ?>

                <!-- <a href="https://picsum.photos/1441" target="_blank" class="image-area">
                    <img src="https://picsum.photos/1441" alt="">
                </a> -->
            </section>
        </section>
    </main>

    <script>
        function toggleMenu() {
            const $headerMenu = document.querySelector("#nav-menu");

            $headerMenu.classList.toggle('active');
        }
    </script>

    <?php
    $banner_list = get_field('carrossel_banners', 'option');
    $bannersList = [];

    foreach ($banner_list as $key => $value) {
        $value['banner'];

        $data_banner = [
            'id'    => 'banner_' . uniqid(),
            'image' => [
                'desktop'   => $value['banner']['banner_desktop'],
                'mobile'    => $value['banner']['banner_mobile'] ? $value['banner']['banner_mobile'] : $value['banner']['banner_desktop'],
            ],
            'link'          => $value['banner']['banner_desktop'] ?  $value['banner']['link_banner'] : '',
        ];

        $bannersList[] = $data_banner;
    }

    $bannerListJson = json_encode($bannersList);
    ?>

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/componentsVue/CarrosselHero.js"></script>
    <script>
        new Vue({
            el: '#app',
            data() {
                return {
                    heroBanners: <?php echo $bannerListJson; ?>
                }
            },
        });
    </script>

    <script>
        const $animationSection = document.querySelectorAll('.animation-section');
        const fadeAnimation = false;
        const myObserver = new IntersectionObserver(entries => {
            entries.forEach(item => {
                if (item.isIntersecting) {
                    item.target.classList.add('active-animation')
                }
                // else {
                //     item.target.classList.remove('active-animation')
                // }
            });
        });

        $animationSection.forEach(element => {
            myObserver.observe(element);
        });


        console.log($animationSection);
    </script>

    <style>

        .know-more-element {
            opacity: 0;
            transform: translateY(20%);
        }

        .know-more-element.animation-section.active-animation {
            opacity: 0;
            transform: translateY(15%);
            animation: fade_in forwards ease-in .8s;
        }


        .know-more-element.animation-section .text-card {
            opacity: 0;
            transform: translateY(15%);
            filter: blur(15px);
            transition: all .8s;
        }

        .know-more-element.animation-section.active-animation .text-card {
            opacity: 1;
            transform: translateY(0);
            filter: blur(0);
        }

        .know-more-element.animation-section .element-icon {
            opacity: 0;
            transform: translateY(15px);
            transition: all .8s;
        }

        .know-more-element.animation-section.active-animation .element-icon {
            opacity: 1;
            transform: translateY(0);
        }

        <?php
        $current_time = 0;
        $current = 1;
        ?><?php foreach ($knowMoreList as $key => $value) : ?>.know-more-element.animation-section:nth-child(<?php echo $current ?>) {
            animation-delay: <?php echo $current_time . 'ms' ?>;
        }

        .know-more-element.animation-section:nth-child(<?php echo $current ?>) .element-icon {
            transition-delay: <?php echo $current_time + 600 . 'ms' ?>;
        }

        .know-more-element.animation-section:nth-child(<?php echo $current ?>) .text-card {
            transition-delay: <?php echo $current_time + 800 . 'ms' ?>;
        }

        <?php
        $current_time = $current_time + 300;
        $current++;
        ?><?php endforeach ?>@keyframes fade_in {
            0% {
                opacity: 0;
                transform: translateY(20%);
                filter: blur(15px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
                filter: blur(0);
            }
        }
    </style>


    <?php get_footer(); ?>