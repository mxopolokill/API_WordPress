<?php

//Création de ma function get_object
function get_objectss( $object ) {
    
  $Postapprenants = 
  //Récupère un tableau des derniers messages, 
  //ou des messages correspondant aux critères donnés.
    get_posts( 
      // post_type = sélectionner le slug des posts pris en compte 
      //posts_per_page = le nom de post par page autoriser 
      //oderby = choisir l'ordre via un élement spécifique, pour cette route je vais choisir la date 
      //order = je vais donc mettre l'ordre dans le sens inverse donc voir les dernier posts poster 
      ['post_type' => 'apprenant',
      'posts_per_page' => 16,
      'orderby' => 'date',
      'order' => 'DESC'
    ] );
    }
  //Récupère un tableau des derniers messages,
  $posts = get_posts($Postapprenants);
   
  // ouverture d'un tableau pour la récupération de mes objets 
    foreach( $posts as $post ) {
    
      //création de ma variable $id  identifier comme l'id des posts 
    $id = $post->ID; 
   
    //Détermine si une image est jointe à un message, //Renvoie l'URL de l'image mise en avant.
    $post_thumbnail = ( has_post_thumbnail( $id ) ) ? get_the_post_thumbnail_url( $id ) : null;
     
    //création du tableau post 
    $posts[] = (object) array( 
        'id' => $id, 
        //récuperation image a la une 
        'image' => $post_thumbnail,
        //récuperation du meta post prenom 
        'prenom' => get_post_meta($post, 'prenom', true),
        //récuperation du meta post nom 
        'nom' => get_post_meta($post, 'nom', true),
        //récupération de l'élement inclu dans l'extrait 
        'extrait' => $post->post_excerpt,
        //récuperation du meta post portfolio
        'portfolio' => get_post_meta($post, 'portfolio', true),
        //récuperation du meta post linkedin
        'linkedin' => get_post_meta($post, 'linkedin', true),
        //récuperation du meta post cv
        'cv' => get_post_meta($post, 'cv', true),
        //récuperation du meta post compétence
        'promotion' => get_post_meta($post, 'promotion', true),
        //récuperation du meta post promotion
        'competences' => get_post_meta($post, 'competences', true) ,    
    );
}     
//retourne tout les posts              
return $allposts;

//ma function de l'ajout du route 
function custom_api_get_last_16posts() {

  register_rest_route( 'apprenant16/v1', '/last16-posts', array(
      'methods' => 'GET',
      'callback' => 'custom_api_get_all_posts_callback'
  ));
}

//lance la function ("hook + "nom function")
add_action( 'rest_api_init', 'custom_api_get_last_16posts' ); 