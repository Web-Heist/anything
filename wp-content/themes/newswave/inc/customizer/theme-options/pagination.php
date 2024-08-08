<?php
$wp_customize->add_section(
    'pagination_options' ,
    array(
        'title' => __( 'Pagination Options', 'newswave' ),
        'panel' => 'newswave_option_panel',
    )
);

/* Pagination Type*/
$wp_customize->add_setting(
    'newswave_options[pagination_type]',
    array(
        'default'           => $default_options['pagination_type'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[pagination_type]',
    array(
        'label'       => __( 'Pagination Type', 'newswave' ),
        'section'     => 'pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'default' => __( 'Default (Older / Newer Post)', 'newswave' ),
            'numeric' => __( 'Numeric', 'newswave' ),
            'ajax_load_on_click' => __( 'Load more post on click', 'newswave' ),
            'ajax_load_on_scroll' => __( 'Load more posts on scroll', 'newswave' ),
        ),
    )
);
