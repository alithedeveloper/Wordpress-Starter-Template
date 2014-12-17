<?php
/**
 *  comments.php
 *
 *  Template for displaying all the comments
 */
?>

<?php

  // Ensuring that the template is not directly loaded

//  if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
//	  wp_die( __( 'You cannot access this page directly', 'sonia' ), __( 'There has been an Error !!', 'sonia' ) );
//  }
?>

<?php
//if the post is password protected, display info text and return

  if ( post_password_required() ) : ?>

	  <p>
		  <?php

		  _e( 'This post is password protected. Enter the password to view the comments.', 'sonia' );
		  return;

	     ?>
	  </p>

<?php endif; ?>

<!-- Comments Area -->
<div class="comments-area" id="comments">

	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title">

			<?php

			   printf( _nx( 'One thought on &ldquo; %2$s &rdquo;', '%1$s thoughts on &ldquo; %2$s &rdquo;', get_comments_number(), 'sonia' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
			?>

		</h2><!--/ comments title -->
		<ol class="comments">

			<?php wp_list_comments(); ?>

		</ol><!--/ comments -->

		<?php //if comments are paginated then  show the links for pagination

		  if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="comments-navigation" role="navigation">
			<p class="comments-navigation__previous">

				<?php previous_comments_link( __('&laquo; Older Comments', 'sonia' ) ); ?>

			</p>
			<p class="comments-navigation__next">

				<?php next_comments_link( __(' Newer Comments &raquo;', 'sonia' ) ); ?>

			</p>

		</nav><!--/ end of comments navigation -->

		<?php endif; // get_comments_pages_count ?>

		<?php //if the comments are being disabled then show the info
		   if( ! comments_open() && get_comments_number() ) :
		?>

			   <p class="no-comments">
				   <?php _e('Comments are closed ', 'sonia'); ?>
			   </p>
		<?php endif; ?>

	<?php endif; // have comments ?>

	<?php comment_form(); ?>

</div> <!--/comments -->