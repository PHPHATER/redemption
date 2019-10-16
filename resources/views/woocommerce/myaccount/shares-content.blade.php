<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_shares', $has_shares ); ?>

<?php if ( $has_shares ) : ?>

	<div class="woocommerce-MyAccount-business-addNew">
		<a class="btn btn-primary" href="<?php echo esc_url( wc_get_endpoint_url( 'shares', 'add-new', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
			<?php _e( 'Add New Shares', 'woocommerce' ); ?>
		</a>
	</div>

	<div class="archive_main_sections minimal_view">
		<?php $total = 0; while ( $customer_shares->have_posts() ) : $customer_shares->the_post(); ?>
			<?php get_template_part('templates/content', 'shares' ); ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $has_shares ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $has_shares ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'shares', $has_shares - 1 ) ); ?>"><?php _e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $has_shares ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'shares', $has_shares + 1 ) ); ?>"><?php _e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>

	<div class="woocommerce-MyAccount-business-addNew">
		<a class="woocommerce-button woocommerce-Button button" href="<?php echo esc_url( wc_get_endpoint_url( 'shares', 'add-new', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
			<?php _e( 'Add New Shares', 'woocommerce' ); ?>
		</a>
	</div>

	<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
			<?php _e( 'Go My account', 'woocommerce' ) ?>
		</a>
		<?php _e( 'No shares has been added yet.', 'woocommerce' ); ?>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_shares', $has_shares ); ?>
