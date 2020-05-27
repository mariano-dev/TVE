<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travelia
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php 
  		if ( function_exists( 'wp_body_open' ) )
    	wp_body_open();
  	?>
	<a class="skip-link screen-reader-text" href="#content">
	<?php _e( 'Skip to content', 'travelia' ); ?></a>
	<!-- Header Area -->
	<header id="site-header" class="site-header ">
		<!-- Start Topbar -->
		<?php get_template_part( 'header-parts/header', 'topbar' );?>
		<!--/ End Topbar -->
		<!-- Middle Header -->
		<?php get_template_part( 'header-parts/header', 'middle' );?>
		<!-- End Middle Header -->
		<!-- Header Bottom -->
		<?php get_template_part( 'header-parts/header', 'bottom' );?>
		<!--/ End Header Bottom -->
	</header>
	<!--/ End Header Area -->

	<?php if(!is_front_page() || is_home()): ?>
	<!-- Breadcrumb -->
	<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image:url(<?php if(has_header_image()):echo esc_url(get_header_image());endif;?>)">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="content">
						<?php if(is_home()): ?>
							<h2><?php bloginfo('name'); ?></h2>
							<p><?php bloginfo('description'); ?></p>
							<?php elseif (is_search()):?>
								<h2>
									<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'travelia' ), get_search_query() );?>
								</h2>

								<?php else: ?>
									<h2><?php the_title(); ?></h2>
									<?php breadcrumb_trail(); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		<?php endif; ?>
