<?php

// Set Up
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

// Includes
include( get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php' );
include( get_template_directory() . '/includes/some-time-ago.php' );
include( get_template_directory() . '/includes/options-page.php' );
include( get_template_directory() . '/includes/admin/init.php' );
include( get_template_directory() . '/process/save-options.php' );

// Action Hooks

function tu_enqueue() {
    wp_register_style( 'tu-bootstrap-min-css', 'https://stackpath.bootstrapcdn.com/bootswatch/4.1.0/lux/bootstrap.min.css' );
    wp_register_style( 'font-awesome-min-css', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_register_style( 'tu-style-css',         get_template_directory_uri() . '/site/css/style.css' );
    
    wp_enqueue_style( 'tu-bootstrap-min-css' );
    wp_enqueue_style( 'font-awesome-min-css' );
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

function tu_sidebar() {
    register_sidebar( array(
        'name'          => __( 'Sidebar for blog', 'blog' ),
	    'id'            => 'tu_sidebar',
	    'description'   => __( 'Sidebar for the theme Blog', 'blog' ),
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="card mb-4 %2$s">',
	    'after_widget'  => '</div></div>',
	    'before_title'  => '<h5 class="card-header">',
	    'after_title'   => '</h5><div class="card-body">'
        
    ) );
}
add_action( 'widgets_init', 'tu_sidebar' );

function tu_activate() {
    if ( version_compare( bloginfo( 'version' ), '<', '4.2' ) ) {
        wp_die( 'You must have a mnimum version of 4.2 to use this theme', 'blog' );
    }
    
    $theme_opts = get_option( 'tu_opts' );
    
    if ( ! $theme_opts ) {
        $opts = array(
            'favicon'     => '',
            'facebook'    => '',
            'youtube'     => '',
            'twitter'     => '',
            'google-plus' => '',
            'logo-type'   => 1,
            'logo-image'  => '',
            'footer'      => '',
        );
        
        add_option( 'tu_opts', $opts );
    }
}
add_action( 'after_switch_theme', 'tu_activate' );

function tu_admin_menus() {
    add_menu_page(
        __( 'Blog theme options', 'blog' ),
        __( 'Theme options', 'blog' ),
        'edit_theme_options',
        'tu_theme_options',
        'tu_theme_options_page'
    );
}
add_action( 'admin_menu', 'tu_admin_menus' );

add_action( 'admin_init', 'tu_admin_init' );

// Filter Hooks

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
