<?php if ( comments_open() ) : ?>

    <!-- Comments Form -->
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            <form action="<?php echo site_url( 'wp-comments-post.php' ) ?>" method="post" id="commentform">
                <input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" id="comment_post_ID">
                <div class="form-group">
                    <textarea class="form-control" name="comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
        </div>
    </div>

<?php else : ?>
    <p><?php _e( 'Comments are closed', 'blog' ); ?></p>
<?php endif;?>
<br>

<?php foreach ( $comments as $comment ) : ?>
    <div class="media mb-2 px-3">
        <a class="media-left" href="#">
            <img class="media-object d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="img-thumbnail">
        </a>
        <div class="media-body">
            <h5 class="mt-0">
                <a href="<?php comment_author_url(); ?>"><?php comment_author(); ?></a> - <mail><?php comment_date(); ?></mail>
            </h5>
            <div><?php comment_text(); ?></div>
        </div>
    </div>
    <hr>
<?php endforeach; ?>
