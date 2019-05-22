<?php 

/**
* Template Name: Left Sidebar; widget area stacks on top in mobile
*/

get_header(); ?>

<!--BLOG CONTENT BELOW pulled from archive.php-->

<!-- SIDEBAR SECTION -->

<div class="container-fluid">
  <div class="col-sm-3">
        <div class="row">
            <?php get_sidebar(); ?>

        </div>
    </div>

    <div class="col-sm-9 blogmain">
        <div class="row">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <article class="blog-post">
                <h1 class="blog-post-title">
                    <?php the_title(); ?> </h1>

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
    </div>
</div>

<?php get_footer(); ?>
