<?php

?>

<div class="user_dashboard">
	<div class="user_dashboard__shares">
		<?php $count = 0; if( $customer_shares ){
			foreach ( $customer_shares as $share ) {
				$iteration = get_post_meta( $share->ID, 'shares_quantity', true );
				$count += $iteration;
			}
		}
		?>

		<div class="user_dashboard__chart">
			<?php echo do_shortcode( '[chart_content value="'. $count .'" measurement="" ]' ) ?>
		</div>
		<div class="user_dashboard__descr">
			<h2>Our Current Progress Buying GE</h2>
			<p>Nice work!</p>
		</div>

	</div>

	<div class="user_dashboard__companies">
		<?php 
		if( $customer_businesses ){
			?>
			<h5>Your last companies:</h5>

			<div class="archive_main_sections minimal_view">
				<?php

				while ( $customer_businesses->have_posts() ) : $customer_businesses->the_post();
					get_template_part('templates/content', 'companies' );
				endwhile;

				wp_reset_postdata();
				?>
			</div>
			<?php
		}
		?>
	</div>
</div>