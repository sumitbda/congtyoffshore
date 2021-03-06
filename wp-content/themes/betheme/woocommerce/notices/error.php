<?php
/**
 * Show error messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/error.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version		3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! $messages ){
	return;
}

?>

<?php foreach ( $messages as $message ) : ?>
	<div class="woocommerce-error alert alert_error" role="alert">

		<div class="alert_icon"><i class="icon-alert"></i></div>

		<div class="alert_wrapper">

			<?php
				// WC < 3.5 backward compatibility
				if( version_compare( WC_VERSION, '3.5', '<' ) ){
					echo wp_kses_post( $message );
				} else {
					echo wc_kses_notice( $message );
				}
			?>

		</div>

		<a class="close" href="#"><i class="icon-cancel"></i></a>

	</div>
<?php endforeach; ?>
