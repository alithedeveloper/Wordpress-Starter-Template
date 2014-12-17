<?php
/**
 *  sidebar.php
 *
 *  The primary Sidebar
 */
?>


<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

  <aside class="main-sidebar" role="complementary">

	  <?php dynamic_sidebar( 'sidebar-1' ); ?>

  </aside><!--/ sidebar -->

<?php endif; ?>

