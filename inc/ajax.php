<?php
/**
 * Ajax Contact form
 */
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