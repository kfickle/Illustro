<?php
/**
*
* main-sidebar
*
*/


if ( is_active_sidebar('main-sidebar') ) : ?>
  <?php dynamic_sidebar('main-sidebar'); ?>
<?php else: ?>
  <div class="sidebar-module"> 
    <h4><?php _e('Custom Widget Area'); ?></h4>
  </div>
<?php endif; ?>