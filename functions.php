<?php
/*
* My Starter Theme Functions and Definitions
*
*@link https://developer.wordpress.org(themes/basic/theme-functions)
*
*@package wordpress
*@subpackage starter
*@since 1.0.0
*@version 1.0.0
*/

// Cargamos los css y js
if(!function_exists('starter_scripts')):
  function starter_scripts() {
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0.0', 'all');

    wp_enqueue_script('jquery');
    wp_enqueue_script('script', get_template_directory_uri() . '/js/prueba.js', array('jquery'), '1.0.0', true);
  }
endif;
add_action( 'wp_enqueue_scripts', 'starter_scripts' );

//Creamos Menús
if(!function_exists('starter_menus')):
  function starter_menus() {
    register_nav_menus(array(
      'menu_main' => __('Menú Principal', 'starter'),
      'menu_social' => __('Menú Redes Sociales', 'starter')
    ));
  }
endif;
add_action( 'init', 'starter_menus' );

// Creamos Widgets
if(!function_exists('starter_register_sidebars')):
  function starter_register_sidebars() {

    register_sidebar(array(
      'name' => __('Sidebar Principal', 'starter'),
      'id' => 'sidebar_main',
      'description' => __('Este es el sidebar principal y aparecerá al lado del contenido principal.', 'starter'),
      'before_widget' => '<article id="%1$s" class="Widget %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    ));

    register_sidebar(array(
      'name' => __('Sidebar del Pié de Página', 'starter'),
      'id' => 'sidebar_footer',
      'description' => __('Estes es el sidebar del pié de página del sitio.', 'starter'),
      'before_widget' => '<article id="%1$s" class="Widget %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    ));
  }
endif;
add_action('widgets_init', 'starter_register_sidebars');

// Añadimos soportes básicos
if(!function_exists('starter_setup')):
  function starter_setup() {
    // soporte a imagen destacada
    add_theme_support('post-thumbnails');

    //soporte a etiquetas semánticas de html5
    add_theme_support('html5', array(
      'comment-list',
      'comment-form',
      'search-form',
      'gallery',
      'caption'
    ));

    // soporte a formatos de entrada
    add_theme_support('post-formats', array(
      'aside',
      'gallery',
      'link',
      'image',
      'quote',
      'status',
      'video',
      'audio',
      'chat'
    ));

    //Soporte a títulos dinámicos de páginas del sitio (para el SEO)
    add_theme_support('title-tag');

    //Soporte para que añada meta que permite interactuar con lectores RSS
    add_theme_support('automatic-feed-links');

    // Remueve meta etiqueta que muestra la versión de wordpress que usamos
    remove_action('wp_head', 'wp_generator');
  }
endif;
add_action('after_setup_theme', 'starter_setup');

// Soportes adicionales
require_once get_template_directory() . '/inc/custom-header.php';
require_once get_template_directory() . '/inc/custom-excerpt.php';
require_once get_template_directory() . '/inc/custom-description.php';

