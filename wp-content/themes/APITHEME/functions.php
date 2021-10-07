<?php 

function wpm_custom_post_type() {

// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
$labels = array(
    // Le nom au pluriel
    'name'                => _x( 'Apprenant', 'Post Type General Name'),
    // Le nom au singulier
    'singular_name'       => _x( 'Apprenant', 'Post Type Singular Name'),
    // Le libellé affiché dans le menu
    'menu_name'           => __( 'Apprenants'),
    // Les différents libellés de l'administration
    'all_items'           => __( 'Tout les Apprenants'),
    'view_item'           => __( 'Voir les Apprenants'),
    'add_new_item'        => __( 'Ajouter un nouveau Apprenant'),
    'add_new'             => __( 'Ajouter'),
    'edit_item'           => __( 'Editer un Apprenant'),
    'update_item'         => __( 'Modifier un Apprenant '),
    'search_items'        => __( 'Rechercher un Apprenant'),
    'not_found'           => __( 'Non trouvée'),
    'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
);

// On peut définir ici d'autres options pour notre custom post type

$args = array(
    'label'               => __( 'Apprenants'),
    'description'         => __( 'Tous sur les Apprenants'),
    'labels'              => $labels,
    // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre)
    'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
    /* 
    * Différentes options supplémentaires
    */
    'show_in_rest' => true,
    'hierarchical'        => false,
    'public'              => true,
    'has_archive'         => true,
    'rewrite'			  => array( 'slug' => 'activity'),

);

// On enregistre notre custom post type qu'on nomme ici "Apprenants" et ses arguments
register_post_type( 'Apprenant', $args );

}

add_action( 'init', 'wpm_custom_post_type', 5 );

// function set_custom_post_types_admin_order($wp_query) {
// if (is_admin()) {
// $post_type = $wp_query->query['post_type'];
// if ( $post_type == 'activity') {
// // La valeur de 'orderby' peut être n'importe quelle colonne : name, slug, date, etc
// $wp_query->set('orderby', 'title');
// // Les valeurs possibles sont 'DESC' ou 'ASC'
// $wp_query->set('order', 'DESC');
// }
// }
// }

// add_filter('pre_get_posts', 'set_custom_post_types_admin_order');
