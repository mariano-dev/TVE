<?php
function travelia_scripts() {

	// Google Font
	wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900', array(), '' );

	//Load Nice Select Css
	wp_enqueue_style( 'nice-select', get_template_directory_uri() .'/assets/css/nice-select.css', array(), '1.0.0' );

	// Load Bootstrap CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.css', array(), '4.0.0' );

	// Load Datepicker CSS
	wp_enqueue_style( 'datepicker', get_template_directory_uri() .'/assets/css/datepicker.css', array(), '2.0.0' );

	// Jquery UI CSS
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() .'/assets/css/jquery-ui.css', array(), '1.11.4' );

	// Jquery Fancybox CSS
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() .'/assets/css/jquery.fancybox.min.css', array(), '1.0.0' );

	// Magnific Popup CSS
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() .'/assets/css/magnific-popup.min.css', array(), '1.0.0' );

	// Font Awesome CSS
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css', array(), ' 4.7.0' );

	// Owl Carousel CSS
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() .'/assets/css/owl-carousel.css', array(), '2.2.1' );
	
	// Slicknav CSS
	wp_enqueue_style( 'slicknav', get_template_directory_uri() .'/assets/css/slicknav.min.css', array(), ' 1.0.10' );

	// Animate CSS
	wp_enqueue_style( 'animate', get_template_directory_uri() .'/assets/css/animate.css', array(), ' 1.0.0' );

	// Reset CSS
	wp_enqueue_style( 'travelia-reset', get_template_directory_uri() .'/assets/css/reset.css', array(), ' 1.0.0' );
	
	// Style CSS
	wp_enqueue_style( 'travelia-style', get_stylesheet_uri() );

	// Travel css
	wp_enqueue_style( 'travel', get_template_directory_uri() .'/assets/css/travel.css', array(), ' 1.0.0' );

	// Responsive CSS
	wp_enqueue_style( 'travelia-responsive', get_template_directory_uri() .'/assets/css/responsive.css', array(), ' 1.0.0' );

	wp_enqueue_script('jquery-ui-core');

	wp_enqueue_script('jquery-ui-slider');
	
	// Popper Js
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '1.12.1', true );

	// Bootstrap Js
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '4.1.1', true );

	// Bootstrap Datepicker Js
	wp_enqueue_script( 'bootstrap-datepicker', get_template_directory_uri() . '/assets/js/bootstrap-datepicker.js', array(), '4.1.1', true );

	// Steller Js
	wp_enqueue_script( 'steller', get_template_directory_uri() . '/assets/js/steller.js', array(), '1.0.0', true );


	//  Slicknav JS
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/slicknav.min.js', array(), '1.0.10', true );

	//  Niceselect JS
	wp_enqueue_script( 'niceselect', get_template_directory_uri() . '/assets/js/niceselect.js', array(), '1.0.0', true );

	//  Owl Carousel JS
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl-carousel.js', array(), '2.2.1', true );

	//  Magnific Popup JS
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.js', array(), '1.1.0', true );

	//  Waypoints JS
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array(), '2.0.3', true );

	// Wow Min JS 
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '1.1.2', true );

	// Jquery Counterup JS  
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/assets/js/jquery-counterup.min.js', array(), '1.0.0', true );


	// ScrollUp JS
	wp_enqueue_script( 'scrollup', get_template_directory_uri() . '/assets/js/scrollup.js', array(), '2.4.1', true );

	// Easing JS
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/easing.js', array(), '1.0.0', true );

	// Active JS
	wp_enqueue_script( 'travelia-main', get_template_directory_uri() . '/assets/js/active.js', array(), '1.0.0', true );

	wp_enqueue_script( 'travelia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'travelia-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'travelia_scripts' );