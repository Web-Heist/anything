<?php
$wp_customize->add_setting(
    'newswave_options[enable_header_bg_overlay]',
    array(
        'default'           => $default_options['enable_header_bg_overlay'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_header_bg_overlay]',
    array(
        'label'    => __( 'Enable Image Overlay', 'newswave' ),
        'section'  => 'header_image',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newswave_options[header_image_size]',
    array(
        'default'           => $default_options['header_image_size'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[header_image_size]',
    array(
        'label'       => __( 'Select Header Size', 'newswave' ),
        'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'newswave' ),

        'section'     => 'header_image',
        'type'        => 'select',
        'choices'     => array(
            'none' => __( 'Default', 'newswave' ),
            'small' => __( 'Small', 'newswave' ),
            'medium' => __( 'Medium', 'newswave' ),
            'large' => __( 'Large', 'newswave' ),
        ),
    )
);
/*Header Options*/
$wp_customize->add_section(
    'header_options' ,
    array(
        'title' => __( 'Header Options', 'newswave' ),
        'panel' => 'newswave_option_panel',
    )
);

/* Header Style */
$wp_customize->add_setting(
    'newswave_options[header_style]',
    array(
        'default'           => $default_options['header_style'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[header_style]',
    array(
        'label'       => __( 'Header Style', 'newswave' ),
        'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'newswave' ),

        'section'     => 'header_options',
        'type'        => 'select',
        'choices'     => array(
            'header_style_1' => __( 'Header Style 1', 'newswave' ),
            'header_style_2' => __( 'Header Style 2', 'newswave' ),
            'header_style_3' => __( 'Header Style 3', 'newswave' ),
        ),
    )
);

$wp_customize->add_setting(
    'newswave_section_seperator_header_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newswave_Seperator_Control(
        $wp_customize,
        'newswave_section_seperator_header_1',
        array(
            'settings' => 'newswave_section_seperator_header_1',
            'section' => 'header_options',
        )
    )
);

$wp_customize->add_setting(
    'newswave_options[upload_header_add_image]',
    array(
        'default'           => '',
        'sanitize_callback' => 'newswave_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'newswave_options[upload_header_add_image]',
        array(
            'label'           => __( 'Upload Header Advertisement Image', 'newswave' ),
            'section'         => 'header_options',
            'active_callback' => 'newswave_is_header_style',
        )
    )
);

$wp_customize->add_setting(
    'newswave_options[ad_header_banner_link]',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'newswave_options[ad_header_banner_link]',
    array(
        'label'           => __( 'Advertisement Link', 'newswave' ),
        'section'         => 'header_options',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the image to have a link', 'newswave' ),
        'active_callback' => 'newswave_is_header_style',
    )
);

$wp_customize->add_setting(
    'newswave_section_seperator_header_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newswave_Seperator_Control(
        $wp_customize,
        'newswave_section_seperator_header_2',
        array(
            'settings' => 'newswave_section_seperator_header_2',
            'section' => 'header_options',
        )
    )
);

/*Enable Sticky Menu*/
$wp_customize->add_setting(
    'newswave_options[enable_sticky_menu]',
    array(
        'default'           => $default_options['enable_sticky_menu'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_sticky_menu]',
    array(
        'label'    => __( 'Enable Sticky Menu', 'newswave' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newswave_section_seperator_header_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newswave_Seperator_Control(
        $wp_customize,
        'newswave_section_seperator_header_4',
        array(
            'settings' => 'newswave_section_seperator_header_4',
            'section' => 'header_options',
        )
    )
);



/*Enable Today's Date*/
$wp_customize->add_setting(
    'newswave_options[enable_header_time]',
    array(
        'default'           => $default_options['enable_header_time'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_header_time]',
    array(
        'label'    => __( 'Enable Current Time', 'newswave' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'newswave_is_top_bar_enabled'
    )
);

/*Enable Today's Date*/
$wp_customize->add_setting(
    'newswave_options[enable_header_date]',
    array(
        'default'           => $default_options['enable_header_date'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_header_date]',
    array(
        'label'    => __( 'Enable Today\'s Date', 'newswave' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'newswave_is_top_bar_enabled'
    )
);

/*Todays Date Format*/
$wp_customize->add_setting(
    'newswave_options[todays_date_format]',
    array(
        'default'           => $default_options['todays_date_format'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newswave_options[todays_date_format]',
    array(
        'label'    => __( 'Today\'s Date Format', 'newswave' ),
        'description' => sprintf( wp_kses( __( '<a href="%s" target="_blank">Date and Time Formatting Documentation</a>.', 'newswave' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://wordpress.org/support/article/formatting-date-and-time' ) ),
        'section'  => 'header_options',
        'type'     => 'text',
        'active_callback'  =>  function( $control ) {
            return (
                newswave_is_top_bar_enabled( $control )
                &&
                newswave_is_todays_date_enabled( $control )
            );
        }
    )
);

$wp_customize->add_setting(
    'newswave_section_seperator_header_5',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newswave_Seperator_Control(
        $wp_customize,
        'newswave_section_seperator_header_5',
        array(
            'settings' => 'newswave_section_seperator_header_5',
            'section' => 'header_options',
        )
    )
);
/*Enable Search*/
$wp_customize->add_setting(
    'newswave_options[enable_search_on_header]',
    array(
        'default'           => $default_options['enable_search_on_header'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_search_on_header]',
    array(
        'label'    => __( 'Enable Search Icon', 'newswave' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newswave_section_seperator_header_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newswave_Seperator_Control(
        $wp_customize,
        'newswave_section_seperator_header_3',
        array(
            'settings' => 'newswave_section_seperator_header_3',
            'section' => 'header_options',
        )
    )
);

$wp_customize->add_setting(
    'newswave_options[enable_random_post]',
    array(
        'default' => $default_options['enable_random_post'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_random_post]',
    array(
        'label' => esc_html__('Enable Random Post', 'newswave'),
        'section' => 'header_options',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newswave_options[random_post_category]',
    array(
        'default'           => $default_options['random_post_category'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(new Newswave_Dropdown_Taxonomies_Control(
    $wp_customize, 
    'newswave_options[random_post_category]',
        array(
            'label'           => esc_html__('Random Post Category', 'newswave'),
            'section'         => 'header_options',
        )
    )
);


if(class_exists( 'WooCommerce' )){
    
    /*Enable Mini Cart Icon on header*/
    $wp_customize->add_setting(
        'newswave_options[enable_mini_cart_header]',   
        array(
            'default'           => $default_options['enable_mini_cart_header'],
            'sanitize_callback' => 'newswave_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'newswave_options[enable_mini_cart_header]',
        array(
            'label'    => __( 'Enable Mini Cart Icon', 'newswave' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );

    /*Enable Myaccount Link*/
    $wp_customize->add_setting(
        'newswave_options[enable_woo_my_account]',   
        array(
            'default'           => $default_options['enable_woo_my_account'],
            'sanitize_callback' => 'newswave_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'newswave_options[enable_woo_my_account]',
        array(
            'label'    => __( 'Enable My Account Icon', 'newswave' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );
}