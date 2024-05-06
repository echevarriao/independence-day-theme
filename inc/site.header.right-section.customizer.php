<?php

function header_right_customizer($wp_customize){
    
    $configs = array();
   
    $configs['title'] = "Header Right Section";
    $configs['priority'] = 35;
	$configs['description'] = "Section that allows you to customize the right section in the title bar";
    
    $wp_customize->add_section('header_right_section', $configs);

    $wp_customize->add_setting('header_right_bg_type', array('default' => 'solid'));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'brand_bg_type',
        array(
            'label'          => __( 'Use Gradient | Solid Background Color', 'independence-day' ),
            'section'        => 'header_right_section',
            'settings'       => 'header_right_bg_type',
            'type'           => 'radio',
            'choices'        => array(
                'gradient'   => __( 'Gradient' ),
                'default'   => __( 'Default' ),
                'solid'  => __( 'Solid' )
            ),
            'priority' => 5,
        )));

    $wp_customize->add_setting('after_footer_solid_bg_color', array('default' => '#000E2F'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'after_footer_solid_bg_color', array(
	'label'        => __( 'Solid Backrgound Color', 'independence-day' ),
	'section'    => 'header_right_section',
	'settings'   => 'after_footer_solid_bg_color',
    'priority' => 10,) ) );

    $wp_customize->add_setting('after_footer_first_gradient_bg_color', array('default' => '#000E2F'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'after_footer_first_gradient_bg_color', array(
	'label'        => __( 'First Gradient Background Color', 'independence-day' ),
	'section'    => 'header_right_section',
	'settings'   => 'after_footer_first_gradient_bg_color',
    'priority' => 15,) ) );
        
    $wp_customize->add_setting('after_footer_second_gradient_bg_color', array('default' => '#000E2F'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'after_footer_second_gradient_bg_color', array(
	'label'        => __( 'Second Gradient Background Color', 'independence-day' ),
	'section'    => 'header_right_section',
	'settings'   => 'after_footer_second_gradient_bg_color',
    'priority' => 20,) ) );

    $wp_customize->add_setting('after_footer_txt_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'after_footer_txt_color', array(
	'label'        => __( 'After Footer Text Color', 'independence-day' ),
	'section'    => 'after_footer_section',
	'settings'   => 'after_footer_txt_color',
    'priority' => 25,) ) );
/*
    $wp_customize->add_setting('brand_separator_txt_color', array('default' => '#a1a1a1'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_separator_txt_color', array(
	'label'        => __( 'Separator "|" Text Color', 'independence-day' ),
	'section'    => 'header_right_section',
	'settings'   => 'brand_separator_txt_color',
    'priority' => 30,) ) );

    $wp_customize->add_setting('brand_univct_txt_color', array('default' => '#9faab2'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_univct_txt_color', array(
	'label'        => __( '"University of Connecticut" Text Color', 'independence-day' ),
	'section'    => 'header_right_section',
	'settings'   => 'brand_univct_txt_color',
    'priority' => 35,) ) );
    
    */

}

add_action( 'customize_register', 'header_right_customizer' );