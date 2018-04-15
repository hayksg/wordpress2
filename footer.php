<?php $theme_opts = get_option( 'tu_opts' ); ?>    

    <footer class="footer">
        <hr class="footer-hr">
        <div class="container">
            <?php if ( isset($theme_opts['footer']) && ! empty($theme_opts['footer']) ) : ?>
            <div class="text-muted mt-4"><?php echo $theme_opts['footer']; ?></div>
            <?php endif; ?>
            <div class="text-muted mt-2"><a id="back-to-top" href="#">Back to top</a></div>
        </div>
    </footer> 

    <?php wp_footer(); ?>
    </body>
</html>