<?php

namespace App;

// Фонти гугла можна брати одразу в них - https://google-webfonts-helper.herokuapp.com/fonts/lato?subsets=latin
// Сюди всовуєм головний фонт щоб не пригало при загрузці

add_action('wp_head', function () {
    ?>

    <link rel="preload" href="<?php echo \App\asset_path('fonts/varela-round-v11-latin-regular.woff2'); ?>" as="font" type="font/woff2" crossorigin>

    <?php
}, 0);
