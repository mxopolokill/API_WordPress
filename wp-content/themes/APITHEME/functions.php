<?php
function wpm_custom_post_type() {

    // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
    $labels = array(
        // Le nom au pluriel
        'name'                => _x( 'Apprenants', 'Post Type General Name'),
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
        'rewrite'			  => array( 'slug' => 'Apprenants'),
    
    );
    
    // On enregistre notre custom post type qu'on nomme ici "Apprenants" et ses arguments
    register_post_type( 'Apprenant', $args );
    
    }
    
    add_action( 'init', 'wpm_custom_post_type', 12);
    
    

    
function montheme_register_Promotion() {
    register_taxonomy('Promotion', 'Apprenant', [
        'labels' => [
            'name' => 'Promotion',
            'singular_name'     => 'Promotion',
            'plural_name'       => 'Promotion',
            'search_items'      => 'Rechercher des Promotion',
            'all_items'         => 'Tous les Promotion',
            'edit_item'         => 'Editer le Promotion',
            'update_item'       => 'Mettre à jour le Promotion',
            'add_new_item'      => 'Ajouter un nouveau Promotion',
            'new_item_name'     => 'Ajouter un nouveau Promotion',
            'menu_name'         => 'Promotion',
        ],
        'show_in_rest' => true,
        'hierarchical' => false,
        'show_admin_column' => true,
    ]);
}
add_action('init', 'montheme_register_Promotion');