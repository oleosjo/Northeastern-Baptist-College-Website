<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-precomposed.png">

		<link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js"></script>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php $options = get_option( 'nebc_settings' ) ?>
	<?php do_action( 'foundationpress_after_body' ); ?>
	<?php do_action( 'foundationpress_layout_start' ); ?>
	<div id="wrapper">
	<div id="student-portal-menu">
		<div class="row align-center">
			<div class="large-offset-3 columns show-for-large"></div>
			<div class="portal-button columns">
				<a href="<?php echo $options['student_portal_link_0']; ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/WebsiteIcon_Populi-01.svg" alt="">
				<div class="portal-label">Populi</div>
				</a>
			</div>
			<div class="portal-button columns">
				<a href="<?php echo $options['student_portal_link_1']; ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/WebsiteIcon_Calendar-01.svg" alt="">
				<div class="portal-label">Calendar</div>
				</a>
			</div>
			<div class="portal-button columns">
				<a href="<?php echo $options['student_portal_link_2']; ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/WebsiteIcon_OnlinePay-01.svg" alt="">
				<div class="portal-label">Online Payments</div>
				</a>
			</div>
			<div class="portal-button columns">
				<a href="<?php echo $options['student_portal_link_3']; ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/WebsiteIcon_Library-01.svg" alt="">
				<div class="portal-label">Library</div>
				</a>
			</div>
			<div class="portal-button columns">
				<a href="<?php echo $options['student_portal_link_4']; ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/WebsiteIcon_WriteCent-01.svg" alt="">
				<div class="portal-label">Writing Center</div>
				</a>
			</div>
			<div class="portal-button columns">
				<a href="<?php echo $options['student_portal_link_5']; ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/WebsiteIcon_Handbook-01.svg" alt="">
				<div class="portal-label">Student Handbook</div>
				</a>
			</div>
		</div>
	</div>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'parts/mobile-off-canvas' ); ?>
	<?php endif; ?>


	<header id="masthead" class="site-header" role="banner">

		<div class="title-bar" data-responsive-toggle="mobile-nav">
			<div class="top-bar-right">
				<ul class="dropdown menu">
					<li><button class="menu-icon" type="button" data-toggle="offCanvas"></button></li>
					<li class="menu-item pull-right"><a class="student-portal-button" href="#">STUDENT PORTAL</a></li>
				</ul>
			</div>
		</div>

		<nav class="student-portal top-bar show-for-large" role="navigation">
			<div class="top-bar-right">
				<ul class="dropdown menu">
					<li class="menu-item"><a class="student-portal-button" href="#">STUDENT PORTAL</a></li>
				</ul>
			</div>
		</nav>

		<nav id="mobile-nav" role="navigation" class="top-bar hide-for-large row">
			<div class="top-bar-right">
					<?php foundationpress_top_bar_r(); ?>

					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
						<?php get_template_part( 'parts/mobile-top-bar' ); ?>
					<?php endif; ?>
			</div>
		</nav>

		<div class="hide-for-large mobile-logo">
	  	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" >
	  		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo_Full.svg" alt="">
	  	</a>
  	</div>

		<div class="show-for-large">
			<nav id="site-navigation" class="main-navigation top-bar row align-justify" role="navigation">
				<div id="logo" class="small-12 large-4 large-expand columns">
		    	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo_Full.svg" alt="">
		    	</a>
		    	<div class="flag-point">
    				<?php getfile('assets/images/icons/Blue_Arrow.svg'); ?>
		    	</div>
				</div>
				<div class="top-bar-right columns small-12 large-expand row align-right show-for-large" style="height:100%">
					<?php foundationpress_top_bar_r(); ?>

					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
						<?php get_template_part( 'parts/mobile-top-bar' ); ?>
					<?php endif; ?>
				</div>
			</nav>
		</div>

	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' ); ?>
