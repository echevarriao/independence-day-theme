<?php

function front_page_body_brand_customizer($wp_customize){

    $configs = array();
   
    $configs['title'] = "Front Page Body Section";
    $configs['priority'] = 40;
    
    $wp_customize->add_section('front_page_body_section', $configs);

    $wp_customize->add_setting('front_page_body_bg_type', array('default' => 'solid'));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'front_page_body_bg_type',
        array(
            'label'          => __( 'Use Gradient | Solid Background Color', 'independence-day' ),
            'section'        => 'front_page_body_section',
            'settings'       => 'front_page_body_bg_type',
            'type'           => 'radio',
            'choices'        => array(
                'gradient'   => __( 'Use gradient' ),
                'solid'  => __( 'Use solid' )
            ),
            'priority' => 5,
        )));
    $wp_customize->add_setting('front_page_body_solid_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_page_body_solid_bg_color', array(
	'label'        => __( 'Solid Bar Color', 'independence-day' ),
	'section'    => 'front_page_body_section',
	'settings'   => 'front_page_body_solid_bg_color',
    'priority' => 10,) ) );


    $wp_customize->add_setting('front_page_body_first_gradient_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_page_body_first_gradient_bg_color', array(
	'label'        => __( 'First Gradient Background Color', 'independence-day' ),
	'section'    => 'front_page_body_section',
	'settings'   => 'front_page_body_first_gradient_bg_color',
    'priority' => 15,) ) );

        
    $wp_customize->add_setting('front_page_body_second_gradient_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_page_body_second_gradient_bg_color', array(
	'label'        => __( 'Second Gradient Background Color', 'independence-day' ),
	'section'    => 'front_page_body_section',
	'settings'   => 'front_page_body_second_gradient_bg_color',
    'priority' => 20,) ) );

///////

    $wp_customize->add_setting('front_page_content_bg_type', array('default' => 'solid'));

    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'front_page_content_bg_type',
        array(
            'label'          => __( 'Content: Gradient | Solid Background Color', 'independence-day' ),
            'section'        => 'front_page_body_section',
            'settings'       => 'front_page_content_bg_type',
            'type'           => 'radio',
            'choices'        => array(
                'gradient'   => __( 'Use gradient' ),
                'solid'  => __( 'Use solid' )
            ),
            'priority' => 25,
        )));

    $wp_customize->add_setting('front_page_content_solid_bg_color', array('default' => '#ffffff'));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_page_content_solid_bg_color', array(
	'label'        => __( 'Content Solid Background Color', 'independence-day' ),
	'section'    => 'front_page_body_section',
	'settings'   => 'front_page_content_solid_bg_color',
    'priority' => 30,) ) );

    $wp_customize->add_setting('front_page_content_first_gradient_bg_color', array('default' => '#ffffff'));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_page_content_first_gradient_bg_color', array(
	'label'        => __( 'Content First Gradient Background Color', 'independence-day' ),
	'section'    => 'front_page_body_section',
	'settings'   => 'front_page_content_first_gradient_bg_color',
    'priority' => 35,) ) );

    $wp_customize->add_setting('front_page_content_second_gradient_bg_color', array('default' => '#ffffff'));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'front_page_content_second_gradient_bg_color', array(
	'label'        => __( 'Content Second Gradient Background Color', 'independence-day' ),
	'section'    => 'front_page_body_section',
	'settings'   => 'front_page_content_second_gradient_bg_color',
    'priority' => 40,) ) );

	
	
}

add_action( 'customize_register', 'front_page_body_brand_customizer' );