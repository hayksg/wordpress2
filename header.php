<?php $theme_opts = get_option( 'tu_opts' ); ?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php if ( isset($theme_opts['favicon']) ) : ?>      
        <link rel="icon" href="<?php echo $theme_opts['favicon']; ?>" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php echo $theme_opts['favicon']; ?>" type="image/x-icon" />
    <?php endif; ?>
      
    <?php wp_head(); ?>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
              
              <?php if ( isset($theme_opts['logo-type']) && $theme_opts['logo-type'] == 2 ) : ?>
                  <a class="navbar-brand" href="<?php echo site_url(); ?>">
                      <img src="<?php echo $theme_opts['logo-image']; ?>" class="img-fluid" alt="logo-img">
                  </a>
              <?php else : ?>
                  <a class="navbar-brand" href="<?php echo site_url(); ?>"><?php bloginfo( 'name' ); ?></a>
              <?php endif; ?>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarColor03"> 
                  
                   <?php
                   wp_nav_menu( array(
                        'theme_location'  => 'topNavMenu',
                        'menu_class'      => 'navbar-nav',
                        'container_class' => 'mr-auto',
                        'walker'          => new WP_Bootstrap_Navwalker,
                   ) );  
                   ?>

                   <form class="form-inline my-2 my-lg-0" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                      <input class="form-control mr-sm-2" placeholder="Search for..." type="text" name="s" id="search" value="<?php the_search_query(); ?>">
                      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                   </form>
                  
              </div>
          </div>
      </nav>