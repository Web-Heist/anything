<?php

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/widgets/widget-base/widgetbase.php';

require get_template_directory() . '/inc/widgets/class-recent-widget.php';
require get_template_directory() . '/inc/widgets/class-social-widget.php';
require get_template_directory() . '/inc/widgets/class-author-widget.php';
require get_template_directory() . '/inc/widgets/class-tab-widget.php';
require get_template_directory() . '/inc/widgets/class-double-column-categories.php';
require get_template_directory() . '/inc/widgets/class-single-column-categories.php';
require get_template_directory() . '/inc/widgets/class-fullwidth-metro.php';
require get_template_directory() . '/inc/widgets/class-slider-widget.php';
require get_template_directory() . '/inc/widgets/class-carousel-widget.php';
require get_template_directory() . '/inc/widgets/class-fullwidth-widget.php';
require get_template_directory() . '/inc/widgets/class-newsletter-widget.php';
require get_template_directory() . '/inc/widgets/class-image-widget.php';

/* Register site widgets */
if ( ! function_exists( 'newswave_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function newswave_widgets() {
        register_widget( 'Newswave_Recent_Posts' );
        register_widget( 'Newswave_Social_Menu' );
        register_widget( 'Newswave_Author_Info' );
        register_widget( 'Newswave_Tab_Posts' );
        register_widget( 'Newswave_Double_Column_Categories' );
        register_widget( 'Newswave_Single_Column_Categories' );
        register_widget( 'Newswave_Slider_Widget' );
        register_widget( 'Newswave_Carousel_Widget' );
        register_widget( 'Newswave_Fullwidth_Widget' );
        register_widget( 'Newswave_Fullwidth_Metro' );
        register_widget( 'Newswave_Mailchimp_Form' );
        register_widget( 'Newswave_Image_Widget' );
    }
endif;
add_action( 'widgets_init', 'newswave_widgets' );