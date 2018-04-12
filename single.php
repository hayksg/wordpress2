<?php get_header(); ?>
      
<div class="container main">

    <div class="row">
        <div class="col-sm-9">
            
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>

                <div class="card mb-5">
                    <?php the_post_thumbnail( 'full', array( 'class' => 'card-img-top img-fluid', 'alt' => 'img' ) ); ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <div class="card-text"><small class="text-muted">Category: <?php echo get_the_category_list(', '); ?></small></div>
                        <div class="card-text">
                            <small class="text-muted">Posted by <?php the_author_posts_link(); ?></small>
                            <small class="text-muted"><?php echo some_time_ago(); ?></small>
                        </div>
                        <p class="card-text"><?php the_content(); ?></p>                   
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
  