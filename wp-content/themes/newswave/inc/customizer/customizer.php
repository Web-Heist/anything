<?php
/**
 * Newswave Theme Customizer
 *
 * @package Newswave
 */
/**
 * Customizer default values.
 */
require get_template_directory() . '/inc/customizer/defaults.php';

/*Load customizer callback.*/
// require get_template_directory() . '/inc/customizer/callback.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newswave_customize_register( $wp_customize ) {
	/*Load custom controls for customizer.*/
	require get_template_directory() . '/inc/customizer/controls.php';

	/*Load sanitization functions.*/
	require get_template_directory() . '/inc/customizer/sanitize.php';
	require get_template_directory() . '/inc/customizer/callback.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'newswave_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'newswave_customize_partial_blogdescription',
			)
		);
	}

	/*Get default values to set while building customizer elements*/
	$default_options = newswave_get_default_customizer_values();
	/* Header Background Color*/
	$wp_customize->add_setting(
	    'newswave_options[header_bg_color]',
	    array(
	        'default' => $default_options['header_bg_color'],
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'newswave_options[header_bg_color]',
	        array(
	            'label' => __('Header Background Color', 'newswave'),
	            'section' => 'colors',
	            'type' => 'color',
        		'priority' => 1,

	        )
	    )
	);
	/*Load customizer options.*/
	require_once get_template_directory() . '/inc/customizer/theme-options/page-loading-add.php';
	require_once get_template_directory() . '/inc/customizer/theme-options/preloader.php';
	require_once get_template_directory() . '/inc/customizer/theme-options/night-mode.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/topbar.php';
	require_once get_template_directory() . '/inc/customizer/theme-options/header.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/ticker-bar.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/top-tagged.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/front-page-banner.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/front-page-slider.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/category.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/read-more.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/article-with-separator.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/separator_between_homepage_widget.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/front-page.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/general-setting.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/archive.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/read-time.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/single.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/pagination.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/footer-recommended.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/footer.php';
    require_once get_template_directory() . '/inc/customizer/theme-options/theme-options.php';
	if (class_exists('WooCommerce')) {
		require_once get_template_directory() . '/inc/customizer/theme-options/shop.php';
	}

	// View Pro
	$wp_customize->add_section( 'pro__section', array(
		'title'       => '' . esc_html__( 'View PRO Version', 'newswave' ),
		'priority'    => 2,
		'description' => sprintf(
			/* translators: %s: The view pro link. */
			__( '<div class="upsell-container">
					<h2>Need More? Go PRO</h2>
					<p>Take it to the next level. See the features below:</p>
					<ul class="upsell-features">
                           <li>
                            	<h4>Endless Customization Options:</h4>
                            	<div class="description">With our intuitive and user-friendly customizer options panel, you can effortlessly personalize every aspect of your website. From fonts, colors, and layouts to background images, you have complete control over the appearance of your site.</div>
                            </li>

                            <li>
                            	<h4>Speed and Performance Optimized:</h4>
                            	<div class="description">We have meticulously optimized our code and assets to guarantee lightning-fast loading times. Your visitors will appreciate a smooth browsing experience that keeps them engaged with your content.</div>
                            </li>

                            <li>
                            	<h4>Premium Customer Support:</h4>
                            	<div class="description">You will benefit by priority support from a caring and devoted team, eager to help and to spread happiness. We work hard to provide a flawless experience for those who vote us with trust and choose to be our special clients.</div>
                            </li>

                    </ul> %s </div>', 'newswave' ),
			/* translators: %1$s: The view pro URL, %2$s: The view pro link text. */
			sprintf( '<a href="%1$s" target="_blank" class="button button-primary">%2$s</a>', esc_url( newswave_get_pro_link() ), esc_html__( 'View Newswave PRO', 'newswave' ) )
		),
	) );
	$wp_customize->add_setting( 'newswave_style_view_pro_desc', array(
		'default'           => '',
		'sanitize_callback' => '__return_true',
	) );
	$wp_customize->add_control( 'newswave_style_view_pro_desc', array(
		'section' => 'pro__section',
		'type'    => 'hidden',
	) );
}
add_action( 'customize_register', 'newswave_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function newswave_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function newswave_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newswave_customize_preview_js() {
    wp_enqueue_script( 'newswave-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), NEWSWAVE_S_VERSION, true );

}
add_action( 'customize_preview_init', 'newswave_customize_preview_js' );


/**
 * Customizer control scripts and styles.
 *
 * @since 1.0.0
 */
function newswave_customizer_control_scripts(){
    wp_enqueue_style('newswave-customizer-css', get_template_directory_uri() . '/assets/css/customizer.css');
    wp_enqueue_script('newswave-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-admin.js', array('jquery', 'jquery-ui-sortable', 'customize-controls') );
}
add_action('customize_controls_enqueue_scripts', 'newswave_customizer_control_scripts', 0);

/**
 * Generate a link to the premium theme info page.
 */
function newswave_get_pro_link() {
	return 'https://www.themeinwp.com/theme/newswave-pro/';
}