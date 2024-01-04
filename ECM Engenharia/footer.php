    </body>

    </html>
    <!-- Footer  -->
    <!-- <footer id="footer-main" class="black-section">
    <div class="center-section ">
        <div class="slogan">
            <p><span class="text-strong">› ECM ENGENHARIA</span> • ENGENHARIA QUE MATERIALIZA SONHOS</p>
        </div>
        <hr></hr>

        <nav class="footer-nav">
            <div class="logo-vupes">
                <a href="https://vupes.com.br/">
                    <img src="/assets/image/logotipo/vupes.png" alt="Agencia Vupes logotipo">
                </a>
            </div>
        </nav>
        <div>
            <p>© 2023 Direitos reservados ECM Engenharia | Site desenvolvido por: <a href="https://vupes.com.br/">Agência Vupes</a></p>
        </div>
    </div>
</footer> -->

    <?php
        $menu_footer_name = 'main_footer';
        $menu_footer_items = wp_get_nav_menu_items($menu_footer_name);

        $menu_footer_object = wp_get_nav_menu_object($menu_footer_name);

        $menu_footer_id = $menu_footer_object->term_id;
        $contact_data = get_field('contact_data', 'menu_' . $menu_footer_id);
    ?>


    <?php if ($contact_data['whatsapp_number']) : ?>
        <a href="https://wa.me/+55<?php echo $contact_data['whatsapp_number'] ?>" id="float-whatsapp" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
            </svg>
        </a>
    <?php endif ?>

    <footer id="main-footer">
        <section class="top-footer">
            <div class="default-center grid-area">
                <a href="/contato" class="email-area-footer">
                    <svg height="16" width="16" viewBox="0 0 512 512">
                        <path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z" />
                    </svg>
                    Entre em contato
                </a>

                <div class="logo-area">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/logotipo/ecm.webp" alt="Logotipo da ECM Engenharia">
                </div>

                <nav class="navegation-area">
                    <ul>
                        <?php foreach ($menu_footer_items as  $item) : ?>
                            <li class="item">
                                <a href="<?php echo $item->url ?>">
                                    <?php echo $item->title ?>
                                </a>
                            </li>
                        <?php endforeach ?>

                        <!-- <li class="item">
                            <a href="#">
                                Diferenciais
                            </a>
                        </li>

                        <li class="item">
                            <a href="#">
                                Invista
                            </a>
                        </li>

                        <li class="item">
                            <a href="#">
                                ECM House
                            </a>
                        </li>

                        <li class="item">
                            <a href="#">
                                ECM Decor
                            </a>
                        </li> -->
                    </ul>
                </nav>

                <div class="contact-area">
                    <h1 class="footer-title">CONTATOS</h1>

                    <?php if (is_array($contact_data) && isset($contact_data['list_social'])) : ?>
                        <div class="contacts">
                            <?php echo $contact_data['contact'] ?>
                        </div>
                    <?php endif ?>

                    <div class="social">
                        <?php if (is_array($contact_data) && isset($contact_data['list_social'])) : ?>
                            <?php foreach ($contact_data['list_social'] as $value) : ?>
                                <a href="<?php echo $value['link_social']['url'] ?>" target="_blank">
                                    <img src="<?php echo $value['icon_social'] ?>" alt="logo social media">
                                </a>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </div>

                <!-- <form class="newletter-area">
                    <h1 class="footer-title">RECEBA NOSSA NEWSLETTER</h1>
                    <div class="inputs-area">
                        <input class="input-newletter" type="text">
                        <input class="button-newsletter" type="submit" value="ENVIAR">
                    </div>
                </form> -->
            </div>
        </section>

        <section class="bottom-footer">
            <div class="default-center copy-footer">
                <p>ECM Engenharia&reg; que materializa sonhos <span>&gt;</span> &copy;2023 Direitos reservados </p>
                <div class="copy-dev">
                    <p>
                        Design e desenvolvimento: <div><span><a href="https://vupes.com.br" target="_blank">Vupes</a></span> & <span><a href="https://www.instagram.com/cronoscreative/" target="_blank">Cronos Creative</a></span></div>
                    </p>

                    <a href="https://vupes.com.br" target="_blank" style="text-decoration: none;">
                        <img class="copy-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/logotipo/vupes-white.png" alt=""> <img class="copy-logo" src="" alt="">
                    </a>
                </div>
            </div>
        </section>
    </footer>

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/menuToggle.js"></script>

    <?php wp_footer(); ?>