<?php /* Template Name: Lançamento */ ?>
<?php get_header(); ?>
<!-- Hero image  -->
<?php  
    $lancamento = '';
   $query = new WP_Query( array( 'post_type' => 'Lancamentos') );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
        $lancamento = get_the_ID();
    endwhile; endif; wp_reset_postdata();
?>
<section id="hero-image">
        <div class="image-banner center-section">
            <div class="image-area">
                <!--
                    Carregar o status do empreendimento
                    - Lançamento 
                    - Em obras 
                    - Entregue 
                -->
                <h1 class="status-banner">
                    <?php echo get_field('status_do_lancamento',$lancamento)?>
                </h1>

                <div class="logo-banner">
                    <img src="<?php echo get_field('logo_do_lancamento',$lancamento)?>" alt="Porto cahaya">
                </div>

                <img src="<?php echo get_field('imagem_principal',$lancamento)?>" alt="Foto do empreendimento de lançamento">
            </div>
        </div>
    </section>

    <!-- Address  -->
    <section id="address" class="center-section">
        <div class="content-area">
            <div class="location">
                <!-- Nome da praia  -->
                <img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/icons/location.svg" alt="icone de localização">
                <h1 class="title"><?php echo get_field('praia_do_lancamento',$lancamento)?></h1>
            </div>
            <!-- Endereço  -->
            <p class="full-address"><?php echo get_field('endereco',$lancamento)?></p>
        </div>
    </section>

    <!-- Info area  -->
    <section id="info-area" class="no-padding-botom">
        <div class="center-section info-box">
            <h1 class="title-item"><span class="text-strong"><?php echo get_field('praia_do_lancamento',$lancamento)?></h1>

            <!-- Status area  -->
            <section id="status-box">
                    <div class="container">
                        <section class="step-indicator">
                            <?php if(get_field('status_do_lancamento',$lancamento) == 'Lançamento'):?>
                            <div class="step active">
                                <span class="step-icon" >1</span>
                                <p>Lançamento</p>
                            </div>
                            <div class="indicator-line"></div>
                            <div class="step">
                                
                                <div class="step-icon">2</div>
                                <p>Em obras</p>
                            </div>
                            <div class="indicator-line"></div>
                            <div class="step">
                                <span class="step-icon">3</span>
                                <p>Entregue</p>
                            </div>
                            <?php elseif(get_field('status_do_lancamento',$lancamento) == 'Em Obras'):?>
                            <div class="step active">
                                <span class="step-icon">1</span>
                                <p>Lançamento</p>
                            </div>
                            <div class="indicator-line active"></div>
                            <div class="step active">
                                <?php $porcentagem = get_field('porcetagem_de_obras',$lancamento);?>
                                <div class="step-icon" style="background: linear-gradient(0deg, #8F6244 <?php echo $porcentagem?>%, #D4D4D4 <?php echo $porcentagem?>%);"><?php echo $porcentagem?>%</div>
                                <p>Em obras</p>
                            </div>
                            <?php elseif(get_field('status_do_lancamento',$lancamento) == 'Entregue'):?>
                            <div class="step active">
                                <span class="step-icon">1</span>
                                <p>Lançamento</p>
                            </div>
                            <div class="indicator-line active"></div>
                            <div class="step active">
                                
                                <div class="step-icon">2</div>
                                <p>Em obras</p>
                            </div>
                            <div class="indicator-line active"></div>
                            <div class="step active">
                                <span class="step-icon">3</span>
                                <p>Entregue</p>
                            </div>
                            <?php endif;?>
                            

                            <!--
                                Atenção nesse indicador EM OBRAS
                                
                                carregar style inline com a porcentagem de finalização que foi definida
                                caso seja 100% precisa ativar próxima linha - "indicator-line" - 

                                ex do codigo: 
                                style = "background: linear-gradient(0deg, #8F6244 $PORCENTAGEM-EM-OBRAS, #D4D4D4 $PORCENTAGEM-EM-OBRAS);"

                                if($PORCENTAGEM-EM-OBRAS >= 100) {
                                    <div class="indicator-line active"></div>
                                }
                                else {
                                    <div class="indicator-line"></div>
                                }

                            -->
                            
                        </section>
                    </div>
            </section>
            <?php if(get_field('descricao_do_lancamento',$lancamento)):?>
            <div class="content-info">
                <h2 class="title">Descrição</h2>
                <p class="text">
                    <?php echo get_field('descricao_do_lancamento',$lancamento)?>
            </div>
            <?php endif;?>
            <?php if(get_field('sobre_o_lancamento',$lancamento)):?>
            <div class="content-info">
                <h2 class="title">Sobre</h2>
                <p class="text">
                    <?php echo get_field('sobre_o_lancamento',$lancamento)?>
                </p>
            </div>
            <?php endif;?>

            <?php if(get_field('perfil_do_lancamento',$lancamento)):?>
            <div class="content-info">
                <h2 class="title">Perfil</h2>
                <ul class="list-text">
                    <?php foreach(get_field('perfil_do_lancamento',$lancamento) as $key => $topico):?>
                    <li>
                        <?php echo $topico['topicos'];?>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <?php endif;?>
        </div>


        <!-- Photos Galery  -->
        <section id="photo-galery" class="black-section first-black-section">
                <?php if(get_field('galeria_de_imagens_do_empreendimento',$lancamento)):?>
                <div class="center-section content-info">
                    <h1 class="title">Mais fotos do empreendimento</h1>
        
                    <div class="galery">
                        <button class="button-galery prev-galery">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M31.51 36.1984C32.4781 37.0838 32.4562 38.5031 31.4588 39.3658C30.465 40.2285 28.8721 40.2089 27.9039 39.3202L8.49638 21.4844L10.2976 19.9251L8.48907 21.4877C7.52089 20.5957 7.54281 19.1732 8.54387 18.3105C8.5731 18.2845 8.60233 18.2617 8.63156 18.2389L27.9076 0.679772C28.8758 -0.208926 30.465 -0.228458 31.4625 0.634197C32.4562 1.49685 32.4781 2.91291 31.51 3.80161L15.8034 19.9251L31.51 36.1984Z" fill="#F8F8F8"/>
                                <path d="M16.1682 15.556H13.6142V17.4079H16.1682V15.556Z" fill="#F8F8F8"/>
                            </svg>
                        </button>

                        <!-- Carrossel  -->
                        <div class="carrossel-area">

                            <div class="photo-carrossel">
                                <!-- Item do carrossel  -->
                                <?php foreach(get_field('galeria_de_imagens_do_empreendimento',$lancamento) as $key => $galeria):?>
                                    <div class="carrossel-item">
                                        <div class="image-area">
                                            <img src="<?php echo $galeria['imagens_do_empreendimento']?>" alt="Imagem 1">
                                        </div>
                                    </div>
                                <?php endforeach;?>

                            </div>

                        </div>
                        <button class="button-galery next-galery">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.49004 36.1984C7.52186 37.0838 7.54378 38.5031 8.54119 39.3658C9.53495 40.2285 11.1279 40.2089 12.0961 39.3202L31.5036 21.4844L29.7024 19.9251L31.5109 21.4877C32.4791 20.5957 32.4572 19.1732 31.4561 18.3105C31.4269 18.2845 31.3977 18.2617 31.3684 18.2389L12.0924 0.679772C11.1242 -0.208926 9.53495 -0.228458 8.53754 0.634197C7.54378 1.49685 7.52186 2.91291 8.49004 3.80161L24.1966 19.9251L8.49004 36.1984Z" fill="#F8F8F8"/>
                                <path d="M23.8318 15.556H26.3858V17.4079H23.8318V15.556Z" fill="#F8F8F8"/>
                            </svg>
                        </button>
                    </div>
                    <div id="dots-galery"></div>
                </div>
                <?php endif;?>
            </section>
        <!-- End Photos Galery  -->

        <section id="characteristics" class="black-section">
                <?php if(get_field('caracteristicas_do_empreendimento',$lancamento)):?>
                <div class="center-section content-info">
                    <h1 class="title">Mais fotos do empreendimento</h1>

                    <div class="cards-area">
                    <?php foreach(get_field('caracteristicas_do_empreendimento',$lancamento) as $key => $caracteristica):?>
                        <div class="card-item">
                            <img class="icon" src="<?php echo $caracteristica['empreendimento']?>" alt="Icone representando texto ao lado">
                            <p class="text"><?php echo $caracteristica['texto_empreendimento']?></p>
                        </div>
                    <?php endforeach;?>
                    </div>
                </div>
                <?php endif;?>
            </section>
    </section>

<script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"</script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/menuToggle.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/galeryCarrossel.js"></script>
<?php get_footer(); ?>