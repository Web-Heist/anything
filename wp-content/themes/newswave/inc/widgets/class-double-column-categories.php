<?php
if (!defined('ABSPATH')) {
    exit;
}

class Newswave_Double_Column_Categories extends Newswave_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'newswave_double_column_widget';
        $this->widget_description = __("Displays Double colum with multiple category widget", 'newswave');
        $this->widget_id = 'newswave-double-column-widget';
        $this->widget_name = __('Newswave: Double Categories', 'newswave');
        $this->settings = array(
            'title_1' => array(
                'type' => 'text',
                'label' => __('First Column: Title', 'newswave'),
                'std' => __('Double Categories Post Widget 1', 'newswave'),

            ),
            'select_category' => array(
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
            'title_2' => array(
                'type' => 'text',
                'label' => __('Second Column: Title', 'newswave'),
                'std' => __('Double Categories Post Widget 2', 'newswave'),
            ),
            'select_category_1' => array(
                'type' => 'dropdown-taxonomies',
                'label' => __('Second Column: Select Category', 'newswave'),
                'desc' => __('If you don\'t wish to specify a category for the posts, please leave this field empty.', 'newswave'),
                'args' => array(
                    'taxonomy' => 'category',
                    'class' => 'widefat',
                    'hierarchical' => true,
                    'show_count' => 1,
                    'show_option_all' => __('&mdash; Select &mdash;', 'newswave'),
                ),
            ),
            'show_featured_post' => array(
                'type' => 'checkbox',
                'label' => __('Disable Featured Post', 'newswave'),
                'std' => false,
            ),
            'show_category' => array(
                'type' => 'checkbox',
                'label' => __('Show Category', 'newswave'),
                'std' => true,
            ),
            'show_date' => array(
                'type' => 'checkbox',
                'label' => __('Show Date', 'newswave'),
                'std' => true,
            ),
            'show_excerpt' => array(
                'type' => 'checkbox',
                'label' => __('Show Excerpt', 'newswave'),
                'std' => false,
            ),
            'date_format' => array(
                'type' => 'select',
                'label' => __('Date Format', 'newswave'),
                'options' => array(
                    'format_1' => __('Format 1', 'newswave'),
                    'format_2' => __('Format 2', 'newswave'),
                ),
                'std' => 'format_2',
            ),
            'show_horizontal' => array(
                'type' => 'checkbox',
                'label' => __('Horizontal Layout', 'newswave'),
                'std' => false,
            ),
            'style' => array(
                'type' => 'select',
                'label' => __('Style', 'newswave'),
                'options' => array(
                    'style_1' => __('Style 1', 'newswave'),
                    'style_2' => __('Style 2', 'newswave'),
                ),
                'std' => 'style_1',
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
        do_action('newswave_before_double_column_categories');
        ?>
        <div class="theme-widget-panel">
        <div class="column-row">

            <?php for ($i=1; $i < 3 ; $i++) {
            $double_column_single_arg = array(
                'posts_per_page' => 5,
                'post_status' => 'publish',
                'no_found_rows' => 1,
                'ignore_sticky_posts' => 1,
            );
            if (!empty($instance['select_category_'.$i]) && -1 != $instance['select_category_'.$i] && 0 != $instance['select_category_'.$i]) {
                $double_column_single_arg['tax_query'][] = array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $instance['select_category'],
                );
            }
            $style = $instance['style'];
            $column_class='column-6';

            if ($instance['show_horizontal'] == true) {
                $column_class='column-12 widget-column-horizontal';
            }


            ?>





            <div class="column <?php echo esc_attr($column_class);?> column-sm-12">
                <header class="theme-widget-header">
                    <h2 class="widget-title"><?php echo $instance['title_'.$i]; ?></h2>
                </header>
                <div class="theme-widget-content">
                    <?php
                    $count = 1;
                    if ($instance['show_featured_post'] == true) {
                    $count = 2; ?>
                    <div class="theme-double-categories-widget theme-widget-list <?php echo esc_attr($style); ?>">
                        <?php }
                        $newswave_double_column_single_query = new WP_Query($double_column_single_arg);
                        if ($newswave_double_column_single_query->have_posts()):
                            while ($newswave_double_column_single_query->have_posts()):
                                $newswave_double_column_single_query->the_post();
                                ?>
                                <?php if ($count == 1) { ?>
                                <div class="theme-double-categories-widget theme-widget-focus">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article article-has-effect'); ?>>
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
                                            <?php
                                            if ($instance['show_date']) {
                                                ?>
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

                                            <?php if ($instance['show_excerpt']) { ?>
                                                <div class="entry-content">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </article>
                                </div>
                                <div class="theme-double-categories-widget theme-widget-list <?php echo esc_attr($style); ?>">
                                <?php $count++; } else { ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article theme-list-post'); ?>>
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
                                            <?php the_title( '<h3 class="entry-title entry-title-small"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                        </header>
                                        <?php
                                        if ($instance['show_date']) {
                                            ?>
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
                                <?php if ($newswave_double_column_single_query->current_post +1 == $newswave_double_column_single_query->post_count) { ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <?php } ?>


            </div>
        </div>
        <?php
        do_action('newswave_after_double_column_categories');
        echo $args['after_widget'];
        echo ob_get_clean();
    }
}