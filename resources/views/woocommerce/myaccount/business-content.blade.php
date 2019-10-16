<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_business', $has_business ); ?>

<?php if ( $has_business ) : ?>

	<div class="woocommerce-MyAccount-business-addNew">
		<a class="btn btn-primary" href="<?php echo esc_url( wc_get_endpoint_url( 'business', 'add-new', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
			<?php _e( 'Add New Business', 'woocommerce' ); ?>
		</a>
	</div>


	<div class="archive_main_sections minimal_view">
		<?php while ( $customer_businesses->have_posts() ) : $customer_businesses->the_post(); ?>
			<?php get_template_part('templates/content', 'user-companies' ); ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>

	<?php do_action( 'woocommerce_before_account_business_pagination' ); ?>

	<?php if ( 1 < $has_business ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'business', $current_page - 1 ) ); ?>"><?php _e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $has_business ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'business', $current_page + 1 ) ); ?>"><?php _e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>
	<div class="woocommerce-MyAccount-business-addNew">
		<a class="woocommerce-button woocommerce-Button button" href="<?php echo esc_url( wc_get_endpoint_url( 'business', 'add-new', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
			<?php _e( 'Add New Business', 'woocommerce' ); ?>
		</a>
	</div>
	<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
			<?php _e( 'Go my account', 'woocommerce' ) ?>
		</a>
		<?php _e( 'No business was found.', 'woocommerce' ); ?>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_business', $has_business ); ?>
