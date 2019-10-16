<?php

// Remove WooCommerce Styles
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}


// Remove defualt styles --- якщо треба викинути якісь стилі/скрипти
function prosvit_remove_wp_enqueue_scripts() {
    if (current_user_can( 'update_core' )) {
        return;
    }

    // якогось бена вилазить на фронті
    wp_deregister_style('dashicons');

}
add_action( 'wp_enqueue_scripts', 'prosvit_remove_wp_enqueue_scripts', 100 );


// Всі стилі в футер - скрипти не треба, з ними халепа
// https://wordpress.stackexchange.com/a/162545
add_action('wp_print_styles', 'prosvit_footer_wp_print_styles', 0);
function prosvit_footer_wp_print_styles() {
    if ( ! doing_action( 'wp_head' ) ) { // ensure we are on head
        return;
      }

    // global $wp_scripts;
    global $wp_styles;
    // save actual queued scripts and styles
    // $queued_scripts = $wp_scripts->queue;
    $queued_styles  = $wp_styles->queue;

    // empty the scripts and styles queue
    // $wp_scripts->queue = array();
    $wp_styles->queue  = array();
    // $wp_scripts->to_do = array();
    $wp_styles->to_do  = array();

    add_action( 'wp_footer', function() use( $queued_styles ) {

        // reset the queue to print scripts and styles in footer
        // global $wp_scripts;
        global $wp_styles;
        // $wp_scripts->queue = $queued_scripts;
        $wp_styles->queue  = $queued_styles;
        // $wp_scripts->to_do = $queued_scripts;
        $wp_styles->to_do  = $queued_styles;

    }, 0 );
}

