<?php

/**
 * Displays Banner Section
 *
 * @package Newswave
 */
$upload_banner_bg_image = newswave_get_option('upload_banner_bg_image');
$banner_section_style = newswave_get_option('banner_section_style');
$banner_section_cat_style_1 = newswave_get_option('banner_section_cat_style_1');
$banner_section_cat_style_3 = newswave_get_option('banner_section_cat_style_3');
$banner_section_title_1 = newswave_get_option('banner_section_title_1');
$banner_section_cat_1 = newswave_get_option('banner_section_cat_1');
$banner_section_title_2 = newswave_get_option('banner_section_title_2');
$banner_section_cat_2 = newswave_get_option('banner_section_cat_2');
$banner_section_title_3 = newswave_get_option('banner_section_title_3');
$banner_section_cat_3 = newswave_get_option('banner_section_cat_3');
$enable_banner_cat_meta = newswave_get_option('enable_banner_cat_meta');
$enable_banner_author_meta = newswave_get_option('enable_banner_author_meta');
$enable_banner_date_meta = newswave_get_option('enable_banner_date_meta');
$enable_background_fix = newswave_get_option('enable_background_fix');
$banner_style_1_single_qury = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat_style_1)));
$banner_style_3_single_qury = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 5, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat_style_3)));

$grid_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 2, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat_1)));
$banner_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat_2)));
$list_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 5, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat_3)));
?>
<?php
$image_fix_class = '';
if ($enable_background_fix) {
    $image_fix_class = "data-bg-fixed ";
}
if (!empty($upload_banner_bg_image)) {
    $image_fix_class .= " data-bg";
}
?>
<?php switch ($banner_section_style) {
    case 'style-1': ?>
        <section class="site-section site-banner-section site-banner-layout-1 <?php echo esc_attr($image_fix_class); ?>" data-background="<?php echo esc_url($upload_banner_bg_image); ?>">
            <div class="wrapper-fluid">
                <div class="column-grid column-grid-template">
                    <?php
                    $i = '1';
                    if ($banner_style_1_single_qury->have_posts()) :
                        while ($banner_style_1_single_qury->have_posts()) : $banner_style_1_single_qury->the_post();
                    ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-shine theme-tiles-post theme-article-post-' . $i); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="entry-image">
                                        <figure class="featured-media featured-media-large">
                                            <a href="<?php the_permalink() ?>">
                                                <?php
                                                the_post_thumbnail('medium_large', array(
                                                    'alt' => the_title_attribute(array(
                                                        'echo' => false,
                                                    )),
                                                ));
                                                ?>
                                            </a>
                                            <?php if (newswave_get_option('show_lightbox_image')) { ?>
                                                <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="featured-media-fullscreen" data-glightbox="">
                                                    <?php newswave_theme_svg('fullscreen'); ?>
                                                </a>
                                            <?php } ?>
                                        </figure>
                                    </div>
                                <?php endif; ?>
                                <div class="entry-details">
                                    <?php if ($enable_banner_cat_meta) { ?>
                                        <div class="newswave-entry-categories">
                                            <?php the_category(' '); ?>
                                        </div>
                                    <?php } ?>
                                    <header class="entry-header">
                                        <?php the_title('<h2 class="entry-title entry-title-large"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                                    </header>
                                    <footer class="entry-meta entry-meta-footer">
                                        <?php if ($enable_banner_date_meta) {
                                            newswave_posted_on();
                                        } ?>
                                        <?php if ($enable_banner_author_meta) {
                                            newswave_posted_by();
                                        } ?>
                                    </footer>
                                </div>
                            </article>
                    <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </section>
    <?php break;

    case 'style-2': ?>
        <section class="site-section site-banner-section site-banner-layout-2 <?php echo esc_attr($image_fix_class); ?>" data-background="<?php echo esc_url($upload_banner_bg_image); ?>">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-4 column-sm-12">
                        <header class="section-header site-section-header">
                            <h2 class="site-section-title">
                                <?php echo esc_html($banner_section_title_1); ?>
                            </h2>
                        </header>
                        <div class="column-row">
                            <?php
                            if ($grid_post_query->have_posts()) :
                                while ($grid_post_query->have_posts()) : $grid_post_query->the_post();
                            ?>
                                    <div class="column column-12 column-sm-6 column-xs-12">
                                        <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-slide theme-tiles-post'); ?>>
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="entry-image">
                                                    <figure class="featured-media featured-media-medium">
                                                        <a href="<?php the_permalink() ?>">
                                                            <?php
                                                            the_post_thumbnail('medium_large', array(
                                                                'alt' => the_title_attribute(array(
                                                                    'echo' => false,
                                                                )),
                                                            ));
                                                            ?>
                                                        </a>
                                                        <?php if (newswave_get_option('show_lightbox_image')) { ?>
                                                            <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="featured-media-fullscreen" data-glightbox="">
                                                                <?php newswave_theme_svg('fullscreen'); ?>
                                                            </a>
                                                        <?php } ?>
                                                    </figure>
                                                </div>
                                            <?php endif; ?>
                                            <div class="entry-details">
                                                <?php if ($enable_banner_cat_meta) { ?>
                                              <div class="newswave-entry-categories">
        <?php the_category(' '); ?>
    </div>
                                                <?php } ?>
                                                <header class="entry-header">
                                                    <?php the_title('<h2 class="entry-title entry-title-big"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                                                </header>
                                                <footer class="entry-meta entry-meta-footer">
                                                    <?php if ($enable_banner_date_meta) {
                                                        newswave_posted_on();
                                                    } ?>
                                                    <?php if ($enable_banner_author_meta) {
                                                        newswave_posted_by();
                                                    } ?>
                                                </footer>
                                            </div>
                                        </article>
                                    </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                    </div>
                    <div class="column column-8 column-sm-12">
                        <div class="column-row">
                            <div class="column column-7 column-sm-12">
                                <header class="section-header site-section-header">
                                    <h2 class="site-section-title">
                                        <?php echo esc_html($banner_section_title_2); ?>
                                    </h2>
                                </header>
                                <div class="main-banner-slider swiper">
                                    <div class="swiper-wrapper">
                                        <?php
                                        if ($banner_post_query->have_posts()) :
                                            while ($banner_post_query->have_posts()) : $banner_post_query->the_post();
                                        ?>
                                                <div class="swiper-slide">
                                                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-shine theme-tiles-post'); ?>>
                                                        <?php if (has_post_thumbnail()) : ?>
                                                            <div class="entry-image">
                                                                <figure class="featured-media featured-media-large">
                                                                    <a href="<?php the_permalink() ?>">
                                                                        <?php
                                                                        the_post_thumbnail('large', array(
                                                                            'alt' => the_title_attribute(array(
                                                                                'echo' => false,
                                                                            )),
                                                                        ));
                                                                        ?>
                                                                    </a>
                                                                    <?php if (newswave_get_option('show_lightbox_image')) { ?>
                                                                        <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="featured-media-fullscreen" data-glightbox="">
                                                                            <?php newswave_theme_svg('fullscreen'); ?>
                                                                        </a>
                                                                    <?php } ?>
                                                                </figure>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="entry-details">
                                                            <?php if ($enable_banner_cat_meta) { ?>
                                                          <div class="newswave-entry-categories">
        <?php the_category(' '); ?>
    </div>
                                                            <?php } ?>

                                                            <header class="entry-header">
                                                                <?php the_title('<h2 class="entry-title entry-title-large"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                                                            </header>

                                                            <footer class="entry-meta entry-meta-footer">
                                                                <?php if ($enable_banner_date_meta) {
                                                                    newswave_posted_on();
                                                                } ?>
                                                                <?php if ($enable_banner_author_meta) {
                                                                    newswave_posted_by();
                                                                } ?>
                                                            </footer>
                                                        </div>
                                                    </article>
                                                </div>
                                        <?php
                                            endwhile;
                                            wp_reset_postdata();
                                        endif; ?>
                                    </div>
                                    <div class="theme-swiper-control swiper-control">
                                        <div class="swiper-button-prev banner-button-prev"></div>
                                        <div class="swiper-button-next banner-button-next"></div>
                                        <div class="swiper-pagination theme-swiper-pagination theme-main-pagination"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="column column-5 column-sm-12">
                                <header class="section-header site-section-header">
                                    <h2 class="site-section-title">
                                        <?php echo esc_html($banner_section_title_3); ?>
                                    </h2>
                                </header>
                                <?php
                                if ($list_post_query->have_posts()) :
                                    while ($list_post_query->have_posts()) : $list_post_query->the_post();
                                ?>
                                        <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-zoom theme-list-post'); ?>>
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="entry-image">
                                                    <figure class="featured-media featured-media-thumbnail">
                                                        <a href="<?php the_permalink() ?>" class="featured-media-link">
                                                            <?php
                                                            the_post_thumbnail('thumbnail', array(
                                                                'alt' => the_title_attribute(array(
                                                                    'echo' => false,
                                                                )),
                                                            ));
                                                            ?>
                                                        </a>
                                                    </figure>
                                                </div>
                                            <?php } ?>
                                            <div class="entry-details">
                                                <header class="entry-header">
                                                    <?php the_title('<h3 class="entry-title entry-title-small"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                                </header>
                                            </div>
                                        </article>
                                <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php break;

    case 'style-3': ?>
        <section class="site-section site-banner-section site-banner-layout-3 <?php echo esc_attr($image_fix_class); ?>" data-background="<?php echo esc_url($upload_banner_bg_image); ?>">
            <div class="wrapper-fluid">
                <div class="column-grid column-grid-template">
                    <?php
                    $i = '1';
                    if ($banner_style_3_single_qury->have_posts()) :
                        while ($banner_style_3_single_qury->have_posts()) : $banner_style_3_single_qury->the_post();
                            $banner_article_class = "featured-media-medium";
                            $banner_title_class = "entry-title-big";
                            if ($i == 1) {
                                $banner_article_class = "featured-media-large";
                                $banner_title_class = "entry-title-large";
                            }
                    ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-shine theme-tiles-post theme-article-post-' . $i); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="entry-image">
                                        <figure class="featured-media <?php echo esc_attr($banner_article_class); ?>">
                                            <a href="<?php the_permalink() ?>">
                                                <?php
                                                the_post_thumbnail('medium_large', array(
                                                    'alt' => the_title_attribute(array(
                                                        'echo' => false,
                                                    )),
                                                ));
                                                ?>
                                            </a>
                                            <?php if (newswave_get_option('show_lightbox_image')) { ?>
                                                <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="featured-media-fullscreen" data-glightbox="">
                                                    <?php newswave_theme_svg('fullscreen'); ?>
                                                </a>
                                            <?php } ?>
                                        </figure>
                                    </div>
                                <?php endif; ?>
                                <div class="entry-details">
                                    <?php if ($enable_banner_cat_meta) { ?>
                                  <div class="newswave-entry-categories">
        <?php the_category(' '); ?>
    </div>
                                    <?php } ?>
                                    <header class="entry-header">
                                        <?php the_title('<h2 class="entry-title ' . $banner_title_class . ' "><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                                    </header>
                                    <footer class="entry-meta entry-meta-footer">
                                        <?php if ($enable_banner_date_meta) {
                                            newswave_posted_on();
                                        } ?>
                                        <?php if ($enable_banner_author_meta) {
                                            newswave_posted_by();
                                        } ?>
                                    </footer>
                                </div>
                            </article>
                    <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </section>
<?php break;

    default:
        // code...
        break;
} ?>