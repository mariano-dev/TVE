<?php 
/**
 * @package Travelia
 */

add_action( 'customize_register', 'travelia_frontpage_settings_register' );

function travelia_frontpage_settings_register( $wp_customize ) {

  require get_template_directory() .'/inc/repeater/class-repeater-settings.php';
  require get_template_directory() .'/inc/repeater/class-control-repeater.php';
/**
 * Add Frontpage Settings Panel
 *
 * @since 1.0.0
 */
$wp_customize->add_panel(
    'travelia_frontpage_settings_panel',
    array(
        'priority'       => 20,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Frontpage Settings', 'travelia' ),
    )
);

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Frontpage Slider section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'travelia_frontpage_slider_section',
    array(
        'priority'       => 1,
        'panel'          => 'travelia_frontpage_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Slider Section', 'travelia' ),
        'description'    => __( 'Managed the Slider display at Frontpage section.', 'travelia' ),
    )
);

//About Enable/Disable
$wp_customize->add_setting( 'travelia_slider_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'travelia_sanitize_checkbox'
) );

$wp_customize->add_control( 'travelia_slider_enable', array(
    'label'                 =>  __( 'Enable/Disable  Slider section', 'travelia' ),
    'section'               => 'travelia_frontpage_slider_section',
    'type'                  => 'checkbox',
    'settings'              => 'travelia_slider_enable',
) );

for ($i=1;$i<=4;$i++) {
    $wp_customize->add_setting( 'travelia_slider_page_'.$i, array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'travelia_sanitize_dropdown_pages'
    ) );


    $wp_customize->add_control( 'travelia_slider_page_'.$i, array(
        /* translators: %s: Description */ 
        'label'                 =>  sprintf( __( 'Select Page for Slider %s', 'travelia' ), $i ),
        'section'               => 'travelia_frontpage_slider_section',
        'type'                  => 'dropdown-pages',
        'settings'              => 'travelia_slider_page_'.$i,
    ) );


    $wp_customize->add_setting( 'travelia_slider_button_1_title_'.$i, array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'travelia_slider_button_1_title_'.$i, array(
        /* translators: %s: Description */ 
        'label'                 =>  sprintf( __( 'First Button Title For Slider %s', 'travelia' ), $i ),
        'description'           =>  __( 'Book Your Trip', 'travelia' ),
        'section'               => 'travelia_frontpage_slider_section',
        'type'                  => 'text',
        'settings' => 'travelia_slider_button_1_title_'.$i,
    ) );

    $wp_customize->add_setting( 'travelia_slider_button_1_url_'.$i, array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'travelia_slider_button_1_url_'.$i, array(
        /* translators: %s: Description */ 
        'label'                 =>  sprintf( __( 'Select URL For button Title 1 of slider  %s', 'travelia' ), $i ),
        'description'           =>  __( '#', 'travelia' ),
        'section'               => 'travelia_frontpage_slider_section',
        'type'                  => 'url',
        'settings' => 'travelia_slider_button_1_url_'.$i,
    ) );

    $wp_customize->add_setting( 'travelia_slider_button_2_title_'.$i, array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'travelia_slider_button_2_title_'.$i, array(
        /* translators: %s: Description */ 
        'label'                 =>  sprintf( __( 'Second Button Title For Slider %s', 'travelia' ), $i ),
        'description'           =>  __( 'Contact Us', 'travelia' ),
        'section'               => 'travelia_frontpage_slider_section',
        'type'                  => 'text',
        'settings' => 'travelia_slider_button_2_title_'.$i,
    ) );

    $wp_customize->add_setting( 'travelia_slider_button_2_url_'.$i, array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'travelia_slider_button_2_url_'.$i, array(
        /* translators: %s: Description */ 
        'label'                 =>  sprintf( __( 'Select URL For button Title 2 of slider %s', 'travelia' ), $i ),
        'description'           =>  __( '#', 'travelia' ),
        'section'               => 'travelia_frontpage_slider_section',
        'type'                  => 'url',
        'settings' => 'travelia_slider_button_2_url_'.$i,
    ) );
}

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Frontpage Trip Search section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'travelia_frontpage_trip_search_section',
    array(
        'priority'       => 2,
        'panel'          => 'travelia_frontpage_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Trip Search Section', 'travelia' ),
        'description'    => __( 'Managed the Trip Search display at Frontpage section.', 'travelia' ),
    )
);

//Trip Search Enable/Disable
$wp_customize->add_setting( 'travelia_trip_search_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'travelia_sanitize_checkbox'
) );

$wp_customize->add_control( 'travelia_trip_search_enable', array(
    'label'                 =>  __( 'Enable/Disable Trip Search section', 'travelia' ),
    'section'               => 'travelia_frontpage_trip_search_section',
    'type'                  => 'checkbox',
    'settings'              => 'travelia_trip_search_enable',
) );


/**Trip to Search Title */
$wp_customize->add_setting(
    'travelia_trip_search_title',
    array(
        'default'           => __( 'Find Your Dream Trip', 'travelia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control(
    'travelia_trip_search_title',
    array(
        'label'    => __( 'Trip Search Title', 'travelia' ),
        'section'  => 'travelia_frontpage_trip_search_section',
        'type'     => 'text',
    )
);

$wp_customize->selective_refresh->add_partial( 'travelia_trip_search_title', array(
    'selector' => '.trip-search h2',
    'render_callback' => 'travelia_get_trip_search_title',
) );
/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Frontpage Why Choose section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'travelia_frontpage_why_choose_section',
    array(
        'priority'       => 2,
        'panel'          => 'travelia_frontpage_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Why Choose Section', 'travelia' ),
        'description'    => __( 'Managed the Why Choose Us display at Frontpage section.', 'travelia' ),
    )
);

//Why Choose Enable/Disable
$wp_customize->add_setting( 'travelia_why_choose_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'travelia_sanitize_checkbox'
) );

$wp_customize->add_control( 'travelia_why_choose_enable', array(
    'label'                 =>  __( 'Enable/Disable Why Choose Us section', 'travelia' ),
    'section'               => 'travelia_frontpage_why_choose_section',
    'type'                  => 'checkbox',
    'settings'              => 'travelia_why_choose_enable',
) );


// Why Choose Us title and description with featured Image
$wp_customize->add_setting( 'travelia_why_choose_page_title', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'travelia_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'travelia_why_choose_page_title', array( 
    'label'                 =>  __( 'Select Page for  Why Choose Page title & description with Featured Image', 'travelia' ),
    'section'               => 'travelia_frontpage_why_choose_section',
    'type'                  => 'dropdown-pages',
    'settings'              => 'travelia_why_choose_page_title',
) );

// Why Choose us vedio link for featured Image
$wp_customize->add_setting( 'travelia_why_choose_vedio_url', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'esc_url_raw'
) );

$wp_customize->add_control( 'travelia_why_choose_vedio_url', array( 
    'label'                 =>  __( 'Type Why Choose us Featured Image vedio Url', 'travelia' ),
    'description'           => __('Only youtube vedio Link work properly','travelia'),
    'section'               => 'travelia_frontpage_why_choose_section',
    'type'                  => 'url',
    'settings'              => 'travelia_why_choose_vedio_url',
) );

$wp_customize->add_setting( 
    new Travelia_Repeater_Setting( 
        $wp_customize, 
        'travelia_why_choose_us_items', 
        array(
            'default' => array(
                array(
                    'icon' => '',
                    'title' => '',    
                    'description'=> ''                    
                ),
                array(
                    'icon' => '',
                    'title' => '',    
                    'description'=> '' 
                ),
                array(
                    'icon' => '',
                    'title' => '',    
                    'description'=> '' 
                ),
                array(
                    'icon' => '',
                    'title' => '',    
                    'description'=> ''                    
                ),
                array(
                    'icon' => '',
                    'title' => '',    
                    'description'=> '' 
                ),
                array(
                    'icon' => '',
                    'title' => '',    
                    'description'=> '' 
                ),
            ),
            'sanitize_callback' => array( 'Travelia_Repeater_Setting', 'sanitize_repeater_setting' ),
        ) 
    ) 
);

$wp_customize->add_control(
    new Travelia_Control_Repeater(
        $wp_customize,
        'travelia_why_choose_us_items',
        array(
            'section' => 'travelia_frontpage_why_choose_section',              
            'label'   => __( 'Why Choose Us items', 'travelia' ),
            'fields'  => array(
                'icon' => array(
                    'type'        => 'font',
                    'label'       => __( 'Font Awesome Icon', 'travelia' ),
                    'description' => __( 'Example: fa-facebook', 'travelia' ),
                ),
                'title' => array(
                    'type'        => 'text',
                    'label'       => __( 'Title', 'travelia' ),
                ),
                'description' => array(
                    'type'        => 'text',
                    'label'       => __( 'Description', 'travelia' ),
                )
            ),
            'row_label' => array(
                'type' => 'field',
                'value' => __( 'why choose', 'travelia' ),
                'field' => 'title'
            )                        
        )
    )
);


/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Frontpage  Call to action section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'travelia_frontpage_cta_section',
    array(
        'priority'       => 3,
        'panel'          => 'travelia_frontpage_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Call to Action Section', 'travelia' ),
        'description'    => __( 'Managed the Call to Action display at Frontpage section.', 'travelia' ),
    )
);

//Call to action Enable/Disable
$wp_customize->add_setting( 'travelia_cta_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'travelia_sanitize_checkbox'
) );

$wp_customize->add_control( 'travelia_cta_enable', array(
    'label'                 =>  __( 'Enable/Disable Call to Action section', 'travelia' ),
    'section'               => 'travelia_frontpage_cta_section',
    'type'                  => 'checkbox',
    'settings'              => 'travelia_cta_enable',
) );

/**Call to action Title */
$wp_customize->add_setting(
    'travelia_cta_title',
    array(
        'default'           => __( 'Let\'s go with us', 'travelia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control(
    'travelia_cta_title',
    array(
        'label'    => __( 'Call to Action Title', 'travelia' ),
        'section'  => 'travelia_frontpage_cta_section',
        'type'     => 'text',
    )
);

$wp_customize->selective_refresh->add_partial( 'travelia_cta_title', array(
    'selector' => '.cta-text h2 span',
    'render_callback' => 'travelia_get_cta_title',
) );

/**Call to action subtitle*/
$wp_customize->add_setting(
    'travelia_cta_subtitle',
    array(
        'default'           => __( 'Start Your Journey With Us', 'travelia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control(
    'travelia_cta_subtitle',
    array(
        'label'    => __( 'Call to Action subtitle', 'travelia' ),
        'section'  => 'travelia_frontpage_cta_section',
        'type'     => 'text',
    )
);

$wp_customize->selective_refresh->add_partial( 'travelia_cta_subtitle', array(
    'selector' => '.cta-text span::after',
    'render_callback' => 'travelia_get_cta_subtitle',
) );


/**Call to action Description*/
$wp_customize->add_setting(
    'travelia_cta_description',
    array(
        'default'           => __( 'Necessitatibus enim corrupti ullam voluptatum provident deserunt natus reprehenderit, inventore, tempore aut neque cupiditate, aspernatur! Quibusdam aliquid dolor a culpa, officiis quisquam.', 'travelia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control(
    'travelia_cta_description',
    array(
        'label'    => __( 'Call to Action Description', 'travelia' ),
        'section'  => 'travelia_frontpage_cta_section',
        'type'     => 'text',
    )
);

$wp_customize->selective_refresh->add_partial( 'travelia_cta_description', array(
    'selector' => '.cta-text p',
    'render_callback' => 'travelia_get_cta_description',
) );


/**Call to action Button 1 text */
$wp_customize->add_setting(
    'travelia_cta_button_1_text',
    array(
        'default'           => __( 'Book your trip', 'travelia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control(
    'travelia_cta_button_1_text',
    array(
        'label'    => __( 'Call to Action Button 1 Text', 'travelia' ),
        'section'  => 'travelia_frontpage_cta_section',
        'type'     => 'text',
    )
);

$wp_customize->selective_refresh->add_partial( 'travelia_cta_button_1_text', array(
    'selector' => '.cta-text .text-1',
    'render_callback' => 'travelia_get_cta_button_1_text',
) );

/**Call to action Button 1 url */
$wp_customize->add_setting(
    'travelia_cta_button_url_1',
    array(
        'capability'            => 'edit_theme_options',
        'default'           => __( '#', 'travelia' ),
        'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
    'travelia_cta_button_url_1',
    array(
        'label'    => __( 'Call to Action Button 1 Url', 'travelia' ),
        'section'  => 'travelia_frontpage_cta_section',
        'type'     => 'url',
        'settings' => 'travelia_cta_button_url_1'
    )
);


/**Call to action Button 2 text */
$wp_customize->add_setting(
    'travelia_cta_button_2_text',
    array(
        'default'           => __( 'Contact Us', 'travelia' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control(
    'travelia_cta_button_2_text',
    array(
        'label'    => __( 'Call to Action Button 2 Text', 'travelia' ),
        'section'  => 'travelia_frontpage_cta_section',
        'type'     => 'text',
    )
);

$wp_customize->selective_refresh->add_partial( 'travelia_cta_button_2_text', array(
    'selector' => '.cta-text .text-2',
    'render_callback' => 'travelia_get_cta_button_2_text',
) );

/**Call to action Button 2 url */
$wp_customize->add_setting(
    'travelia_cta_button_url_2',
    array(
        'capability'            => 'edit_theme_options',
        'default'           => __( '#', 'travelia' ),
        'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
    'travelia_cta_button_url_2',
    array(
        'label'    => __( 'Call to Action Button 2 Url', 'travelia' ),
        'section'  => 'travelia_frontpage_cta_section',
        'type'     => 'url',
        'settings' => 'travelia_cta_button_url_2'
    )
);



/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Frontpage Popular Trips section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'travelia_frontpage_tour_package_section',
    array(
        'priority'       => 4,
        'panel'          => 'travelia_frontpage_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Tour Package Section', 'travelia' ),
        'description'    => __( 'Managed the tour package display at Frontpage section.', 'travelia' ),
    )
);

//Popular Trips Enable/Disable
$wp_customize->add_setting( 'travelia_tour_package_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'travelia_sanitize_checkbox'
) );

$wp_customize->add_control( 'travelia_tour_package_enable', array(
    'label'                 =>  __( 'Enable/Disable  Tour Package section', 'travelia' ),
    'section'               => 'travelia_frontpage_tour_package_section',
    'type'                  => 'checkbox',
    'settings'              => 'travelia_tour_package_enable',
) );

// Tour Package title and description with featured image selection
$wp_customize->add_setting( 'travelia_tour_package_page_title', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'travelia_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'travelia_tour_package_page_title', array( 
    'label'                 =>  __( 'Select Page for  Tour Package Title & Description', 'travelia' ),
    'section'               => 'travelia_frontpage_tour_package_section',
    'type'                  => 'dropdown-pages',
    'settings'              => 'travelia_tour_package_page_title',
) );

$wp_customize->add_setting( 'travelia_tour_package_items_number', array(
    'capability'            => 'edit_theme_options',
    'default'               => 3,
    'sanitize_callback'     => 'absint'
));


$wp_customize->add_control( 'travelia_tour_package_items_number', array(
    'label'                 =>  __( 'Number of Tour Package', 'travelia' ),
    'description'           =>  __( 'input 3,4,5,6,7,8,9,10', 'travelia' ),
    'section'               => 'travelia_frontpage_tour_package_section',
    'type'                  => 'number',
    'settings' => 'travelia_tour_package_items_number',
) );





/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Frontpage Counter section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'travelia_frontpage_counter_section',
    array(
        'priority'       => 5,
        'panel'          => 'travelia_frontpage_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Counter Section', 'travelia' ),
        'description'    => __( 'Managed the Counter display at Frontpage section.', 'travelia' ),
    )
);

//Counter Enable/Disable
$wp_customize->add_setting( 'travelia_counter_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'travelia_sanitize_checkbox'
) );

$wp_customize->add_control( 'travelia_counter_enable', array(
    'label'                 =>  __( 'Enable/Disable Counter section', 'travelia' ),
    'section'               => 'travelia_frontpage_counter_section',
    'type'                  => 'checkbox',
    'settings'              => 'travelia_counter_enable',
) );

$wp_customize->add_setting( 
    new Travelia_Repeater_Setting( 
        $wp_customize, 
        'travelia_counter_items', 
        array(
            'default' => array(
                array(
                    'icon' => 'fa fa-users',
                    'number' => '2500',    
                    'text'=> 'CUSTOMERS'                    
                ),
                array(
                    'icon' => 'fa fa-plane',
                    'number' => '5533',    
                    'text'=> 'DESTINATIONS'  
                ),
                array(
                    'icon' => 'fa fa-bed',
                    'number' => '231',    
                    'text'=> 'TOURS' 
                ),
                array(
                    'icon' => 'fa fa-bus',
                    'number' => '542',    
                    'text'=> 'TOUR TYPES'                      
                )
            ),
            'sanitize_callback' => array( 'Travelia_Repeater_Setting', 'sanitize_repeater_setting' ),
        ) 
    ) 
);

$wp_customize->add_control(
    new Travelia_Control_Repeater(
        $wp_customize,
        'travelia_counter_items',
        array(
            'section' => 'travelia_frontpage_counter_section',              
            'label'   => __( 'Counter items', 'travelia' ),
            'fields'  => array(
                'icon' => array(
                    'type'        => 'font',
                    'label'       => __( 'Font Awesome Icon', 'travelia' ),
                    'icon' => __( 'Example: fa-facebook', 'travelia' ),
                ),
                'number' => array(
                    'type'        => 'text',
                    'label'       => __( 'Number', 'travelia' ),
                ),
                'text' => array(
                    'type'        => 'text',
                    'label'       => __( 'Text', 'travelia' ),
                )
            ),
            'row_label' => array(
                'type' => 'field',
                'value' => __( 'text', 'travelia' ),
                'field' => 'text'
            )                        
        )
    )
);
/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Frontpage Popular Destination section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'travelia_frontpage_popular_destination_section',
    array(
        'priority'       => 6,
        'panel'          => 'travelia_frontpage_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Popular Destination Section', 'travelia' ),
        'description'    => __( 'Managed the popular destination display at Frontpage section.', 'travelia' ),
    )
);

//Popular Destination Enable/Disable
$wp_customize->add_setting( 'travelia_popular_destination_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'travelia_sanitize_checkbox'
) );

$wp_customize->add_control( 'travelia_popular_destination_enable', array(
    'label'                 =>  __( 'Enable/Disable Popular Destination section', 'travelia' ),
    'section'               => 'travelia_frontpage_popular_destination_section',
    'type'                  => 'checkbox',
    'settings'              => 'travelia_popular_destination_enable',
) );

// Popular Destination Title and Description
$wp_customize->add_setting( 'travelia_popular_destination_page_title', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'travelia_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'travelia_popular_destination_page_title', array( 
    'label'                 =>  __( 'Select Page for Popular Destination title and description', 'travelia' ),
    'section'               => 'travelia_frontpage_popular_destination_section',
    'type'                  => 'dropdown-pages',
    'settings'              => 'travelia_popular_destination_page_title',
) );

// Top Destination Category

$wp_customize->add_setting( 'travelia_t_destination_category_id', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'travelia_sanitize_select'
) );


$wp_customize->add_control( 'travelia_t_destination_category_id', array(
    'label'                 =>  __( 'Choose Top destination category', 'travelia' ),
    'description' => __( 'Go to Trips > Destination and add. Then you will be able to select a trip Destination from the dropdown.', 'travelia' ),
    'section'               => 'travelia_frontpage_popular_destination_section',
    'type'                  => 'select',
    'settings'              => 'travelia_t_destination_category_id',
    'choices'     => travelia_get_categories( true, 'destination', false )
) );

$wp_customize->add_setting( 'travelia_t_destination_number', array(
    'capability'            => 'edit_theme_options',
    'default'               => 3,
    'sanitize_callback'     => 'absint'
));


$wp_customize->add_control( 'travelia_t_destination_number', array(
    'label'                 =>  __( 'To Display number of Top Destination Trips', 'travelia' ),
    'description'           =>  __( 'input 3,4,5,6,7,8,9,10', 'travelia' ),
    'section'               => 'travelia_frontpage_popular_destination_section',
    'type'                  => 'number',
    'settings' => 'travelia_t_destination_number',
) );

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Frontpage Testimonials section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'travelia_frontpage_testimonials_section',
    array(
        'priority'       => 7,
        'panel'          => 'travelia_frontpage_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Testimonials Section', 'travelia' ),
        'description'    => __( 'Managed the Testimonials display at Frontpage section.', 'travelia' ),
    )
);

//Testimonials Enable/Disable
$wp_customize->add_setting( 'travelia_testimonials_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'travelia_sanitize_checkbox'
) );

$wp_customize->add_control( 'travelia_testimonials_enable', array(
    'label'                 =>  __( 'Enable/Disable Testimonials section', 'travelia' ),
    'section'               => 'travelia_frontpage_testimonials_section',
    'type'                  => 'checkbox',
    'settings'              => 'travelia_testimonials_enable',
) );

for ($i=1;$i<5;$i++) {

    $wp_customize->add_setting( 'travelia_testimonial_page_'.$i, array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'travelia_sanitize_dropdown_pages'
    ) );


    $wp_customize->add_control( 'travelia_testimonial_page_'.$i, array(
        /* translators: %s: Label */ 
        'label'                 => sprintf( __( 'Select Testimonial Page %s', 'travelia' ), $i ),
        'section'               => 'travelia_frontpage_testimonials_section',
        'type'                  => 'dropdown-pages',
        'settings'              => 'travelia_testimonial_page_'.$i,
    ) );

    $wp_customize->add_setting( 'travelia_testimonial_position_'.$i, array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'sanitize_text_field'
    ) );


    $wp_customize->add_control( 'travelia_testimonial_position_'.$i, array(
       /* translators: %s: Description */ 
       'label'                 =>  sprintf( __( 'Select Designation or Company Name %s', 'travelia' ), $i ),
       'description'           =>  __( 'Position like Developer, CEO MD', 'travelia' ),
       'section'               => 'travelia_frontpage_testimonials_section',
       'type'                  => 'text',
       'settings' => 'travelia_testimonial_position_'.$i,
   ) );

}


/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Frontpage Blog section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'travelia_frontpage_blog_section',
    array(
        'priority'       => 8,
        'panel'          => 'travelia_frontpage_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Blog Section', 'travelia' ),
        'description'    => __( 'Managed the blog display at Frontpage section.', 'travelia' ),
    )
);

//Blogs Enable/Disable
$wp_customize->add_setting( 'travelia_blog_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'travelia_sanitize_checkbox'
) );

$wp_customize->add_control( 'travelia_blog_enable', array(
    'label'                 =>  __( 'Enable/Disable blog section', 'travelia' ),
    'section'               => 'travelia_frontpage_blog_section',
    'type'                  => 'checkbox',
    'settings'              => 'travelia_blog_enable',
) );


// Blog Title and Description
$wp_customize->add_setting( 'travelia_blog_page_title', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'travelia_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'travelia_blog_page_title', array( 
    'label'                 =>  __( 'Select Page for  Blog title and description', 'travelia' ),
    'section'               => 'travelia_frontpage_blog_section',
    'type'                  => 'dropdown-pages',
    'settings'              => 'travelia_blog_page_title',
) );

//Category select for Blogs
$wp_customize->add_setting('travelia_blog_category_id',array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'travelia_sanitize_category',
    'default' =>  '1',
)
);

$wp_customize->add_control(new Travelia_Customize_Dropdown_Taxonomies_Control($wp_customize,'travelia_blog_category_id',
    array(
       'label' => __('Select Category for blog','travelia'),
       'section' => 'travelia_frontpage_blog_section',
       'settings' => 'travelia_blog_category_id',
       'type'=> 'dropdown-taxonomies',
   )
));
$wp_customize->add_setting( 'travelia_blog_number', array(
    'capability'            => 'edit_theme_options',
    'default'               => '3',
    'sanitize_callback'     => 'absint'
));

$wp_customize->add_control( 'travelia_blog_number', array(
    'label'                 =>  __( 'Number of Recent blog to Show in Front Page', 'travelia' ),
    'description'           =>  __( 'input 3,4,5,6,7,8,9,10', 'travelia' ),
    'section'               => 'travelia_frontpage_blog_section',
    'type'                  => 'number',
    'settings' => 'travelia_blog_number',
) );

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Frontpage Clients section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'travelia_frontpage_clients_section',
    array(
        'priority'       => 9,
        'panel'          => 'travelia_frontpage_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'clients Section', 'travelia' ),
        'description'    => __( 'Managed the clients display at Frontpage section.', 'travelia' ),
    )
);

//Clients Enable/Disable
$wp_customize->add_setting( 'travelia_clients_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'travelia_sanitize_checkbox'
) );

$wp_customize->add_control( 'travelia_clients_enable', array(
    'label'                 =>  __( 'Enable/Disable clients section', 'travelia' ),
    'section'               => 'travelia_frontpage_clients_section',
    'type'                  => 'checkbox',
    'settings'              => 'travelia_clients_enable',
) );

//Category select for clients
$wp_customize->add_setting('travelia_clients_category_id',array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'travelia_sanitize_category',
    'default' =>  '1',
)
);

$wp_customize->add_control(new Travelia_Customize_Dropdown_Taxonomies_Control($wp_customize,'travelia_clients_category_id',
    array(
       'label' => __('Select Category for Clients','travelia'),
       'section' => 'travelia_frontpage_clients_section',
       'settings' => 'travelia_clients_category_id',
       'type'=> 'dropdown-taxonomies',
   )
));
$wp_customize->add_setting( 'travelia_client_number', array(
    'capability'            => 'edit_theme_options',
    'default'               => '6',
    'sanitize_callback'     => 'absint'
));

$wp_customize->add_control( 'travelia_client_number', array(
    'label'                 =>  __( 'Number of Recent Clients to Show in Front Page', 'travelia' ),
    'description'           =>  __( 'input 3,4,5,6,7,8,9,10', 'travelia' ),
    'section'               => 'travelia_frontpage_clients_section',
    'type'                  => 'number',
    'settings' => 'travelia_client_number',
) );
}