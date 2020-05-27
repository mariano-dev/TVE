<?php
/**
 * Recommended plugins
 *
 * @package Kingcabs
 */

if ( ! function_exists( 'kingcabs_recommended_plugins' ) ) :

	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function kingcabs_recommended_plugins() {

		$plugins = array(
			
			array(
				'name' => esc_html__( 'Page Builder by SiteOrigin', 'kingcabs' ),
				'slug' => 'siteorigin-panels',
				'required' => false,
            ),
            
            array(
				'name' => esc_html__( 'Contact Form 7', 'kingcabs' ),
				'slug' => 'contact-form-7',
				'required' => false,
            ),

            array(
				'name' => esc_html__( 'Regenerate Thumbnails', 'kingcabs' ),
				'slug' => 'regenerate-thumbnails',
				'required' => false,
            ),

            array(
            	'name'     => esc_html__( 'WooCommerce', 'kingcabs' ),
            	'slug'     => 'woocommerce',
            	'required' => false,
            )
		);

		tgmpa( $plugins );

	}

endif;

add_action( 'tgmpa_register', 'kingcabs_recommended_plugins' );
