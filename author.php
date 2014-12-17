<?php
/**
*  author.php
*
*  Template for displaying author info
*/
?>

<?php get_header(); ?>

<?php get_header(); ?>
<section class="main-content" role="main">
	<?php if ( have_posts() ) : the_post() ; ?>

		<header class="page-header">
			<h1>
				<?php printf( __( 'All posts by %s', 'sonia' ), get_the_author() ); ?>
			</h1>
			<?php
			// if the author bio exist then display it
			if ( get_the_author_meta( 'description' ) ) {
				echo '<p class="author-info">' . the_author_meta( 'description' ) . '</p>';
			}
			?>

			<?php rewind_posts(); ?>

		</header><!--/ page-header -->

        <?php while( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content' , get_post_format() ); ?>
		<?php  endwhile; ?>

		<?php sonia_pagination_nav(); ?>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
</section><!--/ main-content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>

