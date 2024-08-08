<?php
/*Ticker Options*/
$wp_customize->add_section(
    'ticker_options' ,
    array(
        'title' => __( 'Ticker Options', 'newswave' ),
        'panel' => 'newswave_option_panel',
    )
);

$wp_customize->add_setting(
    'newswave_options[enable_ticker_post]',
    array(
        'default' => $default_options['enable_ticker_post'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_ticker_post]',
    array(
        'label' => esc_html__('Enable Ticker/News Post', 'newswave'),
        'section' => 'ticker_options',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newswave_options[ticker_text]',
    array(
        'default'           => $default_options['ticker_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newswave_options[ticker_text]',
    array(
        'label'    => __( 'Ticekr/News Title', 'newswave' ),
        'section'  => 'ticker_options',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'newswave_options[ticker_post_category]',
    array(
        'default'           => $default_options['ticker_post_category'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(new Newswave_Dropdown_Taxonomies_Control(
    $wp_customize, 
    'newswave_options[ticker_post_category]',
        array(
            'label'           => esc_html__('Ticker/News Post Category', 'newswave'),
            'section'         => 'ticker_options',
        )
    )
);

$wp_customize->add_setting(
    'newswave_options[enable_ticker_post_image]',
    array(
        'default' => $default_options['enable_ticker_post_image'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_ticker_post_image]',
    array(
        'label' => esc_html__('Enable Post Thumbnail', 'newswave'),
        'section' => 'ticker_options',
        'type' => 'checkbox',
    )
);