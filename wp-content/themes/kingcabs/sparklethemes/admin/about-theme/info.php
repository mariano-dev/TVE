<?php
/**
 * Info setup
 *
 * @package Kingcabs
 */

if ( ! function_exists( 'kingcabs_info_setup' ) ) :

	/**
	 * Info setup.
	 *
	 * @since 1.0.0
	 */
	function kingcabs_info_setup() {

		$config = array(

			// Welcome content.
			'welcome_content' => sprintf( esc_html__( '%1$s is a responsive WordPress theme for Limousine, Limo service, Car hire company, Bus, Coach, Taxi, Cab, Airport transfer service. This theme comes with well designed limo fleet layout, and beautiful booking form. It allows customer to book online and the form will send email to admin(limousine provider). Kingcabs theme is completely built on customizer which allows you to customize most of the theme settings easily with live previews, King Cabs supports many 3rd party plugins, compatible with Jetpack, WooCommerce and Contact Form 7, Official Support Forum: https://www.sparklewpthemes.com/support/ Full Demo: http://demo.sparklewpthemes.com/kingcabs/ and Docs: http://docs.sparklewpthemes.com/kingcabs/', 'kingcabs' ), 'Kingcabs' ),

			// Tabs.
			'tabs' => array(
				'getting-started' => esc_html__( 'Getting Started', 'kingcabs' ),
				'support'         => esc_html__( 'Support', 'kingcabs' ),
				'useful-plugins'  => esc_html__( 'Useful Plugins', 'kingcabs' ),
				'demo-content'    => esc_html__( 'Demo Content', 'kingcabs' ),
				'upgrade-to-pro'  => esc_html__( 'Upgrade to Pro', 'kingcabs' ),
			),

			// Quick links.
			'quick_links' => array(

				'theme_url' => array(
					'text' => esc_html__( 'Theme Details', 'kingcabs' ),
					'url'  => 'https://sparklewpthemes.com/wordpress-themes/kingcabs/',
				),

				'demo_url' => array(
					'text' => esc_html__( 'View Demo', 'kingcabs' ),
					'url'  => 'http://demo.sparklewpthemes.com/kingcabs/',
				),

				'documentation_url' => array(
					'text' => esc_html__( 'View Documentation', 'kingcabs' ),
					'url'  => 'http://docs.sparklewpthemes.com/kingcabs/',
				),

				'rating_url' => array(
					'text' => esc_html__( 'Rate This Theme','kingcabs' ),
					'url'  => 'https://wordpress.org/support/theme/kingcabs/reviews/#new-post',
				),

				'upgrade_to_pro' => array(
					'text' => esc_html__( 'Buy Pro Themes','kingcabs' ),
					'url'  => 'https://sparklewpthemes.com/wordpress-themes/kingcabspro/',
				)

			),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__( 'Theme Documentation', 'kingcabs' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'kingcabs' ),
					'button_text' => esc_html__( 'View Documentation', 'kingcabs' ),
					'button_url'  => 'http://docs.sparklewpthemes.com/kingcabs/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				
				'three' => array(
					'title'       => esc_html__( 'Theme Options', 'kingcabs' ),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__( 'Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'kingcabs' ),
					'button_text' => esc_html__( 'Customize', 'kingcabs' ),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
					),
				
				'five' => array(
					'title'       => esc_html__( 'Demo Content', 'kingcabs' ),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf( esc_html__( 'To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'kingcabs' ), esc_html__( 'One Click Demo Import', 'kingcabs' ) ),
					'button_text' => esc_html__( 'Demo Content', 'kingcabs' ),
					'button_url'  => admin_url( 'themes.php?page=kingcabs-info&tab=demo-content' ),
					'button_type' => 'secondary',
					)
				
				),

			// Support.
			'support' => array(
				'one' => array(
					'title'       => esc_html__( 'Contact Support', 'kingcabs' ),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'kingcabs' ),
					'button_text' => esc_html__( 'Contact Support', 'kingcabs' ),
					'button_url'  => 'https://sparklewpthemes.com/support/forum/wordpress-themes/free-themes/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Theme Documentation', 'kingcabs' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'kingcabs' ),
					'button_text' => esc_html__( 'View Documentation', 'kingcabs' ),
					'button_url'  => 'http://docs.sparklewpthemes.com/kingcabs/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'three' => array(
					'title'       => esc_html__( 'Child Theme', 'kingcabs' ),
					'icon'        => 'dashicons dashicons-admin-tools',
					'description' => esc_html__( 'For advanced theme customization, it is recommended to use child theme rather than modifying the theme file itself. Using this approach, you wont lose the customization after theme update.', 'kingcabs' ),
					'button_text' => esc_html__( 'Learn More', 'kingcabs' ),
					'button_url'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				),

			// Useful plugins.
			'useful_plugins' => array(
				'description' => esc_html__( 'Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'kingcabs' ),
				),

			// Demo content.
			'demo_content' => array(
				'description' => sprintf( esc_html__( 'To import demo content for this theme, %1$s plugin is needed. Please make sure plugin is installed and activated. After plugin is activated, you will see Import Demo Data menu under Appearance.', 'kingcabs' ), '<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">' . esc_html__( 'One Click Demo Import', 'kingcabs' ) . '</a>' ),
				),

			// Upgrade content.
			'upgrade_to_pro' => array(
				'description' => esc_html__( 'If you want more advanced features then you can upgrade to the premium version of the theme.', 'kingcabs' ),
				'button_text' => esc_html__( 'Buy Pro Themes', 'kingcabs' ),
				'button_url'  => 'https://sparklewpthemes.com/wordpress-themes/kingcabspro/',
				'button_type' => 'primary',
				'is_new_tab'  => true,
				),
			);

		Kingcabs::init( $config );
	}

endif;

add_action( 'after_setup_theme', 'kingcabs_info_setup' );
