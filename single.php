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
    get_header('single');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
            // On teste si le type de taxonomy est "vente" ou "location"
            if (has_term('vente', 'type_annonce')) :
                echo 'VENTES';
                //get_template_part('template-parts/content', get_post_type() ); // TODO Faire la vue
                // the_post_navigation(); // TODO Affiche la navigation vers le post suivant / précédent
            endif;

            // On teste si la taxonomy est "location"
            if (has_term('location', 'type_annonce')) :
                echo 'LOCATIONS';
                //get_template_part('template-parts/content', get_post_type() ); // TODO Faire la vue
                // the_post_navigation(); // TODO Affiche la navigation vers le post suivant / précédent
            endif;
        ?>
    </main>
</div>

<?php endwhile; ?>
    
<?php get_footer(); ?>