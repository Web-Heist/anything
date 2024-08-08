<?php
/**/
$wp_customize->add_section(
    'home_page_banner_option',
    array(
        'title'      => __( 'Banner Section Options', 'newswave' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'newswave_options[enable_banner_section]',
    array(
        'default'           => $default_options['enable_banner_section'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_banner_section]',
    array(
        'label'   => __( 'Enable Banner Section', 'newswave' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newswave_options[banner_section_style]',
    array(
        'default'           => $default_options['banner_section_style'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[banner_section_style]',
    array(
        'label'       => __( 'Banner Section Style', 'newswave' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            'style-1' => __( 'Style 1', 'newswave' ),
            'style-2' => __( 'Style 2', 'newswave' ),
            'style-3' => __( 'Style 3', 'newswave' ),
        ),
    )
);


$wp_customize->add_setting(
    'newswave_options[banner_section_cat_style_1]',
    array(
        'default'           => $default_options['banner_section_cat_style_1'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[banner_section_cat_style_1]',
    array(
        'label'   => __( 'Select Category for Banner', 'newswave' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => newswave_post_category_list(),
        'active_callback' => 'newswave_is_banner_style',

    )
);


$wp_customize->add_setting(
    'newswave_options[banner_section_cat_style_3]',
    array(
        'default'           => $default_options['banner_section_cat_style_3'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[banner_section_cat_style_3]',
    array(
        'label'   => __( 'Select Category for Banner', 'newswave' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => newswave_post_category_list(),
        'active_callback' => 'newswave_is_banner_style_3',

    )
);


$wp_customize->add_setting(
    'newswave_options[banner_section_title_1]',
    array(
        'default'           => $default_options['banner_section_title_1'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newswave_options[banner_section_title_1]',
    array(
        'label'    => __( 'Grid Column Title ', 'newswave' ),
        'section'  => 'home_page_banner_option',
        'type'     => 'text',
        'active_callback' => 'newswave_is_banner_style_1',
    )
);


$wp_customize->add_setting(
    'newswave_options[banner_section_cat_1]',
    array(
        'default'           => $default_options['banner_section_cat_1'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[banner_section_cat_1]',
    array(
        'label'   => __( 'Grid Column Category', 'newswave' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => newswave_post_category_list(),
        'active_callback' => 'newswave_is_banner_style_1',

    )
);

$wp_customize->add_setting(
    'newswave_section_seperator_banner_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newswave_Seperator_Control(
        $wp_customize,
        'newswave_section_seperator_banner_1',
        array(
            'settings' => 'newswave_section_seperator_banner_1',
            'section' => 'home_page_banner_option',
            'active_callback' => 'newswave_is_banner_style_1',

        )
    )
);


$wp_customize->add_setting(
    'newswave_options[banner_section_title_2]',
    array(
        'default'           => $default_options['banner_section_title_2'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newswave_options[banner_section_title_2]',
    array(
        'label'    => __( 'Slider Column Title', 'newswave' ),
        'section'  => 'home_page_banner_option',
        'type'     => 'text',
        'active_callback' => 'newswave_is_banner_style_1',
    )
);


$wp_customize->add_setting(
    'newswave_options[banner_section_cat_2]',
    array(
        'default'           => $default_options['banner_section_cat_2'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[banner_section_cat_2]',
    array(
        'label'   => __( 'Slider Column Category', 'newswave' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => newswave_post_category_list(),
        'active_callback' => 'newswave_is_banner_style_1',
    )
);

$wp_customize->add_setting(
    'newswave_section_seperator_banner_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newswave_Seperator_Control(
        $wp_customize,
        'newswave_section_seperator_banner_2',
        array(
            'settings' => 'newswave_section_seperator_banner_2',
            'section' => 'home_page_banner_option',
            'active_callback' => 'newswave_is_banner_style_1',
        )
    )
);

$wp_customize->add_setting(
    'newswave_options[banner_section_title_3]',
    array(
        'default'           => $default_options['banner_section_title_3'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newswave_options[banner_section_title_3]',
    array(
        'label'    => __( 'List column Title', 'newswave' ),
        'section'  => 'home_page_banner_option',
        'type'     => 'text',
        'active_callback' => 'newswave_is_banner_style_1',
    )
);


$wp_customize->add_setting(
    'newswave_options[banner_section_cat_3]',
    array(
        'default'           => $default_options['banner_section_cat_3'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[banner_section_cat_3]',
    array(
        'label'   => __( 'List column Category', 'newswave' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => newswave_post_category_list(),
        'active_callback' => 'newswave_is_banner_style_1',
    )
);



$wp_customize->add_setting(
    'newswave_section_seperator_banner_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newswave_Seperator_Control(
        $wp_customize,
        'newswave_section_seperator_banner_3',
        array(
            'settings' => 'newswave_section_seperator_banner_3',
            'section' => 'home_page_banner_option',
        )
    )
);


$wp_customize->add_setting(
    'newswave_options[enable_banner_cat_meta]',
    array(
        'default'           => $default_options['enable_banner_cat_meta'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_banner_cat_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'newswave' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newswave_options[enable_banner_author_meta]',
    array(
        'default'           => $default_options['enable_banner_author_meta'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_banner_author_meta]',
    array(
        'label'   => __( 'Enable Author Meta', 'newswave' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newswave_options[enable_banner_date_meta]',
    array(
        'default'           => $default_options['enable_banner_date_meta'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_banner_date_meta]',
    array(
        'label'   => __( 'Enable Date Meta', 'newswave' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);



$wp_customize->add_setting(
    'newswave_section_seperator_banner_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newswave_Seperator_Control(
        $wp_customize,
        'newswave_section_seperator_banner_4',
        array(
            'settings' => 'newswave_section_seperator_banner_4',
            'section' => 'home_page_banner_option',
        )
    )
);


$wp_customize->add_setting(
    'newswave_options[upload_banner_bg_image]',
    array(
        'default'           => '',
        'sanitize_callback' => 'newswave_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'newswave_options[upload_banner_bg_image]',
        array(
            'label'           => __( 'Background Image', 'newswave' ),
            'section'         => 'home_page_banner_option',
        )
    )
);

$wp_customize->add_setting(
    'newswave_options[enable_background_fix]',
    array(
        'default'           => $default_options['enable_background_fix'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_background_fix]',
    array(
        'label'   => __( 'Enable Background Position Fixed', 'newswave' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newswave_options[banner_bg_color]',
    array(
        'default' => $default_options['banner_bg_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'newswave_options[banner_bg_color]',
        array(
            'label' => __('Banner Background Color', 'newswave'),
            'section' => 'home_page_banner_option',
            'type' => 'color',
        )
    )
);

$wp_customize->add_setting(
    'newswave_options[banner_text_color]',
    array(
        'default' => $default_options['banner_text_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'newswave_options[banner_text_color]',
        array(
            'label' => __('Banner Text Color', 'newswave'),
            'section' => 'home_page_banner_option',
            'type' => 'color',
        )
    )
);