<?php /*
  Plugin Name: Woocommerce Hide Add to Cart
  Description: Hiding woocommerce add to cart button from entire shop.
  Author: Softscripts
  Author URI: http://www.softscripts.net
  Version: 1.0
 */

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

function remove_loop_button(){
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
}
add_action('init','remove_loop_button');
}

// this hook will cause our creation function to run when the plugin is activated
register_activation_hook( __FILE__, 'whc_plugin_install' );

function whc_plugin_install() {
	global $wpdb; // do NOT forget this global

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		}	
	 else {
			deactivate_plugins( 'hide-woo-add-to-cart/hide-woo-add-to-cart.php', false );
		wp_die( "<strong>Woocommerce Hide Add to cart Plugin</strong> requires <strong>Woocommerce Plugin</strong> and has been deactivated! Please install/activate <strong>Woocommerce Plugin</strong> and try again.<br /><br />Back to the WordPress <a href='".get_admin_url(null, 'plugins.php')."'>Plugins page</a>.");
		}
}
?>
