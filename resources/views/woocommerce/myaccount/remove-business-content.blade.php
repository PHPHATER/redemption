<?php

if( !$customer_business ){
	?>

		<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
			<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
				<?php _e( 'Go my account', 'woocommerce' ) ?>
			</a>
			<?php _e( 'Sorry, you can\'t do this.', 'woocommerce' ); ?>
		</div>

	<?php
}else{

?>

<div class="woocommerce-login-form-wrapper">
	<h2>Delete Company</h2>
<form method="post" class="woocommerce-form-login woocommerce-form">

	<h3>Are you sure?</h3>
	<p>You want to delete <?php echo $customer_business->post_title; ?>?</p>


	<?php do_action( 'woocommerce_remove_business_form' ); ?>

	<p class="woocommerce-form-login__submit">
		<?php wp_nonce_field( 'save_business_details', 'save-business-details-nonce' ); ?>
		<input type="hidden" name="id" value="<?php echo $customer_business->ID; ?>" />
		<button type="submit" class="btn wc_first_step btn-secondary btn-block" name="remove_business" value="<?php esc_attr_e( 'Delete', 'woocommerce' ); ?>"><?php esc_html_e( 'Delete', 'woocommerce' ); ?></button>
		<a class="btn btn-primary btn-block" href="<?php echo esc_url( wc_get_endpoint_url( 'business', '', wc_get_page_permalink( 'myaccount' ) ) ); ?>"><?php esc_attr_e( 'Cancel', 'woocommerce' ); ?></a>
		<input type="hidden" name="action" value="remove_business" />
	</p>
</form>

<?php

}
