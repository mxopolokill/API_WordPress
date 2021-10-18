<?php
function get_objectss( $object ) {
    
  $Postapprenants =  
    get_posts( 
      ['post_type' => 'apprenant',
      'posts_per_page' => 16,
      'orderby' => 'date',
      'order' => 'DESC'
    ] );
    }

  $posts = get_posts($Postapprenants);

    foreach( $posts as $post ) {

    $id = $post->ID; 
    $post_thumbnail = ( has_post_thumbnail( $id ) ) ? get_the_post_thumbnail_url( $id ) : null;

    $posts[] = (object) array( 
        'id' => $id, 
        //récuperation image a la une 
        'image' => $post_thumbnail,
        //récuperation du meta post prenom 
        'prenom' => get_post_meta($post, 'prenom', true),
        //récuperation du meta post nom 
        'nom' => get_post_meta($post, 'nom', true),
        'extrait' => $post->post_excerpt,
        'portfolio' => get_post_meta($post, 'portfolio', true),
        'linkedin' => get_post_meta($post, 'linkedin', true),
        'cv' => get_post_meta($post, 'cv', true),
        'promotion' => get_post_meta($post, 'promotion', true),
        'competences' => get_post_meta($post, 'competences', true) ,    
    );
}                  
return $allposts;

function custom_api_get_last_16posts() {
  register_rest_route( 'apprenant16/v1', '/last16-posts', array(
      'methods' => 'GET',
      'callback' => 'custom_api_get_all_posts_callback'
  ));
}

add_action( 'rest_api_init', 'custom_api_get_last_16posts' ); 