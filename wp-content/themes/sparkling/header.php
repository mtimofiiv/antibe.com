<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sparkling
 */
?><!doctype html>
	<!--[if !IE]>
	<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 7 ]>
	<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 8 ]>
	<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 9 ]>
	<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
	<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- favicon -->

<?php if ( of_get_option( 'custom_favicon' ) ) { ?>
<link rel="icon" href="<?php echo of_get_option( 'custom_favicon' ); ?>" />
<?php } ?>

<!--[if IE]><?php if ( of_get_option( 'custom_favicon' ) ) { ?><link rel="shortcut icon" href="<?php echo of_get_option( 'custom_favicon' ); ?>" /><?php } ?><![endif]-->

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header <?php echo is_front_page() ? 'header-fixed' : ''; ?>" role="banner">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="row">
					<div class="site-navigation-inner col-sm-12">
				        <div class="navbar-header">
				            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
				                <span class="sr-only">Toggle navigation</span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				            </button>

						<?php if( get_header_image() != '' ) : ?>

							<div id="logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>"  height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
							</div><!-- end of #logo -->

						<?php endif; // header image was removed ?>

						<?php if( !get_header_image() ) : ?>

							<div id="logo">
								<a class="main-logo" href="http://antibe.com"><img src="http://antibe.com/assets/branding.png"></a>
								
					            <!-- <a class="blog-home" href="<?php bloginfo('url'); ?>">Blog</a> -->
							</div><!-- end of #logo -->

						<?php endif; // header image was removed (again) ?>

				        </div>
				        <div id="main-nav" class="collapse navbar-collapse">
				        	<?php $relative_path = get_relative_menu_path(); ?>
				        	<ul class="main-nav" data-scroll-header>
								<li><a id="nav-team" href="<?php echo $relative_path; ?>#team" data-scroll data-speed="500" data-easing="easeInOutCubic" data-url="true">Dave &amp; the Team</a></li>
								<li class="hide-xs show-sm">|</li>
								<li><a id="nav-services" href="<?php echo $relative_path; ?>#services" data-scroll data-speed="500" data-easing="easeInOutCubic" data-url="true">Services</a></li>
								<li class="hide-xs show-sm">|</li>
								<li><a id="nav-join" href="<?php echo $relative_path; ?>#join" data-scroll data-speed="500" data-easing="easeInOutCubic" data-url="true">Join Us</a></li>
								<li class="hide-xs show-sm">|</li>
								<li><a id="nav-contact" href="<?php echo $relative_path; ?>#contact" data-scroll data-speed="500" data-easing="easeInOutCubic" data-url="true">Contact Us</a></li>
								<li class="hide-xs show-sm">|</li>
								<li><a href="http://blog.antibe.com">Blog</a></li>
							</ul>
				        </div>
					<?php // sparkling_header_menu(); ?>
				</div>
		    </div>
		  </div>
		</nav><!-- .site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

			<div class="top-section">
				<?php sparkling_featured_slider(); ?>
				<?php sparkling_call_for_action(); ?>
			</div>

		<div class="container main-content-area">
			<div class="row">
				<div id="content" class="main-content-inner col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
