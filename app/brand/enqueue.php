<?php

function dropzone_wp_enqueue_scripts() {
    if ( is_account_page() ) {

        wp_enqueue_script( 'dropzone', 'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js', ['jquery'], '1.0.0', 'true' );
        wp_enqueue_style( 'dropzone', 'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css' );

        wp_enqueue_script( 'styler', 'https://cdn.jsdelivr.net/npm/jquery-form-styler@2.0.2/dist/jquery.formstyler.min.js', ['jquery'], '2.0.2', true );
        wp_enqueue_style( 'styler', 'https://cdn.jsdelivr.net/npm/jquery-form-styler@2.0.2/dist/jquery.formstyler.css' );

        wp_enqueue_style('datetimepicker', get_template_directory_uri() . '/assets/styles/libraries/jquery.datetimepicker.min.css', false, null);
        wp_enqueue_script('datetimepicker', get_template_directory_uri() . '/assets/scripts/libraries/jquery.datetimepicker.full.min.js', ['jquery'], '1.0.0', true);

    }
}

if ( is_woocommerce_activated() ) {
    add_action('wp_enqueue_scripts', 'dropzone_wp_enqueue_scripts');
}
