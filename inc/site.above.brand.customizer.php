<?php

function above_brand_customizer($wp_customize){
    
    $configs = array();
   
    $configs['title'] = "Above Branding Section";
    $configs['priority'] = 20;
	$configs['description'] = "<b>Add at your own risk!</b><br /><br />This section allows you to add content above of the branding. Please obtain permission from <a href = 'http://communications.uconn.edu/'>University Communication</a> before proceeding. Changing the branding color schema conflicts with the university branding standard. For more, please visit <a href = 'http://brand.uconn.edu/'>brand.uconn.edu</a>";
    
    $wp_customize->add_section('above_brand_section', $configs);

    $wp_customize->add_setting('above_brand_height', array('default' => '60px'));
	
	$wp_customize->add_control('above_brand_height', array(
	'label'        => __( 'Above Brand Bar Height', 'independence-day' ),
	'section'	=> 'above_brand_section',
	'type'	 => 'text', // text (default), checkbox, radio, select, dropdown-pages
	'priority' => 3,
	) );

	
    $wp_customize->add_setting('above_brand_show', array('default' => 'hide'));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'above_brand_show',
        array(
            'label'          => __( 'Display Above Branding Section', 'independence-day' ),
            'section'        => 'above_brand_section',
            'settings'       => 'above_brand_show',
            'type'           => 'radio',
            'choices'        => array(
                'show'   => __( 'Show' ),
                'hide'   => __( 'Hide' ),
            ),
            'priority' => 4,
        )));

    $wp_customize->add_setting('above_brand_align', array('default' => 'left'));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'above_brand_align',
        array(
            'label'          => __( 'Align Above Branding Section', 'independence-day' ),
            'section'        => 'above_brand_section',
            'settings'       => 'above_brand_align',
            'type'           => 'radio',
            'choices'        => array(
                'left'   => __( 'Left' ),
                'center'   => __( 'Center' ),
                'right'   => __( 'Right' ),
            ),
            'priority' => 4,
        )));

    $wp_customize->add_setting('above_brand_bg_type', array('default' => 'solid'));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'above_brand_bg_type',
        array(
            'label'          => __( 'Background Color Type', 'independence-day' ),
            'section'        => 'above_brand_section',
            'settings'       => 'above_brand_bg_type',
            'type'           => 'radio',
            'choices'        => array(
                'gradient'   => __( 'Gradient' ),
                'solid'  => __( 'Solid' ),
            ),
            'priority' => 5,
        )));

    $wp_customize->add_setting('above_brand_solid_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'above_brand_solid_bg_color', array(
	'label'        => __( 'Solid Backrgound Color', 'independence-day' ),
	'section'    => 'above_brand_section',
	'settings'   => 'above_brand_solid_bg_color',
    'priority' => 10,) ) );

    $wp_customize->add_setting('above_brand_first_gradient_bg_color', array('default' => '#000E2F'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'above_brand_first_gradient_bg_color', array(
	'label'        => __( 'First Gradient Background Color', 'independence-day' ),
	'section'    => 'above_brand_section',
	'settings'   => 'above_brand_first_gradient_bg_color',
    'priority' => 15,) ) );
        
    $wp_customize->add_setting('above_brand_second_gradient_bg_color', array('default' => '#000E2F'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'above_brand_second_gradient_bg_color', array(
	'label'        => __( 'Second Gradient Background Color', 'independence-day' ),
	'section'    => 'above_brand_section',
	'settings'   => 'above_brand_second_gradient_bg_color',
    'priority' => 20,) ) );

    $wp_customize->add_setting('above_brand_txt_color', array('default' => '#000000'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'above_brand_txt_color', array(
	'label'        => __( 'Text Color', 'independence-day' ),
	'section'    => 'above_brand_section',
	'settings'   => 'above_brand_txt_color',
    'priority' => 25,) ) );

    $wp_customize->add_setting('above_brand_link_color', array('default' => '#a1a1a1'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'above_brand_link_color', array(
	'label'        => __( 'Link Text Color', 'independence-day' ),
	'section'    => 'above_brand_section',
	'settings'   => 'above_brand_link_color',
    'priority' => 30,) ) );

    $wp_customize->add_setting('above_brand_hover_link_color', array('default' => '#9faab2'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'above_brand_hover_link_color', array(
	'label'        => __( 'Hover Link Color', 'independence-day' ),
	'section'    => 'above_brand_section',
	'settings'   => 'above_brand_hover_link_color',
    'priority' => 35,) ) );

}

add_action( 'customize_register', 'above_brand_customizer' );