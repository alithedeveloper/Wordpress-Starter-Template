<?php
/**
 *  content.php
 *
 *  Responsible for displaying each post and is called in by index.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
	<!-- Article header -->
	<header class="article-header">
		<?php
		 // Post has a thumbnail which isn't password protected then display it
		  if ( has_post_thumbnail() && ! post_password_required() ): ?>

		   <figure class="entry-thumbnail">
			   <?php the_post_thumbnail(); ?>
		   </figure>

		<?php endif;
		  // If page is single then display the title
		  // otherwise, display the title in link
		  if ( is_single() ) : ?>

		   <h1 class="entry-title"><?php the_title(); ?></h1>

		  <?php else : ?>

			  <h1 class="entry-title">
			     <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( ); ?>">
			     <?php the_title(); ?></a>
			  </h1><!--/ entry-title -->

		  <?php endif; ?>

		<p class="entry-meta vcard">

			<?php  sonia_post_metadata(); ?>

		</p><!--/ entry-meta -->

	</header><!--/ end of article-header-->

	<section class="entry-content">
		<?php if ( is_search() ) : the_excerpt(); ?>
		<?php else : the_content( __( 'Continue reading &raquo;', 'sonia' ) ); wp_link_pages() ; endif; ?>

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
</article><!--/ article -->

