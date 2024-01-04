<?php //template name: myAccount ?>

    <?php get_header(); ?>
    <?php
        if (is_user_logged_in()) {
            $user_id = get_current_user_id();
            $retorno = "";
            // Obtém os metadados do usuário
            $user_data = array(
                'nome'      => get_user_meta($user_id, 'nome', true),
                'sobrenome' => get_user_meta($user_id, 'sobrenome', true),
                'cpf'       => get_user_meta($user_id, 'cpf', true),
                'rg'        => get_user_meta($user_id, 'rg', true),
                'telefone'  => get_user_meta($user_id, 'telefone', true),
                'email'     => get_user_meta($user_id, 'email', true),
                'cep'       => get_user_meta($user_id, 'cep', true),
                'uf'        => get_user_meta($user_id, 'uf', true),
                'cidade'    => get_user_meta($user_id, 'cidade', true),
                'bairro'    => get_user_meta($user_id, 'bairro', true),
                'possui_filhos' => get_user_meta($user_id, 'possui_filhos', true),
                'possui_pet' => get_user_meta($user_id, 'possui_pet', true),
                'porte_pet' => get_user_meta($user_id, 'porte_pet', true),
                'eletrodomesticos' => get_user_meta($user_id, 'eletrodomesticos', true),
                'servico_concierge' => get_user_meta($user_id, 'servico_concierge', true),
            );


            $parsed_url = parse_url($_SERVER['REQUEST_URI']);
            $current_path = $parsed_url['path'];
        }
        else {
            wp_redirect('/auth-login');
            exit();
        }
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    <main id="main-base-account" class="center-section">
        <?php
            get_template_part(
                'pages/components/aside-user',
                null,
            );
        ?>

        <form action="" method="post" id="form-account">
            <section id="content-account">

                <?php
                function returnFeedback($value) {
                    return '
                    <span style="background-color: lightblue; padding:4px 12px; display:inline-block; ">'
                        . $value .
                    '</span>';
                }
                ?>
                <h1 class="title-default-account">Informações pessoais</h1>

                <div class="block-info-account">
                    <div class="row-account">
                        <div class="input-content-account">
                            <label class="label-base-account" for="name-user">Nome: <span class="required-account">*</span></label>
                            <input class="input-base-account" id="name-user" name="name-user" type="text" required value="<?php echo $user_data['nome'] ?>">
                        </div>

                        <div class="input-content-account">
                            <label class="label-base-account" for="lastname-user">Sobrenome: <span class="required-account">*</span></label>
                            <input class="input-base-account" id="lastname-user" name="lastname-user" type="text" required value="<?php echo $user_data['sobrenome'] ?>">
                        </div>
                    </div>

                    <div class="row-account">
                        <div class="input-content-account">
                            <label class="label-base-account" for="cpf-user">CPF: <span class="required-account">*</span></label>
                            <input class="input-base-account cpf" id="cpf-user" type="tel" name="cpf-user" required value="<?php echo $user_data['cpf'] ?>">
                        </div>

                        <div class="input-content-account">
                            <label class="label-base-account" for="rg-user">RG: <span class="required-account">*</span></label>
                            <input class="input-base-account rg" id="rg-user" type="text" name="rg-user" required value="<?php echo $user_data['rg'] ?>">
                        </div>
                    </div>
                </div>

                <div class="block-info-account">
                    <hr>
                    <h2 class="second-title-account">Contato</h2>
                    <div class="row-account">
                        <div class="input-content-account">
                            <label class="label-base-account" for="tel-user">Telefone: <span class="required-account">*</span></label>
                            <input class="input-base-account telefone" id="tel-user" type="tel" name="tel-user" required value="<?php echo $user_data['telefone'] ?>">
                        </div>

                        <div class="input-content-account">
                            <label class="label-base-account" for="email-user">E-mail: <span class="required-account">*</span></label>
                            <input class="input-base-account" id="email-user" type="email" name="email-user" required value="<?php echo $user_data['email'] ?>">
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
                                    <input class="input-base-account cep" id="cep-user" type="tel" name="cep-user" maxlength="8" required oninput="sendCep(this)" value="<?php echo $user_data['cep'] ?>">
                                </div>

                                <div class="input-content-account" style="max-width: 100px;">
                                    <label class="label-base-account" for="uf-user">UF: <span class="required-account">*</span></label>
                                    <input class="input-base-account" style="text-transform: uppercase;" name="uf-user" maxlength="2" id="uf-user" type="text" required value="<?php echo $user_data['uf'] ?>">
                                </div>
                            </div>
                            <div style="width: 100%;"></div>
                        </div>

                        <div class="row-account">
                            <div class="input-content-account">
                                <label class="label-base-account" for="city-user">Cidade: <span class="required-account">*</span></label>
                                <input class="input-base-account" id="city-user" type="text" name="city-user" required value="<?php echo $user_data['cidade'] ?>">
                            </div>

                            <div class="input-content-account">
                                <label class="label-base-account" for="locate-user">Bairro: <span class="required-account">*</span></label>
                                <input class="input-base-account" id="locate-user" type="text" name="locate-user" required value="<?php echo $user_data['bairro'] ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block-info-account">
                    <hr>
                    <h2 class="second-title-account">Outros</h2>
                    <label for="children-user" class="checkbox-content-account">
                        <input class="checkbox-base-account" id="children-user" type="checkbox" name="chilren-user" <?php echo !!$user_data['possui_filhos'] ? 'checked' : ''; ?>>
                        <div class="checkbox-content">
                            <span class="checkbox-label" type="checkbox">
                                <i class="icon fa-solid fa-check" color="#3A74BD"></i>
                            </span>
                            <label class="label-base-account" for="children-user">Você possui filhos menores de 12 anos?</label>
                        </div>
                    </label>

                    <div class="row-account">
                        <label for="pet-user" class="checkbox-content-account">
                            <input class="checkbox-base-account" id="pet-user" name="pet-user" type="checkbox" <?php echo !!$user_data['possui_pet'] ? 'checked' : ''; ?>>

                            <div class="checkbox-content">
                                <span class="checkbox-label" type="checkbox">
                                    <i class="icon fa-solid fa-check" color="#3A74BD"></i>
                                </span>
                                <label class="label-base-account" for="pet-user">Você possui PET?</label>
                            </div>
                        </label>

                        <div class="input-content-account">
                            <!-- <label class="label-base-account" for= "cep-user" >Qual o porte?</label> -->
                            <select name="select-pet"
                                id="select-pet"
                                class="input-base-account"
                                style="display: <?php !!$user_data['possui_pet'] ? 'flex' : 'none'; ?>"
                                value="<?php echo $user_data['porte_pet'] ?>"
                            >
                                <option value="">Selecione o porte</option>
                                <option value="pequeno" <?php echo $user_data['porte_pet'] === 'pequeno'    ? "selected='true'" : ""?> >Pequeno porte</option>
                                <option value="medio"   <?php echo $user_data['porte_pet'] === 'medio'      ? "selected='true'" : ""?> >Médio porte</option>
                                <option value="grande"  <?php echo $user_data['porte_pet'] === 'grande'     ? "selected='true'" : ""?> >Grande porte</option>
                            </select>
                        </div>
                    </div>

                    <div class="column-account">
                        <div class="input-content-account">
                            <label class="label-base-account" for="question-eletro-user">Qual eletrodoméstico, utensílio domestico e/ou aparelho eletrônico você gostaria na sua unidade? </label>
                            <textarea class="input-base-account" id="question-eletro-user" name="question-eletro" rows="4" resize="vertical" maxlength="120"><?php echo $user_data['eletrodomesticos'] ?></textarea>
                        </div>

                        <div class="input-content-account">
                            <label class="label-base-account" for="tel-user">Qual serviço você gostaria que fosse oferecido pelo concierge quando sua unidade for entregue?</label>
                            <textarea class="input-base-account" id="tel-user" rows="4" resize="vertical" maxlength="120" name="question-service"><?php echo $user_data['servico_concierge'] ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="block-info-account">
                    <div class="button-area-account">
                        <button class="button-decor-account primary" type="submit" name="atualizar_dados">Atualizar meus dados</button>
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atualizar_dados'])) {
            // Verificar se o usuário está autenticado
            if (is_user_logged_in()) {
                // Obtém o ID do usuário atual
                $user_id = get_current_user_id();

                // Salvar campos personalizados usando update_user_meta
                update_user_meta($user_id, 'nome', sanitize_text_field($_POST['name-user']));
                update_user_meta($user_id, 'sobrenome', sanitize_text_field($_POST['lastname-user']));
                update_user_meta($user_id, 'cpf', sanitize_text_field($_POST['cpf-user']));
                update_user_meta($user_id, 'rg', sanitize_text_field($_POST['rg-user']));
                update_user_meta($user_id, 'telefone', sanitize_text_field($_POST['tel-user']));
                update_user_meta($user_id, 'email', sanitize_email($_POST['email-user']));
                update_user_meta($user_id, 'cep', sanitize_text_field($_POST['cep-user']));
                update_user_meta($user_id, 'uf', strtoupper(sanitize_text_field($_POST['uf-user'])));
                update_user_meta($user_id, 'cidade', sanitize_text_field($_POST['city-user']));
                update_user_meta($user_id, 'bairro', sanitize_text_field($_POST['locate-user']));
                update_user_meta($user_id, 'possui_filhos', isset($_POST['children-user']) ? 1 : 0);
                update_user_meta($user_id, 'possui_pet', isset($_POST['pet-user']) ? 1 : 0);
                update_user_meta($user_id, 'porte_pet', sanitize_text_field($_POST['select-pet']));
                update_user_meta($user_id, 'eletrodomesticos', sanitize_text_field($_POST['question-eletro']));
                update_user_meta($user_id, 'servico_concierge', sanitize_text_field($_POST['question-service']));

                $retorno = 'Dados alterados com sucesso!';
                returnFeedback($retorno);
            }
            else {
                $retorno = 'Erro interno ao alterar os dados!';
                returnFeedback($retorno);
            }
        }
    ?>

</body>

<style>
    #nav-menu {
        padding-bottom: 0;
    }
    .social-media-area {
        display: none;
    }
</style>