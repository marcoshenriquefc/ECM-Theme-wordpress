<?php //template name: createUser 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar usuário - </title>

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/styles/style.css" type="text/css" media="all">
    <script src="https://kit.fontawesome.com/7862a94653.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
</head>

<body>
    <?php
    if (is_user_logged_in()) {
        $user_roles = wp_get_current_user()->roles;

        if (in_array('administrator', $user_roles)) {
            $all_categories = get_all_categories();
        } else {
            // Se o usuário não for um administrador, redirecione-o para minha-conta
            wp_redirect('/minha-conta');
            exit();
        }
    } else {
        // Se o usuário não estiver logado, redirecione-o para a página de login
        wp_redirect('/auth-login');
        exit();
    }

    ?>


    <header id="menuMain" class="no-bg">
        <div class="center-menu center-section">
            <a id="menulogo" href="<?php echo home_url(); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/logotipo/logotipo.svg" alt="Logotipo da ECM engenharia">
            </a>

            <div id="burger-menu" class="menu-hamburguer">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="menu-nav">
                <ul>
                    <?php wp_nav_menu(array('container' => '', 'menu' => 'header', 'items_wrap' => '%3$s', 'container_class' => ''));  ?>
                    <!-- <li><a href="#" class="menu-item"> Início </a></li>
                    <li><a href="#" class="menu-item"> Lançamento </a></li>
                    <li><a href="#" class="menu-item"> Empreendimentos </a></li> -->
                    <li><a href="<?php echo home_url(); ?>#form-section" class="buttonBase primary"> Fale conosco </a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main id="main-base-account" class="center-section">
        <aside class="aside-account">
            <h1 class="title-default-account">Minha conta</h1>

            <nav class="navegation-aside-account">
                <ul>
                    <li class="item-menu-account active">
                        <a href="#">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.706 16.3216C18.2321 15.1989 17.5442 14.1792 16.6809 13.3191C15.8202 12.4566 14.8006 11.7689 13.6784 11.294C13.6683 11.2889 13.6583 11.2864 13.6482 11.2814C15.2136 10.1508 16.2312 8.30905 16.2312 6.23116C16.2312 2.78894 13.4422 0 10 0C6.55779 0 3.76885 2.78894 3.76885 6.23116C3.76885 8.30905 4.78643 10.1508 6.35176 11.2839C6.34171 11.2889 6.33166 11.2915 6.32161 11.2965C5.19598 11.7714 4.18593 12.4523 3.3191 13.3216C2.45656 14.1823 1.76886 15.2019 1.29397 16.3241C0.827445 17.4227 0.575837 18.6006 0.552767 19.794C0.552096 19.8208 0.5568 19.8475 0.5666 19.8724C0.576401 19.8974 0.591101 19.9202 0.609833 19.9394C0.628565 19.9586 0.650951 19.9738 0.675672 19.9842C0.700392 19.9946 0.726947 20 0.753772 20H2.26131C2.37186 20 2.4598 19.9121 2.46231 19.804C2.51257 17.8643 3.29146 16.0477 4.66834 14.6709C6.09297 13.2462 7.98493 12.4623 10 12.4623C12.0151 12.4623 13.907 13.2462 15.3317 14.6709C16.7085 16.0477 17.4874 17.8643 17.5377 19.804C17.5402 19.9146 17.6281 20 17.7387 20H19.2462C19.2731 20 19.2996 19.9946 19.3243 19.9842C19.3491 19.9738 19.3714 19.9586 19.3902 19.9394C19.4089 19.9202 19.4236 19.8974 19.4334 19.8724C19.4432 19.8475 19.4479 19.8208 19.4472 19.794C19.4221 18.593 19.1734 17.4246 18.706 16.3216ZM10 10.5528C8.84674 10.5528 7.76131 10.103 6.94473 9.28643C6.12814 8.46985 5.67839 7.38442 5.67839 6.23116C5.67839 5.07789 6.12814 3.99246 6.94473 3.17588C7.76131 2.3593 8.84674 1.90955 10 1.90955C11.1533 1.90955 12.2387 2.3593 13.0553 3.17588C13.8719 3.99246 14.3216 5.07789 14.3216 6.23116C14.3216 7.38442 13.8719 8.46985 13.0553 9.28643C12.2387 10.103 11.1533 10.5528 10 10.5528Z" fill="#333333" />
                            </svg>

                            Editar Usuários
                        </a>
                    </li>

                    <li class="item-menu-account">
                        <a href="#">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.7149 7.39326C15.7149 7.03427 15.4239 6.74326 15.0649 6.74326C14.706 6.74326 14.4149 7.03427 14.4149 7.39326V9.92222C14.4149 10.2812 14.706 10.5722 15.0649 10.5722C15.4239 10.5722 15.7149 10.2812 15.7149 9.92222V7.39326Z" fill="#333333" />
                                <path d="M13.1675 8.74191C13.1675 8.38292 12.8765 8.09191 12.5175 8.09191C12.1585 8.09191 11.8675 8.38292 11.8675 8.74191V9.92222C11.8675 10.2812 12.1585 10.5722 12.5175 10.5722C12.8765 10.5722 13.1675 10.2812 13.1675 9.92222V8.74191Z" fill="#333333" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0789 0C10.235 0 9.63013 0.311904 9.26288 0.797252C9.10712 1.0031 9.00616 1.22435 8.94515 1.43856H4.12588C3.76689 1.43856 3.47588 1.72958 3.47588 2.08856V7.07293H1.12887C0.769889 7.07293 0.478874 7.36394 0.478874 7.72293V18.632C0.478874 18.991 0.769889 19.282 1.12887 19.282H9.28072C9.63971 19.282 9.93072 18.991 9.93072 18.632V17.8435H18.8711C19.2301 17.8435 19.5211 17.5524 19.5211 17.1935V2.08856C19.5211 1.72958 19.2301 1.43856 18.8711 1.43856H13.8135C13.5875 0.501982 12.8849 0.0708412 12.3583 0.00501937L12.3467 0.0985585V0H11.0789ZM10.1682 2.03458C10.1585 1.91822 10.1893 1.72739 10.2996 1.58167C10.3859 1.46762 10.5801 1.3 11.0789 1.3H12.2151C12.2267 1.30376 12.2435 1.3101 12.2635 1.32048C12.3029 1.34085 12.3489 1.37326 12.3932 1.42265C12.4732 1.51179 12.5868 1.70084 12.5868 2.08856C12.5868 2.44755 12.8778 2.73856 13.2368 2.73856H14.1452V4.07592H8.73192V2.73856H9.88012V2.05859L10.1682 2.03458ZM9.28072 7.07293H4.77588V2.73856H7.43192V4.72592C7.43192 5.08491 7.72294 5.37592 8.08192 5.37592H14.7952C15.1542 5.37592 15.4452 5.08491 15.4452 4.72592V2.73856H18.2211V16.5435H9.93072V7.72293C9.93072 7.36394 9.63971 7.07293 9.28072 7.07293ZM1.77887 10.7892V8.37293H8.63072V10.7892H1.77887ZM1.77887 12.0892H8.63072V17.982H1.77887V12.0892Z" fill="#333333" />
                            </svg>

                            Meus pedidos
                        </a>
                    </li>

                    <li class="item-menu-account">
                        <?php
                        if (is_user_logged_in()) {
                            // O usuário está logado
                            $logout_url = wp_logout_url(home_url('/decor'));
                        ?>
                            <a href="<?php echo esc_url($logout_url); ?>">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.97939 0.412537H1.22939V1.16254V18.8375V19.5875H1.97939H14.3519H15.1019V18.8375V15.8198H13.6019V18.0875H2.72939V1.91254H13.6019V5.4735H15.1019V1.16254V0.412537H14.3519H1.97939ZM13.7706 9.25002H8.16563V10.75H13.7706V12.8867L18.7706 10L13.7706 7.11325V9.25002Z" fill="#333333" />
                                </svg>

                                Sair
                            </a>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
            </nav>
        </aside>

        <form action="" method="post" id="form-account">
            <section id="content-account">

                <?php
                function returnFeedback($value)
                {
                    return '
                        <span style="background-color: lightblue; padding:4px 12px; display:inline-block; position:fixed; top:12px; right:12px; ">'
                        . $value .
                        '</span>';
                }
                ?>
                <h1 class="title-default-account">Informações pessoais</h1>

                <div class="block-info-account">
                    <div class="row-account">
                        <div class="input-content-account">
                            <label class="label-base-account" for="name-user">Nome: <span class="required-account">*</span></label>
                            <input class="input-base-account" id="name-user" name="name-user" type="text" required value="">
                        </div>

                        <div class="input-content-account">
                            <label class="label-base-account" for="lastname-user">Sobrenome: <span class="required-account">*</span></label>
                            <input class="input-base-account" id="lastname-user" name="lastname-user" type="text" required value="">
                        </div>
                    </div>

                    <div class="row-account">
                        <div class="input-content-account">
                            <label class="label-base-account" for="cpf-user">CPF: <span class="required-account">*</span></label>
                            <input class="input-base-account cpf" id="cpf-user" type="tel" name="cpf-user" required value="">
                        </div>

                        <div class="input-content-account">
                            <label class="label-base-account" for="rg-user">RG: <span class="required-account">*</span></label>
                            <input class="input-base-account rg" id="rg-user" type="text" name="rg-user" required value="">
                        </div>
                    </div>
                </div>

                <div class="block-info-account">
                    <hr>
                    <h2 class="second-title-account">Contato</h2>
                    <div class="row-account">
                        <div class="input-content-account">
                            <label class="label-base-account" for="tel-user">Telefone: <span class="required-account">*</span></label>
                            <input class="input-base-account telefone" id="tel-user" type="tel" name="tel-user" required value="">
                        </div>

                        <div class="input-content-account">
                            <label class="label-base-account" for="email-user">E-mail: <span class="required-account">*</span></label>
                            <input class="input-base-account" id="email-user" type="email" name="email-user" required value="">
                        </div>
                    </div>
                </div>

                <div class="block-info-account">
                    <hr>
                    <h2 class="second-title-account">Endereço</h2>
                    <div class="column-account">
                        <div class="row-account">
                            <div class="row-account" style="max-width:50%; width: 100%;">
                                <div class="input-content-account">
                                    <label class="label-base-account" for="cep-user">CEP: <span class="required-account">*</span></label>
                                    <input class="input-base-account cep" id="cep-user" type="tel" name="cep-user" maxlength="8" required oninput="sendCep(this)" value="">
                                </div>

                                <div class="input-content-account" style="max-width: 100px;">
                                    <label class="label-base-account" for="uf-user">UF: <span class="required-account">*</span></label>
                                    <input class="input-base-account" style="text-transform: uppercase;" name="uf-user" maxlength="2" id="uf-user" type="text" required value="">
                                </div>
                            </div>
                            <div style="width: 100%;"></div>
                        </div>

                        <div class="row-account">
                            <div class="input-content-account">
                                <label class="label-base-account" for="city-user">Cidade: <span class="required-account">*</span></label>
                                <input class="input-base-account" id="city-user" type="text" name="city-user" required value="">
                            </div>

                            <div class="input-content-account">
                                <label class="label-base-account" for="locate-user">Bairro: <span class="required-account">*</span></label>
                                <input class="input-base-account" id="locate-user" type="text" name="locate-user" required value="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block-info-account">
                    <hr>
                    <h2 class="second-title-account">Outros</h2>
                    <label for="children-user" class="checkbox-content-account">
                        <input class="checkbox-base-account" id="children-user" type="checkbox" name="chilren-user">
                        <div class="checkbox-content">
                            <span class="checkbox-label" type="checkbox">
                                <i class="icon fa-solid fa-check" color="#3A74BD"></i>
                            </span>
                            <label class="label-base-account" for="children-user">Você possui filhos menores de 12 anos?</label>
                        </div>
                    </label>

                    <div class="row-account">
                        <label for="pet-user" class="checkbox-content-account">
                            <input class="checkbox-base-account" id="pet-user" name="pet-user" type="checkbox">

                            <div class="checkbox-content">
                                <span class="checkbox-label" type="checkbox">
                                    <i class="icon fa-solid fa-check" color="#3A74BD"></i>
                                </span>
                                <label class="label-base-account" for="pet-user">Você possui PET?</label>
                            </div>
                        </label>

                        <div class="input-content-account">
                            <!-- <label class="label-base-account" for= "cep-user" >Qual o porte?</label> -->
                            <select name="select-pet" id="select-pet" class="input-base-account" value="">
                                <option value="">Selecione o porte</option>
                                <option value="pequeno">Pequeno porte</option>
                                <option value="medio">Médio porte</option>
                                <option value="grande">Grande porte</option>
                            </select>
                        </div>
                    </div>

                    <div class="column-account">
                        <div class="input-content-account">
                            <label class="label-base-account" for="question-eletro-user">Qual eletrodoméstico, utensílio domestico e/ou aparelho eletrônico você gostaria na sua unidade? </label>
                            <textarea readonly class="input-base-account" id="question-eletro-user" name="question-eletro" rows="4" resize="vertical" maxlength="120"></textarea>
                        </div>

                        <div class="input-content-account">
                            <label class="label-base-account" for="tel-user">Qual serviço você gostaria que fosse oferecido pelo concierge quando sua unidade for entregue?</label>
                            <textarea readonly class="input-base-account" id="tel-user" rows="4" resize="vertical" maxlength="120" name="question-service"></textarea>
                        </div>
                    </div>
                </div>

                <div class="block-info-account" id="product-area">
                    <h1 class="title-default-account">Unidades do usuário</h1>
                    <?php foreach ($all_categories as $key => $category) : ?>
                        <?php if ($category->slug != 'sem-categoria') : ?>
                            <hr>
                            <h2 class="second-title-account"><?php echo $category->name; ?></h2>
                            <ul class="product-list">
                                <?php $products_list = get_products_by_category($category->term_id); ?>
                                <?php foreach ($products_list as $key => $product) : ?>
                                    <?php
                                    $productID = $product->ID;
                                    $fullDataProduct = wc_get_product($productID);
                                    $productName = $fullDataProduct->get_title();
                                    // $isChecked = false;

                                    // if (is_array($user_data['lista_unidades'])) {
                                    //     foreach ($user_data['lista_unidades'] as $unit) {
                                    //         if (isset($unit['id']) && $unit['id'] == $productID) {
                                    //             $isChecked = true;
                                    //             $data_entrega_value = $unit['data_entrega'];
                                    //             break;  // Adicionando um break para interromper o loop assim que encontrar uma correspondência
                                    //         } else {
                                    //             $data_entrega_value = "";
                                    //         }
                                    //     }
                                    // }
                                    ?>
                                    <li class="product-item">
                                        <label class="checkbox-content-account" for="unidade_<?php echo $productID; ?>">
                                            <input class="checkbox-base-account" type="checkbox" name="lista_unidades[]" id="unidade_<?php echo $productID; ?>" value="<?php echo $productID; ?>" <?php echo $isChecked ? 'checked' : ''; ?>>
                                            <div class="styled-check checkbox-content">
                                                <div class="left-data">
                                                    <span class="checkbox-label" type="checkbox">
                                                        <i class="icon fa-solid fa-check" color="#3A74BD"></i>
                                                    </span>
                                                    <p><?php echo $productName; ?></p>
                                                </div>
                                                <div>
                                                    <label for="data_entrega_<?php echo $productID; ?>">Data de Entrega:</label>
                                                    <input class="input-base-account" type="date" name="data_entrega[<?php echo $productID; ?>]" value="<?php echo esc_attr($data_entrega_value); ?>">
                                                </div>
                                                <!-- <span class="button-decor-account terciary"> Ver informações</span> -->
                                            </div>
                                        </label>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div class="block-info-account">
                    <div class="button-area-account">
                        <button class="button-decor-account primary" type="submit" name="atualizar_dados">Criar usuário</button>
                    </div>
                </div>
            </section>
        </form>
    </main>


    <script>
        document.getElementById('pet-user').addEventListener('change', (item) => {
            toggleInput('select-pet', item.target.checked);
        });

        function toggleInput(idComponent, enable) {
            const $selectElement = document.getElementById('select-pet');
            if (enable) {
                $selectElement.style.display = 'block';
            } else {
                $selectElement.style.display = 'none';
            }
        };

        function sendCep(event) {
            const cepValue = event.value;
            if (cepValue.length === 8) {
                getAddresByCep(cepValue);
            }
        }

        function getAddresByCep(cep) {
            if (cep && cep.length >= 8) {
                // Faz a chamada GET para a API do ViaCEP
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            setAddress(data)
                        }
                    })
                    .catch(error => {});
            }
        }

        function setAddress(dataAddress) {
            const $UF = document.querySelector('#uf-user');
            const $city = document.querySelector('#city-user');
            const $locate = document.querySelector('#locate-user');

            $UF.value = dataAddress.uf;
            $locate.value = dataAddress.bairro;
            $city.value = dataAddress.localidade
        }

        $(document).ready(function() {
            $('.telefone').mask("(99) 99999-9999");
            $('.cpf').mask("999.999.999-99");
            $('.rg').mask("999999999-9");
        });
    </script>

    <?php

    if (isset($_POST['atualizar_dados'])) {
        // Outros campos do usuário
        $nome = sanitize_text_field($_POST['name-user']);
        $sobrenome = sanitize_text_field($_POST['lastname-user']);

        $cpf = sanitize_text_field($_POST['cpf-user']);
        $cpf = str_replace(array(".", "-"), "", $cpf);

        $rg = sanitize_text_field($_POST['rg-user']);
        $telefone = sanitize_text_field($_POST['tel-user']);
        $email = sanitize_email($_POST['email-user']);
        $cep = sanitize_text_field($_POST['cep-user']);
        $uf = strtoupper(sanitize_text_field($_POST['uf-user']));
        $cidade = sanitize_text_field($_POST['city-user']);
        $bairro = sanitize_text_field($_POST['locate-user']);
        $possui_filhos = isset($_POST['children-user']) ? 1 : 0;
        $possui_pet = isset($_POST['pet-user']) ? 1 : 0;
        $porte_pet = sanitize_text_field($_POST['select-pet']);
        $eletrodomesticos = sanitize_text_field($_POST['question-eletro']);
        $servico_concierge = sanitize_text_field($_POST['question-service']);

        // Verificar se todas as informações obrigatórias foram fornecidas
        if (empty($nome) || empty($sobrenome) || empty($cpf) || empty($rg) || empty($telefone) || empty($email) || empty($cep) || empty($uf) || empty($cidade) || empty($bairro)) {
            echo 'Erro: Preencha todos os campos obrigatórios.';
        } else {
            // Unidades selecionadas e datas de entrega
            $lista_unidades = isset($_POST['lista_unidades']) ? $_POST['lista_unidades'] : array();
            $data_entrega = isset($_POST['data_entrega']) ? $_POST['data_entrega'] : array();

            // Combine as unidades e datas
            $lista_unidades_com_data = array();
            foreach ($lista_unidades as $unit_id) {
                if (isset($data_entrega[$unit_id])) {
                    $lista_unidades_com_data[] = array(
                        'id' => $unit_id,
                        'data_entrega' => $data_entrega[$unit_id],
                    );
                } else {
                    $lista_unidades_com_data[] = array(
                        'id' => $unit_id,
                        'data_entrega' => date('Y-m-d'),
                    );
                }
            }

            // Criar usuário no WordPress e cliente no WooCommerce
            $customer_id = wc_create_new_customer($email, $email, $cpf);

            // Verificar se a criação do cliente foi bem-sucedida
            if (is_wp_error($customer_id)) {
                // Houve um erro ao criar o cliente
                echo 'Erro ao criar o cliente: ' . $customer_id->get_error_message();
            } else {
                // Obter o ID do usuário associado ao cliente
                $user_id = get_user_by('email', $email)->ID;

                // Atualizar a role do usuário para "cliente" (opcional, pois wc_create_new_customer deve atribuir automaticamente)
                $user = new WP_User($user_id);
                $user->set_role('customer');

                // Atualizar os metadados do usuário
                update_user_meta($user_id, 'nome', $nome);
                update_user_meta($user_id, 'sobrenome', $sobrenome);
                update_user_meta($user_id, 'cpf', $cpf);
                update_user_meta($user_id, 'rg', $rg);
                update_user_meta($user_id, 'telefone', $telefone);
                update_user_meta($user_id, 'email', $email);
                update_user_meta($user_id, 'cep', $cep);
                update_user_meta($user_id, 'uf', $uf);
                update_user_meta($user_id, 'cidade', $cidade);
                update_user_meta($user_id, 'bairro', $bairro);
                update_user_meta($user_id, 'possui_filhos', $possui_filhos);
                update_user_meta($user_id, 'possui_pet', $possui_pet);
                update_user_meta($user_id, 'porte_pet', $porte_pet);
                update_user_meta($user_id, 'eletrodomesticos', $eletrodomesticos);
                update_user_meta($user_id, 'servico_concierge', $servico_concierge);
                update_user_meta($user_id, 'lista_unidades', serialize($lista_unidades_com_data));
                update_user_meta($user_id, 'primeiro_login', true);

                // Mensagem de sucesso
                $retorno = 'Usuário criado com sucesso!';
                echo returnFeedback($retorno);
            }
        }
    }
    ?>
</body>