<?php
/**
 * Travelia Pages Settings panel at Theme Customizer
 *
 * @package Travelia
 * @since 1.0.0
 */

add_action( 'customize_register', 'travelia_page_settings_register' );

function travelia_page_settings_register( $wp_customize ) {

	/**
     * Add Page Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
     'travelia_page_settings_panel',
     array(
         'priority'       => 25,
         'capability'     => 'edit_theme_options',
         'theme_supports' => '',
         'title'          => __( 'Page Settings', 'travelia' ),
     )
 );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Contact Page section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'travelia_contact_page_section',
        array(
        	'priority'       => 5,
        	'panel'          => 'travelia_page_settings_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Contact Page', 'travelia' ),
            'description'    => __( 'Managed the content display at contact page.', 'travelia' ),
        )
    );

    $wp_customize->add_setting( 'travelia_contact_page_title', array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'travelia_sanitize_dropdown_pages'
    ) );

    $wp_customize->add_control( 'travelia_contact_page_title', array( 
        'label'                 =>  __( 'Select Page for  contact Page title & description', 'travelia' ),
        'section'               => 'travelia_contact_page_section',
        'type'                  => 'dropdown-pages',
        'settings'              => 'travelia_contact_page_title',
    ) );

    // Contact form
    $wp_customize->add_setting( 'travelia_contact_form_shortcode', array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'travelia_contact_form_shortcode', array(
        'label'                 =>  __( 'Use Shortcode for contact form', 'travelia' ),
        'description'           =>  __( 'eg [contact-form-7 id="108" title="Contact form 1"]', 'travelia' ),
        'section'               => 'travelia_contact_page_section',
        'type'                  => 'text',
        'settings' => 'travelia_contact_form_shortcode',
    ) );


    
    /** Contact Items */
    $wp_customize->add_setting( 
        new Travelia_Repeater_Setting( 
            $wp_customize, 
            'travelia_contact_items', 
            array(
                'default' => array(
                    array(
                        'icon' => 'fa fa-map-marker',
                        'title' => ' Road-7 old Street, Manhatan'   
                    ),
                    array(
                        'icon' => 'fa fa-phone',
                        'title' => '+2112-6546654'
                    ),
                    array(
                        'icon' => 'fa fa-envelope',
                        'title' => ' info@berater3.com'
                    )
                ),
                'sanitize_callback' => array( 'Travelia_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );

    $wp_customize->add_control(
        new Travelia_Control_Repeater(
            $wp_customize,
            'travelia_contact_items',
            array(
                'section' => 'travelia_contact_page_section',              
                'label'   => __( 'Contact items', 'travelia' ),
                'fields'  => array(
                    'icon' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'travelia' ),
                        'description' => __( 'Example: fa-facebook', 'travelia' ),
                    ),
                    'title' => array(
                        'type'        => 'text',
                        'label'       => __( 'Location Title', 'travelia' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'contacts', 'travelia' ),
                    'field' => 'title'
                )                        
            )
        )
    );
}