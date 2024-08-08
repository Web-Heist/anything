<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function newswave_body_classes( $classes ) {
    global $post;
    $post_type = "";
    if (!empty($post)) {
        $post_type = get_post_type($post->ID);
    }
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    if ( is_active_sidebar( 'newswave-offcanvas-widget' ) ) {
        $classes[] = 'has-offcanvas-sidebar';
    }

    $enable_always_dark_mode = newswave_get_option('enable_always_dark_mode');
    if ($enable_always_dark_mode) {
        $classes[] = ' newswave-force-dark';
    }
    $header_style = newswave_get_option('header_style');
    $classes[] = ' newswave-'.$header_style;
    // Get the color mode of the site.
    $enable_dark_mode = newswave_get_option( 'enable_dark_mode' );
    if ( $enable_dark_mode ) {
        $classes[] = 'newswave-dark-mode';
    } else {
        $classes[] = 'newswave-light-mode';
    }
    if ($post_type == 'product') {
        if ( ! is_active_sidebar( 'shop-sidebar' ) ) {
            $classes[] = 'no-sidebar';
        } else {
            $page_layout = newswave_get_page_layout();
            if('no-sidebar' != $page_layout ){
                $classes[] = 'has-sidebar '.esc_attr($page_layout);
            }
        }
    } else {
        if ($post_type != 'page') { 
        	$page_layout = newswave_get_page_layout();
            if('no-sidebar' != $page_layout ){
                $classes[] = 'has-sidebar '.esc_attr($page_layout);
            }else{

                $classes[] = esc_attr($page_layout);
            }
        }
    }

    if (is_page_template('template-parts/front-page-template.php')) {
        $page_layout = newswave_get_page_layout();
        if('no-sidebar' != $page_layout ){
            $classes[] = 'has-sidebar '.esc_attr($page_layout);
        }else{

            $classes[] = esc_attr($page_layout);
        }
    }


	return $classes;
}
add_filter( 'body_class', 'newswave_body_classes' );
