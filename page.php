<?php get_header(); ?>
      
<div class="container main">

    <div class="row">
        <div class="col-sm-9">
            
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>

                <div class="mb-5">
                    <?php the_post_thumbnail( 'full', array( 'class' => 'card-img-top img-fluid', 'alt' => 'img' ) ); ?>
                    <div>
                        
                        <p><?php the_content(); ?></p>                   
                    </div>
                </div>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>
        <div class="col-sm-3">
            <h3>Sidebar</h3>
        </div>
    </div>
</div>
         
<?php get_footer(); ?>   
  