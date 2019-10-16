<?php
/**
 * Plugin Name: WP Rocket | No Auto-generated Critical CSS
 * Description: Disable automatic generation of critical CSS when Optimize CSS Delivery is enabled.
 * Plugin URI:  https://github.com/wp-media/wp-rocket-helpers/tree/master/static-files/wp-rocket-no-auto-critical-css/
 * Author:      WP Rocket Support Team
 * Author URI:  http://wp-rocket.me/
 * License:     GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Copyright SAS WP MEDIA 2018
 */


// Щоб автоматом не генеріровало critical.css
add_filter( 'do_rocket_critical_css_generation', '__return_false' );
// перекидаємо main css в футер
add_filter('rocket_buffer','wprlc_buffer_post_process', 999999999, 1);

function wprlc_buffer_post_process($buffer) {
	// trigger asynchronous css using loadCSS lib.
	// The loadCSS lib was previously injected into the header, we assume.
	// Admin of site could have their own version of the lib instead.
	// If it's not present, then obviously css will never load. We shall assume the admin is a competent admin.
	$matches=[];
	$find="(<link\\s+[^>]*rel\\s*=\\s*(['\"])stylesheet\\2.*?>)(?:(?=.*<\\/head))"; // the non capture lookahead is technically non-performant. But performance as measured in ms has been determinedly inconsequential (based on content load of several very large raw html loads), therefore I'm personally quite happy with it.
	preg_match_all("/".$find."/smix",$buffer,$matches,PREG_SET_ORDER);
	foreach($matches as $link) {
	    $buffer = str_replace($link[1],'',$buffer);
        $buffer = str_replace('</body>',$link[1] . '</body>',$buffer);
	}
    return $buffer;
}

// Adjust LazyLoad Threshold
function rocket_lazyload_custom_threshold( $threshold ) {
	return 100;
}
add_filter( 'rocket_lazyload_threshold', 'rocket_lazyload_custom_threshold' );
