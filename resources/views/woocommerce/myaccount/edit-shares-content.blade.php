<?php

if( !$customer_shares ){
	?>

		<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
			<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
				<?php _e( 'Go my account', 'woocommerce' ) ?>
			</a>
			<?php _e( 'Sorry, you can\'t do this.', 'woocommerce' ); ?>
		</div>

	<?php
}else{ ?>
<div class="woocommerce-login-form-wrapper">
	<h2>Add new Shares</h2>
	<form enctype="multipart/form-data" class="woocommerce-form-login woocommerce-form" method="post">

		<?php do_action( 'woocommerce_edit_shares_form_start' ); ?>

		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-wide">
			<label for="shares_quantity"><?php esc_html_e( 'Enter Shares quantity', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="shares_quantity" id="shares_quantity"
			value="" />
		</p>
		<div class="clear"></div>

		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-wide">
			<label for="shares_user_date"><?php esc_html_e( 'Enter Shares buyed date', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="shares_user_date" id="shares_user_date"
			value="" />
		</p>
		<div class="clear"></div>

		<?php do_action( 'woocommerce_edit_shares_form' ); ?>

		<p class="woocommerce-form-login__submit">
			<?php wp_nonce_field( 'save_shares_details', 'save-shares-details-nonce' ); ?>
			<button type="submit" class="btn wc_first_step btn-secondary btn-block" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
			<input type="hidden" name="action" value="save_shares_details" />
		</p>

		<?php do_action( 'woocommerce_edit_business_form_end' ); ?>

	</form>
</div>

<?php

}
