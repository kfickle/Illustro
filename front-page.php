<?php get_header('alt'); ?>
<!-- JUMBOTRON SECTION-->

<section class="welcome well" id="welcome">
    <div class="container-fluid">

        <h3><?php echo get_theme_mod( 'welcome_title','Welcome to Our Website! This section can be changed within the customizer to include welcome messages, promotional messages, announcements, etc. The section expands as you add more text' ); ?>
</h3>

    </div>
    <!--closes container-fluid-->
</section>

<!--JUMBOTRON ENDS-->



<!-- 3 COLUMN CONTENT AREA w/ FULL WIDTH HEADER-->

<section class="categoryPosts">

    <div class="container-fluid">

        <!-- 3 COLUMNS START-->
        <div class="row">
            <?php echo('<h2>' . get_cat_name('news') . '</h2>' ); ?>
            <?php
    $args = array(
       'orderby' => 'date',
	   'posts_per_page' => 3,
       'category_name' => 'news'
    );
    $recent_posts = new WP_Query( $args );
?>
                <?php if ( $recent_posts->have_posts() ) : ?>
                <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <div class="col-sm-4">
                    <a href="<?php the_permalink() ?>">
          <?php if (has_post_thumbnail() ) {
             the_post_thumbnail();
}
         else {
             echo '<img src="' . get_template_directory_uri() . '/img/placeholder-image.jpg" alt= "placeholder image"> ';
             
         }
            // creates featured images for posts, but when a featured image doesn't exist, a placeholder image is substituted.
          
          ?></a>

                    <a href="<?php the_permalink() ?>">
                        <?php the_title(); ?>
                    </a>
                </div>
                <!-- /.cols -->
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php else : ?>
                <div class="col-xs-12 news-section">
                    <p>
                        <?php _e( 'No posts have been created yet.<br>
Add and create posts.<br>Be sure to give each post a featured image, otherwise a placeholder image will be substituted for the lacking featured image.', 'illustro'); ?></p>
                </div>
                <!-- /.col -->
                <?php endif; ?>

        </div>
        <!-- closes "row" div for 3 columns-->
    </div>
    <!-- closes "container-fluid" div for 3 columns-->


</section>

<!-- 3 COLUMNS END-->

<?php include 'frontpage-sidebar.php'; ?>

<?php get_footer(); ?>
