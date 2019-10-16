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
	<form enctype="multipart/form-data" method="post">

		<?php do_action( 'woocommerce_edit_business_form_start' ); ?>


		<div class="edit_business">
			<div class="edit_business__top">
				<div class="edit_business__tab active" data-target_id="contacts">
					<div class="edit_business__tab_inner">
						1. Contacts
					</div>
				</div>
				<div class="edit_business__tab" data-target_id="about">
					<div class="edit_business__tab_inner">
						2. About Business
					</div>
				</div>
				<div class="edit_business__tab" data-target_id="description">
					<div class="edit_business__tab_inner">
						3. Description and Photo
					</div>
				</div>
			</div>

			<div class="edit_business__content">
				<div id="contacts" class="edit_business__tab_content active">
					<div class="woocommerce-form-login woocommerce-form">

						<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-wide">
							<label for="business_name"><?php esc_html_e( 'Business name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="business_name" id="business_name"
							value="<?php echo esc_attr( $customer_business->post_title ); ?>" />
						</p>
						<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-wide">
							<label for="field_business_phone">Business phone number&nbsp;<span class="required">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="business_phone" id="field_business_phone" value="<?php echo esc_attr( get_post_meta( $customer_business->ID, 'business_phone', true ) ); ?>" />
						</p>
						<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-wide">
							<label for="field_business_email">Business email&nbsp;<span class="required">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="business_email" id="field_business_email" value="<?php echo esc_attr( get_post_meta( $customer_business->ID, 'business_email', true ) ); ?>">
						</p>
						<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-wide">
							<label for="field_business_address">Business address&nbsp;<span class="required">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="business_address" id="field_business_address" value="<?php echo esc_attr( get_post_meta( $customer_business->ID, 'business_address', true ) ); ?>">
						</p>
						<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-wide">
							<label for="field_business_city">Business city&nbsp;<span class="required">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="business_city" id="field_business_city" value="<?php echo esc_attr( get_post_meta( $customer_business->ID, 'business_city', true ) ); ?>">
						</p>

						<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-wide">
							<label for="field_business_state">Business state&nbsp;<span class="required">*</span></label>
							<select name="business_state" id="field_business_state" class="woocommerce-Select styler">
								<option value="">Select one</option>
								<?php
									$woo_countries = new \WC_Countries();
									$default_country = $woo_countries->get_base_country();
									$states = $woo_countries->get_states( $default_country );

									$opt_key = get_post_meta( $customer_business->ID, 'business_state', true );

									foreach ( $states as $key => $value ) {
										if( $opt_key == $key ){
											echo '<option selected value="'. $key .'">'. $value .'</option>';
										}else{
											echo '<option value="'. $key .'">'. $value .'</option>';
										}
									}
								?>
							</select>
						</p>

						<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-wide">
							<label for="field_business_zip">Business zip&nbsp;<span class="required">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="business_zip" id="field_business_zip" value="<?php echo esc_attr( get_post_meta( $customer_business->ID, 'business_zip', true ) ); ?>">
						</p>

						<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-wide next_wrapper">
							<button type="button" class="btn btn-secondary coompany_next_step coompany_next_step"><i class="icon icon_btn_next"></i> Continue</button>
						</p>

					</div>
				</div>

				<div id="about" class="edit_business__tab_content">
					<div class="business_category">
						<h6><i class="icon icon_categories"></i>Business category</h6>
						<div class="business_category_content">
							<?php
								$categories = get_categories([
									'taxonomy' => 'companies_cat',
									'type'     => 'companies',
									'orderby'  => 'name',
									'order'    =>  'ASC',
									'hide_empty'   => 0,
								]);

								$current_categories = wp_get_object_terms( $customer_business->ID, 'companies_cat', ['fields' => 'ids'] );

							?>
							<?php
								if( $categories ){
									foreach ( $categories as $value ) {
										if( in_array( $value->term_id, $current_categories ) ){
											echo '<label for="business_cat_'. $value->term_id .'">';
												echo '<input type="radio" class="styler" id="business_cat_'. $value->term_id .'" name="business_category" value="'. $value->term_id .'" checked="checked" >';
												echo $value->name;
											echo '</label>';
										}else{
											echo '<label for="business_cat_'. $value->term_id .'">';
												echo '<input type="radio" class="styler" id="business_cat_'. $value->term_id .'" name="business_category" value="'. $value->term_id .'">';
												echo $value->name;
											echo '</label>';
										}
									}
								}
							?>
						</div>
					</div>

					<div class="business_distances">
						<h6><i class="icon icon_distances"></i>Distance</h6>
						<div class="business_distances_content">
							<?php

								$selected_distance = get_post_meta( $customer_business->ID, 'business_zone', true );

								foreach ( get_business_distances()  as $key => $value ) {
									if( $selected_distance == $key ){
										echo '<label for="business_dist_'. $key .'">';
											echo '<input type="radio" class="styler" id="business_dist_'. $key .'" name="business_zone" value="'. $key .'" checked="checked" >';
											echo $value;
										echo '</label>';
									}else{
										echo '<label for="business_dist_'. $key .'">';
											echo '<input type="radio" class="styler" id="business_dist_'. $key .'" name="business_zone" value="'. $key .'">';
											echo $value;
										echo '</label>';
									}
								}

							?>
						</div>
					</div>

					<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-wide next_wrapper">
						<button type="button" class="btn btn-secondary coompany_next_step coompany_next_step"><i class="icon icon_btn_next"></i> Continue</button>
					</p>
				</div>

				<div id="description" class="edit_business__tab_content">

					<p class="woocommerce-form-row woocommerce-form-row form-row form-row-wide">
						<label for="business_description"><i class="icon icon_description"></i><?php esc_html_e( 'Description', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<textarea class="woocommerce-Textarea woocommerce-Textarea--text input-text" rows="6" name="business_description" id="business_description"><?php echo esc_attr( $customer_business->post_content ); ?></textarea>
					</p>

					<div class="business_worktime">
						<h6><i class="icon icon_worktime"></i>Work Time</h6>
						<div class="business_worktime__content">
							<div class="business_worktime__content_row">
								<label for="mn-fr">
									<input type="checkbox" class="styler" name="week_mn-fr" id="mn-fr" <?php checked( get_post_meta( $customer_business->ID, 'week_mn-fr', true ), true, true ); ?> value="1">
									Monday-Friday
								</label>
								<div class="time_selects">
									<label for="mn-fr-from">
										From:
										<select id="mn-fr-from" name="mn-fr-from" class="styler">
											<?php
												$selected = get_post_meta( $customer_business->ID, 'mn-fr-from', true );

												foreach ( get_work_time() as $value ) {
													if( $value == $selected ){
														echo '<option value="'. $value .'" selected="selected">'. $value .'</option>';
													}else{
														echo '<option value="'. $value .'">'. $value .'</option>';
													}
												}
											?>
										</select>
									</label>
									<label for="mn-fr-to">
										To:
										<select id="mn-fr-to" name="mn-fr-to" class="styler">
											<?php
												$selected = get_post_meta( $customer_business->ID, 'mn-fr-to', true );

												foreach ( get_work_time() as $value ) {
													if( $value == $selected ){
														echo '<option value="'. $value .'" selected="selected">'. $value .'</option>';
													}else{
														echo '<option value="'. $value .'">'. $value .'</option>';
													}
												}
											?>
										</select>
									</label>
								</div>
							</div>

							<div class="business_worktime__content_row">
								<label for="sunday">
									<input type="checkbox" name="week_sunday" id="sunday" class="styler" <?php checked( get_post_meta( $customer_business->ID, 'week_sunday', true ), true, true ); ?> value="1">
									Sunday
								</label>
								<div class="time_selects">
									<label for="sunday-from">
										From:
										<select id="sunday-from" name="sunday-from" class="styler">
											<?php
												$selected = get_post_meta( $customer_business->ID, 'sunday-from', true );

												foreach ( get_work_time() as $value ) {
													if( $value == $selected ){
														echo '<option value="'. $value .'" selected="selected">'. $value .'</option>';
													}else{
														echo '<option value="'. $value .'">'. $value .'</option>';
													}
												}
											?>
										</select>
									</label>
									<label for="sunday-to">
										To:
										<select id="sunday-to" name="sunday-to" class="styler">
											<?php
												$selected = get_post_meta( $customer_business->ID, 'sunday-to', true );

												foreach ( get_work_time() as $value ) {
													if( $value == $selected ){
														echo '<option value="'. $value .'" selected="selected">'. $value .'</option>';
													}else{
														echo '<option value="'. $value .'">'. $value .'</option>';
													}
												}
											?>
										</select>
									</label>
								</div>
							</div>

							<div class="business_worktime__content_row">
								<label for="saturday">
									<input type="checkbox" name="week_saturday" id="saturday" class="styler" <?php checked( get_post_meta( $customer_business->ID, 'saturday', true ), true, true ); ?> value="1">
									Saturday
								</label>
								<div class="time_selects">
									<label for="saturday-from">
										From:
										<select id="saturday-from" name="saturday-from" class="styler">
											<?php
												$selected = get_post_meta( $customer_business->ID, 'saturday-from', true );

												foreach ( get_work_time() as $value ) {
													if( $value == $selected ){
														echo '<option value="'. $value .'" selected="selected">'. $value .'</option>';
													}else{
														echo '<option value="'. $value .'">'. $value .'</option>';
													}
												}
											?>
										</select>
									</label>
									<label for="saturday-to">
										To:
										<select id="saturday-to" name="saturday-to" class="styler">
											<?php
												$selected = get_post_meta( $customer_business->ID, 'saturday-to', true );

												foreach ( get_work_time() as $value ) {
													if( $value == $selected ){
														echo '<option value="'. $value .'" selected="selected">'. $value .'</option>';
													}else{
														echo '<option value="'. $value .'">'. $value .'</option>';
													}
												}
											?>
										</select>
									</label>
								</div>
							</div>
						</div>
					</div>

					<div class="business_images">
						<h6><i class="icon icon_photo"></i>Photo</h6>
						<div class="business_images__content">

							<div class="business_images__content_images">
								<div class="business_images__content_row">
									<?php
										if( $business_thumbnail = get_post_meta( $customer_business->ID, 'business_thumbnail', true ) ){ ?>
											<div class="business_image_wrapper">
												<span class="icon icon_remove remove_company_image"></span>
												<img id="business_thumbnail" src="<?php echo wp_get_attachment_image_url( $business_thumbnail, 'thumbnail' ); ?>">
												<input type="file" class="company_image_uploader" name="business_thumbnail" id="field_business_thumbnail" value="">
												<input type="hidden" name="business_thumbnail" value="<?php echo $business_thumbnail; ?>">
											</div>
										<?php }else{ ?>
											<div class="business_image_wrapper no_image">
												<img id="business_thumbnail" src="/wp-content/themes/BuyGe/dist/images/add_photo.png">
												<input type="file" class="company_image_uploader" name="business_thumbnail" id="field_business_thumbnail" value="">
											</div>
										<?php }
									?>
								</div>

								<div class="business_images__content_row">
									<?php
										if( $business_flyer = get_post_meta( $customer_business->ID, 'business_flyer', true ) ){ ?>
											<div class="business_image_wrapper">
												<span class="icon icon_remove remove_company_image"></span>
												<img id="business_flyer" src="<?php echo wp_get_attachment_image_url( $business_flyer, 'thumbnail' ); ?>">
												<input type="file" class="company_image_uploader" name="business_flyer" id="field_business_flyer" value="">
												<input type="hidden" name="business_flyer" value="<?php echo $business_flyer; ?>">
											</div>
										<?php }else{ ?>
											<div class="business_image_wrapper no_image">
												<img id="business_flyer" src="/wp-content/themes/BuyGe/dist/images/add_photo.png">
												<input type="file" class="company_image_uploader" name="business_flyer" id="field_business_flyer" value="">
											</div>
										<?php }
									?>
								</div>

								<div class="business_images__content_row">
									<?php
										if( $business_aditional = get_post_meta( $customer_business->ID, 'business_aditional', true ) ){ ?>
											<div class="business_image_wrapper">
												<span class="icon icon_remove remove_company_image"></span>
												<img id="business_aditional" src="<?php echo wp_get_attachment_image_url( $business_aditional, 'thumbnail' ); ?>">
												<input type="file" class="company_image_uploader" name="business_aditional" id="field_business_aditional" value="">
												<input type="hidden" name="business_aditional" value="<?php echo $business_aditional; ?>">
											</div>
										<?php }else{ ?>
											<div class="business_image_wrapper no_image">
												<img id="business_aditional" src="/wp-content/themes/BuyGe/dist/images/add_photo.png">
												<input type="file" class="company_image_uploader" name="business_aditional" id="field_business_aditional" value="">
											</div>
										<?php }
									?>
								</div>
							</div>

							<div class="business_images__content_button">
								<?php do_action( 'woocommerce_edit_business_form' ); ?>


									<?php wp_nonce_field( 'save_business_details', 'save-business-details-nonce' ); ?>
									<input type="hidden" name="id" value="<?php echo $customer_business->ID; ?>" />
									<button type="submit" class="btn btn-secondary" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
									<input type="hidden" name="action" value="save_business_details" />


								<?php do_action( 'woocommerce_edit_business_form_end' ); ?>
							</div>

						</div>
					</div>

				</div>

			</div>
		</div>

	</form>

<?php

}
