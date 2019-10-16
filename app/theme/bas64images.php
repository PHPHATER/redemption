<?php

function prosvit_base64image($id, $url) {
    if(!wp_attachment_is_image($id) || preg_match('/^data\:image/', $url)) return $url;

    $meta_key = 'base64image' . md5($url);
    $img_url = get_post_meta($id, $meta_key, true);
    if($img_url) return $img_url;

    $image_path = preg_replace('/^.*?wp-content\/uploads\//i', '', $url);
    if(($uploads = wp_get_upload_dir()) && (false === $uploads['error']) && (0 !== strpos($image_path, $uploads['basedir']))) {
        if(false !== strpos($image_path, 'wp-content/uploads')) $image_path = trailingslashit($uploads['basedir'].'/'._wp_get_attachment_relative_path($image_path)).basename($image_path);
        else $image_path = $uploads['basedir'].'/'.$image_path;
    }

    $max_size = 150 * 1024;
    //echo '[['.$max_size.' vs '.filesize($image_path).']]';
    if(file_exists($image_path) && (!$max_size || (filesize($image_path) <= $max_size))) {
        $filetype = wp_check_filetype($image_path);
        // Read image path, convert to base64 encoding
        $imageData = base64_encode(file_get_contents($image_path));
        // Format the image SRC:  data:{mime};base64,{data};
        $img_url = 'data:image/'.$filetype['ext'].';base64,'.$imageData;
        update_post_meta($id, $meta_key, $img_url);
        return $img_url;
    }

    return $url;
}

function wp_get_attachment_image_src_base64( $attachment_id, $size = 'thumbnail', $icon = false ) {
    $image = wp_get_attachment_image_src( $attachment_id, $size, $icon );
    // var_dump($image);
    // exit();
    if(!$image) return $image;
    $image[0] = prosvit_base64image($attachment_id, $image[0]);
    return $image[0];
}

function wp_get_attachment_image_attributes_prosvit_base64( $atts, $attachment, $size ) {
    // var_dump($attachment);
    $data64 = wp_get_attachment_image_src_base64( $attachment->ID, $size );
    if ( isset( $atts['src'] ) && isset( $data64 ) ) {
        $atts['src'] = $data64;
        $atts['srcset'] = '';
        $atts['sizes'] = '';
        $atts['data-no-lazy'] = '1';
    }
    return $atts;
}
