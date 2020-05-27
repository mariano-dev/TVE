<?php
/**
 * Travelia Header Settings panel at Theme Customizer
 *
 * @package Travelia
 * @since 1.0.0
 */

add_action( 'customize_register', 'travelia_header_settings_register' );

function travelia_header_settings_register( $wp_customize ) {
  require get_template_directory() .'/inc/repeater/class-repeater-settings.php';
  require get_template_directory() .'/inc/repeater/class-control-repeater.php';

	/**
     * Add Header Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
       'travelia_header_settings_panel',
       array(
           'priority'       => 10,
           'capability'     => 'edit_theme_options',
           'theme_supports' => '',
           'title'          => __( 'Header Settings', 'travelia' ),
       )
   );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Top Header section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'travelia_top_header_section',
        array(
        	'priority'       => 2,
        	'panel'          => 'travelia_header_settings_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Top Header Section', 'travelia' ),
            'description'    => __( 'Managed the content display at top header section.', 'travelia' ),
        )
    );

    /**Top Header Enable/Disable Social Links */
    $wp_customize->add_setting(
        'travelia_top_header_social_links_enable',
        array(
            'default'           => 1,
            'sanitize_callback' => 'travelia_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'travelia_top_header_social_links_enable',
        array(
            'section'     => 'travelia_top_header_section',
            'label'       => __( 'Enable/Disable social links in top header(right).', 'travelia' ),
            'type'        => 'checkbox'
        )       
    );

    /**Top Header left section Enable/Disable  */
    $wp_customize->add_setting(
        'travelia_top_header_left_section_enable',
        array(
            'default'           => 1,
            'sanitize_callback' => 'travelia_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'travelia_top_header_left_section_enable',
        array(
            'section'     => 'travelia_top_header_section',
            'label'       => __( 'Enable/Disable top header Left section.', 'travelia' ),
            'type'        => 'checkbox'
        )       
    );


    /** Top Header Opening Time Text */
    $wp_customize->add_setting(
        'top_header_opening_time',
        array(
            'default'           => __( 'Mon -Fri: 9:00-19:00', 'travelia' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'top_header_opening_time',
        array(
            'label'    => __( 'Opening Time', 'travelia' ),
            'section'  => 'travelia_top_header_section',
            'type'     => 'text',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'top_header_opening_time', array(
        'selector' => '.topbar .container .row .col-lg-6 p',
        'render_callback' => 'travelia_get_top_header_opening_time',
    ) );

    /** Social Links */
    $wp_customize->add_setting( 
        new Travelia_Repeater_Setting( 
            $wp_customize, 
            'top_header_social_links', 
            array(
                'default' => array(
                    array(
                        'font' => 'fa fa-facebook',
                        'link' => 'https://www.facebook.com/',                        
                    ),
                    array(
                        'font' => 'fa fa-linkedin',
                        'link' => 'https://www.linkedin.com/',
                    ),
                    array(
                        'font' => 'fa fa-twitter',
                        'link' => 'https://twitter.com/',
                    ),
                    array(
                        'font' => 'fa fa-google-plus',
                        'link' => 'https://plus.google.com',
                    )
                ),
                'sanitize_callback' => array( 'Travelia_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
        new Travelia_Control_Repeater(
            $wp_customize,
            'top_header_social_links',
            array(
                'section' => 'travelia_top_header_section',              
                'label'   => __( 'Social Links', 'travelia' ),
                'fields'  => array(
                    'font' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'travelia' ),
                        'description' => __( 'Example: fa-facebook', 'travelia' ),
                    ),
                    'link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Link', 'travelia' ),
                        'description' => __( 'Example: http://facebook.com', 'travelia' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'links', 'travelia' ),
                    'field' => 'link'
                )                        
            )
        )
    );


    /*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Middle Header section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'travelia_middle_header_section',
    array(
        'priority'       => 3,
        'panel'          => 'travelia_header_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Middle Header Section', 'travelia' ),
        'description'    => __( 'Managed the content display at middle header section.', 'travelia' ),
    )
);



/** Middle Header Widget */
$wp_customize->add_setting( 
    new Travelia_Repeater_Setting( 
        $wp_customize, 
        'middle_header_widget_items', 
        array(
            'default' => array(
               array(
                'icon' => 'fa fa-map-marker',
                'title' => '424 Jania Alba United States',    
                'sub_title'=> 'Hellown Plaza, 350 England'                    
            ),
               array(
                'icon' => 'fa fa-phone',
                'title' => '+334 4245-12453',    
                'sub_title'=> '+334 4245-12453' 
            ),
               array(
                'icon' => 'fa fa-at',
                'title' => 'Info@Mywebmail.Com',    
                'sub_title'=> 'Support@Mywebmail.Com' 
            ),
           ),
            'sanitize_callback' => array( 'Travelia_Repeater_Setting', 'sanitize_repeater_setting' ),
        ) 
    ) 
);

$wp_customize->add_control(
    new Travelia_Control_Repeater(
        $wp_customize,
        'middle_header_widget_items',
        array(
            'section' => 'travelia_middle_header_section',              
            'label'   => __( 'Middle header location items', 'travelia' ),
            'fields'  => array(
                'icon' => array(
                    'type'        => 'font',
                    'label'       => __( 'Font Awesome Icon', 'travelia' ),
                    'description' => __( 'Example: fa-facebook', 'travelia' ),
                ),
                'title' => array(
                    'type'        => 'text',
                    'label'       => __( 'Text 1', 'travelia' ),
                ),
                'sub_title' => array(
                    'type'        => 'text',
                    'label'       => __( 'Text 2', 'travelia' ),
                )
            ),
            'row_label' => array(
                'type' => 'field',
                'value' => __( 'locations', 'travelia' ),
                'field' => 'sub_title'
            )                        
        )
    )
);

}