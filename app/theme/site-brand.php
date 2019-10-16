<?php

add_theme_support('custom-logo', [
    // whatever settings
    'flex-width'  => true,
	'flex-height' => true,
]);

add_filter( 'get_custom_logo', 'wecodeart_com' );
// Filter the output of logo to fix Googles Error about itemprop logo
function wecodeart_com() {
    add_filter( 'wp_get_attachment_image_attributes', 'wp_get_attachment_image_attributes_prosvit_base64', 10, 3 );
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="navbar-brand" rel="home" itemprop="url">%2$s</a>',
            esc_url( home_url( '/' ) ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'site-logo',
            ) )
        );
    return $html;
}

add_action( 'init', 'prosvit_add_excerpts_to_pages' );
function prosvit_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
