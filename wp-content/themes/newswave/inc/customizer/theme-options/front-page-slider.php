<?php
/*Add Home Page Options Panel.*/
$wp_customize->add_panel(
    'theme_home_option_panel',
    array(
        'title' => __( 'Front Page Options', 'newswave' ),
        'description' => __( 'Contains all front page settings', 'newswave'),
        'priority' => 50
    )
);
/**/
$wp_customize->add_section(
    'home_page_slider_option',
    array(
        'title'      => __( 'Slider Section Options', 'newswave' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'newswave_options[enable_slider_section]',
    array(
        'default'           => $default_options['enable_slider_section'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_slider_section]',
    array(
        'label'   => __( 'Enable Slider Section', 'newswave' ),
        'section' => 'home_page_slider_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newswave_options[slider_section_presentation_layout]',
    array(
        'default'           => $default_options['slider_section_presentation_layout'],
        'sanitize_callback' => 'newswave_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Newswave_Radio_Image_Control(
        $wp_customize,
        'newswave_options[slider_section_presentation_layout]',
        array(
            'label' => __( 'Slider Slider Layout', 'newswave' ),
            'section' => 'home_page_slider_option',
            'choices' => newswave_get_slider_layouts()
        )
    )
);


$wp_customize->add_setting(
    'newswave_options[number_of_slider_post]',
    array(
        'default'           => $default_options['number_of_slider_post'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[number_of_slider_post]',
    array(
        'label'       => __( 'Post In Slider', 'newswave' ),
        'section'     => 'home_page_slider_option',
        'type'        => 'select',
        'choices'     => array(
            '3' => __( '3', 'newswave' ),
            '4' => __( '4', 'newswave' ),
            '5' => __( '5', 'newswave' ),
            '6' => __( '6', 'newswave' ),
        ),
    )
);


$wp_customize->add_setting(
    'newswave_options[slider_post_content_alignment]',
    array(
        'default'           => $default_options['slider_post_content_alignment'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[slider_post_content_alignment]',
    array(
        'label'       => __( 'Slider Content Alignment', 'newswave' ),
        'section'     => 'home_page_slider_option',
        'type'        => 'select',
        'choices'     => array(
            'text-right' => __( 'Align Right', 'newswave' ),
            'text-center' => __( 'Align Center', 'newswave' ),
            'text-left' => __( 'Align Left', 'newswave' ),
        ),
    )
);

$wp_customize->add_setting(
    'newswave_options[slider_section_cat]',
    array(
        'default'           => $default_options['slider_section_cat'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[slider_section_cat]',
    array(
        'label'   => __( 'Choose Slider Category', 'newswave' ),
        'section' => 'home_page_slider_option',
            'type'        => 'select',
        'choices'     => newswave_post_category_list(),
    )
);

$wp_customize->add_setting(
    'newswave_options[enable_slider_post_description]',
    array(
        'default'           => $default_options['enable_slider_post_description'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_slider_post_description]',
    array(
        'label'   => __( 'Enable Post Description', 'newswave' ),
        'section' => 'home_page_slider_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newswave_options[enable_slider_cat_meta]',
    array(
        'default'           => $default_options['enable_slider_cat_meta'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_slider_cat_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'newswave' ),
        'section' => 'home_page_slider_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newswave_options[enable_slider_author_meta]',
    array(
        'default'           => $default_options['enable_slider_author_meta'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_slider_author_meta]',
    array(
        'label'   => __( 'Enable Author Meta', 'newswave' ),
        'section' => 'home_page_slider_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newswave_options[enable_slider_date_meta]',
    array(
        'default'           => $default_options['enable_slider_date_meta'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_slider_date_meta]',
    array(
        'label'   => __( 'Enable Date Meta', 'newswave' ),
        'section' => 'home_page_slider_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newswave_options[enable_slider_overlay]',
    array(
        'default'           => $default_options['enable_slider_overlay'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_slider_overlay]',
    array(
        'label'   => __( 'Enable Slider Overlay', 'newswave' ),
        'section' => 'home_page_slider_option',
        'type'    => 'checkbox',
    )
);