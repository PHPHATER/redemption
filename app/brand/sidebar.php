<?php

add_filter('sage/display_sidebar', function ($display) {
    static $display;

    isset($display) || $display = in_array(true, [
      // The sidebar will be displayed if any of the following return true
      is_single(),
      is_home(),
      is_404(),
      is_archive(),
      is_search(),
      is_page_template('template-custom.php')
    ]);

    return $display;
});
