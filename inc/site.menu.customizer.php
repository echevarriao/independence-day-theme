<?php

function menu_brand_customizer($wp_customize){

    $configs = array();
   
    $configs['title'] = "Main Menu Section";
    $configs['priority'] = 40;
    
    $wp_customize->add_section('main_menu_branding_section', $configs);

    $wp_customize->add_setting('main_menu_branding_bg_type', array('default' => 'solid'));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'main_menu_branding_bg_type',
        array(
            'label'          => __( 'Use Gradient | Solid Background Color', 'independence-day' ),
            'section'        => 'main_menu_branding_section',
            'settings'       => 'main_menu_branding_bg_type',
            'type'           => 'radio',
            'choices'        => array(
                'gradient'   => __( 'Use gradient' ),
                'solid'  => __( 'Use solid' )
            ),
            'priority' => 5,
        )));
    $wp_customize->add_setting('main_menu_solid_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_menu_solid_bg_color', array(
	'label'        => __( 'Solid Bar Color', 'independence-day' ),
	'section'    => 'main_menu_branding_section',
	'settings'   => 'main_menu_solid_bg_color',
    'priority' => 10,) ) );


    $wp_customize->add_setting('main_menu_first_gradient_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_menu_first_gradient_bg_color', array(
	'label'        => __( 'First Gradient Background Color', 'independence-day' ),
	'section'    => 'main_menu_branding_section',
	'settings'   => 'main_menu_first_gradient_bg_color',
    'priority' => 15,) ) );

        
    $wp_customize->add_setting('main_menu_second_gradient_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_menu_second_gradient_bg_color', array(
	'label'        => __( 'Second Gradient Background Color', 'independence-day' ),
	'section'    => 'main_menu_branding_section',
	'settings'   => 'main_menu_second_gradient_bg_color',
    'priority' => 20,) ) );

}

add_action( 'customize_register', 'menu_brand_customizer' );