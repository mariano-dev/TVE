<?php

/**
 * Travelia General Settings panel at Theme Customizer
 *
 * @package Travelia
 * @since 1.0.0
 */
add_action( 'customize_register', 'travelia_general_settings_register' );

function travelia_general_settings_register( $wp_customize ) {
    
    $wp_customize->get_section( 'title_tagline' )->panel = 'travelia_general_settings_panel';
    $wp_customize->get_section( 'title_tagline' )->priority = '5';
    $wp_customize->get_section( 'colors' )->panel    = 'travelia_general_settings_panel';
    $wp_customize->get_section( 'colors' )->priority = '10';
    $wp_customize->get_section( 'background_image' )->panel = 'travelia_general_settings_panel';
    $wp_customize->get_section( 'background_image' )->priority = '15';

    /**
     * Add General Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
        'travelia_general_settings_panel',
        array(
            'priority'       => 5,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'General Settings', 'travelia' ),
        )
    );
}