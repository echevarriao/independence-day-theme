<?php

function content_brand_customizer($wp_customize){

    $configs = array();
   
    $configs['title'] = "Content Section";
    $configs['priority'] = 45;
    
    $wp_customize->add_section('content_section', $configs);

    $wp_customize->add_setting('content_bg_type', array('default' => 'solid'));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'content_bg_type',
        array(
            'label'          => __( 'Use Gradient | Solid Background Color', 'independence-day' ),
            'section'        => 'content_section',
            'settings'       => 'content_bg_type',
            'type'           => 'radio',
            'choices'        => array(
                'gradient'   => __( 'Use gradient' ),
                'solid'  => __( 'Use solid' )
            ),
            'priority' => 5,
        )));
    $wp_customize->add_setting('content_solid_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_solid_bg_color', array(
	'label'        => __( 'Solid Bar Color', 'independence-day' ),
	'section'    => 'content_section',
	'settings'   => 'content_solid_bg_color',
    'priority' => 10,) ) );


    $wp_customize->add_setting('content_first_gradient_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_first_gradient_bg_color', array(
	'label'        => __( 'First Gradient Background Color', 'independence-day' ),
	'section'    => 'content_section',
	'settings'   => 'content_first_gradient_bg_color',
    'priority' => 15,) ) );

        
    $wp_customize->add_setting('content_second_gradient_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_second_gradient_bg_color', array(
	'label'        => __( 'Second Gradient Background Color', 'independence-day' ),
	'section'    => 'content_section',
	'settings'   => 'content_second_gradient_bg_color',
    'priority' => 20,) ) );

}

add_action( 'customize_register', 'content_brand_customizer' );