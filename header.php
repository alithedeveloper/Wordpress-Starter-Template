<?php
/**
 *  header.php
 *
 *  The header for the theme
 */
?>

<?php
   /**
    *  Dynamically loading the favicons from icons folder in img folder
    */
 
   $favicon = IMAGES . '/icons/favicon.png';
   // Custom touch icon
   $touch_icon = IMAGES . '/icons/apple-touch-icon.png';
?>


<!doctype html>
<html class="no-js" lang="<?php language_attributes() ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<?php //forcing IE Explorer to render the latest randering Engine ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>

	<?php // Mobile meta tags ?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php bloginfo( 'description' ); ?> ">

    <?php // Icons and favicons ?>
	<link rel="apple-touch-icon" href="<?php echo $touch_icon; ?>">
	<link rel="short icon" href="<?php echo $favicon ; ?>">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade 
   your browser</a> to improve your experience.</p>
<![endif]-->

  <header class="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
	  <section class="site-logo">
		  <div class="visuallyhidden">
			  <h1>Computernerd</h1>
			  <h2>I design and develop beautiful web experiences</h2>
		  </div><!--/ visuallyhidden -->
		  <p class="logo" itemscope itemetype="http://schema.org/Organization">
		      <a href="<?php echo esc_url( home_url('/') ); ?>" rel="home"></a>
		  </p><!--/ logo -->
	  </section><!--/ site-log -->
	  <nav class="site-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
		  <?php
		     $args = [
		         'containet'         => false,
			     'theme_location'    =>  'main-menu',
			     'menu_class'        =>  'site-menu'
		     ];
		     wp_nav_menu( $args );
		  ?>
	  </nav><!--/site-navigation -->
  </header><!--/ site-header -->

  <!-- / page content wrapper -->
  <main class="site-main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">




