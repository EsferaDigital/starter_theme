<?php

// Para modificar el extracto
if(!function_exists('starter_excerpt_more')):
  function starter_excerpt_more() {
    return '<a href="' . get_permalink() . '">' . __('leer más', 'starter') . '</a>';
  }
endif;
add_filter( 'excerpt_more', 'starter_excerpt_more' );

if(!function_exists('starter_excerpt_length')):
  function starter_excerpt_length() {
    return 40;
  }
endif;
add_filter( 'excerpt_length', 'starter_excerpt_length' );
