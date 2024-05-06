<?php

function signature_brand_customizer($wp_customize){
    
    $configs = array();
   
    $configs['title'] = "Site Branding Section";
    $configs['priority'] = 25;
	$configs['description'] = "<b>Change at your own risk!</b><br /><br />This section allows you to change the university mandated color schema of the branding. Please obtain permission from <a href = 'http://communications.uconn.edu/'>University Communication</a> before proceeding. Changing the branding color schema conflicts with the university branding standard. For more, please visit <a href = 'http://brand.uconn.edu/'>brand.uconn.edu</a>";
    
    $wp_customize->add_section('site_branding_section', $configs);

    $wp_customize->add_setting('the_brand_bg_type', array('default' => 'solid'));
    
    $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'the_brand_bg_type',
        array(
            'label'          => __( 'Background Color Type', 'independence-day' ),
            'section'        => 'site_branding_section',
            'settings'       => 'the_brand_bg_type',
            'type'           => 'radio',
            'choices'        => array(
                'gradient'   => __( 'Gradient' ),
                'solid'  => __( 'Solid' ),
            ),
            'priority' => 5,
        )));

    $wp_customize->add_setting('brand_solid_bg_color', array('default' => '#000E2F'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_solid_bg_color', array(
	'label'        => __( 'Solid Backrgound Color', 'independence-day' ),
	'section'    => 'site_branding_section',
	'settings'   => 'brand_solid_bg_color',
    'priority' => 10,) ) );

    $wp_customize->add_setting('brand_first_gradient_bg_color', array('default' => '#000E2F'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_first_gradient_bg_color', array(
	'label'        => __( 'First Gradient Background Color', 'independence-day' ),
	'section'    => 'site_branding_section',
	'settings'   => 'brand_first_gradient_bg_color',
    'priority' => 15,) ) );
        
    $wp_customize->add_setting('brand_second_gradient_bg_color', array('default' => '#000E2F'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_second_gradient_bg_color', array(
	'label'        => __( 'Second Gradient Background Color', 'independence-day' ),
	'section'    => 'site_branding_section',
	'settings'   => 'brand_second_gradient_bg_color',
    'priority' => 20,) ) );

    $wp_customize->add_setting('brand_uconn_txt_color', array('default' => '#ffffff'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_uconn_txt_color', array(
	'label'        => __( '"UCONN" Text Color', 'independence-day' ),
	'section'    => 'site_branding_section',
	'settings'   => 'brand_uconn_txt_color',
    'priority' => 25,) ) );

    $wp_customize->add_setting('brand_separator_txt_color', array('default' => '#a1a1a1'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_separator_txt_color', array(
	'label'        => __( 'Separator "|" Text Color', 'independence-day' ),
	'section'    => 'site_branding_section',
	'settings'   => 'brand_separator_txt_color',
    'priority' => 30,) ) );

    $wp_customize->add_setting('brand_univct_txt_color', array('default' => '#9faab2'));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_univct_txt_color', array(
	'label'        => __( '"University of Connecticut" Text Color', 'independence-day' ),
	'section'    => 'site_branding_section',
	'settings'   => 'brand_univct_txt_color',
    'priority' => 35,) ) );

}

add_action( 'customize_register', 'signature_brand_customizer' );