<?php

function doing_header_shares()
{
	$get_datas = get_option( 'ge_stocks', false );
	if( $get_datas ) {

        $ge_stocks_price = $get_datas[0];
        $ge_stocks_diff = round( $get_datas[2], 2 );

        if( $get_datas[1] < 0 ) {
            $ge_stocks_diff_sym = 'down';
        } else {
            $ge_stocks_diff_sym = 'up';
        }

        return 'GE $' . $ge_stocks_price . ' <span class="menu__link--stock-ticker__icon icon--' . $ge_stocks_diff_sym . '"> (' . $ge_stocks_diff . '%)</span>';
    }
}

function nav_replace_wpse_189788($item_output, $item) {
    //   var_dump($item_output, $item);
    if ('Profile' == $item->title) {
        if (is_user_logged_in()) {
            return '<button class="btn btn-outline-primary nav-link menu__link menu__link--user dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="#"><span class="icon icon--user"></span> '. esc_html(  wp_get_current_user()->display_name  ) .' ( A' . esc_html(  wp_get_current_user()->ID  ) . ' )</button>';
        }
    }
    if ('Stock-Ticker' == $item->title) {
        return '<span class="nav-link menu__link menu__link--stock-ticker">' . doing_header_shares() . '</span>';
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el','nav_replace_wpse_189788',10,2);

