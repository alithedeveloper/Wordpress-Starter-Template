<?php
/**
 *  search.php
 *
 *  Template for search results
 */
?>

<?php get_header(); ?>

<?php get_header(); ?>
<section class="main-content" role="main">
	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1>
				<?php
				printf( __('Search results for %s', 'sonia' ), get_search_query() );
				?>
			</h1>
			<?php
			// Show a description if exists
			if ( category_description() ) {
				echo '<p class="category-description">' . category_description() . '</p>';
			}
			?>
		</header><!--/ page-header -->

		<?php while( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content/content' , get_post_format() ); ?>
		<?php  endwhile; ?>

		<?php sonia_pagination_nav(); ?>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
</section><!--/ main-content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>

