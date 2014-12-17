<?php
/**
 *  Single.php
 *
 *  The template for displaying single post 
 */

?>

<?php get_header(); ?>
	<section class="main-content" role="main">
		<?php while ( have_posts() ) : the_post() ; ?>

			<?php get_template_part( 'content/content', get_post_format() );?>

			<?php comments_template(); ?>

		<?php endwhile; ?>
	</section><!--/ main-content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>