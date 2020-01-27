<?php
/**
 * Fonction utilitaire
 */
// Fonction pour récupérer la taxonomy courante
function get_current_archive_taxonomy() {
    $term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
    return $term;
}