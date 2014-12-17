<?php
/**
 *  content-quote.php
 *
 *  Page for displaying posts with link post formats
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="entry-content">

		<?php

			the_content( __( 'Continue Reading More &rarr;', 'sonia' ) );
			wp_link_pages() ;

		?>

	</section><!--/ entry-content -->
	<footer class="entry-footer">
		<p class="entry-meta">

			<?php sonia_post_metadata(); ?>

		</p><!--/ entry-meta -->
	</footer>
</article>

