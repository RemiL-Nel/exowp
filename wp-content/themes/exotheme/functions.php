<?php 

function mytheme_files() { 
    wp_enqueue_style('style', get_stylesheet_uri()); 
    wp_register_script( 'my-script', plugins_url( '/js/script.js' , __FILE__ ) );
    wp_enqueue_script( 'my-script' );
} 
add_action('wp_enqueue_scripts', 'mytheme_files');