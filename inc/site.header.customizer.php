<?php

function header_brand_customizer($wp_customize){
    
    $configs = array();
   
    $configs['title'] = "Header Branding Section";
    $configs['priority'] = 30;
    
    $wp_customize->add_section('header_branding_section', $configs);

    $wp_customize->add_setting('header_display', array('default' => 'display'));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'header_display',
        array(
            'label'          => __( 'Display Site Title Bar', 'independence-day' ),
            'section'        => 'header_branding_section',
            'settings'       => 'header_display',
            'type'           => 'radio',
            'choices'        => array(
                'display'   => __( 'Display' ),
                'hide'  => __( 'Hide' )
            ),
            'priority' => 5,
        )));
	
    $wp_customize->add_setting('header_bg_type', array('default' => 'solid'));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'header_bg_type',
        array(
            'label'          => __( 'Background Color', 'independence-day' ),
            'section'        => 'header_branding_section',
            'settings'       => 'header_bg_type',
            'type'           => 'radio',
            'choices'        => array(
                'gradient'   => __( 'Gradient' ),
                'solid'  => __( 'Solid' )
            ),
            'priority' => 5,
        )));

    $wp_customize->add_setting('header_solid_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_solid_bg_color', array(
	'label'        => __( 'Solid Background Color', 'independence-day' ),
	'section'    => 'header_branding_section',
	'settings'   => 'header_solid_bg_color',
    'priority' => 10,) ) );

    $wp_customize->add_setting('header_first_gradient_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_first_gradient_bg_color', array(
	'label'        => __( 'First Gradient Background Color', 'independence-day' ),
	'section'    => 'header_branding_section',
	'settings'   => 'header_first_gradient_bg_color',
    'priority' => 15,) ) );
        
    $wp_customize->add_setting('header_second_gradient_bg_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_second_gradient_bg_color', array(
	'label'        => __( 'Second Gradient Background Color', 'independence-day' ),
	'section'    => 'header_branding_section',
	'settings'   => 'header_second_gradient_bg_color',
    'priority' => 20,) ) );

	
    $wp_customize->add_setting('primary_org_name', array('default' => ''));
	
	$wp_customize->add_control('primary_org_name', array(
	'label'        => __( 'Primary Organization Name', 'independence-day' ),
	'section'	=> 'header_branding_section',
	'type'	 => 'text', // text (default), checkbox, radio, select, dropdown-pages
	'priority' => 25,
	) );

    $wp_customize->add_setting('primary_org_url', array('default' => ''));
	
	$wp_customize->add_control('primary_org_url', array(
	'label'        => __( 'Primary Organization URL', 'independence-day' ),
	'section'	=> 'header_branding_section',
	'type'	 => 'text', // text (default), checkbox, radio, select, dropdown-pages
	'priority' => 30,
	) );

    $wp_customize->add_setting('primary_org_name_link_color', array('default' => '#0B1860'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_org_name_link_color', array(
	'label'        => __( 'Primary Organization Text Link Color', 'independence-day' ),
	'section'    => 'header_branding_section',
	'settings'   => 'primary_org_name_link_color',
    'priority' => 35,) ) );

    $wp_customize->add_setting('primary_org_name_hover_color', array('default' => '#0B1860'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_org_name_hover_color', array(
	'label'        => __( 'Primary Organization Text Hover Color', 'independence-day' ),
	'section'    => 'header_branding_section',
	'settings'   => 'primary_org_name_hover_color',
    'priority' => 40,) ) );
	

    $wp_customize->add_setting('secondary_org_name', array('default' => ''));
	
	$wp_customize->add_control('secondary_org_name', array(
	'label'        => __( 'Secondary Organization Name', 'independence-day' ),
	'section'	=> 'header_branding_section',
	'type'	 => 'text', // text (default), checkbox, radio, select, dropdown-pages
	'priority' => 45,
	) );

    $wp_customize->add_setting('secondary_org_url', array('default' => ''));
	
	$wp_customize->add_control('secondary_org_url', array(
	'label'        => __( 'Secondary Organization URL', 'independence-day' ),
	'section'	=> 'header_branding_section',
	'type'	 => 'text', // text (default), checkbox, radio, select, dropdown-pages
	'priority' => 50,
	) );
	
    $wp_customize->add_setting('secondary_org_name_link_color', array('default' => '#0B1860'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_org_name_link_color', array(
	'label'        => __( 'Secondary Organization Text Link Color', 'independence-day' ),
	'section'    => 'header_branding_section',
	'settings'   => 'secondary_org_name_link_color',
    'priority' => 55,) ) );

    $wp_customize->add_setting('secondary_org_name_hover_color', array('default' => '#0B1860'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_org_name_hover_color', array(
	'label'        => __( 'Secondary Organization Text Hover Color', 'independence-day' ),
	'section'    => 'header_branding_section',
	'settings'   => 'secondary_org_name_hover_color',
    'priority' => 60,) ) );

    $wp_customize->add_setting('org_separator_color', array('default' => '#0B1860'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'org_separator_color', array(
	'label'        => __( 'Parent and Secondary Organization separator color', 'independence-day' ),
	'section'    => 'header_branding_section',
	'settings'   => 'org_separator_color',
    'priority' => 65,) ) );
	
    $wp_customize->add_setting('header_primary_title_txt_color', array('default' => '#0B1860'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_primary_title_txt_color', array(
	'label'        => __( 'Site Title Link Color', 'independence-day' ),
	'section'    => 'header_branding_section',
	'settings'   => 'header_primary_title_txt_color',
    'priority' => 70,) ) );

    $wp_customize->add_setting('header_primary_title_hover_color', array('default' => '#0B1860'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_primary_title_hover_color', array(
	'label'        => __( 'Site Title Link Hover Color', 'independence-day' ),
	'section'    => 'header_branding_section',
	'settings'   => 'header_primary_title_hover_color',
    'priority' => 75,) ) );

}

add_action( 'customize_register', 'header_brand_customizer' );