<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mytheme
 */
while( have_posts() ) :
    the_post();
   
     // On teste si le type de taxonomy est "vente" ou "location"
    if (has_term('vente', 'type_annonce')) :
        get_header('single');
    endif;

    // On teste si la taxonomy est "location"
    if (has_term('location', 'type_annonce')) :
        get_header('single');
    endif;
?>

<?php endwhile; ?>

<?php get_template_part( 'template-parts/content/page', 'contact' ); ?>

<?php get_footer(); ?>