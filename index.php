<?php get_header(); ?>
      
<div class="container main">
    <h1>Welcome To My Blog!</h1>
    <hr class="mb-5">
    
    <div class="row">
        <div class="col-sm-9">
            
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>

                <div class="card mb-5">
                    <?php the_post_thumbnail( 'full', array( 'class' => 'card-img-top img-fluid', 'alt' => 'img' ) ); ?>
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <div class="card-text"><small class="text-muted">Category: <?php echo get_the_category_list(', '); ?></small></div>
                        <div class="card-text">
                            <small class="text-muted">Posted by <?php the_author_posts_link(); ?></small>
                            <small class="text-muted"><?php echo some_time_ago(); ?></small>
                        </div>
                        <div class="mt-4">
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-info btn-sm">Read More &raquo;</a>
                        </div>
                    </div>
                </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <ul class="pagination justify-content-center">
                <?php
                $links = paginate_links( array( 
                    'type'      => 'array',
                    'prev_text' => __('«'),
	                'next_text' => __('»'),
                ) ); 
                
                if ($links && is_array($links)) {
                    foreach ($links as $link) {
                        echo '<li class="page-item">' . $link . '</li>';
                    }
                }
                ?>
            </ul>

        </div>
        <div class="col-sm-3">
            <h3>Sidebar</h3>
        </div>
    </div>
</div>
         
<?php get_footer(); ?>   
  