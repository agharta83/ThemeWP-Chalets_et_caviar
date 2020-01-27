<?php
/**
 * mytheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mytheme
 */

require( get_theme_file_path( '/inc/theme-setup.php' ) );

require( get_theme_file_path( '/inc/enqueue.php' ) );

require( get_theme_file_path( '/inc/clean-theme.php' ) );

require( get_theme_file_path( '/inc/ajax.php' ) );

require (get_theme_file_path( '/inc/hook.php ') );