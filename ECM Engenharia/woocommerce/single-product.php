<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

// Obtém a instância do carrinho
$cart_instance = WC()->cart;

// Limpa o carrinho
$cart_instance->empty_cart();

function redirectToLogin() {
	ob_start(); // Inicia o buffer de saída

	wp_redirect(home_url());
	
	ob_end_flush(); // Limpa o buffer e envia a saída para o navegador
	exit();
}

function validItemOnUser($user_id, $item_id) {
	$lista_unidades =  unserialize(get_user_meta($user_id, 'lista_unidades', true));
	$unidade_atual = null;

	foreach ($lista_unidades as $item) {
		if ($item['id'] == $item_id) {
			$unidade_atual = $item;
			break;
		}
	}

	if (!$unidade_atual) {
		redirectToLogin();
	}
	if (!$unidade_atual['data_entrega']) {
		redirectToLogin();
	}

	// Date
	$data_atual = new DateTime();
	$data_entrega = new DateTime($unidade_atual['data_entrega']);

	$diferenca_meses = $data_atual->diff($data_entrega)->m + ($data_atual->diff($data_entrega)->y * 12);

	if ($diferenca_meses < 5) {
		redirectToLogin();
	}
}


// get_header('shop'); 
?>


<?php
	$user_id = '';

	if (is_user_logged_in()) {
		$user_id = get_current_user_id();

		// print_r($user_id);
	}
	else {
		redirectToLogin();
	}

	validItemOnUser($user_id, get_the_ID());
	get_header(); 
?>

<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
// do_action('woocommerce_before_main_content');
?>

<?php

function getProductImages($product, $product_id) {
	$main_image_id = get_post_thumbnail_id($product_id);
	$main_image_url = wp_get_attachment_image_url($main_image_id, 'full');

	$gallery_attachment_ids = get_post_meta($product_id, '_product_image_gallery', true);

	
	$galery_images_list = [];
	if ($gallery_attachment_ids) {
		// Converta os IDs da galeria em uma matriz
		$gallery_attachment_ids = explode(',', $gallery_attachment_ids);
	
		// Itere sobre os IDs da galeria e obtenha as URLs das imagens
		foreach ($gallery_attachment_ids as $gallery_image_id) {
			$gallery_image_url = wp_get_attachment_image_url($gallery_image_id, 'full');
			// Faça algo com $gallery_image_url

			$galery_images_list[] = $gallery_image_url;
		}
	}

	$images_data = [
		'main_image' 	=> $main_image_url,
		'galery' 		=> $galery_images_list
	];


		
	// Substitua 'field_name' pelo nome do seu campo ACF e $product_id pelo ID do seu produto ou variação
	$field_value = get_field('galery_variation', $product_id);

	// Verifique se o valor do campo está presente
	if ($field_value) {
		// Faça algo com o valor obtido
		print_r($field_value);
	} else {
		// Caso o valor não esteja presente
		echo 'Campo não preenchido ou não encontrado.';
	}


	return $images_data;
}

function getProductVariation($product) {
	if ($product->is_type('variable')){
		$variation_ids = $product->get_children();


		if (!empty($variation_ids)) {

			$variation_list = [];

			foreach ($variation_ids as $variation_id) {
				// Objeto da variação
				$variation_obj = wc_get_product($variation_id);

				$variation_description = $variation_obj->get_description();
				// Atributos da variação
				$variation_attributes = $variation_obj->get_variation_attributes();

				
				echo '<pre>';
				echo '------------------';
				print_r($variation_id);
				print_r($variation_description);
				echo '</pre>';
				
				$variation_list[] = $variation_attributes;
			}

			$new_array = [];
			foreach ($variation_list as $item) {
				// Obter o valor associado dinamicamente
				// Obtemos o primeiro valor do array associativo
				$dynamic_value = reset($item);
			
				// Adicionar o valor ao novo array
				$new_array[] = $dynamic_value;
			}

			return $new_array;	
		}
	}

	return [];
}


// Inicie o loop do WordPress
while (have_posts()) :
	the_post();

	// Inicialize o produto do WooCommerce
	$product = wc_get_product(get_the_ID());
	
	// Chama a função para exibir os grupos de campos
	$field_groups_output = wapf_display_field_groups_for_product($product);
	$variation_data = wapf_get_field_groups_of_product($product);

	$title_item = $product->get_title();
	$images = getProductImages($product, get_the_ID());

	$variation_list = getProductVariation($product);

	foreach ($variation_data as $fieldGroup) {
		// Loop através dos campos
		foreach ($fieldGroup->fields as $value) {
			// print_r($value->options['choices']);

			$choices = $value->options['choices'];
			// echo "<pre>";
			// print_r($value);
			// echo "</pre>";
		};
	}
?>

<?php //foreach ($choices as $key => $value) : ?>
<?php //endforeach ?>


<?php
	// **** CONTEÚDO SOBRE A UNIDADE AQUI **** //
	// the_content();
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<main id="main-base-account" class="center-section full-width">
			<section id="content-account" class="product-area-content">
				<section id="build-area">
					<header class="build-header">
						<p class="build-title"><?php echo$title_item ?> </p>

						<button class="return-button" onclick="enableVariationChoice()">
							<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
								<path d="M0.475032 5.28327C0.179207 5.5732 0.17443 6.04805 0.464362 6.34388L5.18907 11.1646C5.47901 11.4604 5.95386 11.4652 6.24968 11.1753C6.54551 10.8854 6.55028 10.4105 6.26035 10.1147L2.06061 5.82958L6.34571 1.62983C6.64154 1.3399 6.64632 0.865053 6.35638 0.569228C6.06645 0.273403 5.5916 0.268626 5.29578 0.558558L0.475032 5.28327ZM13.0075 5.18967L1.00754 5.06895L0.992455 6.56887L12.9925 6.6896L13.0075 5.18967Z" fill="black" />
							</svg>
							VOLTAR
						</button>
					</header>

					<hr>

					<section class="select-vatiation-buttons">
						<?php foreach($variation_list as $item_variation) : ?>
							<button class="variation-info" onclick="selectCombo('<?php echo $item_variation ?>')">
								<?php echo $item_variation ?>
							</button>
						<?php endforeach ?>
					</section>

					<section class="build-content disabled">
						<div class="build-preview">
							<p class="build-classification"> CLASSIC </p>

							<img class="main-image" src="<?php echo $images['main_image'] ?>" alt="empreendimento" class="build-preview-image">

							<p class="build-price-options">ADICIONAIS <span class="value">R$ 0,00</span></p>
							<p class="build-price">TOTAL <span class="value">R$ 0,00</span></p>
						</div>

						<div class="build-gallery">
							<p class="gallery-title">GALERIA</p>

							<?php if(count($images['galery']) > 0) : ?>
								<div class="build-gallery-images">
									<?php foreach($images['galery'] as $current_image_galery) : ?>
										<a href="<?php echo $current_image_galery ?>" target="_blank">
											<img src="<?php echo $current_image_galery ?>" alt="" class="gallery-image">
										</a>
									<?php endforeach ?>
								</div>
							<?php endif ?>

							<!-- <div class="build-description">
								<p class="product-text">DESCRIÇÃO</p>

								<?php
									//woocommerce_variable_add_to_cart();
								?>
							</div> -->

							<div class="build-products">
								<p class="product-text">QUERO ADICIONAR TAMBÉM</p>
								<div class="products-items">
									<?php
										woocommerce_variable_add_to_cart();
										do_action('woocommerce_single_product');
									?>
								</div>
							</div>
						</div>
					</section>
				</section>
			</section>
		</main>
	</article>


	<?php
		// $variation_galery = [
		// 	[
		// 		['id'] => 'x',
		// 		['name'] => 'name',
		// 		['galery_images'] => []
		// 	],
		// ]
	?>

	<script>
		const $selectNode = document.querySelector('.build-products #select-woocommerce-combo select');
		const $checkboxNode = document.querySelectorAll('.build-products .single_variation_wrap input[type="checkbox"]');
		$selectNode.addEventListener('change', updateValue);
		$checkboxNode.forEach(function(checkbox) {
			checkbox.addEventListener('change', updateValue);
		});

		function updateValue() {
			const $optionsPrice = document.querySelector('.wapf-options-total');
			const $grandPrice = document.querySelector('.wapf-grand-total');
			const $total = document.querySelector('.build-price .value');
			const $totalOptions = document.querySelector('.build-price-options .value');

			setTimeout(function() {
				$total.innerText = $grandPrice ? $grandPrice.innerText : '';
				$totalOptions.innerText = $optionsPrice ? $optionsPrice.innerText : '';
			}, 50)
		}

		function updateTitle(title) {
			const $title = document.querySelector('.wapf-options-total');

			if ($title ) {
				$title.innerHTML = title;
			}
		}

		function selectCombo(data) {
			const optionToSelect = Array.from($selectNode.options).find(option => option.value === data);

			if (optionToSelect) {
				$selectNode.value = data;
				const event = new Event('change', {
					bubbles: true
				});
				$selectNode.dispatchEvent(event);
				// $selectNode.dispatchEvent(event);

				updateTitle(data);
				enableBuildContent();
			}
		}

		function cleanCoise() {
			const $buttonReset = document.querySelector('reset_variations')

			$buttonReset.dispatchEvent(event);
		}

		function enableVariationChoice() {
			const $variationHtml = document.querySelector('.select-vatiation-buttons');
			const $buildContentHtml = document.querySelector('.build-content');

			
			$variationHtml.classList.remove('disabled')
			$buildContentHtml.classList.add('disabled')
			cleanCoise();
		}

		function enableBuildContent() {
			const $variationHtml = document.querySelector('.select-vatiation-buttons');
			const $buildContentHtml = document.querySelector('.build-content');

			console.log($buildContentHtml)


			$variationHtml.classList.add('disabled')
			$buildContentHtml.classList.remove('disabled')
		}
	</script>

<?php endwhile; ?>


<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */

do_action('woocommerce_after_main_content');
?>

<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );
?>

<?php
// get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

get_footer(); 
?>



<style>
	#main-footer {
		display: none;
	}
    #nav-menu {
        padding-bottom: 0;
    }
    .social-media-area {
        display: none;
    }

	table.variations,
	table.variations td,
	table.variations th,
	.wapf-product-totals .wapf--inner{
		opacity: 0;
		width: 0;
		height: 0;
		margin: 0;
	}

	.build-description .woocommerce-variation-price,
	.build-description .woocommerce-variation-availability,
	.build-description .woocommerce-variation-add-to-cart {
		display: none;
	}
</style>