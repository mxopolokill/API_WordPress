<?php
/*
Plugin Name: MyCPTPlugin
Plugin URI: SANS URI
Description: Plugin CPT Apprenant (Taxonomie : promotion & competence)
Version: 1.0.0
Author: Meidhi
Author URI: SANS URI
Text Domain:
Domain Path: /lang
*/


// fonction ajout CPT (custom post type) Apprenant
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
    
    // On peut définir ici d'autres options pour le custom post type Apprenant
    
    $args = array(
        'label'               => __( 'Apprenants'),
        'description'         => __( 'Tous sur les Apprenants'),
        'labels'              => $labels,
        // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre)
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
         
      // Différentes options supplémentaires
      
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
    
  
function taxonomy_promotion() {
 
    $labels = array(
      'name' => _x( 'Promotions', 'taxonomy general name' ),
      'singular_name' => _x( 'Promotion', 'taxonomy singular name' ),
      'search_items' =>  __( 'Recherche de la promotion' ),
      'all_items' => __( 'Toutes les promotions' ),
      'parent_item' => __( 'parent Promotion ' ),
      'parent_item_colon' => __( 'parent Promotion: ' ),
      'edit_item' => __( 'Modifier une promotion' ), 
      'update_item' => __( 'Mettre à jour une promotion' ),
      'add_new_item' => __( 'Ajouter une nouvelle promotion' ),
      'new_item_name' => __( 'Nouvelle promotion' ),
      'menu_name' => __( 'Promotion' ),
    );    

    register_taxonomy('promotion',array('apprenant'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_in_rest' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'promotion' ),
    ));
   
  }
  
  add_action( 'init', 'taxonomy_promotion', 0 );
  
  
   function taxonomy_Competences() {
   
      $labels = array(
        'name' => _x( 'Compétences', 'taxonomy general name' ),
        'singular_name' => _x( 'Compétence', 'taxonomy singular name' ),
        'search_items' =>  __( 'Recherche de la Compétence' ),
        'all_items' => __( 'Toutes les Compétences' ),
        'parent_item' => __( 'Parent Compétence ' ),
        'parent_item_colon' => __( 'Parent Compétence: ' ),
        'edit_item' => __( 'Modifier une compétence' ), 
        'update_item' => __( 'Mettre à jour une compétence' ),
        'add_new_item' => __( 'Ajouter une nouvelle compétence' ),
        'new_item_name' => __( 'Nouvelle compétence' ),
        'menu_name' => __( 'Compétence' ),
      );    
     
    
      register_taxonomy('Competence',array('apprenant'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'Competence' ),
      ));
     
    }
    
    add_action( 'init', 'taxonomy_Competences', 0 );
   

    



