<?php

// https://gist.github.com/eriteric/5d6ca5969a662339c4b3
// Force Gravity Forms to init scripts in the footer and ensure that the DOM is loaded before scripts are executed
add_filter( 'gform_init_scripts_footer', '__return_true' );
add_filter( 'gform_cdata_open', function ( $content = '' ) {
    if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
        return $content;
    }
    $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
    return $content;
}, 1 );

add_filter( 'gform_cdata_close', function ( $content = '' ) {
    if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
        return $content;
    }
    $content = ' }, false );';
    return $content;
}, 99 );

