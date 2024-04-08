<?php 

function load_script() {
    wp_enqueue_style('style-theme', get_stylesheet_uri() );
    wp_enqueue_script(
        'theme-script',
        get_template_directory_uri() . '/assets/js/script.js', 
        array('jquery'), 
        '1.0.0', 
        true
    );
}
add_action('wp_enqueue_scripts', 'load_script');