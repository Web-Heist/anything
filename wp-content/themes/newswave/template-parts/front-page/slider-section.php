<?php
/**
 * Displays Slider Section
 *
 * @package Newswave
 */
$enable_slider_overlay = newswave_get_option('enable_slider_overlay');
$slider_section_cat = newswave_get_option( 'slider_section_cat' );
$slider_section_presentation_layout = newswave_get_option( 'slider_section_presentation_layout' );
$number_of_slider_post = newswave_get_option( 'number_of_slider_post' );
$enable_slider_cat_meta = newswave_get_option( 'enable_slider_cat_meta' );
$enable_slider_author_meta = newswave_get_option( 'enable_slider_author_meta' );
$enable_slider_date_meta = newswave_get_option( 'enable_slider_date_meta' );
$enable_slider_post_description = newswave_get_option( 'enable_slider_post_description' );
$slider_post_content_alignment = newswave_get_option( 'slider_post_content_alignment' );
$featured_image = "";
if ($slider_section_presentation_layout == 'site-swiper-layout-slider') {
    $slider_alignment_class = 'align-self-center';
}else {
    $slider_alignment_class = 'align-self-bottom';
}
$slider_overlay_class = '';
if ($enable_slider_overlay) {
    $slider_overlay_class = 'data-bg-overlay';
}
?>

<section class="site-section site-swiper-section <?php echo esc_attr($slider_section_presentation_layout); ?>">
    <div class="theme-swiper-slider swiper">
        <div class="swiper-wrapper">
        <?php $slider_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => absint($number_of_slider_post), 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($slider_section_cat)));
            if( $slider_post_query->have_posts() ):
                while ($slider_post_query->have_posts()): $slider_post_query->the_post(); 
                    if (has_post_thumbnail()) {
                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                        $featured_image = isset($featured_image[0]) ? $featured_image[0] : ''; 
                    }
                    ?>
                    <div class="swiper-slide data-bg data-bg-large <?php echo $slider_overlay_class; ?>" data-background="<?php echo esc_url($featured_image); ?>">
                        <div class="wrapper h-100">
                            <div class="column-row h-100">
                                <div class="column column-12 justify-content-center <?php echo $slider_alignment_class;?> <?php echo $slider_post_content_alignment; ?>">
                                    <div class="slider-content">
                                        <?php if ($enable_slider_cat_meta) { ?>
                                            <div class="newswave-entry-categories">
                                                <?php the_category(' '); ?>
                                            </div>
                                        <?php } ?>

                                        <header class="entry-header">
                                        <?php the_title( '<h2 class="entry-title entry-title-large"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                                        </header>

                                        <?php if ($enable_slider_post_description) { ?>
                                            <div class="">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php } ?>

                                        <div class="">
                                            <?php if ($enable_slider_date_meta) { newswave_posted_on(); } ?>
                                            <?php if ($enable_slider_author_meta) {  newswave_posted_by();} ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                endwhile; 
            wp_reset_postdata();
            endif; ?>
        </div>

        <!-- Control -->

        <div class="theme-swiper-control swiper-control">
            <div class="swiper-button-prev slider-button-prev"></div>
            <div class="swiper-button-next slider-button-next"></div>
            <div class="swiper-pagination theme-swiper-pagination theme-slider-pagination"></div>

            <div class="autoplay-progress">
                <svg viewBox="0 0 48 48">
                    <circle cx="24" cy="24" r="20"></circle>
                </svg>
                <span></span>
            </div>

        </div>

    </div>
</section>