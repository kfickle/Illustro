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
                    
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                       
                        <?php echo get_bloginfo( 'name' ); ?>
                    </a>
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

        <!--FEATURE SECTION-->

        <section id="feature">
            <div class="container-fluid">
                <div class="row feature">

                    <img src="<?php header_image(); ?>" alt=" Custom Hero Image">
                    <div class="feature-text col-xs-10 col-md-8 col-lg-6 col-xs-offset-1 col-md-offset-2 col-lg-offset-3">
                        <p><?php echo html_entity_decode(get_bloginfo('description')) ?></p>

                    </div>
                    <!-- /feature-text -->
                </div>
                <!-- /row feature -->
            </div>
            <!-- /container-fluid -->
        </section>
        <!-- closes feature section-->
    </header>

    <!--FEATURE SECTION ENDS-->
    <!--HEADER ENDS-->
