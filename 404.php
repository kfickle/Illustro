<?php get_header(); ?>

<!--BLOG CONTENT BELOW pulled from archive.php-->

<!-- SIDEBAR SECTION -->

<div class="container-fluid">


    <div class="col-sm-9 blogmain">
        
        <h2><?php _e( 'The Page You Were Looking For Does Not Seem To Be Here...'); ?></h2>
        
        <h3><?php _e( 'Sorry, but it seems you have come across a bad link or a missing page'); ?></h3>
        <br>
        <p><?php _e( 'We want to get you back on track. Please use the menu items above or the search form provided below'); ?></p>
     
       <div class="well">
          <?php get_search_form(); ?>
        </div>
        </div><!--end 404 content-->
  
    <div class="col-sm-3">
        <div class="row sidebar-module">
            <?php get_sidebar(); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>
