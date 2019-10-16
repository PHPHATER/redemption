<?php

add_action( 'after_setup_theme', 'prosvit_add_image_size' );
function prosvit_add_image_size() {
    add_image_size( 'background', 1920, 1080, true ); // (cropped)
    add_image_size( 'background-half', 1920, 560, true ); // (cropped)
}


function aw_custom_declare_custom_image_responsive_sizes($attr, $attachment, $size) {
    // Full width header images
    if ( ( $size === 'background-half') || ( $size === 'background' ) )  {
        $background = wp_get_attachment_image_src( $attachment->ID, $size );
        $background_sm = wp_get_attachment_image_src( $attachment->ID, 'large' );
        $attr['srcset'] = ''.$background_sm[0].' 768w, ' . $background[0] . ' 1024w';
    }
    return $attr;
  }
add_filter('wp_get_attachment_image_attributes', 'aw_custom_declare_custom_image_responsive_sizes', 10 , 3);

