<?php
/**
 * Enqueue scripts and styles
 */

if ( !function_exists('mytheme_scripts') ) :
    function mytheme_scripts() {
        wp_enqueue_style( 
            'mytheme-style', 
            get_theme_file_uri('/public/css/app.css'), 
            ['mytheme-style-vendor'], 
            '20200127'
        );

        wp_enqueue_style(
            'mytheme-style-vendor',
            get_theme_file_uri( '/public/css/vendor.css' ), 
            [],
            '20200127'
        );

        wp_enqueue_script(
            'mytheme-script',
            get_theme_file_uri( '/public/js/app.js' ),
            ['mytheme-script-vendor'],
            '20200127',
            true
        );

        wp_enqueue_script(
            'mytheme-script-vendor',
            get_theme_file_uri( '/public/js/vendor.js' ),
            [],
            '20200127',
            true
        );

        wp_enqueue_script(
            'TweenMax',
            'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js'
        );

        wp_localize_script(
            'mytheme-script',
            'adminAjax',
            admin_url( 'admin-ajax.php' )
        );
    }
endif;
add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );
