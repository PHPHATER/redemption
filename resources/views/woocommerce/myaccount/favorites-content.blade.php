<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_business', $favorites_count ); ?>

<?php if ( $favorites_count ) : ?>

	<div class="archive_main_sections minimal_view">
		<?php while ( $customer_favorites->have_posts() ) : $customer_favorites->the_post(); ?>
			<?php get_template_part('templates/content', 'companies' ); ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>

	<?php do_action( 'woocommerce_before_account_business_pagination' ); ?>

	<?php if ( 1 < $favorites_count ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $favorites_count ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'favorites', $favorites_count - 1 ) ); ?>"><?php _e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $has_business ) !== $favorites_count ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'favorites', $favorites_count + 1 ) ); ?>"><?php _e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>

	<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
			<?php _e( 'Go my account', 'woocommerce' ) ?>
		</a>
		<?php _e( 'No favorites was found.', 'woocommerce' ); ?>
	</div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_account_business', $favorites_count ); ?>