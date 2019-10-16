<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image = get_user_meta( get_current_user_id(), '_user_featured', true );

do_action( 'woocommerce_before_account_navigation' );
?>

<div class="woocommerce-MyAccount-navigation">
	<nav class="">
		<div class="user_account__image <?php echo( $image ? 'added_image' : 'no_image' ); ?>">
			<div class="user_account__image_content">
				<?php

					if( $image ){
						echo wp_get_attachment_image( $image, 'large' );
					}else{
						?>
						<form id="user-dropzone" action="<?php echo admin_url('admin-ajax.php') . '?action=upload_customer_image&nonce=' . wp_create_nonce( date( 'Y_m_d_H' ) ); ?>" class="to_uploads dropzone">
							<div class="dz-message"><img src="@asset('images/no_image.png')" alt="no_image"><p>+ Add Photo</p></div>
						</form>
						<?php
					}

				?>
			</div>
			<div class="image_actions">
				<button type="button" class="remove_user_image">Remove Photo</button>
			</div>
		</div>
		<ul>
			<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
				<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
					<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</nav>
</div>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
