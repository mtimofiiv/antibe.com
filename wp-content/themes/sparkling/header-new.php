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

<style>
@font-face {
	font-family: 'BN';
	src: url('http://antibe.com/assets/bn.eot');
	src:
	url('http://antibe.com/assets/bn.eot?#iefix') format('embedded-opentype'),
	url('http://antibe.com/assets/bn.woff') format('woff'),
	url('http://antibe.com/assets/bn.ttf') format('truetype'),
	url('http://antibe.com/assets/bn.svg#bebas_neueregular') format('svg');
	font-weight: normal;
	font-style: normal;
}

@font-face {
	font-family: 'F';
	src: url('http://antibe.com/assets/f.eot');
	src:
	url('http://antibe.com/assets/f.eot?iefix') format('eot'),
	url('http://antibe.com/assets/f.woff') format('woff'),
	url('http://antibe.com/assets/f.ttf') format('truetype'),
	url('http://antibe.com/assets/f.svg#f') format('svg');
	font-weight: normal;
	font-style: normal;
}

header {
	background: #83161a;
	height: 74px;
	width: 100%;
	position: fixed;
	left: 0;
	top: 0;
	-webkit-box-shadow: 0 2px 5px 1px #383838;
	box-shadow: 0 2px 5px 1px #383838;
	z-index: 99999;
}

header a.branding {
	float: left;
	padding: 5px;
}

header ul.main-nav {
	list-style-type: none;
	float: right;
	margin-top: 20px;
}

header ul.main-nav li {
	float: left;
	color: #be1b21;
	font-family: 'BN', Impact, Helvetica, Arial, sans-serif;
	font-size: 30px;
	margin-left: 5px;
}

header ul.main-nav li a {
	color: white;
}

header ul.main-nav li a.active {
	color: #ccc;
}

.contain {
	width: 1000px;
	margin: 0 auto;
}

#content {
	margin-top: 80px;
}
</style>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header>
		<div class="contain">
			<a href="http://antibe.com/#home" class="branding" data-scroll data-speed="500" data-easing="easeInOutCubic" data-url="true"><img src="http://antibe.com/assets/branding.png"></a>
			<ul class="main-nav" data-scroll-header>
				<li><a id="nav-team" href="http://antibe.com/#team">Dave &amp; the Team</a></li>
				<li>|</li>
				<li><a id="nav-services" href="http://antibe.com/#services">Services</a></li>
				<li>|</li>
				<li><a id="nav-join" href="http://antibe.com/#join">Join Us</a></li>
				<li>|</li>
				<li><a id="nav-contact" href="http://antibe.com/#contact">Contact Us</a></li>
				<li>|</li>
				<li><a href="http://blog.antibe.com">Blog</a></li>
			</ul>
		</div>
	</header>

	<div id="content" class="site-content">

			<div class="top-section">
				<?php sparkling_featured_slider(); ?>
				<?php sparkling_call_for_action(); ?>
			</div>

		<div class="container main-content-area">
			<div class="row">
				<div id="content" class="main-content-inner col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
