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
    wp_localize_script( 'mytheme-script', 'adminAjax', admin_url( 'admin-ajax.php' ) );
}

// Taitement du formulaire de contact Ajax
add_action('wp_ajax_contact', '_ajax_contact');
add_action('wp_ajax_nopriv_contact', '_ajax_contact');
function _ajax_contact() {
  // On vérifie le nonce de sécurité
  check_ajax_referer( 'ajax_contact_nonce', 'security' );
  wp_send_json( 'success' );

  // Protection des variables
  
  $emailTo = get_option('admin_email');
  $subject = '[Mon site] Contact';
  $name = isset($_POST['name']) ? wp_strip_all_tags( $_POST['name'] ) : '';
  $email = isset($_POST['email']) ? sanitize_email( $_POST['email'] ) : '';
  $message = isset($_POST['message']) ? nl2br( stripslashes( wp_kses( $_POST['message'], $GLOBALS['allowedtags'] ) ) ) : '';
  
  // Gestion des headers
  $headers = 'MIME-Version: 1.0' . "\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
  $headers .= 'FROM: ' . $name . '<' . $email . '>' . "\r\n";
  // Gestion du message
  ob_start();
  include( get_theme_file_path( 'inc/mail/contact.php' ) );
  $mail = ob_get_contents();
  ob_end_clean();

  
  // Envoi de l'email
  if( wp_mail( $emailTo, $subject, $mail, $headers ) ) {
    // tout est ok, on avertit l'utilisateur
    wp_send_json( 'success' );
  } else {
    // Il y a une erreur avec le mail, on avertit l'utilisateur
    wp_send_json('error' );
  }
}


// Fonction pour récupérer la taxonomy courante
function get_current_archive_taxonomy() {
  $term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
  return $term;
}

// Suppression des rôles de base de WP
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
