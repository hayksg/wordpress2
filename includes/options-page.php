<?php

function tu_theme_options_page() {
    
    $opts = get_option( 'tu_opts' );
    
?>

<div class="wrap">
    <div class="card app-card card-inverse card-success">
        <div class="card-header">
            <h3 class="card-title"><?php _e( 'Theme Settings', 'blog' ); ?></h3>
        </div>
        <div class="card-body">
                      
            <?php if ( get_transient( 'success') ) : ?>
            
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo get_transient( 'success'); ?>
                </div>
            
                <?php delete_transient( 'success'); ?>
            <?php endif; ?>

            <form method="post" action="admin-post.php" id="tu_theme_options_form">
                <input type="hidden" name="action" value="tu_save_options">
                <?php wp_nonce_field( 'tu_options_verify' ); ?>
                
                <h4><?php _e( 'Favicon', 'blog' ); ?></h4>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Favicon Image" name="tu_inputFaviconImg" value="<?php echo $opts['favicon']; ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-outline-primary" type="button" id="tu_uploadFaviconBtn">
                            <?php _e( 'Upload Favicon', 'blog' ); ?>
                        </button>
                    </span>
                </div>
                <hr>
                
                <h4><?php _e( 'Social Icons', 'blog' ); ?></h4>
                <div class="form-group">
                    <label><?php _e( 'Twitter', 'blog' ); ?></label>
                    <input type="text" class="form-control" name="tu_inputTwitter" value="<?php echo $opts['twitter']; ?>">
                </div>
                <div class="form-group">
                    <label><?php _e( 'Facebook', 'blog' ); ?></label>
                    <input type="text" class="form-control" name="tu_inputFacebook" value="<?php echo $opts['facebook']; ?>">
                </div>
                <div class="form-group">
                    <label><?php _e( 'YouTube', 'blog' ); ?></label>
                    <input type="text" class="form-control" name="tu_inputYouTube" value="<?php echo $opts['youtube']; ?>">
                </div>
                <div class="form-group">
                    <label><?php _e( 'Google Plus', 'blog' ); ?></label>
                    <input type="text" class="form-control" name="tu_inputGooglePlus" value="<?php echo $opts['google-plus']; ?>">
                </div>
                <hr>
                
                <h4><?php _e( 'Logo', 'blog' ); ?></h4>
                <div class="form-group">
                    <label><?php _e( 'Logo Type', 'blog' ); ?></label>
                    <select class="form-control" name="tu_inputLogoType">
                        <option value="1"><?php _e( 'Site Name', 'blog' ); ?></option>
                        <option value="2" <?php echo $opts['logo-type'] == 2 ? 'selected' : ''; ?>><?php _e( 'Image', 'blog' ); ?></option>
                    </select>
                </div>
                <div class="input-group app-upload-image">
                    <input type="text" class="form-control" placeholder="Logo Image" name="tu_inputLogoImg" value="<?php echo $opts['logo-image']; ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-outline-primary" type="button" id="tu_uploadLogoImgBtn">
                            <?php _e( 'Upload', 'blog' ); ?>
                        </button>
                    </span>
                </div>
                <hr>
                
                <h4><?php _e( 'Footer', 'blog' ); ?></h4>
                <div class="form-group">
                    <label><?php _e( 'Footer Text (HTML Allowed)', 'blog' ); ?></label>
                    <textarea class="form-control" name="tu_inputFooter"><?php echo stripslashes_deep( $opts['footer'] ); ?></textarea>
                </div>
                <hr>
                
                <div class="form-group">
                    <button class="btn btn-outline-primary" type="submit">
                        <?php _e( 'Update', 'blog' ); ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
}
