<?php

/**
 *  functions.php
 *
 *  The theme's functions and definitions
 */

/*
 * ==========================================================================================================
 *  1.0 Constants
 * ==========================================================================================================
 */

define ( 'THEMEROOT', get_template_directory () );
define ( 'IMAGES', THEMEROOT . '/img' );
define ( 'SCRIPTS', THEMEROOT . '/js' );
define ( 'SONIA', THEMEROOT . '/sonia' );
define ( 'STYLESHEET', get_stylesheet_directory_uri () );

/*
 * ==========================================================================================================
 *   2.0 Load the Framework
 * ==========================================================================================================
 */
require_once ( SONIA . '/init.php' );


/*
 * ==========================================================================================================
 *    3.0 Content Width
 * ==========================================================================================================
 */

if ( ! isset( $content_width ) ) {
	$content_width = 800;
}

/*
 * ==========================================================================================================
 *    4.0 Theme defaults and supported features
 * ==========================================================================================================
 */

if ( ! function_exists ( 'sonia_setup' ) ) {
	function sonia_setup () {
		/**
		 * Support for theme translation
		 */
		$lang_dir = THEMEROOT . '/languages';
		load_theme_textdomain ( 'sonia', $lang_dir );


		/**
		 * Add theme support for HTML5 Semantic Markup
		 */
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );


		/**
		 * Support for post formats
		 */
		add_theme_support ( 'post-formats',
			[
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio'
			]
		);
	}

	/**
	 * Support for automatic feed links
	 */
	add_theme_support ( 'automatic-feed-links' );

	/**
	 * Support for post thumbnails
	 */
	add_theme_support ( 'post-thumbnails' );

	/**
	 * Nav Menus registration
	 */
	register_nav_menus (
		[
			'main-menu' => __ ( 'Main Menu', 'sonia_setup' )
		]
	);

	add_action ( 'after_setup_theme', 'sonia_setup' );
}

/*
 * ==========================================================================================================
 *    5.0 Display meta information for a specific post
 * ==========================================================================================================
 */

if ( ! function_exists ( 'sonia_post_metadata' ) ) {

    /**
     * A better set up for the post meta to return only what we want to display in each post
     * rather than displaying all the information
     * @return [type] [description]
     */
	function sonia_post_metadata ( ) {

		echo '<ul class="entry-meta__list inline-list">';

		if ( get_post_type () === 'post' ) {
			// Sticky post
			if ( is_sticky () ) {
				echo '<li class="entry-meta-list__item meta-featured ">' .
				     '<i class="fa fa-thumb-tack"></i>' . __ ( 'Sticky Post', 'sonia' ) . '</li>';

			}

			// Get the Author of post
			printf (
				'<li class="entry-meta-list__item meta-author" itemprop="author" itemscope itemtype="http://schema.org/Person">
				 <a href="%1$s" rel="author">%2$s</a></li>',get_author_posts_url ( get_the_author_meta ( 'ID' ) ),get_the_author ()
			);

			//Get the date
			echo '</li class="entry-meta-list__item meta-date" itemprop="datePublished">' . get_the_date ( 'F j, Y' ) . '</li>';

			//Categories list
			$category_list = get_the_category_list ( ', ' );
			if ( $category_list ) {
				echo '<li class="entry-meta-list__item meta-categories' . $category_list . '</li>';
			}

			//Tags list
			$tag_list = get_the_tag_list ( ' ', ', ' );
			if ( $tag_list ) {
				echo '<li class="entry-meta-list__item meta-tags' . $tag_list . '</li>';
			}

			//Comments links
			if ( comments_open () ) {
				echo '<li class="entry-meta-list__item meta-comment">';
				echo '<span class="meta-reply-span">';
				comments_popup_link (
					__ ( 'Leave a comment', 'sonia' ),
					__ ( 'One comment so far', 'sonia' ),
					__ ( 'View all % comments', 'sonia' )
				);
				echo '</span>';
				echo '</li>';
			}

			// Edit link
			if ( is_user_logged_in () ) {
				echo '<li class="entry-meta-list__item meta-edit-link">';
				edit_post_link ( __ ( 'Edit', 'sonia' ), '<span class="meta-edit-span">', '</span>' );
				echo '</li>';
			}

		}

		echo '</ul><!-- end of meta-list -->';
	}
}

/*
 * ==========================================================================================================
 *    6.0 Custom Excerpt
 * ==========================================================================================================
 */

/**
 * Read More insted of default excerpt
 *
 * @param $more
 * @return string
 */

function sonia_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More &raquo;', 'sonia') . '</a>';
}
add_filter( 'excerpt_more', 'sonia_excerpt_more' );


/*
 * ==========================================================================================================
 *    7.0 Display navigation to the next previous posts
 * ==========================================================================================================
 */

if ( ! function_exists( 'sonia_pagination_nav' )) {
	function sonia_pagination_nav (){ ?>

		<ul class="paging-navigation">

			<?php if ( get_previous_posts_link() ) : ?>
			<li class="next-post">
				<?php previous_posts_link( __( 'New Posts &raquo;', 'sonia' ) ); ?>
			</li>
			<?php endif; ?>

			<?php if ( get_next_posts_link() ) : ?>
				<li class="previous-post">
					<?php next_posts_link( __( '&laquo; Older Posts', 'sonia' ) ); ?>
				</li>
			<?php endif; ?>

		</ul><!-- end of paging-navigation -->


   <?php }
}


/*
 * ==========================================================================================================
 *    8.0 Register the widgets Area
 * ==========================================================================================================
 */

if ( ! function_exists( 'sonia_widget_init') ) {
	function sonia_widget_init () {

		register_sidebar([

			'name'           =>  __( 'Main Widget Area', 'sonia' ),
			'id'             =>  'sidebar-1',
			'description'    =>  __('Appears on posts and pages', 'sonia'),
			'before_widget'  => '<div id="%1$s" class="widget %2$s">',
			'after_widget'   => '</div> <!--/ widget -->',
			'before_title'   => '<h4 class="widget-title">',
			'after_title'   => '</h4><!--/ widget-title -->'

		]);

		register_sidebar([

			'name'           =>  __( 'Footer Widget Area', 'sonia' ),
			'id'             =>  'sidebar-2',
			'description'    =>  __('Appears in Footer Area', 'sonia'),
			'before_widget'  => '<div id="%1$s" class="widget footer-widget %2$s">',
			'after_widget'   => '</div> <!--/ widget -->',
			'before_title'   => '<h4 class="widget-title">',
			'after_title'    => '</h4><!--/ widget-title -->'

		]);
	}
}


add_action( 'widgets_init', 'sonia_widget_init' );


/*
 * ==========================================================================================================
 *    9.0 Strip Unnecessay tags
 * ==========================================================================================================
 */

/**
 *  Currently the function only strip tags from attributes which has no numerics
 *  e.g. cant strip tag from h1, h2 etc
 *  TODO: Make function to account for h1,h2 tags as well
 * @param $input  : String from which tags needs to be stripped
 * @param $taglist : Array of tags that needs to be stripped
 *
 * @return mixed
 *
 * Example of usage
 *
 * $to_strip=array( "iframe", "script", "style", "embed", "object" );
 * $sampletext="Testing. <object>Am I an object?</object>\n";
 * print strip_these_tags($sampletext, $to_strip);
 *
 */

function strip_these_tags($input, $taglist) {
	$output=$input;
	foreach ($taglist as $tag) {
		if (preg_match('/^[a-z]+$/i', $tag)) {
			$patterns=array(
				'/' . "<".$tag."\/?>" . '/',
				'/' . "<\/".$tag.">" . '/'
			);
		} else
			if (preg_match('/^<[a-z]+>$/i', $tag)) {
				$patterns=array(
					'/' . str_replace('>', "?>", $tag) . '/',
					'/' . str_replace('<', "<\/?", $tag) . '/'
				);
			}
			else {
				$patterns=array();
			}
		$output=preg_replace($patterns, "", $output);
	}
	return $output;
}















