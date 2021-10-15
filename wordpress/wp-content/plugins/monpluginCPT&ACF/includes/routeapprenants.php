<?php
function get_projects( $params ) {
    $Routeapprenants =  
    get_posts( ['post_type' => 'Apprenant',
      'posts_per_page' => -1
    ] );
