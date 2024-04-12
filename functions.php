<?php 

// ajout style du theme
add_action('wp_enqueue_scripts', 'theme_exo_load_style');
function theme_exo_load_style() {
    wp_enqueue_style('style-theme', get_stylesheet_uri() );
}


// charger le style du theme et le script du carousel
add_action('wp_enqueue_scripts', 'theme_exo_load_script_slider');
function theme_exo_load_script_slider() {
    wp_enqueue_script(
        'theme-script',
        get_template_directory_uri() . '/assets/js/script.js', 
        array('jquery'), 
        '1.0.0', 
        true
    );
}



// Ajouter un menu pour le carousel
add_action('admin_menu', 'theme_exo_carousel_mamanger');
function theme_exo_carousel_mamanger(){
    add_theme_page( 'Carousel Manager', 'Carousel Manager', 'administrator', 'theme_exo_carousel_display_menu', 'theme_exo_carousel_display_menu' );
}


// page callback
function theme_exo_carousel_display_menu() {
    include_once('settings.php');
}


// Initialiser les options du plugin
add_action('admin_init', 'theme_exo_initialiser_mon_plugin_options');
function theme_exo_initialiser_mon_plugin_options() {
    register_setting('theme_exo_settings', 'theme_exo_slider_setting', 'theme_exo_validate_options');
}



// Valider les options
function theme_exo_validate_options($input) {
    // Enregistrez le fait que les options ont été mises à jour
    update_option('theme_exo_options_updated', true);
    return $input;
}



// Ajouter un message de succès
add_action('admin_notices', 'theme_exo_admin_notice');
function theme_exo_admin_notice() {
    // Vérifiez si les options ont été mises à jour
    if (get_option('theme_exo_options_updated')) {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><?php _e('Les paramètres ont été sauvegardés avec succès.', 'theme_exo'); ?></p>
        </div>
        <?php
        // Réinitialisez l'option pour que la notice ne s'affiche pas à chaque chargement de page
        update_option('theme_exo_options_updated', false);
    }
}