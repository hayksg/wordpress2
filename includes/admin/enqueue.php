<?php

function tu_admin_enqueue() {
    if ( ! isset($_GET['page']) || $_GET['page'] !== 'tu_theme_options') {
        return;
    }
    
    wp_enqueue_media();
    
    wp_register_style( 'tu-admin-bootstrap-min-css', 'https://stackpath.bootstrapcdn.com/bootswatch/4.1.0/lux/bootstrap.min.css' );
    wp_register_style( 'tu-admin-style-css', get_template_directory_uri() . '/site/css/admin-style.css' );
    
    wp_enqueue_style( 'tu-admin-bootstrap-min-css' );
    wp_enqueue_style( 'tu-admin-style-css' );
    
    wp_register_script( 'tu-admin-options-js', get_template_directory_uri() . '/site/js/options.js', array('jquery'), false, true );
    wp_register_script( 'tu-admin-bootstrap-min-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js', array(), false, true );
    
    wp_enqueue_script( 'tu-admin-options-js' );
    wp_enqueue_script( 'tu-admin-bootstrap-min-js' );
}
