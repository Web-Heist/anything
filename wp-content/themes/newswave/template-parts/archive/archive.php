<?php
/**
 * Show the excerpt.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newswave
 * @since Newswave 1.0.0
 */
if ( absint(newswave_get_option( 'excerpt_length' )) != '0'){
    the_excerpt();
}