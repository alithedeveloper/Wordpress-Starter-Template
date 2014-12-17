<?php
/**
 *  content-link.php
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
		<?php

		// if single page and author bio exists then display it
		if ( is_single() && get_the_author_meta( 'description') ) {
			echo '<h2>'. __( 'Written By ', 'sonia') . get_the_author() . '</h2>';
			echo '<p>' . the_author_meta( 'description' ) . '</p>';
		}

		?>
	</footer>
</article>




