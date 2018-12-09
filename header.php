<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Copyright (c) <?php echo date("Y"); ?> Michael Campanella" />

	
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<?php wp_head(); ?>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->			
</head>
<body <?php body_class(); ?>>
	<header>
		<div class="wrapper">
			<a href="https://www.campanella.se/" title="Michael Campanella Photography" rel="home" id="branding">
				<img srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png 710w, <?php echo get_stylesheet_directory_uri(); ?>/images/logo-2x.png, 1420" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-2x.png" alt="<?php bloginfo( 'description' ); ?> - <?php bloginfo( 'name' ); ?>" />
			</a><!-- branding -->
		</div><!-- .wrapper -->
	</header><!-- header -->
		
	<nav>
		<div class="wrapper">
			<?php wp_nav_menu( array( 'container' => '' )); ?>
		</div><!-- .wrapper -->
	</nav><!-- nav -->
		
	<section>
		<div class="wrapper">