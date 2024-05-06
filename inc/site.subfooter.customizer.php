<?php

function subfooter_brand_customizer($wp_customize){

    $configs = array();
   
    $configs['title'] = "Subfooter Section";
    $configs['priority'] = 50;
    
    $wp_customize->add_section('subfooter_branding_section', $configs);

    $wp_customize->add_setting('subfooter_branding_display_type', array('default' => 'hide'));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'subfooter_branding_display_type',
        array(
            'label'          => __( 'Display Subfooter Toggle', 'independence-day' ),
            'section'        => 'subfooter_branding_section',
            'settings'       => 'subfooter_branding_display_type',
            'type'           => 'radio',
            'choices'        => array(
                'show'   => __( 'Display' ),
                'hide'  => __( 'Hide' )
            ),
            'priority' => 4,
        )));
    $wp_customize->add_setting('subfooter_branding_bg_type', array('default' => 'solid'));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'subfooter_branding_bg_type',
        array(
            'label'          => __( 'Use Gradient | Solid Background Color', 'independence-day' ),
            'section'        => 'subfooter_branding_section',
            'settings'       => 'subfooter_branding_bg_type',
            'type'           => 'radio',
            'choices'        => array(
                'gradient'   => __( 'Use gradient' ),
                'solid'  => __( 'Use solid' )
            ),
            'priority' => 5,
        )));
    $wp_customize->add_setting('subfooter_solid_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'subfooter_solid_bg_color', array(
	'label'        => __( 'Solid Bar Color', 'independence-day' ),
	'section'    => 'subfooter_branding_section',
	'settings'   => 'subfooter_solid_bg_color',
    'priority' => 10,) ) );


    $wp_customize->add_setting('subfooter_first_gradient_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'subfooter_first_gradient_bg_color', array(
	'label'        => __( 'First Gradient Background Color', 'independence-day' ),
	'section'    => 'subfooter_branding_section',
	'settings'   => 'subfooter_first_gradient_bg_color',
    'priority' => 15,) ) );

        
    $wp_customize->add_setting('subfooter_second_gradient_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'subfooter_second_gradient_bg_color', array(
	'label'        => __( 'Second Gradient Background Color', 'independence-day' ),
	'section'    => 'subfooter_branding_section',
	'settings'   => 'subfooter_second_gradient_bg_color',
    'priority' => 20,) ) );

}

add_action( 'customize_register', 'subfooter_brand_customizer' );