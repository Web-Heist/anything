<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newswave
 */

?>
<!doctype html>
<html <?php language_attributes(); newswave_force_dark_mode();?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'newswave_before_site' ); ?>

<div id="page" class="site">
    <div class="site-content-area">
    <?php get_template_part( 'template-parts/header/loader' ); ?>

    <?php $ed_header_ad = newswave_get_option( 'ed_header_ad' );
    if ($ed_header_ad) {
        get_template_part( 'template-parts/header/welcome-screen-banner' );
    } ?>

    <?php get_template_part( 'template-parts/header/progressbar' ); ?>

    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'newswave'); ?></a>

    <?php do_action( 'newswave_before_header' ); ?>

    <?php get_template_part('template-parts/header/theme-header'); ?>

    <?php do_action( 'newswave_before_content' ); ?>
    <?php
    if ((is_home() || is_front_page()) && !is_paged()) {
        $enable_banner_section = newswave_get_option('enable_banner_section');
        if ($enable_banner_section) {
            get_template_part('template-parts/front-page/banner-section');
        }

        $is_slider_section = newswave_get_option('enable_slider_section');
        if ($is_slider_section) {
            get_template_part('template-parts/front-page/slider-section');
        }
        $enable_category_section = newswave_get_option('enable_category_section');
        if ($enable_category_section) {
            get_template_part('template-parts/front-page/categories-section');
        }
        $enable_read_more_post_section = newswave_get_option('enable_read_more_post_section');
        if ($enable_read_more_post_section) {
            get_template_part('template-parts/front-page/more-to-read');
        }
        $enable_article_with_separator_post_section = newswave_get_option('enable_article_with_separator_post_section');
        if ($enable_article_with_separator_post_section) {
            get_template_part('template-parts/front-page/article_with_separator');
        }
    }

