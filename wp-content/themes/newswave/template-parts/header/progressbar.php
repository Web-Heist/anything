<?php
/**
 * Displays progressbar
 *
 * @package Newswave
 */

$show_progressbar = newswave_get_option( 'show_progressbar' );

if ( $show_progressbar ) :
	$progressbar_position = newswave_get_option( 'progressbar_position' );
	echo '<div id="newswave-progress-bar" class="theme-progress-bar ' . esc_attr( $progressbar_position ) . '"></div>';
endif;
