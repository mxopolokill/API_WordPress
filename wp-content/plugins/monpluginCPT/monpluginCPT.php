<?php
/*
Plugin Name: monplugin
Plugin URI: SANS URI
Description: modifier la sélection, l'ajout et la suppréssion d'un élement ou même recherché élement 
Version: 1.0.0
Author: Meidhi
Author URI: SANS URI
Text Domain: plu
Domain Path: /lang
*/


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


