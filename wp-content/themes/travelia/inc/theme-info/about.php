<?php
/**
 * About configuration
 *
 * @package Travelia
 */

$config = array(
	'menu_name' => esc_html__( 'Travelia Setup', 'travelia' ),
	'page_name' => esc_html__( 'Travelia Setup', 'travelia' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'travelia' ), 'Travelia' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'travelia' ), 'Travelia' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','travelia' ),
			'url'  => 'https://786themes.com/downloads/travelia-wordpress-theme/',
		),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','travelia' ),
			'url'  => 'https://786themes.com/demo/travelia/',
		),
		'documentation_url' => array(
			'text'   => esc_html__( 'Documentation','travelia' ),
			'url'    => 'https://786themes.com/demo/travelia/wp-content/uploads/Travelia.pdf',
		),
		'upgrade_url' => array(
			'text'   => esc_html__( 'Upgrade to Pro','travelia' ),
			'url'    => 'http://html5wp.com/downloads/travelia-pro-wordpress-theme/',
			'button' => 'primary'
		),
	),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'travelia' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'travelia' ),
		'support'             => esc_html__( 'Support', 'travelia' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'travelia' ),
			'text'                => esc_html__( 'Find step by step instructions to setup theme easily.', 'travelia' ),
			'button_label'        => esc_html__( 'View documentation', 'travelia' ),
			'button_link'         => 'https://786themes.com/demo/travelia/wp-content/uploads/Travelia.pdf',
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'travelia' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'travelia' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'travelia' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=travelia-about&tab=recommended_actions' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'travelia' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'travelia' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'travelia' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			'front-page' => array(
				'title'       => esc_html__( 'Setting Static Front Page','travelia' ),
				'description' => esc_html__( 'Create a new page to display on front page ( Ex: Home ) and assign "Home" template. Select A static page then Front page and Posts page to display front page specific sections. Note: Static page will be set automatically when you import demo content.', 'travelia' ),
				'id'          => 'front-page',
				'check'       => ( 'page' === get_option( 'show_on_front' ) ) ? true : false,
				'help'        => '<a href="' . esc_url( wp_customize_url() ) . '?autofocus[section]=static_front_page" class="button button-secondary">' . esc_html__( 'Static Front Page', 'travelia' ) . '</a>',
			),
			'wp-travel-engine' => array(
				'title'       => esc_html__( 'WP Travel Engine Plugin', 'travelia' ),
				'description' => esc_html__( 'Please install the WP Travel Engine Plugin Before Importing Demo.', 'travelia' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'wp-travel-engine',
				'id'          => 'wp-travel-engine',
			),
			'contact-form-7' => array(
				'title'       => esc_html__( 'Contact Form 7', 'travelia' ),
				'description' => esc_html__( 'Please install the Contact Form 7 plugin Before Importing Demo.', 'travelia' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'contact-form-7',
				'id'          => 'contact-form-7',
			)
		),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'travelia' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'travelia' ),
			'button_label' => esc_html__( 'Contact Support', 'travelia' ),
			'button_link'  => esc_url( 'http://786themes.com/downloads/travelia-wordpress-theme/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'travelia' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'travelia' ),
			'button_label' => esc_html__( 'View Documentation', 'travelia' ),
			'button_link'  => 'https://786themes.com/demo/travelia/wp-content/uploads/Travelia.pdf',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Customization Request', 'travelia' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'This is 100% free theme and has premium version.Either Upgrade to Pro or  Feel free to contact us any time if you need any customization service.', 'travelia' ),
			'button_label' => esc_html__( 'Upgrade to Pro', 'travelia' ),
			'button_link'  => 'http://html5wp.com/downloads/travelia-pro-wordpress-theme/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
	),


);
Travelia_About::init( apply_filters( 'travelia_about_filter', $config ) );