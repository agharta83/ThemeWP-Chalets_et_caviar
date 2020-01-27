<?php
/**
 * Clean Theme
 */

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