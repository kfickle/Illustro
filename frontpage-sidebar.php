<!--HOME PAGE WIDGET AREA STARTS-->

            <div class="home-widgets well sidebar-module" id="home-widgets">
                <?php
                if ( is_active_sidebar('home-sidebar') ) : ?>
                <?php dynamic_sidebar('home-sidebar'); ?>
                <?php else: ?>
                <div class="sidebar-module">
                    <h4><?php _e( 'Add Your Widgets to this Main Sidebar'); ?></h4>
                </div>
                <?php endif; ?>
            </div>
 

<!--HOME PAGE WIDGET AREA ENDS-->
