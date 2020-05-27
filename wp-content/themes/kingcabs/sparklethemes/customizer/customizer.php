<?php
/**
 * King Cabs Theme Customizer
 *
 * @package King_Cabs
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kingcabs_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	/**
	 * List All Pages
	*/
    $categories = get_categories();
    $cat_lists = array();
    foreach( $categories as $category ) {
        $cat_lists[$category->term_id] = $category->name;
    }

    
	$kingcabs_pages = get_pages(array('hide_empty' => 0));
	foreach ($kingcabs_pages as $kingcabs_pages_single) {
		$kingcabs_page_choice[$kingcabs_pages_single->ID] = $kingcabs_pages_single->post_title; 
	}


	/**
	 * Option to get the frontpage settings to the old default template if a static frontpage is selected
	*/

	$wp_customize->get_section('static_front_page' )->priority = 2;

	$wp_customize->add_setting( 'kingcabs_set_original_fp', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => false
	));

	$wp_customize->add_control( 'kingcabs_set_original_fp', array(
		'type' => 'checkbox',
		'label' => esc_html__( 'Checked to Set Kingcabs frontpage?','kingcabs' ),
		'section' => 'static_front_page',
		'priority' => 9
	));


/**
 * Themes Color Settings
*/	
$wp_customize->get_section('colors' )->title = esc_html__('Colors Settings', 'kingcabs');

/*============HOME PANEL============*/
	$wp_customize->add_panel(
		'kingcabs_home_panel',
		array(
			'title' => esc_html__( 'Theme Options', 'kingcabs' ),
			'priority' => 86
		)
	);

/*============HEADER SETTING SECTION============*/
	$wp_customize->add_section(
		'kingcabs_header_section',
		array(
			'title' => esc_html__( 'Header Settings', 'kingcabs' ),
			'panel' => 'kingcabs_home_panel',
			'priority' => 1,
		)
	);


	$wp_customize->add_setting(
		'kingcabs_header_phone',
		array(
			'sanitize_callback' => 'sanitize_text_field', // done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_header_phone',
		array(
			'settings'		=> 'kingcabs_header_phone',
			'section'		=> 'kingcabs_header_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Enter Phone Number', 'kingcabs' )
		)
	);

	$wp_customize->add_setting(
		'kingcabs_header_button_title',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_header_button_title',
		array(
			'settings'		=> 'kingcabs_header_button_title',
			'section'		=> 'kingcabs_header_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Enter Button Text', 'kingcabs' )
		)
	);


	$wp_customize->add_setting(
		'kingcabs_header_button_url',
		array(
			'sanitize_callback' => 'esc_url_raw', // Done
			'default'			=> ''
		)
	);
	$wp_customize->add_control(
		'kingcabs_header_button_url',
		array(
			'settings'		=> 'kingcabs_header_button_url',
			'section'		=> 'kingcabs_header_section',
			'type'			=> 'url',
			'label'			=> esc_attr__( 'Enter Button URL', 'kingcabs' )
		)
	);

	/**
	 * SLIDER IMAGES SECTION
	*/	


	$wp_customize->add_section( 'kingcabs_image_carousel_section', array(
		'priority'		=> 2,
		'title'			=> esc_html__( 'Slider Settings', 'kingcabs' ),
		'description'	=> esc_html__( 'Configure Main Banner Slider', 'kingcabs' ),
		'panel'			=> 'kingcabs_home_panel'	
	) );



	$wp_customize->add_setting(
		'kingcabs_slider_image_carousel_section_disable',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Switch_Control(
			$wp_customize,
			'kingcabs_slider_image_carousel_section_disable',
			array(
				'settings'		=> 'kingcabs_slider_image_carousel_section_disable',
				'section'		=> 'kingcabs_image_carousel_section',
				'label'			=> esc_html__( 'Display Image Carousel Section', 'kingcabs' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'kingcabs' ),
					'off' => esc_html__( 'No', 'kingcabs' )
				)	
			)
		)
	);



	$wp_customize->add_setting('kingcabs_image_carousel_category',array(
		'sanitize_callback' => 'absint', // Done
		'default' =>  1,
	) );

	$wp_customize->add_control(
		new Kingcabs_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'kingcabs_image_carousel_category', array(
		'label' => esc_html__('Choose Category','kingcabs'),
		'section' => 'kingcabs_image_carousel_section',
		'settings' => 'kingcabs_image_carousel_category',
		'type'=> 'dropdown-taxonomies',
	) ) );

	$wp_customize->add_setting('kingcabs_image_carousel_number',array(
		'sanitize_callback' => 'absint', // Doone
		'default' =>  3,
	) );

	$wp_customize->add_control( 'kingcabs_image_carousel_number', array(
		'label' => esc_html__('Enter Number of Slider','kingcabs'),
		'section' => 'kingcabs_image_carousel_section',
		'settings' => 'kingcabs_image_carousel_number',
		'type'=> 'number',
	) );

	// Slider Button Title
	$wp_customize->add_setting( 'kingcabs_image_carousel_button_title', array(
		'sanitize_callback'	=> 'sanitize_text_field', // Done
		'default'			=> ''
	) );
	$wp_customize->add_control( 'kingcabs_image_carousel_button_title', array(
		'label'				=> esc_html__( 'Button Title', 'kingcabs' ),
		'section'			=> 'kingcabs_image_carousel_section',
		'settings'			=> 'kingcabs_image_carousel_button_title',
		'type'				=> 'text' 
	) );


/**
 * Features Services Section
*/
	$wp_customize->add_section(
		'kingcabs_slider_button_section',
		array(
			'title' 			=> esc_html__( 'Featues Services Section', 'kingcabs' ),
			'panel'  			=> 'kingcabs_home_panel',
			'priority'		=> 3,
		)
	);


	$wp_customize->add_setting(
		'kingcabs_slider_button_section_disable',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Switch_Control(
			$wp_customize,
			'kingcabs_slider_button_section_disable',
			array(
				'settings'		=> 'kingcabs_slider_button_section_disable',
				'section'		=> 'kingcabs_slider_button_section',
				'label'			=> esc_html__( 'Display Features Service Section', 'kingcabs' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'kingcabs' ),
					'off' => esc_html__( 'No', 'kingcabs' )
				)	
			)
		)
	);
	

	$wp_customize->add_setting(
		'kingcabs_slider_button_page',
		array(
			'sanitize_callback' => 'kingcabs_sanitize_choices_array' // Done
		)
	);
	$wp_customize->add_control(
		new Kingcabs_Dropdown_Multiple_Chooser(
		$wp_customize,
		'kingcabs_slider_button_page',
		array(
			'settings'		=> 'kingcabs_slider_button_page',
			'section'		=> 'kingcabs_slider_button_section',
			'choices'		=> $kingcabs_page_choice,
			'label'			=> esc_html__( 'Select Features Pages', 'kingcabs' ),
 		)
	));


/**
 * About Services section
*/
	$wp_customize->add_section(
		'kingcabs_service_section',
		array(
			'title' 			=> esc_html__( 'About Service Section', 'kingcabs' ),
			'panel'     		=> 'kingcabs_home_panel',
			'priority'		=> 3,
		)
	);

	//ENABLE/DISABLE ABOUT Services Section
	$wp_customize->add_setting(
		'kingcabs_service_page_disable',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Switch_Control(
			$wp_customize,
			'kingcabs_service_page_disable',
			array(
				'settings'		=> 'kingcabs_service_page_disable',
				'section'		=> 'kingcabs_service_section',
				'label'			=> esc_html__( 'Manage Options', 'kingcabs' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'kingcabs' ),
					'off' => esc_html__( 'No', 'kingcabs' )
				)	
			)
		)
	);


	$wp_customize->add_setting(
		'kingcabs_service_title',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_service_title',
		array(
			'settings'		=> 'kingcabs_service_title',
			'section'		=> 'kingcabs_service_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'About Service Title', 'kingcabs' )
		)
	);

	$wp_customize->add_setting(
		'kingcabs_service_sub_title',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_service_sub_title',
		array(
			'settings'		=> 'kingcabs_service_sub_title',
			'section'		=> 'kingcabs_service_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'About Services Sub Title', 'kingcabs' )
		)
	);


	$wp_customize->add_setting(
		'kingcabs_service_page_title_icon',
		array(
			'default'			=> 'fa fa-bell',
			'sanitize_callback' => 'sanitize_text_field' // Done
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Fontawesome_Icon_Chooser(
			$wp_customize,
			'kingcabs_service_page_title_icon',
			array(
				'settings'		=> 'kingcabs_service_page_title_icon',
				'section'		=> 'kingcabs_service_section',
				'type'			=> 'icon',
				'label'			=> esc_html__( 'About Service Title Icon', 'kingcabs' )
			)
		)
	);


	$wp_customize->add_setting(
		'kingcabs_service_left_bg',
		array(
			'sanitize_callback' => 'esc_url_raw', // Done
			'default'			=> ''
		)
	);
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'kingcabs_service_left_bg',
	        array(
	            'section' => 'kingcabs_service_section',
	            'settings' => 'kingcabs_service_left_bg',
	            'label'  => esc_html__( 'Upload About Services Features Image', 'kingcabs' ),
	            'description' => esc_html__('Recommended Image Size: 770X650px', 'kingcabs')
	        )
	    )
	);

	for( $i = 1; $i < 4; $i++ ){

		$wp_customize->add_setting(
			'kingcabs_service_header'.$i,
			array(
				'default'			=> '',
				'sanitize_callback' => 'sanitize_text_field' // Done
			)
		);
		$wp_customize->add_control(
			new Kingcabs_Customize_Heading(
				$wp_customize,
				'kingcabs_service_header'.$i,
				array(
					'settings'		=> 'kingcabs_service_header'.$i,
					'section'		=> 'kingcabs_service_section',
					'label'			=> esc_html__( 'Manage About Service Settings', 'kingcabs' )
				)
			)
		);

		$wp_customize->add_setting(
			'kingcabs_service_page'.$i,
			array(
				'default'			=> '',
				'sanitize_callback' => 'absint' // Done
			)
		);

		$wp_customize->add_control(
			'kingcabs_service_page'.$i,
			array(
				'settings'		=> 'kingcabs_service_page'.$i,
				'section'		=> 'kingcabs_service_section',
				'type'			=> 'dropdown-pages',
				'label'			=> esc_html__( 'Select Service Page', 'kingcabs' )
			)
		);

		$wp_customize->add_setting(
			'kingcabs_service_page_icon'.$i,
			array(
				'default'			=> 'fa-bell',
				'sanitize_callback' => 'sanitize_text_field' // Done
			)
		);

		$wp_customize->add_control(
			new Kingcabs_Fontawesome_Icon_Chooser(
				$wp_customize,
				'kingcabs_service_page_icon'.$i,
				array(
					'settings'		=> 'kingcabs_service_page_icon'.$i,
					'section'		=> 'kingcabs_service_section',
					'type'			=> 'icon',
					'label'			=> esc_html__( 'Choose Service Icon', 'kingcabs' )
				)
			)
		);
	}

/**
 * Main Services Section
*/
	$wp_customize->add_section(
		'kingcabs_services_section',
		array(
			'title'      => esc_html__( 'Main Services Section', 'kingcabs' ),
			'panel'      => 'kingcabs_home_panel',
			'priority'   => 4,
		)
	);

	$wp_customize->add_setting(
		'kingcabs_services_section_disable',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default' => 'on'
		)
	);
	$wp_customize->add_control(
		new Kingcabs_Switch_Control(
			$wp_customize,
			'kingcabs_services_section_disable',
			array(
				'settings'		=> 'kingcabs_services_section_disable',
				'section'		=> 'kingcabs_services_section',
				'label'			=> esc_html__( 'Display Services Section', 'kingcabs' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'kingcabs' ),
					'off' => esc_html__( 'No', 'kingcabs' )
				)	
			)
		)
	);

	$wp_customize->add_setting(
		'kingcabs_services_title',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_services_title',
		array(
			'settings'		=> 'kingcabs_services_title',
			'section'		=> 'kingcabs_services_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Services Section Title', 'kingcabs' )
		)
	);


	$wp_customize->add_setting(
		'kingcabs_services_sub_title',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default'			=> ''
		)
	);
	$wp_customize->add_control(
		'kingcabs_services_sub_title',
		array(
			'settings'		=> 'kingcabs_services_sub_title',
			'section'		=> 'kingcabs_services_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Services Sub Title', 'kingcabs' )
		)
	);

	$wp_customize->add_setting(
		'kingcabs_services_icon_title',
		array(
			'default'			=> 'fa fa-automobile',
			'sanitize_callback' => 'sanitize_text_field' // Done
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Fontawesome_Icon_Chooser(
			$wp_customize,
			'kingcabs_services_icon_title',
			array(
				'settings'		=> 'kingcabs_services_icon_title',
				'section'		=> 'kingcabs_services_section',
				'type'			=> 'icon',
				'label'			=> esc_html__( 'Select Section Title Icon', 'kingcabs' )
			)
		)
	);


	$wp_customize->add_setting(
		'kingcabs_services_page',
		array(
			'sanitize_callback' => 'kingcabs_sanitize_choices_array' // Done
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Dropdown_Multiple_Chooser(
		$wp_customize,
		'kingcabs_services_page',
		array(
			'settings'		=> 'kingcabs_services_page',
			'section'		=> 'kingcabs_services_section',
			'choices'		=> $kingcabs_page_choice,
			'label'			=> esc_html__( 'Select Services Pages', 'kingcabs' )
 		)
	));


/**
 * Counter Section Area
*/
	$wp_customize->add_section(
		'kingcabs_counter_section',
		array(
			'title' => esc_html__( 'Counter Settings Area', 'kingcabs' ),
			'panel'	=> 'kingcabs_home_panel',
			'priority'		=> 4,
		)
	);

	$wp_customize->add_setting(
		'kingcabs_counter_section_disable',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Switch_Control(
			$wp_customize,
			'kingcabs_counter_section_disable',
			array(
				'settings'		=> 'kingcabs_counter_section_disable',
				'section'		=> 'kingcabs_counter_section',
				'label'			=> esc_html__( 'Display Counter Section', 'kingcabs' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'kingcabs' ),
					'off' => esc_html__( 'No', 'kingcabs' )
				)	
			)
		)
	);


	$wp_customize->add_setting(
		'kingcabs_counter_title',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_counter_title',
		array(
			'settings'		=> 'kingcabs_counter_title',
			'section'		=> 'kingcabs_counter_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Counter Section Title', 'kingcabs' )
		)
	);

	$wp_customize->add_setting(
		'kingcabs_counter_sub_title',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_counter_sub_title',
		array(
			'settings'		=> 'kingcabs_counter_sub_title',
			'section'		=> 'kingcabs_counter_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Counter Section Sub Title', 'kingcabs' )
		)
	);


	$wp_customize->add_setting(
		'kingcabs_counter_bg',
		array(
			'sanitize_callback' => 'esc_url_raw',  // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'kingcabs_counter_bg',
	        array(
	            'label' => esc_html__( 'Upload Image', 'kingcabs' ),
	            'section' => 'kingcabs_counter_section',
	            'settings' => 'kingcabs_counter_bg',
	            'label' => esc_html__('Upload Counter Section BG Image','kingcabs'),
	            'description' => esc_html__('Recommended Image Size: 1800 X 400PX', 'kingcabs')
	        )
	    )
	);


	$wp_customize->add_setting(
		'kingcabs_counter_icon_title',
		array(
			'default'			=> 'fa fa-bell',
			'sanitize_callback' => 'sanitize_text_field' // Done
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Fontawesome_Icon_Chooser(
			$wp_customize,
			'kingcabs_counter_icon_title',
			array(
				'settings'		=> 'kingcabs_counter_icon_title',
				'section'		=> 'kingcabs_counter_section',
				'type'			=> 'icon',
				'label'			=> esc_html__( 'Select Section Title Icon', 'kingcabs' )
			)
		)
	);

	// Counter Section Area
	for( $i = 1; $i < 5; $i++ ){

		$wp_customize->add_setting(
			'kingcabs_counter_heading'.$i,
			array(
				'sanitize_callback' => 'sanitize_text_field' // Done
			)
		);

		$wp_customize->add_control(
			new Kingcabs_Customize_Heading(
				$wp_customize,
				'kingcabs_counter_heading'.$i,
				array(
					'settings'		=> 'kingcabs_counter_heading'.$i,
					'section'		=> 'kingcabs_counter_section',
					'label'			=> esc_html__( 'Manage Counter Settings', 'kingcabs' ),
				)
			)
		);

		$wp_customize->add_setting(
			'kingcabs_counter_title'.$i,
			array(
				'sanitize_callback' => 'sanitize_text_field' // Done
			)
		);

		$wp_customize->add_control(
			'kingcabs_counter_title'.$i,
			array(
				'settings'		=> 'kingcabs_counter_title'.$i,
				'section'		=> 'kingcabs_counter_section',
				'type'			=> 'text',
				'label'			=> esc_html__( 'Enter Counter Title', 'kingcabs' )
			)
		);

		$wp_customize->add_setting(
			'kingcabs_counter_count'.$i,
			array(
				'sanitize_callback' => 'absint' // Done
			)
		);

		$wp_customize->add_control(
			'kingcabs_counter_count'.$i,
			array(
				'settings'		=> 'kingcabs_counter_count'.$i,
				'section'		=> 'kingcabs_counter_section',
				'type'			=> 'number',
				'label'			=> esc_html__( 'Enter Counter Number', 'kingcabs' )
			)
		);

		$wp_customize->add_setting(
			'kingcabs_counter_icon'.$i,
			array(
				'default'			=> 'fa fa-bell', 
				'sanitize_callback' => 'sanitize_text_field' // Done
			)
		);

		$wp_customize->add_control(
			new Kingcabs_Fontawesome_Icon_Chooser(
				$wp_customize,
				'kingcabs_counter_icon'.$i,
				array(
					'settings'		=> 'kingcabs_counter_icon'.$i,
					'section'		=> 'kingcabs_counter_section',
					'type'			=> 'icon',
					'label'			=> esc_html__( 'Select Counter Icon', 'kingcabs' )
				)
			)
		);
	}


/**
 * Fleet Section Settings Area
*/
	$wp_customize->add_section(
		'kingcabs_fleet_section',
		array(
			'title' 			=> esc_html__( 'Fleet Section Settings', 'kingcabs' ),
			'panel'				=> 'kingcabs_home_panel',
			'priority'		=> 5,
		)
	);


	$wp_customize->add_setting(
		'kingcabs_fleet_section_disable',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Switch_Control(
			$wp_customize,
			'kingcabs_fleet_section_disable',
			array(
				'settings'		=> 'kingcabs_fleet_section_disable',
				'section'		=> 'kingcabs_fleet_section',
				'label'			=> esc_html__( 'Display Fleet Section', 'kingcabs' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'kingcabs' ),
					'off' => esc_html__( 'No', 'kingcabs' )
				)	
			)
		)
	);

	$wp_customize->add_setting(
		'kingcabs_fleet_title',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_fleet_title',
		array(
			'settings'		=> 'kingcabs_fleet_title',
			'section'		=> 'kingcabs_fleet_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Enter Fleet Section Title', 'kingcabs' )
		)
	);

	$wp_customize->add_setting(
		'kingcabs_fleet_sub_title',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_fleet_sub_title',
		array(
			'settings'		=> 'kingcabs_fleet_sub_title',
			'section'		=> 'kingcabs_fleet_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Enter Fleet Sub Title', 'kingcabs' )
		)
	);


	$wp_customize->add_setting(
		'kingcabs_fleet_icon_title',
		array(
			'default'			=> 'fa fa-bell',
			'sanitize_callback' => 'sanitize_text_field' // Done
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Fontawesome_Icon_Chooser(
			$wp_customize,
			'kingcabs_fleet_icon_title',
			array(
				'settings'		=> 'kingcabs_fleet_icon_title',
				'section'		=> 'kingcabs_fleet_section',
				'type'			=> 'icon',
				'label'			=> esc_html__( 'Select Fleet Title Icon', 'kingcabs' )
			)
		)
	);


	$wp_customize->add_setting( 'kingcabs_portfolio_area_term_id', array(
		'default'			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	
	$wp_customize->add_control( new Kingcabs_Customize_Control_Checkbox_Multiple( $wp_customize, 'kingcabs_portfolio_area_term_id', array(
        'label' => esc_html__( 'Select Fleets Cateogry', 'kingcabs' ),
        'section' => 'kingcabs_fleet_section',
        'settings' => 'kingcabs_portfolio_area_term_id',
        'choices' => $cat_lists
    ) ) );


    $wp_customize->add_setting( 'kingcabs_fleet_button_title', array(
		'sanitize_callback' => 'sanitize_text_field', // Done
		'default'			=> ''
	));

	$wp_customize->add_control( 'kingcabs_fleet_button_title', array(
		'settings'		=> 'kingcabs_fleet_button_title',
		'section'		=> 'kingcabs_fleet_section',
		'type'			=> 'text',
		'label'			=> esc_html__( 'Enter Fleet Booking Button Text', 'kingcabs' )
	));


	$wp_customize->add_setting( 'kingcabs_fleet_button_url', array(
		'sanitize_callback' => 'esc_url_raw', // Done
		'default'			=> ''
	));

	$wp_customize->add_control( 'kingcabs_fleet_button_url', array(
		'settings'		=> 'kingcabs_fleet_button_url',
		'section'		=> 'kingcabs_fleet_section',
		'type'			=> 'url',
		'label'			=> esc_attr__( 'Enter Fllet Booking Button URL', 'kingcabs' )
	));




/**
 * Testimoial Section
*/
	$wp_customize->add_section(
		'kingcabs_testimonial_section',
		array(
			'title' => esc_html__( 'Testimonial Section Area', 'kingcabs' ),
			'panel'  => 'kingcabs_home_panel',
			'priority'		=> 6,
		)
	);

	$wp_customize->add_setting(
		'kingcabs_testimonial_section_disable',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default' => 'off'
		)
	);
	$wp_customize->add_control(
		new Kingcabs_Switch_Control(
			$wp_customize,
			'kingcabs_testimonial_section_disable',
			array(
				'settings'		=> 'kingcabs_testimonial_section_disable',
				'section'		=> 'kingcabs_testimonial_section',
				'label'			=> esc_html__( 'Display Testimonial Section', 'kingcabs' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'kingcabs' ),
					'off' => esc_html__( 'No', 'kingcabs' )
				)	
			)
		)
	);

	$wp_customize->add_setting(
		'kingcabs_testimonial_title',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_testimonial_title',
		array(
			'settings'		=> 'kingcabs_testimonial_title',
			'section'		=> 'kingcabs_testimonial_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Testimonial Section Title', 'kingcabs' )
		)
	);


	$wp_customize->add_setting(
		'kingcabs_testimonial_sub_title',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default'			=> ''
		)
	);
	$wp_customize->add_control(
		'kingcabs_testimonial_sub_title',
		array(
			'settings'		=> 'kingcabs_testimonial_sub_title',
			'section'		=> 'kingcabs_testimonial_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Testimonial Sub Title', 'kingcabs' )
		)
	);

	$wp_customize->add_setting(
		'kingcabs_testimonial_icon_title',
		array(
			'default'			=> 'fa fa-bell',
			'sanitize_callback' => 'sanitize_text_field' // Done
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Fontawesome_Icon_Chooser(
			$wp_customize,
			'kingcabs_testimonial_icon_title',
			array(
				'settings'		=> 'kingcabs_testimonial_icon_title',
				'section'		=> 'kingcabs_testimonial_section',
				'type'			=> 'icon',
				'label'			=> esc_html__( 'Select Section Title Icon', 'kingcabs' )
			)
		)
	);


	$wp_customize->add_setting(
		'kingcabs_testimonial_page',
		array(
			'sanitize_callback' => 'kingcabs_sanitize_choices_array' // Done
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Dropdown_Multiple_Chooser(
		$wp_customize,
		'kingcabs_testimonial_page',
		array(
			'settings'		=> 'kingcabs_testimonial_page',
			'section'		=> 'kingcabs_testimonial_section',
			'choices'		=> $kingcabs_page_choice,
			'label'			=> esc_html__( 'Select Testimonial Pages', 'kingcabs' )
 		)
	));


/**
 * Drive Section Settings Area
*/
	$wp_customize->add_section(
		'kingcabs_driver_section',
		array(
			'title'			=> esc_html__( 'Driver Section Area', 'kingcabs' ),
			'panel'         => 'kingcabs_home_panel',
			'priority'		=> 7,
		)
	);

	$wp_customize->add_setting(
		'kingcabs_driver_section_disable',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Switch_Control(
			$wp_customize,
			'kingcabs_driver_section_disable',
			array(
				'settings'		=> 'kingcabs_driver_section_disable',
				'section'		=> 'kingcabs_driver_section',
				'label'			=> esc_html__( 'Display Driver Section', 'kingcabs' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'kingcabs' ),
					'off' => esc_html__( 'No', 'kingcabs' )
				)	
			)
		)
	);


	$wp_customize->add_setting(
		'kingcabs_driver_title',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default'			=> ''
		)
	);
	$wp_customize->add_control(
		'kingcabs_driver_title',
		array(
			'settings'		=> 'kingcabs_driver_title',
			'section'		=> 'kingcabs_driver_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Driver Section Title', 'kingcabs' )
		)
	);

	$wp_customize->add_setting(
		'kingcabs_driver_sub_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',  // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_driver_sub_title',
		array(
			'settings'		=> 'kingcabs_driver_sub_title',  // Done
			'section'		=> 'kingcabs_driver_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Driver Section Sub Title', 'kingcabs' )
		)
	);


	$wp_customize->add_setting(
		'kingcabs_driver_page_title_icon',
		array(
			'default'			=> 'fa-bell',
			'sanitize_callback' => 'sanitize_text_field'  // Done
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Fontawesome_Icon_Chooser(
			$wp_customize,
			'kingcabs_driver_page_title_icon',
			array(
				'settings'		=> 'kingcabs_driver_page_title_icon',
				'section'		=> 'kingcabs_driver_section',
				'type'			=> 'icon',
				'label'			=> esc_html__( 'Dirver Section Title Icon', 'kingcabs' )
			)
		)
	);



	$wp_customize->add_setting('kingcabs_driver_column', array(
		'default' => 3,
		'sanitize_callback' => 'kingcabs_driver_column'  //done
    ));

    $wp_customize->add_control('kingcabs_driver_column', array(
		'type' => 'select',
		'label' => esc_html__('Select Number Column', 'kingcabs'),
		'section' => 'kingcabs_driver_section',
		'settings' => 'kingcabs_driver_column',
		'choices' => array( 
			'1' => '1',
          	'2' => '2',  
			'3' => '3', 
			'4' => '4',
    	)
    ));
    


	for( $i = 1; $i < 5; $i++ ){
		$wp_customize->add_setting(
			'kingcabs_driver_heading'.$i,
			array(
				'sanitize_callback' => 'sanitize_text_field'  // Done
			)
		);

		$wp_customize->add_control(
			new Kingcabs_Customize_Heading(
				$wp_customize,
				'kingcabs_driver_heading'.$i,
				array(
					'settings'		=> 'kingcabs_driver_heading'.$i,
					'section'		=> 'kingcabs_driver_section',
					'label'			=> esc_html__( 'Manage Driver Settings', 'kingcabs' ),
				)
			)
		);

		$wp_customize->add_setting(
			'kingcabs_driver_page'.$i,
			array(
				'sanitize_callback' => 'absint' // Done
			)
		);

		$wp_customize->add_control(
			'kingcabs_driver_page'.$i,
			array(
				'settings'		=> 'kingcabs_driver_page'.$i,
				'section'		=> 'kingcabs_driver_section',
				'type'			=> 'dropdown-pages',
				'label'			=> esc_html__( 'Select Driver Page', 'kingcabs' )
			)
		);

		$wp_customize->add_setting(
			'kingcabs_driver_designation'.$i,
			array(
				'sanitize_callback' => 'sanitize_text_field'  // Done
			)
		);

		$wp_customize->add_control(
			'kingcabs_driver_designation'.$i,
			array(
				'settings'		=> 'kingcabs_driver_designation'.$i,
				'section'		=> 'kingcabs_driver_section',
				'type'			=> 'text',
				'label'			=> esc_html__( 'Driver Designation', 'kingcabs' )
			)
		);
		
	}


/*
 * Call To Aciton Section 
*/
	$wp_customize->add_section(
		'kingcabs_call_to_action_section',
		array(
			'title' => esc_html__( 'Call To Action Section', 'kingcabs' ),
			'panel' => 'kingcabs_home_panel',
			'priority'		=> 8,
		)
	);

	$wp_customize->add_setting(
		'kingcabs_call_to_action_page_disable',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Switch_Control(
			$wp_customize,
			'kingcabs_call_to_action_page_disable',
			array(
				'settings'		=> 'kingcabs_call_to_action_page_disable',
				'section'		=> 'kingcabs_call_to_action_section',
				'label'			=> esc_html__( 'Display Call To Action', 'kingcabs' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'kingcabs' ),
					'off' => esc_html__( 'No', 'kingcabs' )
				)	
			)
		)
	);

	$wp_customize->add_setting(
		'kingcabs_call_to_action_page',
		array(
			'sanitize_callback' => 'absint',  // Done
		)
	);

	$wp_customize->add_control(
		'kingcabs_call_to_action_page',
		array(
			'settings'		=> 'kingcabs_call_to_action_page',
			'section'		=> 'kingcabs_call_to_action_section',
			'type'			=> 'dropdown-pages',
			'label'			=> esc_html__( 'Select a Page', 'kingcabs' ),	
		)
	);

	$wp_customize->add_setting(
		'kingcabs_call_to_action_button_text',
		array(
			'sanitize_callback' => 'sanitize_text_field',  // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_call_to_action_button_text',
		array(
			'settings'		=> 'kingcabs_call_to_action_button_text',
			'section'		=> 'kingcabs_call_to_action_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Enter Button Text', 'kingcabs' )
		)
	);


	$wp_customize->add_setting(
		'kingcabs_call_to_action_button_number',
		array(
			'sanitize_callback' => 'sanitize_text_field',  // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_call_to_action_button_number',
		array(
			'settings'		=> 'kingcabs_call_to_action_button_number',
			'section'		=> 'kingcabs_call_to_action_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Enter Number', 'kingcabs' )
		)
	);



/**
 * Client/Brand Logo Secton 
*/
	$wp_customize->add_Section(
		'kingcabs_client_logo_section',
		array(
			'title' => esc_html__( 'Client/Brand Logo Section', 'kingcabs' ),
			'panel'	=> 'kingcabs_home_panel'
		)
	);

	$wp_customize->add_setting(
		'kingcabs_client_logo_section_disable',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Switch_Control(
			$wp_customize,
			'kingcabs_client_logo_section_disable',
			array(
				'settings'		=> 'kingcabs_client_logo_section_disable',
				'section'		=> 'kingcabs_client_logo_section',
				'label'			=> esc_html__( 'Display Client Logo Section', 'kingcabs' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'kingcabs' ),
					'off' => esc_html__( 'No', 'kingcabs' )
				)	
			)
		)
	);

	$wp_customize->add_setting(
		'kingcabs_client_logo_image',
		array(
			'sanitize_callback' => 'sanitize_text_field' // Done
		)
	);

	$wp_customize->add_control(
		new Kingcabs_Display_Gallery_Control(
			$wp_customize,
			'kingcabs_client_logo_image',
		array(
			'settings'		=> 'kingcabs_client_logo_image',
			'section'		=> 'kingcabs_client_logo_section',
			'label'			=> esc_html__( 'Upload Clients Logos', 'kingcabs' ),
		)
	));



/*
 * Footer Secton Area
*/
	$wp_customize->add_section(
		'kingcabs_footer_section',
		array(
			'title' => esc_html__( 'Footer Section Area', 'kingcabs' ),
			'panel' => 'kingcabs_home_panel'
		)
	);

	$wp_customize->add_setting(
		'kingcabs_footer_top_title',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_footer_top_title',
		array(
			'settings'		=> 'kingcabs_footer_top_title',
			'section'		=> 'kingcabs_footer_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Footer Top Title', 'kingcabs' )
		)
	);

    $wp_customize->add_setting(
		'kingcabs_footer_top_button_title',
		array(
			'sanitize_callback' => 'sanitize_text_field', // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_footer_top_button_title',
		array(
			'settings'		=> 'kingcabs_footer_top_button_title',
			'section'		=> 'kingcabs_footer_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Footer Top Button Title', 'kingcabs' )
		)
	);

	$wp_customize->add_setting(
		'kingcabs_footer_top_button_url_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',  // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_footer_top_button_url_title',
		array(
			'settings'		=> 'kingcabs_footer_top_button_url_title',
			'section'		=> 'kingcabs_footer_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Footer Top Button Url', 'kingcabs' )
		)
	);


	$wp_customize->add_setting(
		'kingcabs_footer_follow_facebook',
		array(
			'sanitize_callback' => 'esc_url_raw', // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_footer_follow_facebook',
		array(
			'settings'		=> 'kingcabs_footer_follow_facebook',
			'section'		=> 'kingcabs_footer_section',
			'type'			=> 'url',
			'label'			=> esc_html__( 'Facebook URL', 'kingcabs' )
		)
	);

	$wp_customize->add_setting(
		'kingcabs_footer_follow_twitter',
		array(
			'sanitize_callback' => 'esc_url_raw', // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_footer_follow_twitter',
		array(
			'settings'		=> 'kingcabs_footer_follow_twitter',
			'section'		=> 'kingcabs_footer_section',
			'type'			=> 'url',
			'label'			=> esc_html__( 'Twitter URL', 'kingcabs' )
		)
	);


	$wp_customize->add_setting(
		'kingcabs_footer_follow_youtube',
		array(
			'sanitize_callback' => 'esc_url_raw',  // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_footer_follow_youtube',
		array(
			'settings'		=> 'kingcabs_footer_follow_youtube',
			'section'		=> 'kingcabs_footer_section',
			'type'			=> 'url',
			'label'			=> esc_html__( 'YouTube URL', 'kingcabs' )
		)
	);

	$wp_customize->add_setting(
		'kingcabs_footer_follow_google',
		array(
			'sanitize_callback' => 'esc_url_raw',   // Done
			'default'			=> ''
		)
	);
	$wp_customize->add_control(
		'kingcabs_footer_follow_google',
		array(
			'settings'		=> 'kingcabs_footer_follow_google',
			'section'		=> 'kingcabs_footer_section',
			'type'			=> 'url',
			'label'			=> esc_html__( 'Google + URL ', 'kingcabs' )
		)
	);


	$wp_customize->add_setting(
		'kingcabs_footer_follow_linkedin',
		array(
			'sanitize_callback' => 'esc_url_raw',  // Done
			'default'			=> ''
		)
	);

	$wp_customize->add_control(
		'kingcabs_footer_follow_linkedin',
		array(
			'settings'		=> 'kingcabs_footer_follow_linkedin',
			'section'		=> 'kingcabs_footer_section',
			'type'			=> 'url',
			'label'			=> esc_html__( 'Linkendin URL', 'kingcabs' )
		)
	);

	$wp_customize->add_setting('kingcabs_footer_buttom_copyright_setting', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'  //done
	));

	$wp_customize->add_control('kingcabs_footer_buttom_copyright_setting', array(
		'type' => 'textarea',
		'label' => esc_html__('Footer Content (Copyright Text)', 'kingcabs'),
		'section' => 'kingcabs_footer_section',
		'settings' => 'kingcabs_footer_buttom_copyright_setting'
	) ); 



if ( isset( $wp_customize->selective_refresh ) ) {
	
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' => 'kingcabs_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' => 'kingcabs_customize_partial_blogdescription',
	) );

}

	function kingcabs_sanitize_choices_array( $input, $setting ) {
	    global $wp_customize;
	    
	    if(!empty($input)){
	        $input = array_map('absint', $input);
	    }

	    return $input;
	} 

	/**
     * Driver Column Sanitization
    */
    function kingcabs_driver_column($input) {
       $valid_keys = array(
          	'1' => '1',
          	'2' => '2',  
			'3' => '3', 
			'4' => '4',
       );
       if ( array_key_exists( $input, $valid_keys ) ) {
          return $input;
       } else {
          return '';
       }
    }

}
add_action( 'customize_register', 'kingcabs_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function kingcabs_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function kingcabs_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kingcabs_customize_preview_js() {
	wp_enqueue_script( 'kingcabs-customizer', get_template_directory_uri() . '/sparklethemes/customizer/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'kingcabs_customize_preview_js' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function Kingcabs_customizer_script() {
    wp_enqueue_script( 'kingcabs-customizer-script', get_template_directory_uri() .'/sparklethemes/customizer/js/customizer-scripts.js', array("jquery"),'', true  );
    wp_enqueue_script( 'kingcabs-customizer-chosen-script', get_template_directory_uri() .'/sparklethemes/customizer/js/chosen.jquery.js', array("jquery"),'1.4.1', true  );
    wp_enqueue_style( 'kingcabs-customizer-chosen-style', get_template_directory_uri() .'/sparklethemes/customizer/css/chosen.css');
    wp_enqueue_style( 'kingcabs-customizer-style', get_template_directory_uri() .'/sparklethemes/customizer/css/customizer-style.css');
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/library/font-awesome/css/font-awesome.css'); 
}
add_action( 'customize_controls_enqueue_scripts', 'kingcabs_customizer_script' );

