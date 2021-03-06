<?php
/**
 * Mini Cart
 *
 * Contains the markup for mini-cart used in header
 *
 * @package electro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$header_cart_icon             = apply_filters( 'electro_header_cart_icon', 'ec ec-shopping-bag' );
$disable_header_cart_dropdown = apply_filters( 'electro_header_cart_dropdown_disable', false );


if ( is_woocommerce_activated() && electro_get_shop_catalog_mode() == false ) : ?>

<ul class="navbar-mini-cart navbar-nav animate-dropdown nav float-end flip">
	<?php if ( ! $disable_header_cart_dropdown ) : ?>
	<li class="nav-item dropdown">
		<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="nav-link" data-bs-toggle="dropdown">
			<i class="<?php echo esc_attr( $header_cart_icon ); ?>"></i>
			<span class="cart-items-count count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
			<span class="cart-items-total-price total-price"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
		</a>
		<ul class="dropdown-menu dropdown-menu-mini-cart">
			<li>
				<div class="widget_shopping_cart_content border-bottom-0-last-child">
				  <?php woocommerce_mini_cart();?>
				</div>
			</li>
		</ul>
	</li>
	<?php else : ?>
	<li class="nav-item">
		<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="nav-link">
			<i class="<?php echo esc_attr( $header_cart_icon ); ?>"></i>
			<span class="cart-items-count count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
			<span class="cart-items-total-price total-price"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
		</a>
	</li>
	<?php endif; ?>
</ul>
<?php endif; ?>
