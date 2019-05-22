<?php get_header(); ?>

<!--BLOG CONTENT BELOW pulled from archive.php-->



<div class="container-fluid">


    <div class="col-sm-9 blogmain">
        <div class="row">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

           <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
                <h1 class="blog-post-title">
                    <?php the_title(); ?> </h1>
                <p class="blog-post-meta">
                    <?php echo get_the_date(); ?>
                    <?php _e('by', 'illustro');?>
                    <?php the_author_posts_link(); ?><br>
                    <?php _e('Posted in:','illustro'); ?>
                    <?php the_category(', ');?>
                </p>

                <?php the_content(); ?>

                <?php
    $defaults = array(
         'before'           => '<p class="pagination">',
         'after'            => '</p>',
         'link_before'      => '<span>',
         'link_after'       => '</span>',
         'next_or_number'   => 'number',
         'separator'        => ' &nbsp;&nbsp;',
         'nextpagelink'     => __( 'Next page' ),
         'previouspagelink' => __( 'Previous page' ),
         'pagelink'         => '%',
         'echo'             => 1
    );
    wp_link_pages( $defaults );
?>

                    <p>
                        <?php the_tags();?>
                    </p>
                    <?php
                           if ( comments_open() ) {
                          comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post');
                         
                           }
        ?>

            </article>
            <nav>
                <ul class="pager">
                    <li>
                        <?php previous_post_link('%link', '&larr; Previous post in category', TRUE); ?>
                    </li>
                    <li>
                        <?php next_post_link( '%link', 'Next post in category &rarr;', TRUE); ?>
                    </li>
                </ul>
            </nav>


            <!-- /.blog-post -->

            <?php endwhile; else : ?>
            <p>
                <?php _e( 'Sorry, no posts matched your criteria.', 'illustro' ); ?>
            </p>
            <?php endif; ?>
        </div>

        <?php
	if ( comments_open() ) {
	  echo '<div class="well">';
	  comments_template();
	  echo '</div>';
  	}
?>
        
    </div>
    <div class="col-sm-3">
        <div class="row sidebar-module">
         
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>




<?php get_footer(); ?>
