<?php 

/**
* Template Name: Full Width Page; no widget area
*/

get_header(); ?>

<!--BLOG CONTENT BELOW pulled from archive.php-->
<section class="full-width" id="full-width">
<div class="container-fluid">
 
        <div class="row">
            <div class="col-sm-11"
            
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


            <?php endwhile; else : ?>
            <p>
                <?php _e( 'Sorry, no posts matched your criteria.', 'illustro' ); ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
</section>

<?php get_footer(); ?>
