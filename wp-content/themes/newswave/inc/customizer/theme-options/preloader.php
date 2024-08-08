<?php
/*Preloader Options*/
$wp_customize->add_section(
    'preloader_options' ,
    array(
        'title' => __( 'Preloader Options', 'newswave' ),
        'panel' => 'newswave_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'newswave_options[show_preloader]',
    array(
        'default'           => $default_options['show_preloader'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[show_preloader]',
    array(
        'label'    => __( 'Show Preloader', 'newswave' ),
        'section'  => 'preloader_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newswave_options[preloader_style]',
    array(
        'default'           => $default_options['preloader_style'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[preloader_style]',
    array(
        'label'       => __( 'Preloader Style', 'newswave' ),
        'section'     => 'preloader_options',
        'type'        => 'select',
        'choices'     => array(
            'theme-preloader-spinner-1' => __( 'Style 1', 'newswave' ),
            'theme-preloader-spinner-2' => __( 'Style 2', 'newswave' ),
        ),
        'active_callback' => 'newswave_is_show_preloader',

    )
);
