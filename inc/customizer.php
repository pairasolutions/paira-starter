<?php

/**
 * Paira Starter Theme Customizer
 *
 * @package Paira_Starter
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function themeslug_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function Paira_Starter_customize_register( $wp_customize ) {
    // Add control for logo uploader
    $wp_customize->add_setting( 'Paira_Starter_logo', array(
        //'default' => __( '', 'paira-starter' ),
        'sanitize_callback' => 'esc_url',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'Paira_Starter_logo', array(
        'label' => __( 'Upload Logo (replaces text)', 'paira-starter' ),
        'section' => 'title_tagline',
        'settings' => 'Paira_Starter_logo',
    ) ) );
}

add_action( 'customize_register', 'Paira_Starter_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function Paira_Starter_customize_preview_js() {
    wp_enqueue_script( 'Paira_Starter_customizer', get_template_directory_uri() . '/inc/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'Paira_Starter_customize_preview_js' );
