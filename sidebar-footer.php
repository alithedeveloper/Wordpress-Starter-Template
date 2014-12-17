<?php
/**
 *  sidebar-footer.php
 *
 *  The sidebar for footer to display widgets
 */
?>


<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>

	<div class="footer-sidebar" role="complementary">

		<?php dynamic_sidebar( 'sidebar-2' ); ?>

	</div><!--/ sidebar -->

<?php endif; ?>

