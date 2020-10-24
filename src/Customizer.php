<?php

abstract class Customizer
{
    public static function register_color_primary( $wp_customize ) {

        $wp_customize->add_setting( 'color_primary', array(
            'default' => Settings::get_default( 'color_primary' ),
            'sanitize_callback' => 'sanitize_hex_color',  
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh'
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_primary', array(
            'label' => __( 'Primärfarbe', 'theme_textdomain' ),
            'section' => 'colors',
        ) ) );
    }

    public static function register_color_primary_dark( $wp_customize ) {

        $wp_customize->add_setting( 'color_primary_dark', array(
            'default' => Settings::get_default( 'color_primary_dark' ),
            'sanitize_callback' => 'sanitize_hex_color',  
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh'
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_primary_dark', array(
            'label' => __( 'Primärfarbe (Dunkel)', 'theme_textdomain' ),
            'section' => 'colors',
        ) ) );
    }

    public static function register_initial_zoom_level( $wp_customize ) {

        $wp_customize->add_setting( 'initial_zoom_level', array(
            'default' => Settings::get_default( 'initial_zoom_level' ),
            'sanitize_callback' => 'absint',  
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh'
        ) );
        $wp_customize->add_control( 'initial_zoom_level', array(
            'type' => 'range',
            'label' => __( 'Zoom-Level', 'theme_textdomain' ),
            'section' => 'static_front_page',
            'input_attrs' => array(
                'min' => 0,
                'max' => 20,
                'step' => 1
            )
        ) );
    }

    public static function register_map_center( $wp_customize ) {

    }

    public static function register( $wp_customize ) {
        self::register_color_primary( $wp_customize );
        self::register_color_primary_dark( $wp_customize );
        self::register_initial_zoom_level( $wp_customize );
        self::register_map_center( $wp_customize );
    }
}

add_action( 'customize_register', [ 'Customizer', 'register' ] );
