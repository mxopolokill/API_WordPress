<?php
    function get_posts( $args = null ) {
      $defaults = array(
          'numberposts'      => 16,
          'category'         => 0,
          'orderby'          => 'date',
          'order'            => 'DESC',
          'include'          => array(),
          'exclude'          => array(),
          'meta_key'         => '',
          'meta_value'       => '',
          'post_type'        => 'apprenant',
          'suppress_filters' => true,
      );
    }