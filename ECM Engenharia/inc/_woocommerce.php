<?php 

/**
 * Display field value on the order edit page
 */
add_action('woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1);

function my_custom_checkout_field_display_admin_order_meta($order)
{
    if (!empty(get_post_meta($order->id, 'billing_cpf')[0])) {
        echo '<p><strong>' . __('billing_cpf') . ':</strong> ' . get_post_meta($order->id, 'billing_cpf', true) . '</p>';
    }
}


?>