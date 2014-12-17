<?php
/**
 *  archive.php
 *
 *  Template for displaying archives
 */
?>

<?php get_header(); ?>

<?php get_header(); ?>
<section class="main-content" role="main">
	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1>
				<?php
				 if( is_day() ) {
					 printf( __('Daily Archives for %s', 'sonia' ), get_the_date() );
				 }elseif ( is_month() ) {
					printf( __('Monthly Archives for %s', 'sonia' ),
						    get_the_date( _x( 'F Y' , 'Monthly Archives date format', 'sonia')) );
				}elseif ( is_year() ) {
					 printf( __('Yearly Archives for %s', 'sonia' ),
						 get_the_date( _x( 'Y' , 'Yearly Archives date format', 'sonia')) );
				 }else{
					 _e( 'Archives', 'sonia');
				 }
				?>
			</h1>
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

