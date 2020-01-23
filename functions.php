<?php
/**
 * mytheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mytheme
 */

if (! function_exists('mytheme_setup') ) :

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

add_action ( 'wp_enqueue_scripts', 'mytheme_enqueue_styles', 0 );
function mytheme_enqueue_styles() {
  $vendorStyle = 'mytheme-vendor-style';
  wp_enqueue_style($vendorStyle, get_theme_file_uri() . '/public/css/vendor.css');
  wp_enqueue_style('mytheme-style',get_theme_file_uri() . '/public/css/app.css', array( $vendorStyle ) );
}

add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_scripts');
function mytheme_enqueue_scripts() {
    $vendorScript = 'mytheme-vendor-script';
    wp_enqueue_script('TweenMax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js');
    wp_enqueue_script($vendorScript, get_theme_file_uri() . '/public/js/vendor.js');
    wp_enqueue_script( 'mytheme-script', get_theme_file_uri() . '/public/js/app.js' );
}

// Fonction pour récupérer la taxonomy courante
function get_current_archive_taxonomy() {
  $term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
  return $term;
}

// Suppression des rôles de bas de WP
function admin_remove_role() {
  remove_role('subscriber');
  remove_role('editor');
  remove_role('contributor');
  remove_role('author');
}
add_action( 'init', 'admin_remove_role');

// Suppression de certains items du menu BO de WP
function remove_menu_items_agence() {
  remove_menu_page('index.php');
  remove_menu_page('separator1');
  remove_menu_page('edit.php');
  remove_menu_page('edit-comments.php');
  remove_menu_page('themes.php');
}
add_action('admin_menu', 'remove_menu_items_agence');
