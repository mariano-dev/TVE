<?php
/**
 * Partials for Selective Refresh
 *
 * @package Travelia
 */

if( ! function_exists( 'travelia_get_top_header_opening_time' ) ) :
/**
 * Prints Top Header Opening Time
*/
function travelia_get_top_header_opening_time(){
    return get_theme_mod( 'top_header_opening_time', __( ' Mon -Fri: 9:00-19:00', 'travelia' ) );
}
endif;



if( ! function_exists( 'travelia_get_cta_title' ) ) :
/**
 * Prints Call to action title
*/
function travelia_get_cta_title(){
    return get_theme_mod( 'travelia_cta_title', __( 'Let\'s go with us', 'travelia' ) );
}
endif;


if( ! function_exists( 'travelia_get_cta_subtitle' ) ) :
/**
 * Prints Call to action subtitle
*/
function travelia_get_cta_subtitle(){
    return get_theme_mod( 'travelia_cta_subtitle', __( 'Start Your Journey With Us', 'travelia' ) );
}
endif;

if( ! function_exists( 'travelia_get_cta_description' ) ) :
/**
 * Prints Call to action Description
*/
function travelia_get_cta_description(){
    return get_theme_mod( 'travelia_cta_description', __( 'Necessitatibus enim corrupti ullam voluptatum provident deserunt natus reprehenderit, inventore, tempore aut neque cupiditate, aspernatur! Quibusdam aliquid dolor a culpa, officiis quisquam.', 'travelia' ) );
}
endif;

if( ! function_exists( 'travelia_get_cta_button_1_text' ) ) :
/**
 * Prints Call to action button text
*/
function travelia_get_cta_button_1_text(){
    return get_theme_mod( 'travelia_cta_button_1_text', __( 'Book your trip', 'travelia' ) );
}
endif;

if( ! function_exists( 'travelia_get_cta_button_2_text' ) ) :
/**
 * Prints Call to action button text
*/
function travelia_get_cta_button_2_text(){
    return get_theme_mod( 'travelia_cta_button_2_text', __( 'Contact Us', 'travelia' ) );
}
endif;



if( ! function_exists( 'travelia_get_trip_search_title' ) ) :
/**
 * Prints Trip Search Title
*/
function travelia_get_trip_search_title(){
    return get_theme_mod( 'travelia_trip_search_title', __( 'Find Your Dream Trip', 'travelia' ) );
}
endif;


 