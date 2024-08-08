<?php
$wp_customize->add_section(
    'home_page_shop_option',
    array(
        'title'      => __( 'Shop  Section Options', 'newswave' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'newswave_options[enable_shop_section]',
    array(
        'default'           => $default_options['enable_shop_section'],
        'sanitize_callback' => 'newswave_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'newswave_options[enable_shop_section]',
    array(
        'label'   => __( 'Enable Shop Section', 'newswave' ),
        'section' => 'home_page_shop_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'newswave_options[shop_post_title]',
    array(
        'default'           => $default_options['shop_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newswave_options[shop_post_title]',
    array(
        'label'    => __( 'Shop Post Title', 'newswave' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'newswave_options[shop_post_description]',
    array(
        'default'           => $default_options['shop_post_description'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newswave_options[shop_post_description]',
    array(
        'label'    => __( 'Shop Post Description', 'newswave' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'textarea',
    )
);

$wp_customize->add_setting(
    'newswave_options[shop_select_product_from]',
    array(
        'default'           => $default_options['shop_select_product_from'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[shop_select_product_from]',
    array(
        'label'       => __( 'Select Product From', 'newswave' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            'custom'            => __('Custom Select', 'newswave'),
            'recent-products'   => __('Recent Products', 'newswave'),
            'popular-products'  => __('Popular Products', 'newswave'),
            'sale-products'     => __('Sale Products', 'newswave'),
        )
    )
);


$wp_customize->add_setting(
    'newswave_options[select_product_category]',
    array(
        'default'           => $default_options['select_product_category'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[select_product_category]',
    array(
        'label'   => __( 'Select Product Category', 'newswave' ),
        'section' => 'home_page_shop_option',
        'type'        => 'select',
        'choices'     => newswave_woocommerce_product_cat(),
        'active_callback' => 'newswave_shop_select_product_from'
    )
);

$wp_customize->add_setting(
    'newswave_options[shop_number_of_column]',
    array(
        'default'           => $default_options['shop_number_of_column'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[shop_number_of_column]',
    array(
        'label'       => __( 'Select Number Of Column', 'newswave' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            '2'  => __('2', 'newswave'),
            '3'  => __('3', 'newswave'),
            '4'  => __('4', 'newswave'),
        )
    )
);

$wp_customize->add_setting(
    'newswave_options[shop_number_of_product]',
    array(
        'default'           => $default_options['shop_number_of_product'],
        'sanitize_callback' => 'newswave_sanitize_select',
    )
);
$wp_customize->add_control(
    'newswave_options[shop_number_of_product]',
    array(
        'label'       => __( 'Select Number Of Product', 'newswave' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            '2'  => __('2', 'newswave'),
            '3'  => __('3', 'newswave'),
            '4'  => __('4', 'newswave'),
            '5'  => __('5', 'newswave'),
            '6'  => __('6', 'newswave'),
            '7'  => __('7', 'newswave'),
            '8'  => __('8', 'newswave'),
            '9'  => __('9', 'newswave'),
            '10'  => __('10', 'newswave'),
            '11'  => __('11', 'newswave'),
            '12'  => __('12', 'newswave'),
        )
    )
);

$wp_customize->add_setting(
    'newswave_options[shop_post_button_text]',
    array(
        'default'           => $default_options['shop_post_button_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'newswave_options[shop_post_button_text]',
    array(
        'label'    => __( 'Shop section Button Text', 'newswave' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'text',
    )
);
$wp_customize->add_setting(
    'newswave_options[shop_post_button_url]',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'newswave_options[shop_post_button_url]',
    array(
        'label'           => __( 'Button Link', 'newswave' ),
        'section'         => 'home_page_shop_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the image to have a link', 'newswave' ),
    )
);