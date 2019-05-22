<?php get_header(); ?>

<!--BLOG CONTENT BELOW pulled from archive.php-->


<div class="container">

    <div class="col-sm-9 blogmain">
        <div class="row">
            <?php
// Display optional category description
if ( category_description() ) : ?>
                
            <div class="archive-meta">
               
                    <?php echo category_description(); ?>
                </div>
                <?php endif; ?>

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>

                    <h2 class="blog-post-title">

                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <p class="blog-post-meta">
                        <?php echo get_the_date(); ?>
                        <?php _e('by', 'illustro');?>
                        <a href="#">
                            <?php the_author(); ?> </a>
                    </p>

                    <?php the_post_thumbnail('medium'); ?>
                    <?php the_excerpt(); ?>

                    <ul class="pager">
                        <li><a href="<?php echo get_permalink(); ?>">Read More</a></li>

                    </ul>

                </article>
                <!-- /.blog-post -->

                <?php endwhile; else : ?>
                <p>
                    <?php _e( 'Sorry, no posts matched your criteria.', 'illustro' ); ?>
                </p>
                <?php endif; ?>

                <nav>
                    <ul class="pager">
                        <li>
                            <?php next_posts_link('&larr; Older Posts'); ?>
                        </li>
                        <li>
                            <?php previous_posts_link('Newer Posts &rarr;'); ?>
                        </li>
                    </ul>
                </nav>

        </div>
    </div>

    <div class="col-sm-3">

        <?php get_sidebar(); ?>


    </div>
</div>

<!--SIDEBAR ENDS-->

<?php get_footer(); ?>
