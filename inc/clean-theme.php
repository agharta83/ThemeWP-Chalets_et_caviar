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
    remove_menu_page('post-new.php');
}
add_action('admin_menu', 'remove_menu_items_agence');

// Suppression d'item de l'admin bar
function remove_admin_bar_items($wp_admin_bar) {
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('new-content');
}
add_action('admin_bar_menu', 'remove_admin_bar_items', 999);