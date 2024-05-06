<?php

function after_footer_customizer($wp_customize){
    
    $configs = array();
   
    $configs['title'] = "After Footer Section";
    $configs['priority'] = 60;
	$configs['description'] = "Section that allows you to customize the section after the footer";
    
    $wp_customize->add_section('after_footer_section', $configs);

    $wp_customize->add_setting('after_footer_bg_type', array('default' => 'solid'));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'brand_bg_type',
        array(
            'label'          => __( 'Use Gradient | Solid Background Color', 'independence-day' ),
            'section'        => 'after_footer_section',
            'settings'       => 'after_footer_bg_type',
            'type'           => 'radio',
            'choices'        => array(
                'gradient'   => __( 'Gradient' ),
                'solid'  => __( 'Solid' )
            ),
            'priority' => 5,
        )));

    $wp_customize->add_setting('after_footer_solid_bg_color', array('default' => '#000E2F'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'after_footer_solid_bg_color', array(
	'label'        => __( 'Solid Backrgound Color', 'independence-day' ),
	'section'    => 'after_footer_section',
	'settings'   => 'after_footer_solid_bg_color',
    'priority' => 10,) ) );

    $wp_customize->add_setting('after_footer_first_gradient_bg_color', array('default' => '#000E2F'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'after_footer_first_gradient_bg_color', array(
	'label'        => __( 'First Gradient Background Color', 'independence-day' ),
	'section'    => 'after_footer_section',
	'settings'   => 'after_footer_first_gradient_bg_color',
    'priority' => 15,) ) );
        
    $wp_customize->add_setting('after_footer_second_gradient_bg_color', array('default' => '#000E2F'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'after_footer_second_gradient_bg_color', array(
	'label'        => __( 'Second Gradient Background Color', 'independence-day' ),
	'section'    => 'after_footer_section',
	'settings'   => 'after_footer_second_gradient_bg_color',
    'priority' => 20,) ) );

    $wp_customize->add_setting('after_footer_txt_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'after_footer_txt_color', array(
	'label'        => __( 'After Footer Text Color', 'independence-day' ),
	'section'    => 'after_footer_section',
	'settings'   => 'after_footer_txt_color',
    'priority' => 25,) ) );


}

add_action( 'customize_register', 'after_footer_customizer' );