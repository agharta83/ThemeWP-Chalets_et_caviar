<?php
/**
 * Theme Setup
 */
if (! function_exists( 'mytheme_setup' ) ) :
    function mytheme_setup() {
    // Notre thème supporte la fonctionnalité de WP de générer la balise <title>
    add_theme_support( 'title-tag' );
    // Notre thème supporte les images de mise en avant
    add_theme_support( 'post-thumbnails' );
    // Active la personnalisation de l'arrière plan
    add_theme_support('custom-background');
    // Active le nav Menu
    register_nav_menus( array(
        'menu-1' => esc_html__( 'Primary', 'mytheme' ),
    ));
}
endif;
add_action ('after_setup_theme', 'mytheme_setup');