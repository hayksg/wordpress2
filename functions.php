<?php

// Set Up
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

// Includes
include( get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php' );
include( get_template_directory() . '/includes/some-time-ago.php' );

// Action and Filter Hooks

function tu_enqueue() {
    wp_register_style( 'tu-bootstrap-min-css', 'https://stackpath.bootstrapcdn.com/bootswatch/4.1.0/lux/bootstrap.min.css' );
    wp_register_style( 'tu-style-css',         get_template_directory_uri() . '/site/css/style.css' );
    
    wp_enqueue_style( 'tu-bootstrap-min-css' );
    wp_enqueue_style( 'tu-style-css' );
    
    wp_register_script( 'tu-popper-min-js',    'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js', array(), false, true );
    wp_register_script( 'tu-bootstrap-min-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js', array(), false, true );
    wp_register_script( 'tu-script-js',        get_template_directory_uri() . '/site/js/script.js', array(), false, true );
    
    wp_enqueue_script( 'jquery' );
    
    wp_enqueue_script( 'tu-popper-min-js' );
    wp_enqueue_script( 'tu-bootstrap-min-js' );
    wp_enqueue_script( 'tu-script-js' );
}
add_action( 'wp_enqueue_scripts', 'tu_enqueue' );

function tu_setup() {
    register_nav_menu( 'topNavMenu', 'Top Nav Menu' );
}
add_action( 'after_setup_theme', 'tu_setup' );

function searchFilter($query) {
   // If 's' request variable is set but empty
   if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
      $query->is_search = true;
      $query->is_home = false;
   }
   return $query;
}
add_filter('pre_get_posts','searchFilter');

// Short Codes
