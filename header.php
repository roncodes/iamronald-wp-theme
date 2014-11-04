<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Iamronald
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap.min.css" type="text/css" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="container">
	<header id="masthead" class="site-header" role="banner">
		<div class="row">
			<div class="col-xs-4">
				I AM RONALD.
			</div>
			<div class="col-xs-8">
				<nav class="primary">
					<ul>
						<li><a href="">Home</a></li>
						<li><a href="">About</a></li>
						<li><a href="">Work</a></li>
						<li><a href="">Resume</a></li>
						<li><a href="">Contact</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>

	<div id="content" class="site-content">
