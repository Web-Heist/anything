<?php
/**/
$wp_customize->add_section(
    'read_more_post_section',
    array(
        'title'      => __( 'Read More Post', 'newswave' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'newswave_options[enable_read_more_post_section]',
    array(
        'default'           => $default_options['enable_read_more_post_section'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_read_more_post_section]',
    array(
        'label'   => __( 'Enable Read More Post Section', 'newswave' ),
        'section' => 'read_more_post_section',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newswave_options[read_more_post_title]',
    array(
        'default'           => $default_options['read_more_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newswave_options[read_more_post_title]',
    array(
        'label'    => __( 'Read More Posts Title', 'newswave' ),
        'section'  => 'read_more_post_section',
        'type'     => 'text',
    )
);


$wp_customize->add_setting(
    'newswave_options[select_cat_for_read_more_post]',
    array(
        'default'           => $default_options['select_cat_for_read_more_post'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[select_cat_for_read_more_post]',
    array(
        'label'   => __( 'Choose Read More Post Category', 'newswave' ),
        'section' => 'read_more_post_section',
            'type'        => 'select',
        'choices'     => newswave_post_category_list(),
    )
);

$wp_customize->add_setting(
    'newswave_options[read_more_style]',
    array(
        'default'           => $default_options['read_more_style'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[read_more_style]',
    array(
        'label'       => __( 'Select Style', 'newswave' ),
        'section'     => 'read_more_post_section',
        'type'        => 'select',
        'choices'     => array(
            'style-1' => __( 'Style 1', 'newswave' ),
            'style-2' => __( 'Style 2', 'newswave' ),
        ),
    )
);


$wp_customize->add_setting(
    'newswave_options[enable_date_meta]',
    array(
        'default'           => $default_options['enable_date_meta'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_date_meta]',
    array(
        'label'   => __( 'Enable Date Meta', 'newswave' ),
        'section' => 'read_more_post_section',
        'type'    => 'checkbox',
    )
);

