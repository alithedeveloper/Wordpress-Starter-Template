<?php
/**
 * index.php
 *
 * The main file
 */
?>
<?php get_header(); ?>
<section class="main-content">

    you getting this because there is no page.php
	<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
		<?php get_template_part( 'content/content', get_post_format() ); ?>
	<?php endwhile;
		sonia_pagination_nav();
	?>

	<?php else:?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
</section><!--/ main-content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
