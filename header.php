<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" type="image/vnd.microsoft.icon" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<title><?php if (is_front_page()) {bloginfo( 'name' );} else {wp_title('');} ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="network-branding" class="container-fluid text-white">
  <div class="container">
    <div class="row">
			<img class="masthead-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/masthead-hhs-logo.png" alt="HHS Logo Icon">
			<a class="masthead-link hhs-link" href="https://www.hhs.gov/"><span class="d-none d-xl-inline-block">U.S. Department of Health and Human Services</span> <span class="d-xl-none d-inline-block">HHS</span></a>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/masthead-divider.png" alt="NIH Logo Icon">
			<img class="masthead-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/masthead-nih-logo.png">
			<a class="masthead-link nih-link" href="https://www.nih.gov/"><span class="d-none d-lg-inline-block">National Institutes of Health</span> <span class="d-lg-none d-inline-block">NIH</span></a>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/masthead-divider.png">
			<img class="masthead-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/masthead-nih-logo.png" alt="NCATS Logo Icon">
			<a class="masthead-link ncats-link" href="https://www.ncats.nih.gov/"><span class="d-none d-md-inline-block">National Center for Advancing Translational Sciences</span> <span class="d-md-none d-inline-block">NCATS</span></a>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/masthead-divider.png">
    </div>
  </div>
</div>

	<div class="container">
		<div id="header-logos" class="row no-gutters align-items-center justify-content-center pt-3 pt-md-0 mt-2 mt-md-3 mb-4">
			<div class="pl-1 pl-md-0 col-9 col-md-8">
				<div class="row align-items-center">
					<?php dynamic_sidebar('site-logo'); ?>
					<?php dynamic_sidebar('network-logo'); ?>
					<?php dynamic_sidebar('network-logo-2'); ?>
				</div>
			</div>
			<?php if(!is_search()) : ?>
			<div class="col-2 text-center d-md-none">
				<a class="btn btn-light" data-toggle="collapse" href="#searchform-mobile" role="button" aria-expanded="false" aria-controls="searchform-mobile">
					<i class="fas fa-search"></i>
				</a>
			</div>
			<div id="searchform" class="d-none d-md-block col-md-4 mt-4 mt-md-0 pl-3">
				<?php get_search_form( true );?>
			</div>
			<div id="searchform-mobile" class="collapse col-11 col-md-4 mt-4 p-1">
				<?php get_search_form( true );?>
			</div>
			<?php endif; ?>
		</div>

		<?php if (is_search()) : ?>
		<div id="searchform" class="col-12">
			<?php get_search_form( true );?>
		</div>
		<?php endif; ?>

		<?php //Desktop Nav ?>
		<?php if (!is_search()) : ?>
		<div id="main-nav" class="row no-gutters">
			<div class="col-12 d-none d-lg-block">
				<?php
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => 'nav',
					'container_class'   => '',
					'container_id'      => 'nav-primary',
					'menu_class'        => 'nav nav-fill',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker(),
				) );
				?>
			</div>
		</div>

		<?php //Mobile Nav ?>
		<nav class="d-lg-none navbar navbar-expand-lg" role="navigation">
		  <div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#main-nav-mobile" aria-controls="main-nav-mobile" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i> Menu
			</button>
				<?php
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'main-nav-mobile',
					'menu_class'        => 'nav navbar-nav'
				) );
				?>
			</div>
		</nav>

	<?php endif; ?>
	</div>

<div id="wrapper" class="container">
