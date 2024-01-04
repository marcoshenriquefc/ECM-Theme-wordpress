<?php
require_once('inc/custom_post_type.php');
require_once('inc/nav_menu.php');
require_once('inc/ecmFuncs.php');
require_once('inc/_woocommerce.php');


function ecmEngenharia()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'ecmEngenharia');

function add_menuclass($ulclass)
{
    return preg_replace('/<a /', '<a class="menu-item"', $ulclass);
}
add_filter('wp_nav_menu', 'add_menuclass');


function salvar_dados_cf7($cf7) {
    if ($cf7->id() == 249) {
        $submission = WPCF7_Submission::get_instance();
        if ($submission) {
            $posted_data = $submission->get_posted_data();

            // Verifica se o campo checkbox foi enviado no formulário
            if (isset($_POST['checkbox-944'])) {
                // O valor de $_POST['checkbox_name'] será um array com índices correspondentes às opções selecionadas
                $opcoesSelecionadas = $_POST['checkbox-944'];

                // Inicializa uma variável para armazenar as opções concatenadas
                $opcoesConcatenadas = '';

                // Loop pelas opções selecionadas e concatena na variável $opcoesConcatenadas
                foreach ($opcoesSelecionadas as $opcao) {
                    // Concatena a opção com a variável, separada por vírgula
                    $opcoesConcatenadas .= $opcao . ',';
                }

                // Remove a última vírgula da string concatenada, se houver
                $opcoesConcatenadas = rtrim($opcoesConcatenadas, ',');
            } else {
                // Nenhuma opção foi selecionada
                $opcoesConcatenadas =  "Nenhuma opção foi selecionada.";
            }

            global $wpdb;

            $tabela = 'wpyy_formularioDbECM';

            $wpdb->insert(
                $tabela,
                array(
                    'Nome' => $posted_data['your-name'],
                    'Email' => $posted_data['your-email'],
                    'Telefone' => $posted_data['tel-655'],
                    'Empreendimento' => $opcoesConcatenadas,
                    'CheckboxNovidades' => $posted_data['acceptance-239'],
                    'CheckboxLGPD' => $posted_data['acceptance-260'],
                )
            );
        }
    }
}

add_action('wpcf7_before_send_mail', 'salvar_dados_cf7');

// Desativar parágrafos automáticos no Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

// Remover as tags <p> e <span> do formulário do Contact Form 7
add_filter('wpcf7_form_elements', function ($content) {
    $content = preg_replace('/<p>(.*?)<\/p>|<span(.*?)>(.*?)<\/span>/', '$1$3', $content);
    return $content;
});


// Função para obter todas as categorias do WooCommerce
function get_all_categories()
{
    $args = array(
        'taxonomy' => 'product_cat',
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => false, // Mostrar categorias mesmo se não houver produtos associados
    );

    $categories = get_terms($args);

    return $categories;
}

// Função para obter todos os produtos de uma categoria específica
function get_products_by_category($category_id)
{
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $category_id,
            ),
        ),
    );

    $products = get_posts($args);

    return $products;
}

function ecm_theme()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'ecm_theme', 0);



add_filter('woocommerce_checkout_fields', 'remover_campo_billing_company');

function remover_campo_billing_company($fields)
{
    // Verifica se o campo billing_company existe e o remove
    if (isset($fields['billing']['billing_company'])) {
        unset($fields['billing']['billing_company']);
    }
    if (isset($fields['billing']['billing_address_1'])) {
        unset($fields['billing']['billing_address_1']);
    }
    if (isset($fields['billing']['billing_address_2'])) {
        unset($fields['billing']['billing_address_2']);
    }

    return $fields;
}

// Redirecionar para /meus-pedidos após a conclusão da compra
function redirecionar_apos_compra($order_id)
{
    $order = wc_get_order($order_id);

    // Certificar-se de que a ordem é válida e o redirecionamento é necessário
    if ($order && apply_filters('woocommerce_thankyou_order_received_text', $order->get_status()) == 'processing') {
        $redirect_url = home_url('/minha-conta');
        wp_safe_redirect($redirect_url);
        exit;
    }
}


// Adiciona um gancho para verificar e limpar o carrinho antes de adicionar um novo item
function limitar_um_item_no_carrinho($cart_item_data, $product_id) {
    // Obtém a instância do carrinho
    $cart_instance = WC()->cart;

    // Limpa o carrinho antes de adicionar um novo item
    $cart_instance->empty_cart();

    // Retorna os dados do item que está sendo adicionado
    return $cart_item_data;
}
add_filter('woocommerce_add_cart_item_data', 'limitar_um_item_no_carrinho', 10, 2);

// add_action('woocommerce_thankyou', 'redirecionar_apos_compra', 10, 1);


//add ACF rule
// add_filter('acf/location/rule_values/post_type', 'acf_location_rule_values_Post');
// function acf_location_rule_values_Post( $choices ) {
// 	$choices['product_variation'] = 'Product Variation';
//     //print_r($choices);
//     return $choices;
// }

// function xxx_admin_head_post() {
//     global $post_type;
//     if ($post_type === 'product') {
//         wp_register_script('xxx-acf-variation', get_template_directory_uri() . '/js/acf-variation.js', array(
//             'jquery-core',
//             'jquery-ui-core'
//         ), '1.1.0', true);

//         wp_enqueue_script('xxx-acf-variation');
//     }
// }

/* Adiciona ações quando adicionando/editando posts ou pages */
/* admin_head-(hookname) */
// add_action('admin_head-post.php', 'xxx_admin_head_post');
// add_action('admin_head-post-new.php', 'xxx_admin_head_post');

// add_action('woocommerce_save_product_variation', function($variation_id, $loop_index) {
//     if (!isset($_POST['acf_variation'][$variation_id])) {
//         return;
//     }

//     if (!empty($_POST['acf_variation'][$variation_id]) && is_array($fields = $_POST['acf_variation'][$variation_id])) {
//         foreach ($fields as $key => $val) {
//             update_field($key, $val, $variation_id);
//         }
//     }
// }, 10, 2);