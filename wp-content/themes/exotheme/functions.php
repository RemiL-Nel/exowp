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
function carousel_mamanger(){
    add_theme_page( 'Carousel Manager', 'Carousel Manager', 'administrator', 'carousel_display_menu', 'carousel_display_menu' );
}
add_action('admin_menu', 'carousel_mamanger');

function carousel_display_menu() {
         include_once('settings.php');
    }


    function change_carousel_category() {
        get_option('categoryOption');
         $cats = get_the_category(1);
         $catid = $cats->term_id;
        $posts = get_posts( array(
        'numberposts' => -1,
        'category' => $cats->term_id
        )
    );
         if ( $posts ) {
        foreach ( $posts as $post ) {
            wp_set_post_categories( $post->ID, array( get_option('categoryOption')), false );
        }
    }
    }
    add_action('admin_menu', 'change_carousel_category');