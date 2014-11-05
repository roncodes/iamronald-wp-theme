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
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/animate.css" type="text/css" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="main">
		<button id="sidenav-toggle"><i class="fa fa-bars"></i></button>
		<div class="container">
			<header role="banner">
				<div class="row">
					<div class="col-xs-4">
						<div class="logo"><a href="/"><?=get_bloginfo('name')?></a></div>
					</div>
					<div class="col-xs-8">
						<nav class="primary">
							<?=wp_nav_menu()?> 
						</nav>
					</div>
				</div>
			</header>

			<div id="content" class="site-content">
