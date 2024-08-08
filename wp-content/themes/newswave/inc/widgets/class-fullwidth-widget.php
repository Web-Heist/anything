<?php
if (!defined('ABSPATH')) {
    exit;
}

class Newswave_Fullwidth_Widget extends Newswave_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'newswave_fullwidth_widget';
        $this->widget_description = __("Displays fullwidth widget", 'newswave');
        $this->widget_id = 'newswave-fullwidth-widget';
        $this->widget_name = __('Newswave: Fullwidth Widget', 'newswave');
        $this->settings = array(
            'title' => array(
                'label' => esc_html__('Section Title:', 'newswave'),
                'std' => esc_html__('Fullwidth Widget', 'newswave'),
                'type' => 'text',
                'class' => 'widefat',
            ),
            'post_category' => array(
                'type' => 'dropdown-taxonomies',
                'label' => __('First Column: Select Category', 'newswave'),
                'desc' => __('If you don\'t wish to specify a category for the posts, please leave this field empty.', 'newswave'),
                'args' => array(
                    'taxonomy' => 'category',
                    'class' => 'widefat',
                    'hierarchical' => true,
                    'show_count' => 1,
                    'show_option_all' => __('&mdash; Select &mdash;', 'newswave'),
                ),
            ),
            'display_orientation' => array(
                'label' => esc_html__('Display Layout:', 'newswave'),
                'type' => 'select',
                'default' => 'layout-1',
                'options' => array(
                    'layout-1' => esc_html__('Layout - 1 ', 'newswave'),
                    'layout-2' => esc_html__('Layout - 2', 'newswave'),
                    'layout-3' => esc_html__('Layout - 3', 'newswave'),
                    'layout-4' => esc_html__('Layout - 4', 'newswave'),
                    'layout-5' => esc_html__('Layout - 5', 'newswave'),
                ),
            ),
            'show_category' => array(
                'label' => esc_html__('Enable Categories:', 'newswave'),
                'type' => 'checkbox',
                'std' => true,
            ),
            'show_date' => array(
                'label' => esc_html__('Enable Date & Author:', 'newswave'),
                'type' => 'checkbox',
                'std' => true,
            ),
            'date_format' => array(
                'type' => 'select',
                'label' => __('Date Format', 'newswave'),
                'options' => array(
                    'format_1' => __('Format 1', 'newswave'),
                    'format_2' => __('Format 2', 'newswave'),
                ),
                'std' => 'format_1',
            ),
            'button_text' => array(
                'type' => 'text',
                'label' => __('Button Text', 'newswave'),
            ),
        );
        parent::__construct();
    }

    /**
     * Output widget.
     *
     * @param array $args
     * @param array $instance
     * @see WP_Widget
     *
     */
    public function widget($args, $instance)
    {
        ob_start();
        echo $args['before_widget'];
        do_action('newswave_before_fullwidth_categories');
        if ($instance['display_orientation'] == 'layout-1') {
            $post_number = 2;
        } elseif ($instance['display_orientation'] == 'layout-2') {
            $post_number = 5;
        } elseif ($instance['display_orientation'] == 'layout-4') {
            $post_number = 10;
        } elseif ($instance['display_orientation'] == 'layout-5') {
            $post_number = 11;
        } else {
            $post_number = 4;
        }
        $qargs = array(
            'post_type' => 'post',
            'posts_per_page' => $post_number,
            'post__not_in' => get_option("sticky_posts"),
        );
        $cat_link = "";
        if (absint($instance['post_category']) > 0) {
            $qargs['cat'] = absint($instance['post_category']);
            $cat_link = get_category_link($instance['post_category']);
        }
        $style_1_posts_query = new WP_Query($qargs);
        if ($style_1_posts_query->have_posts()) : ?>
            <?php $display_orientation = esc_attr($instance['display_orientation']);
            if ($display_orientation == 'layout-1') { ?>
                <div class="widget-layout widget-layout-1">
                    <?php if (!empty($instance['title'])) { ?>
                        <header class="theme-widget-header">
                            <div class="theme-widget-title">
                                <h2 class="widget-title">
                                    <?php echo $instance['title'] ?>
                                </h2>
                            </div>
                        </header>
                    <?php } ?>
                    <div class="theme-widget-content fullwidth-widget-content">
                        <?php
                        $i = 1;
                        while ($style_1_posts_query->have_posts()) :
                            $style_1_posts_query->the_post(); ?>
                            <div class="theme-widget-panel widget-panel-<?php echo $i; ?>">
                                <div class="widget-story">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article article-has-effect article-effect-shine'); ?>>
                                        <?php
                                        if (has_post_thumbnail()) {
                                            ?>
                                            <div class="entry-image">
                                                <figure class="featured-media featured-media-big">
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
                                                <?php if ($instance['show_category']) { ?>
                                                    <div class="newswave-entry-categories">
                                                        <?php the_category(' '); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="entry-details mt-15">
                                            <?php if ($instance['show_date']) { ?>
                                                <div class="newswave-meta post-date mb-15">
                                                    <?php newswave_theme_svg('calendar'); ?>
                                                    <?php
                                                    $date_format = $instance['date_format'];
                                                    if ('format_1' == $date_format) {
                                                        echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'newswave'));
                                                    } else {
                                                        echo esc_html(get_the_date());
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <header class="entry-header">
                                                <?php the_title('<h3 class="entry-title entry-title-medium"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                            </header>
                                            <div class="entry-content entry-content-muted content-muted-medium">
                                                <?php
                                                if (has_excerpt()) {
                                                    the_excerpt();
                                                } else {
                                                    echo '<p>';
                                                    echo esc_html(wp_trim_words(get_the_content(), 20, '...'));
                                                    echo '</p>';
                                                } ?>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <?php $i++;
                        wp_reset_postdata(); endwhile; ?>
                    </div>
                    <?php if (!empty($instance['button_text']) && !empty($cat_link)) { ?>
                        <div class="theme-footer-link theme-widget-footer">
                            <div class="theme-footer-panel widget-footer-panel">
                                <hr>
                                <a class="theme-viewmore-link" href="<?php echo esc_url($cat_link); ?>"><?php echo $instance['button_text']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } elseif ($display_orientation == 'layout-2') { ?>
                <div class="widget-layout widget-layout-2">
                    <?php if (!empty($instance['title'])) { ?>
                        <header class="theme-widget-header">
                            <div class="theme-widget-title">
                                <h2 class="widget-title">
                                    <?php echo $instance['title'] ?>
                                </h2>
                            </div>
                        </header>
                    <?php } ?>
                    <div class="theme-widget-content fullwidth-widget-content">
                        <?php
                        $i = 1;
                        while ($style_1_posts_query->have_posts()) :
                            $style_1_posts_query->the_post(); ?>
                            <?php switch ($i) {
                            case ($i == 1): ?>
                            <div class="theme-widget-panel widget-panel-1">
                                <div class="widget-story">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article article-has-effect article-effect-shine'); ?>>
                                        <?php
                                        if (has_post_thumbnail()) {
                                            ?>
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
                                                        <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
                                                           class="featured-media-fullscreen" data-glightbox="">
                                                            <?php newswave_theme_svg('fullscreen'); ?>
                                                        </a>
                                                    <?php } ?>
                                                </figure>
                                                <?php if ($instance['show_category']) { ?>
                                                    <div class="newswave-entry-categories">
                                                        <?php the_category(' '); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="entry-details mt-15">
                                            <?php if ($instance['show_date']) { ?>
                                                <div class="newswave-meta post-date mb-15">
                                                    <?php newswave_theme_svg('calendar'); ?>
                                                    <?php
                                                    $date_format = $instance['date_format'];
                                                    if ('format_1' == $date_format) {
                                                        echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'newswave'));
                                                    } else {
                                                        echo esc_html(get_the_date());
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <header class="entry-header">
                                                <?php the_title('<h3 class="entry-title entry-title-big"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                            </header>
                                            <div class="entry-content entry-content-muted content-muted-medium">
                                                <?php
                                                if (has_excerpt()) {
                                                    the_excerpt();
                                                } else {
                                                    echo '<p>';
                                                    echo esc_html(wp_trim_words(get_the_content(), 20, '...'));
                                                    echo '</p>';
                                                } ?>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="theme-widget-panel theme-svg-seperator">
                                <?php newswave_theme_svg('seperator'); ?>
                            </div>
                            <div class="theme-widget-panel widget-panel-2">
                                <?php break;
                                default: ?>
                                    <div class="widget-story-list">
                                        <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article article-has-effect article-effect-zoom theme-list-post'); ?>>
                                            <div class="entry-details">
                                                <?php if ($instance['show_category']) { ?>
                                                    <div class="newswave-entry-categories">
                                                        <?php the_category(' '); ?>
                                                    </div>
                                                <?php } ?>
                                                <header class="entry-header mb-15">
                                                    <?php the_title('<h3 class="entry-title entry-title-medium"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                                </header>
                                                <?php if ($instance['show_date']) { ?>
                                                    <div class="newswave-meta post-date">
                                                        <?php newswave_theme_svg('calendar'); ?>
                                                        <?php
                                                        $date_format = $instance['date_format'];
                                                        if ('format_1' == $date_format) {
                                                            echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'newswave'));
                                                        } else {
                                                            echo esc_html(get_the_date());
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <?php
                                            if (has_post_thumbnail()) {
                                                ?>
                                                <div class="entry-image">
                                                    <figure class="featured-media featured-media-small">
                                                        <a href="<?php the_permalink() ?>">
                                                            <?php
                                                            the_post_thumbnail('medium', array(
                                                                'alt' => the_title_attribute(array(
                                                                    'echo' => false,
                                                                )),
                                                            ));
                                                            ?>
                                                        </a>
                                                        <?php if (newswave_get_option('show_lightbox_image')) { ?>
                                                            <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
                                                               class="featured-media-fullscreen" data-glightbox="">
                                                                <?php newswave_theme_svg('fullscreen'); ?>
                                                            </a>
                                                        <?php } ?>
                                                    </figure>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </article>
                                    </div>
                                    <?php if ($style_1_posts_query->current_post + 1 == $style_1_posts_query->post_count) { ?>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    break;
                                }
                                $i++; ?>
                                <?php wp_reset_postdata();
                        endwhile; ?>
                    </div>
                    <?php if (!empty($instance['button_text']) && !empty($cat_link)) { ?>
                        <div class="theme-footer-link theme-widget-footer">
                            <div class="theme-footer-panel widget-footer-panel">
                                <hr>
                                <a class="theme-viewmore-link"
                                   href="<?php echo esc_url($cat_link); ?>"><?php echo $instance['button_text']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } elseif ($display_orientation == 'layout-3') { ?>
                <div class="widget-layout widget-layout-3">
                    <?php if (!empty($instance['title'])) { ?>
                        <header class="theme-widget-header">
                            <div class="theme-widget-title">
                                <h2 class="widget-title">
                                    <?php echo $instance['title'] ?>
                                </h2>
                            </div>
                        </header>
                    <?php } ?>
                    <div class="theme-widget-content fullwidth-widget-content">
                        <?php
                        $i = 1;
                        while ($style_1_posts_query->have_posts()) :
                            $style_1_posts_query->the_post(); ?>
                            <?php if ($i == 1) { ?>
                            <div class="theme-widget-panel widget-panel-1">
                                <div class="widget-story-jumbotron">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article theme-article-mega article-has-effect article-effect-shine'); ?>>
                                        <?php
                                        if (has_post_thumbnail()) {
                                            ?>
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
                                            <?php
                                        }
                                        ?>

                                        <div class="entry-details">
                                            <?php if ($instance['show_category']) { ?>
                                                <div class="newswave-entry-categories">
                                                    <?php the_category(' '); ?>
                                                </div>
                                            <?php } ?>

                                            <header class="entry-header">
                                                <?php the_title( '<h3 class="entry-title entry-title-big"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                            </header>

                                            <?php if ($instance['show_date']) { ?>
                                                <div class="newswave-meta post-date mb-15">
                                                    <?php newswave_theme_svg('calendar'); ?>
                                                    <?php
                                                    $date_format = $instance['date_format'];
                                                    if ('format_1' == $date_format) {
                                                        echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'newswave'));
                                                    } else {
                                                        echo esc_html(get_the_date());
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                            <div class="entry-content entry-content-muted">
                                                <?php
                                                if (has_excerpt()) {
                                                    the_excerpt();
                                                } else {
                                                    echo '<p>';
                                                    echo esc_html(wp_trim_words(get_the_content(), 20, '...'));
                                                    echo '</p>';
                                                } ?>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="theme-widget-panel widget-panel-2 mt-20">
                            <?php $i++;
                            } else { ?>
                                <div class="widget-story-panel">

                                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article article-has-effect article-effect-zoom'); ?>>
                                        <?php
                                        if (has_post_thumbnail()) {
                                            ?>
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

                                                <?php if ($instance['show_category']) { ?>
                                                    <div class="newswave-entry-categories">
                                                        <?php the_category(' '); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <div class="entry-details mt-15">
                                            <?php if ($instance['show_date']) { ?>
                                                <div class="newswave-meta post-date mb-15">
                                                    <?php newswave_theme_svg('calendar'); ?>
                                                    <?php
                                                    $date_format = $instance['date_format'];
                                                    if ('format_1' == $date_format) {
                                                        echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'newswave'));
                                                    } else {
                                                        echo esc_html(get_the_date());
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                            <header class="entry-header">
                                                <?php the_title( '<h3 class="entry-title entry-title-medium"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                            </header>
                                        </div>
                                    </article>
                                </div>
                                <?php if ($style_1_posts_query->current_post + 1 == $style_1_posts_query->post_count) { ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <?php wp_reset_postdata();
                        endwhile; ?>
                    </div>
                    <?php if (!empty($instance['button_text']) && !empty($cat_link)) { ?>
                        <div class="theme-footer-link theme-widget-footer">
                            <div class="theme-footer-panel widget-footer-panel">
                                <hr>
                                <a class="theme-viewmore-link"
                                   href="<?php echo esc_url($cat_link); ?>"><?php echo $instance['button_text']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } elseif ($display_orientation == 'layout-4') { ?>
                <div class="widget-layout widget-layout-4">
                    <?php if (!empty($instance['title'])) { ?>
                        <header class="theme-widget-header">
                            <div class="theme-widget-title">
                                <h2 class="widget-title">
                                    <?php echo $instance['title'] ?>
                                </h2>
                            </div>
                        </header>
                    <?php } ?>
                    <div class="theme-widget-content fullwidth-widget-content">
                        <div class="theme-widget-panel widget-panel-1">
                            <?php
                            $i = 1;
                            while ($style_1_posts_query->have_posts()) :
                            $style_1_posts_query->the_post(); ?>
                            <?php if ($i <= 2) { ?>
                            <div class="widget-story">

                                <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article article-has-effect article-effect-slide'); ?>>
                                    <?php
                                    if (has_post_thumbnail()) {
                                        ?>
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

                                            <?php if ($instance['show_category']) { ?>
                                                <div class="newswave-entry-categories">
                                                    <?php the_category(' '); ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <div class="entry-details mt-15">
                                        <?php if ($instance['show_date']) { ?>
                                            <div class="newswave-meta post-date mb-15">
                                                <?php newswave_theme_svg('calendar'); ?>
                                                <?php
                                                $date_format = $instance['date_format'];
                                                if ('format_1' == $date_format) {
                                                    echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'newswave'));
                                                } else {
                                                    echo esc_html(get_the_date());
                                                }
                                                ?>
                                            </div>
                                            <?php
                                        }
                                        ?>


                                        <header class="entry-header">
                                            <?php the_title( '<h3 class="entry-title entry-title-medium"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                        </header>
                                    </div>
                                </article>
                            </div>
                            <?php if ($i == 2) { ?>
                        </div>
                        <div class="theme-widget-panel widget-panel-2">
                            <?php } ?>
                            <?php $i++;
                            } elseif ($i == 3 ) { ?>
                                <div class="widget-story mb-20">

                                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article article-has-effect article-effect-shine'); ?>>
                                        <?php
                                        if (has_post_thumbnail()) {
                                            ?>
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

                                                <?php if ($instance['show_category']) { ?>
                                                    <div class="newswave-entry-categories">
                                                        <?php the_category(' '); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <div class="entry-details mt-15">

                                            <?php if ($instance['show_date']) { ?>
                                                <div class="newswave-meta post-date mb-15">
                                                    <?php newswave_theme_svg('calendar'); ?>
                                                    <?php
                                                    $date_format = $instance['date_format'];
                                                    if ('format_1' == $date_format) {
                                                        echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'newswave'));
                                                    } else {
                                                        echo esc_html(get_the_date());
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            ?>


                                            <header class="entry-header">
                                                <?php the_title( '<h3 class="entry-title entry-title-medium"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                            </header>


                                            <div class="entry-content entry-content-muted content-muted-medium">
                                                <?php
                                                if (has_excerpt()) {
                                                    the_excerpt();
                                                } else {
                                                    echo '<p>';
                                                    echo esc_html(wp_trim_words(get_the_content(), 20, '...'));
                                                    echo '</p>';
                                                } ?>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                        </div>
                            <div class="theme-widget-panel widget-panel-3">
                            <?php $i++; } else {  ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article article-has-effect article-effect-zoom theme-list-post'); ?>>
                                    <?php
                                    if (has_post_thumbnail()) {
                                        ?>
                                        <div class="entry-image">
                                            <figure class="featured-media featured-media-thumbnail">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php
                                                    the_post_thumbnail('thumbnail', array(
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
                                        <?php
                                    }
                                    ?>

                                    <div class="entry-details">
                                        <header class="entry-header mb-10">
                                            <?php the_title( '<h3 class="entry-title entry-title-xsmall"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                        </header>
                                        <?php if ($instance['show_date']) {  ?>
                                            <div class="newswave-meta post-date">
                                                            <?php newswave_theme_svg('calendar'); ?>
                                                 <?php
    $date_format = $instance['date_format'];
    if ('format_1' == $date_format) {
        echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'newswave'));
    } else {
        echo esc_html(get_the_date());
    }
    ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </article>
                                <?php if ($style_1_posts_query->current_post + 1 == $style_1_posts_query->post_count) { ?>
                            </div>
                                <?php } ?>
                            <?php } wp_reset_postdata();
                            endwhile; ?>
                    </div>
                    <?php if (!empty($instance['button_text']) && !empty($cat_link)) { ?>
                        <div class="theme-footer-link theme-widget-footer">
                            <div class="theme-footer-panel widget-footer-panel">
                                <hr>
                                <a class="theme-viewmore-link"
                                   href="<?php echo esc_url($cat_link); ?>"><?php echo $instance['button_text']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } elseif ($display_orientation == 'layout-5') { ?>
                <div class="widget-layout widget-layout-5">
                <?php if (!empty($instance['title'])) { ?>
                    <header class="theme-widget-header">
                        <div class="theme-widget-title">
                            <h2 class="widget-title">
                                <?php echo $instance['title'] ?>
                            </h2>
                        </div>
                    </header>
                <?php } ?>
                <div class="theme-widget-content fullwidth-widget-content">
                    <div class="theme-widget-panel widget-panel-1">
                        <?php
                        $i = 1;
                        while ($style_1_posts_query->have_posts()) :
                        $style_1_posts_query->the_post(); ?>
                        <?php if ($i <= 4) { ?>
                        <div class="widget-story">

                            <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article article-has-effect article-effect-slide'); ?>>
                                <?php
                                if (has_post_thumbnail()) {
                                    ?>
                                    <div class="entry-image">
                                        <figure class="featured-media featured-media-medium">
                                            <a href="<?php the_permalink() ?>">
                                                <?php
                                                the_post_thumbnail('medium', array(
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

                                        <?php if ($instance['show_category']) { ?>
                                            <div class="newswave-entry-categories">
                                                <?php the_category(' '); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php
                                }
                                ?>

                                <div class="entry-details mt-15">

                                    <?php if ($instance['show_date']) { ?>
                                        <div class="newswave-meta post-date mb-15">
                                            <?php newswave_theme_svg('calendar'); ?>
                                            <?php
                                            $date_format = $instance['date_format'];
                                            if ('format_1' == $date_format) {
                                                echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'newswave'));
                                            } else {
                                                echo esc_html(get_the_date());
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>


                                    <header class="entry-header">
                                        <?php the_title( '<h3 class="entry-title entry-title-medium"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                    </header>
                                </div>
                            </article>
                        </div>
                        <?php if ($i == 4) { ?>
                    </div>
                    <div class="theme-widget-panel widget-panel-2">
                        <?php } ?>
                        <?php $i++;
                        } else { ?>

                                <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article article-has-effect article-effect-zoom theme-list-post'); ?>>
                                    <?php
                                    if (has_post_thumbnail()) {
                                        ?>
                                        <div class="entry-image">
                                            <figure class="featured-media featured-media-thumbnail">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php
                                                    the_post_thumbnail('thumbnail', array(
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
                                        <?php
                                    }
                                    ?>

                                    <div class="entry-details">
                                        <header class="entry-header mb-10">
                                            <?php the_title( '<h3 class="entry-title entry-title-xsmall"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                        </header>
                                        <?php if ($instance['show_date']) {  ?>
                                            <div class="newswave-meta post-date">
                                                        <?php newswave_theme_svg('calendar'); ?>
                                                 <?php
    $date_format = $instance['date_format'];
    if ('format_1' == $date_format) {
        echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'newswave'));
    } else {
        echo esc_html(get_the_date());
    }
    ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </article>

                            <?php if ($style_1_posts_query->current_post + 1 == $style_1_posts_query->post_count) {
                                echo '</div>';
                            } ?>
                        <?php } ?>
                        <?php wp_reset_postdata();
                        endwhile; ?>
                    </div>
                    <?php if (!empty($instance['button_text']) && !empty($cat_link)) { ?>
                        <div class="theme-footer-link theme-widget-footer">
                            <div class="theme-footer-panel widget-footer-panel">
                                <hr>
                                <a class="theme-viewmore-link"
                                   href="<?php echo esc_url($cat_link); ?>"><?php echo $instance['button_text']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        <?php endif; ?>
        <?php
        do_action('newswave_after_fullwidth_categories');
        echo $args['after_widget'];
        echo ob_get_clean();
    }
}