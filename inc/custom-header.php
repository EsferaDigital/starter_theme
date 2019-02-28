<?php

// Personalización del header
if(!function_exists('starter_custom_header')):
  function starter_custom_header() {
    // Logo
    add_theme_support('custom-logo', array(
      'height' => 100,
      'width' => 100,
      'flex-height' => true,
      'flex-width' => true
    ));

    //Fondo del sitio
    add_theme_support('custom-background', array(
      'default-color' => 'FFF',
      'default-image' => get_template_directory_uri() . '/img/background-img.jpg',
      'default-repeat' => 'repeat',
      'default-position-x' => '',
      'default-position-y' => '',
      'default-size' => '',
      'default-attachment' => 'fixed'
    ));

    //Para que el usuario vea en tiempo real los cambios que realice desde el personalizador
    add_theme_support('customize-selective-refresh-widgets');

    // Imagen de Header personalizada
    add_theme_support('custom-header', apply_filters('starter_custom_header_args', array(
      'default-image' => get_template_directory_uri() . '/img/header-img.jpg',
      'default-text-color' => '000',
      'width' => 1200,
      'height' => 720,
      'flex-width' => true,
      'flex-height' => true,
      'video' => true
    )));
  }
endif;

add_action('after_setup_theme', 'starter_custom_header');
