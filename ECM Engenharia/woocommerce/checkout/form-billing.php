<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;

$user_id = get_current_user_id();
$user_data = array(
	'nome'      => get_user_meta($user_id, 'nome', true),
	'sobrenome' => get_user_meta($user_id, 'sobrenome', true),
	'cpf'       => get_user_meta($user_id, 'cpf', true),
	'telefone'  => get_user_meta($user_id, 'telefone', true),

	'bairro'    => get_user_meta($user_id, 'bairro', true),
	'cep'       => get_user_meta($user_id, 'cep', true),
	'uf'        => get_user_meta($user_id, 'uf', true),
	'cidade'    => get_user_meta($user_id, 'cidade', true),
);
?>

<div class="woocommerce-billing-fields">
	<?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		<h3><?php esc_html_e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3>

	<?php else : ?>

		<h3><?php esc_html_e( 'Billing details', 'woocommerce' ); ?></h3>

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<div class="woocommerce-billing-fields__field-wrapper">
		<?php
		$fields = $checkout->get_checkout_fields( 'billing' );

		// Adicionando um campo CPF
		// $fields['billing_cpf'] = array(
		// 	'type'        => 'text',
		// 	'class'       => array('box-checkout-input','form-row-wide'),
		// 	'label'       => __('CPF', 'seu-text-domain'),
		// 	'placeholder' => __('Digite seu CPF', 'seu-text-domain'),
		// 	'required'    => true,
		// 	'default'	  => $user_data['cpf'],
		// );

		// Substituindo o valor doscampos
		$fields['billing_first_name']['default'] = $user_data['nome'];
		$fields['billing_last_name']['default'] = $user_data['sobrenome'];
		$fields['billing_postcode']['default'] = $user_data['cep'];
		$fields['billing_city']['default'] = $user_data['cidade'];
		$fields['billing_phone']['default'] = $user_data['telefone'];

		// $fields['billing_address_2']['default'] = $user_data['bairro'];
		// $fields['billing_address_2']['label_class'] = [];
		// $fields['billing_address_2']['label'] = 'Bairro';
		// $fields['billing_address_2']['placeholder'] = 'Bairro';

		// echo '<pre>';
		// print_r($fields['billing_address_2']);
		// print_r($fields['billing_phone']);
		// echo '</pre>';

		foreach ( $fields as $key => $field ) {
			$field['class'][] = 'box-checkout-input';
			woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
		}
		?>
	</div>

	<?php //do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div>

<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="woocommerce-account-fields">
		<?php if ( ! $checkout->is_registration_required() ) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

			<div class="create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	</div>
<?php endif; ?>
