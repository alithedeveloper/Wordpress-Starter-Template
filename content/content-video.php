<?php
/**
 *  content-video.php
 *
 *  Default template for displaying posts with Video post format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Article header -->
	<header class="entry-header"> <?php

		// If page is single then display the title
		// otherwise, display the title in link
		if ( is_single() ) : ?>

			<h1><?php the_title(); ?></h1>

		<?php else : ?>

			<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php endif; ?>

		<p class="entry-meta">

			<?php  sonia_post_metadata(); ?>

		</p><!--/ entry-meta -->


	</header><!--/ end of entry-header-->

	<section class="entry-content">

		<?php
		the_content( __( 'Continue Reading More &rarr;', 'sonia' ) );
		wp_link_pages() ;
		?>

	</section><!--/ entry-content -->
	<footer class="entry-footer">
		<?php
		// if single page and author bio exists then display it
		if ( is_single() && get_the_author_meta( 'description') ) {
			echo '<h2>'. __( 'Written By ', 'sonia') . get_the_author() . '</h2>';
			echo '<p>' . the_author_meta( 'description' ) . '</p>';
		}
		?>
	</footer>
</article>







