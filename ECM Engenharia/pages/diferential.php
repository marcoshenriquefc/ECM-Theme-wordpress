<?php //template name: Diferential ?>

<?php get_header() ?>
  <?php
  // $menuNavegation = menu_arrayConvert('Menu LandingPage');

  // echo json_encode($menuNavegation);
  ?>
  
  <?php $page_id = get_the_id(); ?>
  <?php
    $card_list = get_field('card_list', $page_id);
    $banners = get_field('top_banner', $page_id);
  ?>

  <section id="top-banner">
      <div class="center-section banner-area">
          <img class="desktop" src="<?php echo $banners['image_desktop']?>" alt="">
          <img class="mobile" src="<?php echo $banners['image_mobile']?>" alt="">
      </div>
  </section>
  
  <main id="main-diferential" class="center-section">
    <section id="diferential-area">

      <div class="diferential-description">
        <h1 class="title-base-eng">Nossos empreendimentos são <br><span class="bold-text">diferenciados</span> e pensados em cada detalhe.</h1>
      </div>

      <section class="diferentials">

        <?php foreach ($card_list as $card) : ?>

          <div class="itens diferential-cards" style="background-color:<?php echo $card['card_color'] ? $card['card_color'] : ''  ?>;">
            <img src="<?php echo $card['icon'] ?>" class="diferential-card-icon" alt="Icone">
            <h1 class="diferential-card-description" style="color:<?php echo $card['text_color'] ?$card['text_color'] : ''?>;"><?php echo $card['title'] ?></h1>
          </div>
        <?php endforeach ?>


        <!-- <div class="itens diferential-cards">
          <img src="" class="diferential-card-icon" alt="Icone">
          <p class="diferential-card-description">descrição do card</p>
        </div>
        <div class="itens diferential-cards">
          <img src="" class="diferential-card-icon" alt="Icone">
          <p class="diferential-card-description">descrição do card</p>
        </div>
        <div class="itens diferential-cards">
          <img src="" class="diferential-card-icon" alt="Icone">
          <p class="diferential-card-description">descrição do card</p>
        </div>
        <div class="itens diferential-cards">
          <img src="" class="diferential-card-icon" alt="Icone">
          <p class="diferential-card-description">descrição do card</p>
        </div>
        <div class="itens diferential-cards">
          <img src="" class="diferential-card-icon" alt="Icone">
          <p class="diferential-card-description">descrição do card</p>
        </div>
        <div class="itens diferential-cards">
          <img src="" class="diferential-card-icon" alt="Icone">
          <p class="diferential-card-description">descrição do card</p>
        </div>
        <div class="itens diferential-cards">
          <img src="" class="diferential-card-icon" alt="Icone">
          <p class="diferential-card-description">descrição do card</p>
        </div>
        <div class="itens diferential-cards">
          <img src="" class="diferential-card-icon" alt="Icone">
          <p class="diferential-card-description">descrição do card</p>
        </div>
        <div class="itens diferential-cards">
          <img src="" class="diferential-card-icon" alt="Icone">
          <p class="diferential-card-description">descrição do card</p>
        </div>
        <div class="itens diferential-cards">
          <img src="" class="diferential-card-icon" alt="Icone">
          <p class="diferential-card-description">descrição do card</p>
        </div>
        <div class="itens diferential-cards">
          <img src="" class="diferential-card-icon" alt="Icone">
          <p class="diferential-card-description">descrição do card</p>
        </div>
        <div class="itens diferential-cards">
          <img src="" class="diferential-card-icon" alt="Icone">
          <p class="diferential-card-description">descrição do card</p>
        </div>
        <div class="itens diferential-cards">
          <img src="" class="diferential-card-icon" alt="Icone">
          <p class="diferential-card-description">descrição do card</p>
        </div>
        <div class="itens diferential-cards">
          <img src="" class="diferential-card-icon" alt="Icone">
          <p class="diferential-card-description">descrição do card</p>
        </div> -->
      </section>
    </section>
  </main>



  <?php get_footer() ?>