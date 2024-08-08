<?php
/**/
$wp_customize->add_section(
    'footer_recommended_post_sectioon',
    array(
        'title'      => __( 'Footer Related Post', 'newswave' ),
        'panel'      => 'newswave_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'newswave_options[enable_footer_recommended_post_section]',
    array(
        'default'           => $default_options['enable_footer_recommended_post_section'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_footer_recommended_post_section]',
    array(
        'label'   => __( 'Enable Footer Related Post Section', 'newswave' ),
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newswave_options[footer_recommended_post_title]',
    array(
        'default'           => $default_options['footer_recommended_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newswave_options[footer_recommended_post_title]',
    array(
        'label'    => __( 'Footer Recoommended Posts Title', 'newswave' ),
        'section'  => 'footer_recommended_post_sectioon',
        'type'     => 'text',
    )
);


$wp_customize->add_setting(
    'newswave_options[select_cat_for_footer_recommended_post]',
    array(
        'default'           => $default_options['select_cat_for_footer_recommended_post'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[select_cat_for_footer_recommended_post]',
    array(
        'label'   => __( 'Choose Footer Related Post Category', 'newswave' ),
        'section' => 'footer_recommended_post_sectioon',
            'type'        => 'select',
        'choices'     => newswave_post_category_list(),
    )
);

$wp_customize->add_setting(
    'newswave_options[enable_category_meta]',
    array(
        'default'           => $default_options['enable_category_meta'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_category_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'newswave' ),
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newswave_options[enable_post_excerpt]',
    array(
        'default'           => $default_options['enable_post_excerpt'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_post_excerpt]',
    array(
        'label'   => __( 'Enable Post Excerpt Meta', 'newswave' ),
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
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
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newswave_options[enable_author_meta]',
    array(
        'default'           => $default_options['enable_author_meta'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_author_meta]',
    array(
        'label'   => __( 'Enable Author Meta', 'newswave' ),
        'section' => 'footer_recommended_post_sectioon',
        'type'    => 'checkbox',
    )
);
