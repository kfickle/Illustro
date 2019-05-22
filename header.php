<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- HEADER SECTION STARTS -->

    <header>

        <!-- NAVBAR SECTION -->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
                    
                     <?php if( display_header_text()) : ?>
                    
                        <?php if( has_custom_logo()) :?>
                        <?php the_custom_logo(); ?>
                        <?php else : ?>

                    
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                       
                        <?php echo get_bloginfo( 'name' ); ?>
                    </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar">
                    <?php
                        wp_nav_menu( array(
                           'menu'              => 'primary',
                           'theme_location'    => 'primary',
                           'depth'             => 2,
                           'container'         => false,
                           'menu_class'        => 'nav navbar-nav',
                           'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                           'walker'            => new WP_Bootstrap_Navwalker())
                        );
                    ?>
                </div>
                <!--closes collapse-->
            </div>
            <!-- closed container fluid-->
        </nav>

        <!--NAV ENDS-->

        <!--DEFAULT PAGE HEADER SECTION-->

        <div class="container-fluid">
            <div class="row">
                  <?php if (is_archive()): ?>
                <div class="page-heading col-xs-12">
                    
                  
                    
                  <h1>
                    <?php
                            if(is_tag()) {
                           single_tag_title('Tag: ');
                         }
                         elseif(is_archive()) {
                           single_term_title('Category: '); 
                            if( is_month() ) {
                              _e('Posts from ','illustro');
                              single_month_title(' ');
                            }
                          }
                      ?>
                    </h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <!--DEFAULT PAGE HEADERSECTION ENDS-->
    <!--HEADER ENDS-->
