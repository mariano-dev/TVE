<?php
/**
 * Travelia Theme Customizer
 *
 * @package Travelia
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
use WPTRT\Customize\Section\Button;

function travelia_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'travelia_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'travelia_customize_partial_blogdescription',
		) );
	}

	//Upgrade to Pro
	$wp_customize->register_section_type( Button::class );

	$wp_customize->add_section(
		new Button( $wp_customize, 'travelia_pro', [
			'title'       => __( 'Buy Travelia Pro', 'travelia' ),
			'button_text' => __( 'Go Pro', 'travelia' ),
			'button_url'  => 'http://html5wp.com/downloads/travelia-pro-wordpress-theme/'
		] )
	);
}
add_action( 'customize_register', 'travelia_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function travelia_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function travelia_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function travelia_customize_preview_js() {
	wp_enqueue_script( 'travelia-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );

}
add_action( 'customize_preview_init', 'travelia_customize_preview_js' );


/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 */
function travelia_customize_backend_scripts() {
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'tavelia-customize-section-button',
		get_theme_file_uri( 'inc/upgrade-to-pro/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'tavelia-customize-section-button',
		get_theme_file_uri( 'inc/upgrade-to-pro/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);
}
add_action( 'customize_controls_enqueue_scripts', 'travelia_customize_backend_scripts', 10 );

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Load customizer required panels.
 */

require get_template_directory() .'/inc/customizer/travelia-general-panel.php';
require get_template_directory() .'/inc/customizer/travelia-header-panel.php';
require get_template_directory() .'/inc/customizer/travelia-frontpage-panel.php';
require get_template_directory() .'/inc/customizer/travelia-page-panel.php';

require get_template_directory() . '/inc/customizer/travelia-sanitize.php';
require get_template_directory() . '/inc/customizer/customizer-classes.php';

// Autoloader
include get_theme_file_path( 'inc/upgrade-to-pro/src/Loader.php' );

$loader = new \WPTRT\Autoload\Loader();

$loader->add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'inc/upgrade-to-pro/src' ) );

$loader->register();


