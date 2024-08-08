<?php
/*Header Options*/
$wp_customize->add_section(
    'general_settings' ,
    array(
        'title' => __( 'General Settings', 'newswave' ),
        'panel' => 'newswave_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'newswave_options[show_lightbox_image]',
    array(
        'default'           => $default_options['show_lightbox_image'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[show_lightbox_image]',
    array(
        'label'    => __( 'Show LightBox Image', 'newswave' ),
        'section'  => 'general_settings',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'newswave_options[enable_cursor_dot_outline]',
    array(
        'default' => $default_options['enable_cursor_dot_outline'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_cursor_dot_outline]',
    array(
        'label' => esc_html__('Enable Cursor Dot Outline', 'newswave'),
        'section' => 'general_settings',
        'type' => 'checkbox',
    )
);
