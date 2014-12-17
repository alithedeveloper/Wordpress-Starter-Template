<?php
/**
 *  404.php
 *
 *  Display info if page not found
 */
?>
<?php get_header(); ?>

<div class="error404">
	<h1><?php _e( 'Error 404 - Nothing found', 'sonia'); ?></h1>
	<p><?php _e( 'It looks like the information you were looking for is missing. Why not try a search ?', 'sonia'); ?></p>

	<?php get_search_form(); ?>

</div>

<?php get_footer(); ?>
<!-- IE needs 512+ bytes: http://blogs.msdn.com/b/ieinternals/archive/2010/08/19/http-error-pages-in-internet-explorer.aspx -->
