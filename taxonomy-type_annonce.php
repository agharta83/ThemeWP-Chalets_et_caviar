<?php
// On récupére la taxo courante
$current_taxo = get_current_archive_taxonomy();
// On fait une requete perso pour récupérer tous les posts de cette taxo en recherchant sur le slug
$posts = get_posts(
    array(
        'posts_per_page' => -1,
        'post_type' => 'chalet',
        'tax_query' => array(
            array(
                'taxonomy' => 'type_annonce',
                'field' => 'slug',
                'terms' => $current_taxo->slug,
            )
        )
    )
);

?>
<div class="section-container">

<?php

// On vérifie que $posts existe
if ($posts) :
    // On affiche le header dynamique
    get_header('taxo');
    // Pour tous les objets du tableau $posts
    
        foreach ($posts as $key => $post) {
            // Configure les données de publications globales
            setup_postdata( $post );
            // On utilise le modulo pour afficher les différents posts
            if ($key % 2) {
                get_template_part( 'template-parts/chalets-type-annonce/taxo');
            } else {
                get_template_part( 'template-parts/chalets-type-annonce/taxo', 'reverse');
            }
        }
    
    wp_reset_postdata();
endif;
?>

</div>

<?php get_template_part( 'template-parts/content/page', 'contact' ); ?>

<?php get_footer(); ?>