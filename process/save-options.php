<?php

function tu_save_options() {
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_die( __( 'Not allowed', 'blog' ) );
    }
    
    check_admin_referer( 'tu_options_verify' );
    
    $theme_opts = get_option( 'tu_opts' );
    
    $theme_opts['favicon']     = esc_url_raw($_POST['tu_inputFaviconImg']);
    $theme_opts['facebook']    = sanitize_text_field($_POST['tu_inputFacebook']);
    $theme_opts['youtube']     = sanitize_text_field($_POST['tu_inputYouTube']);
    $theme_opts['twitter']     = sanitize_text_field($_POST['tu_inputTwitter']);
    $theme_opts['google-plus'] = sanitize_text_field($_POST['tu_inputGooglePlus']);
    $theme_opts['logo-type']   = absint($_POST['tu_inputLogoType']);
    $theme_opts['logo-image']  = esc_url_raw($_POST['tu_inputLogoImg']);
    $theme_opts['footer']      = $_POST['tu_inputFooter'];

    update_option( 'tu_opts', $theme_opts );
    
    set_transient( 'success', 'Settings successfully updated', 10 );
    
    wp_redirect( admin_url( 'admin.php?page=tu_theme_options' ) );
}
