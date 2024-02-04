<?php
function theme_files() {
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'theme_files');

// Add theme support for post thumbnails
add_theme_support('post-thumbnails');

?>
