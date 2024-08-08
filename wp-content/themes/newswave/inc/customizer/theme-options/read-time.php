<?php
$widgets_link = admin_url( 'widgets.php' );

/*Add footer theme option*/
$wp_customize->add_section(
    'read_time_options' ,
    array(
        'title' => __( 'Read Time Options', 'newswave' ),
        'panel' => 'newswave_option_panel',
    )
);
$wp_customize->add_setting(
    'newswave_options[enable_read_time_option]',
    array(
        'default'           => $default_options['enable_read_time_option'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_read_time_option]',
    array(
        'label'       => __( 'Enable Read Time Option', 'newswave' ),
        'section'     => 'read_time_options',
        'type'        => 'checkbox',
    )
);

/*Display read time in*/
$wp_customize->add_setting(
    'newswave_options[display_read_time_in]',
    array(
        'default'           => $default_options['display_read_time_in'],
        'sanitize_callback' => 'newswave_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Newswave_Checkbox_Multiple(
        $wp_customize,
        'newswave_options[display_read_time_in]',
        array(
            'label' => __( 'Display Read Time', 'newswave' ),
            'section' => 'read_time_options',
            'choices' => array(
                'home-page' => __('Homepage', 'newswave'),
                'single-page' => __('Single Page', 'newswave'),
                'archive-page' => __('Archive Page', 'newswave'),
            )
        )
    )
);


$wp_customize->add_setting(
    'newswave_options[words_per_minute]',
    array(
        'default' => $default_options['words_per_minute'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'newswave_options[words_per_minute]',
    array(
        'label' => __('Words Per Minute', 'newswave'),
        'description' => __('Number of Words per minut', 'newswave'),
        'section' => 'read_time_options',
        'type' => 'number',
        'input_attrs' => array('min' => 1, 'max' => 300, 'style' => 'width: 150px;'),
    )
);
