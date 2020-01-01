<?php get_header(); ?>

<section id="ventes" class="section">
    <h3 class="section__title revealSectionTitle">nos ventes <span>à la Une</span></h3>

    <!-- Traitement pour afficher le template des chalets "Ventes à la Une" en fonction de l'index de $posts -->
    <?php
            $posts = get_field('ventes_a_la_une');
            // On vérifie que $posts existe           
            if ($posts) {
              // Pour tous les objets du tableau $posts
              foreach ($posts as $key => $post) {
                //var_dump($post);
                // Configure les données de publication globales
                setup_postdata( $post );
                
                // Si l'index de $post est 0, on affiche le template 'article'
                if ($key == '0') {
                  get_template_part( 'template-parts/content/sticky-vente' );
                }
                // Si l'index de $post est 1, on affiche le template 'article--reverse'
                if ($key == '1') {
                  get_template_part( 'template-parts/content/sticky-vente', 'reverse');
                }              
              }
            // Reset l'objet $post
            wp_reset_postdata();
            }     
        ?>

</section>

<section id="locations" class="section">
    <h3 class="section__title revealSectionTitle">nos locations <span>à la Une</span></h3>

    <!-- Traitement pour afficher le template des chalets "Location à la Une" en fonction de l'index de $posts -->
    <?php
            $posts = get_field('locations_a_la_une');
            // On vérifie que $posts existe           
            if ($posts) {
              // Pour tous les objets du tableau $posts
              foreach ($posts as $key => $post) {
                //var_dump($post);
                // Configure les données de publication globales
                setup_postdata( $post );
                
                // Si l'index de $post est 0, on affiche le template 'article'
                if ($key == '0') {
                  get_template_part( 'template-parts/content/sticky-location' );
                }
                // Si l'index de $post est 1, on affiche le template 'article--reverse'
                if ($key == '1') {
                  get_template_part( 'template-parts/content/sticky-location', 'reverse');
                }              
              }
            // Reset l'objet $post
            wp_reset_postdata();
            }     
        ?>

</section>

<?php get_template_part( 'template-parts/content/page', 'contact' ); ?>

<?php get_footer(); ?>