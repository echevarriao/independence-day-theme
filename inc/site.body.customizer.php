<?php

function body_brand_customizer($wp_customize){

    $configs = array();
   
    $configs['title'] = "Body Section";
    $configs['priority'] = 40;
    
    $wp_customize->add_section('body_section', $configs);

    $wp_customize->add_setting('body_bg_type', array('default' => 'solid'));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'body_bg_type',
        array(
            'label'          => __( 'Use Gradient | Solid Background Color', 'independence-day' ),
            'section'        => 'body_section',
            'settings'       => 'body_bg_type',
            'type'           => 'radio',
            'choices'        => array(
                'gradient'   => __( 'Use gradient' ),
                'solid'  => __( 'Use solid' )
            ),
            'priority' => 5,
        )));
    $wp_customize->add_setting('body_solid_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_solid_bg_color', array(
	'label'        => __( 'Solid Bar Color', 'independence-day' ),
	'section'    => 'body_section',
	'settings'   => 'body_solid_bg_color',
    'priority' => 10,) ) );


    $wp_customize->add_setting('body_first_gradient_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_first_gradient_bg_color', array(
	'label'        => __( 'First Gradient Background Color', 'independence-day' ),
	'section'    => 'body_section',
	'settings'   => 'body_first_gradient_bg_color',
    'priority' => 15,) ) );

        
    $wp_customize->add_setting('body_second_gradient_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_second_gradient_bg_color', array(
	'label'        => __( 'Second Gradient Background Color', 'independence-day' ),
	'section'    => 'body_section',
	'settings'   => 'body_second_gradient_bg_color',
    'priority' => 20,) ) );

}

add_action( 'customize_register', 'body_brand_customizer' );




