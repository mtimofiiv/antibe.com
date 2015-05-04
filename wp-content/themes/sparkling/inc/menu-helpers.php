<?php 

function get_relative_menu_path() {

    $relative_url = '';

    if( !is_front_page() ) {
        $relative_url = get_bloginfo('url') . '/';
    }

    return $relative_url;
}
?>