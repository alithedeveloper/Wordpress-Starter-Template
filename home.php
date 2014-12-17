<?php
/**
 *  page.php
 *
 * Template Name: Blog
 *
 *  The template for displaying all the pages
 */

?>

<?php get_header(); ?>
	<section class="main-content" role="main">
		<?php while ( have_posts() ) : the_post() ; ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- Article header -->
				<header class="entry-header">
					<?php
					// Post has a thumbnail which isn't password protected then display it
					if ( has_post_thumbnail() && ! post_password_required() ): ?>

						<figure class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</figure>

					<?php endif; ?>

					 <h1><?php the_title(); ?></h1>

				</header><!--/ end of entry-header-->

				<section class="entry-content">

					<?php  the_content();  ?>

					<?php wp_link_pages(); ?>

				</section><!--/ entry-content -->
				<footer class="entry-footer">
					<?php

					if ( is_user_logged_in () ) {
						echo '<p class="post-edit-link">';
						edit_post_link ( __ ( 'Edit', 'sonia' ), '<span class="meta-edit-span">', '</span>' );
						echo '</p>';
					}
					?>
				</footer>
			</article>

			<?php comments_template(); ?>

	    <?php endwhile; ?>
	</section><!--/ main-content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>