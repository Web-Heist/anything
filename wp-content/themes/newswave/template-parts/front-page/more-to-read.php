<?php

/**
 * Displays recommended post on footer.
 *
 * @package Newswave
 */
$enable_date_meta = newswave_get_option('enable_date_meta');
$enable_post_excerpt = newswave_get_option('enable_post_excerpt');
$read_more_post_title = newswave_get_option('read_more_post_title');
$read_more_style = newswave_get_option('read_more_style');
$select_cat_for_read_more_post = newswave_get_option('select_cat_for_read_more_post');
$article_class = 'article-has-effect mb-20';
$article_title_class = 'entry-title-small mt-10';
$post_thumbnail = 'featured-media-small';
$post_thumbnail_size = 'medium';
if ($read_more_style == 'style-2') {
    $article_class = 'theme-tiles-post';
    $article_title_class = 'entry-title-small';
    $post_thumbnail = 'featured-media-medium';
    $post_thumbnail_size = 'medium_large';
}
?>
<section class="site-section site-read-more-section">
    <div class="wrapper">
        <div class="column-row">
            <div class="column column-12">
                <header class="section-header site-section-header">
                    <h2 class="site-section-title">
                        <?php echo esc_html($read_more_post_title); ?>
                    </h2>
                </header>
            </div>
        </div>
        <div class="column-row">
            <?php $more_to_read_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 6, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($select_cat_for_read_more_post)));
            if ($more_to_read_post_query->have_posts()) :
                while ($more_to_read_post_query->have_posts()) : $more_to_read_post_query->the_post();
            ?>
                    <div class="column column-4 column-sm-6 column-xs-12">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post article-has-effect article-effect-zoom ' . $article_class); ?>>
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="entry-image">
                                    <figure class="featured-media <?php echo $post_thumbnail; ?>">
                                        <a href="<?php the_permalink() ?>" class="featured-media-link">
                                            <?php
                                            the_post_thumbnail($post_thumbnail_size, array(
                                                'alt' => the_title_attribute(array(
                                                    'echo' => false,
                                                )),
                                            ));
                                            ?>
                                        </a>
                                    </figure>
                                    <?php if ($read_more_style != 'style-2') { ?>
                                        <div class="newswave-entry-categories">
                                            <?php the_category(' '); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <div class="entry-details">

                                <?php if ($read_more_style == 'style-2') { ?>
                              <div class="newswave-entry-categories">
        <?php the_category(' '); ?>
    </div>
                                <?php } ?>

                                <header class="entry-header">
                                    <?php the_title('<h3 class="entry-title ' . $article_title_class . '"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                </header>

                                <div class="entry-meta">
                                    <?php if ($enable_date_meta) { ?>
                                        <div class="newswave-meta post-date">
                                            <?php newswave_theme_svg('calendar'); ?>
                                            <?php echo esc_html(get_the_date()); ?>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </article>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
        </div>
    </div>
</section>
<?php endif; ?>