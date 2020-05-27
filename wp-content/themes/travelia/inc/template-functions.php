<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Travelia
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function travelia_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'travelia_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function travelia_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'travelia_pingback_header' );


if( ! function_exists('middle_header_widget_items')):
	function middle_header_widget_items(){
		$defaults =  array(
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
		);
		$header_widget_items = get_theme_mod( 'middle_header_widget_items', $defaults );
		if( $header_widget_items  ){ 
			foreach( $header_widget_items as $header_widget ){ ?>
				<div class="single-widget">
					<i class="<?php echo esc_attr( $header_widget['icon'] );?>" aria-hidden="true"></i>
					<p><?php echo esc_attr( $header_widget['title'] );?></p>
					<p><?php echo esc_attr( $header_widget['sub_title'] );?></p>
				</div>
				<?php
			}
		}
	}
endif;	



if( ! function_exists('travelia_contact_items')):
	function travelia_contact_items(){
		$defaults =  array(
			array(
				'icon' => 'fa fa-map-marker',
				'title' => 'Road-7 old Street, Manhatan'   
			),
			array(
				'icon' => 'fa fa-phone',
				'title' => '+2112-6546654'
			),
			array(
				'icon' => 'fa fa-envelope',
				'title' => 'info@berater3.com'
			)
		);
		$contact_items = get_theme_mod( 'travelia_contact_items', $defaults );
		if( $contact_items  ){ 
			foreach( $contact_items as $contact ){ ?>
				<div class="single-info">
					<i class="<?php echo esc_attr($contact['icon']);?>"></i>
					<a href="#"><?php echo esc_html($contact['title']);?></a>
				</div>
				
				<?php
			}
		}
	}
endif;	

if( ! function_exists('travelia_top_header_social_links')):
	function travelia_top_header_social_links(){
		$defaults =  array(
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
		);
		$social_items = get_theme_mod( 'top_header_social_links', $defaults );
		if( $social_items  ){ 
			foreach( $social_items as $social ){ ?>
				<li><a href="<?php echo esc_url($social['link']);?>"><i class="<?php echo esc_attr($social['font']);?>"></i></a></li>
				<?php
			}
		}
	}
endif;

if( ! function_exists('travelia_counter_items')):
	function travelia_counter_items(){
		$defaults =  array(
			array(
				'icon' => 'fa fa-users',
				'number' => '2500',    
				'text'=> 'customize_render_section'                    
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
		);
		$counter_items = get_theme_mod( 'travelia_counter_items', $defaults );
		if( $counter_items  ){ 
			foreach( $counter_items as $counter ){ ?>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Single Count -->
					<div class="single-count">
						<i class="<?php echo esc_attr( $counter['icon'] );?>"></i>
						<h2><span class="number"><?php echo esc_attr( $counter['number'] );?></span> <?php echo esc_attr( $counter['text'] );?></h2>
					</div>
					<!--/ End Single Count -->
				</div>
				<?php
			}
		}
	}
endif;

if( ! function_exists('travelia_why_choose_us_items')):
	function travelia_why_choose_us_items(){
		$defaults =  array(
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
		);
		$why_choose_items = get_theme_mod( 'travelia_why_choose_us_items', $defaults );
		if( $why_choose_items  ){ 
			foreach( $why_choose_items as $why_choose ){ ?>
				<div class="col-6 col-md-6 col-12 wow fadeInLeft" data-wow-delay="0.4s">
					<!-- Choose Single -->
					<div class="choose-single">
						<i class="<?php echo esc_attr( $why_choose['icon'] );?>"></i>
						<div class="content">
							<h4><?php echo esc_attr( $why_choose['title'] );?></h4>
							<p><?php echo esc_attr( $why_choose['description'] );?></p>
						</div>
					</div>
					<!--/ End Choose Single -->
				</div>
				<?php
			}
		}
	}
endif;

