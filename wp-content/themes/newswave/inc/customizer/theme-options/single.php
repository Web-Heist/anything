<?php

$wp_customize->add_section(
    'single_options' ,
    array(
        'title' => __( 'Single Options', 'newswave' ),
        'panel' => 'newswave_option_panel',
    )
);

/* Global Layout*/
$wp_customize->add_setting(
    'newswave_options[single_sidebar_layout]',
    array(
        'default'           => $default_options['single_sidebar_layout'],
        'sanitize_callback' => 'newswave_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Newswave_Radio_Image_Control(
        $wp_customize,
        'newswave_options[single_sidebar_layout]',
        array(
            'label' => __( 'Single Sidebar Layout', 'newswave' ),
            'section' => 'single_options',
            'choices' => newswave_get_general_layouts()
        )
    )
);

// Hide Side Bar on Mobile
$wp_customize->add_setting(
    'newswave_options[hide_single_sidebar_mobile]',
    array(
        'default'           => $default_options['hide_single_sidebar_mobile'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[hide_single_sidebar_mobile]',
    array(
        'label'       => __( 'Hide Single Sidebar on Mobile', 'newswave' ),
        'section'     => 'single_options',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newswave_section_seperator_single_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newswave_Seperator_Control(
        $wp_customize,
        'newswave_section_seperator_single_1',
        array(
            'settings' => 'newswave_section_seperator_single_1',
            'section'       => 'single_options',
        )
    )
);

/* Post Meta */
$wp_customize->add_setting(
    'newswave_options[single_post_meta]',
    array(
        'default'           => $default_options['single_post_meta'],
        'sanitize_callback' => 'newswave_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Newswave_Checkbox_Multiple(
        $wp_customize,
        'newswave_options[single_post_meta]',
        array(
            'label' => __( 'Single Post Meta', 'newswave' ),
            'description'   => __( 'Choose the post meta you want to be displayed on post detail page', 'newswave' ),
            'section' => 'single_options',
            'choices' => array(
                'author' => __( 'Author', 'newswave' ),
                'date' => __( 'Date', 'newswave' ),
                'comment' => __( 'Comment', 'newswave' ),
                'category' => __( 'Category', 'newswave' ),
                'tags' => __( 'Tags', 'newswave' ),
            )
        )
    )
);



$wp_customize->add_setting(
    'newswave_section_seperator_single_5',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newswave_Seperator_Control(
        $wp_customize,
        'newswave_section_seperator_single_5',
        array(
            'settings' => 'newswave_section_seperator_single_5',
            'section'       => 'single_options',
        )
    )
);


$wp_customize->add_setting(
    'newswave_options[show_sticky_article_navigation]',
    array(
        'default'           => $default_options['show_sticky_article_navigation'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[show_sticky_article_navigation]',
    array(
        'label'    => __( 'Show Sticky Article Navigation', 'newswave' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Show Author Info Box start
*-------------------------------*/
$wp_customize->add_setting(
    'newswave_section_seperator_single_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newswave_Seperator_Control(
        $wp_customize,
        'newswave_section_seperator_single_2',
        array(
            'settings' => 'newswave_section_seperator_single_2',
            'section'       => 'single_options',
        )
    )
);

$wp_customize->add_setting(
    'newswave_options[show_author_info]',
    array(
        'default'           => $default_options['show_author_info'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[show_author_info]',
    array(
        'label'    => __( 'Show Author Info Box', 'newswave' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newswave_section_seperator_single_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newswave_Seperator_Control(
        $wp_customize,
        'newswave_section_seperator_single_3',
        array(
            'settings' => 'newswave_section_seperator_single_3',
            'section'       => 'single_options',
        )
    )
);

/*Show Related Posts
*-------------------------------*/
$wp_customize->add_setting(
    'newswave_options[show_related_posts]',
    array(
        'default'           => $default_options['show_related_posts'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[show_related_posts]',
    array(
        'label'    => __( 'Show Related Posts', 'newswave' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Related Posts Text.*/
$wp_customize->add_setting(
    'newswave_options[related_posts_text]',
    array(
        'default'           => $default_options['related_posts_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newswave_options[related_posts_text]',
    array(
        'label'    => __( 'Related Posts Text', 'newswave' ),
        'section'  => 'single_options',
        'type'     => 'text',
        'active_callback' => 'newswave_is_related_posts_enabled',
    )
);

/* Number of Related Posts */
$wp_customize->add_setting(
    'newswave_options[no_of_related_posts]',
    array(
        'default'           => $default_options['no_of_related_posts'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'newswave_options[no_of_related_posts]',
    array(
        'label'       => __( 'Number of Related Posts', 'newswave' ),
        'section'     => 'single_options',
        'type'        => 'number',
        'active_callback' => 'newswave_is_related_posts_enabled',
    )
);

/*Related Posts Orderby*/
$wp_customize->add_setting(
    'newswave_options[related_posts_orderby]',
    array(
        'default'           => $default_options['related_posts_orderby'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[related_posts_orderby]',
    array(
        'label'       => __( 'Orderby', 'newswave' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'date' => __('Date', 'newswave'),
            'id' => __('ID', 'newswave'),
            'title' => __('Title', 'newswave'),
            'rand' => __('Random', 'newswave'),
        ),
        'active_callback' => 'newswave_is_related_posts_enabled',
    )
);

/*Related Posts Order*/
$wp_customize->add_setting(
    'newswave_options[related_posts_order]',
    array(
        'default'           => $default_options['related_posts_order'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[related_posts_order]',
    array(
        'label'       => __( 'Order', 'newswave' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'asc' => __('ASC', 'newswave'),
            'desc' => __('DESC', 'newswave'),
        ),
        'active_callback' => 'newswave_is_related_posts_enabled',
    )
);

$wp_customize->add_setting(
    'newswave_section_seperator_single_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Newswave_Seperator_Control(
        $wp_customize,
        'newswave_section_seperator_single_4',
        array(
            'settings' => 'newswave_section_seperator_single_4',
            'section'       => 'single_options',
        )
    )
);
/*Show Author Posts
*-----------------------------------------*/
$wp_customize->add_setting(
    'newswave_options[show_author_posts]',
    array(
        'default'           => $default_options['show_author_posts'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[show_author_posts]',
    array(
        'label'    => __( 'Show Author Posts', 'newswave' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Author Posts Text.*/
$wp_customize->add_setting(
    'newswave_options[author_posts_text]',
    array(
        'default'           => $default_options['author_posts_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newswave_options[author_posts_text]',
    array(
        'label'    => __( 'Author Posts Text', 'newswave' ),
        'section'  => 'single_options',
        'type'     => 'text',
        'active_callback' => 'newswave_is_author_posts_enabled',
    )
);

/* Number of Author Posts */
$wp_customize->add_setting(
    'newswave_options[no_of_author_posts]',
    array(
        'default'           => $default_options['no_of_author_posts'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'newswave_options[no_of_author_posts]',
    array(
        'label'       => __( 'Number of Author Posts', 'newswave' ),
        'section'     => 'single_options',
        'type'        => 'number',
        'active_callback' => 'newswave_is_author_posts_enabled',
    )
);

/*Author Posts Orderby*/
$wp_customize->add_setting(
    'newswave_options[author_posts_orderby]',
    array(
        'default'           => $default_options['author_posts_orderby'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[author_posts_orderby]',
    array(
        'label'       => __( 'Orderby', 'newswave' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'date' => __('Date', 'newswave'),
            'id' => __('ID', 'newswave'),
            'title' => __('Title', 'newswave'),
            'rand' => __('Random', 'newswave'),
        ),
        'active_callback' => 'newswave_is_author_posts_enabled',
    )
);

/*Author Posts Order*/
$wp_customize->add_setting(
    'newswave_options[author_posts_order]',
    array(
        'default'           => $default_options['author_posts_order'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[author_posts_order]',
    array(
        'label'       => __( 'Order', 'newswave' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'asc' => __('ASC', 'newswave'),
            'desc' => __('DESC', 'newswave'),
        ),
        'active_callback' => 'newswave_is_author_posts_enabled',
    )
);