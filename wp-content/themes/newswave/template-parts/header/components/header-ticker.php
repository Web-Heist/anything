<?php
/**
 * Displays Header Ticker
 *
 * @package Newswave
 */
$enable_ticker_post_image = newswave_get_option('enable_ticker_post_image');
$ticker_post_category = newswave_get_option('ticker_post_category');
$ticker_text = newswave_get_option('ticker_text');
$ticker_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 7, 'post__not_in' => get_option("sticky_posts"), 'category__in' => $ticker_post_category));
if ($ticker_post_query->have_posts()): ?>
    <section class="site-section site-ticker-section">
        <?php if (!empty($ticker_text)) { ?>
            <div class="wrapper">
                <header class="section-header site-section-header">
                    <h2 class="site-section-title">
                        <?php echo esc_html($ticker_text); ?>
                    </h2>
                </header>
            </div>
        <?php } ?>
        <div class="wrapper">
            <div class="site-newsticker">
                <div class="site-breaking-news swiper">
                    <div class="swiper-wrapper">
                        <?php while ($ticker_post_query->have_posts()):
                            $ticker_post_query->the_post();
                            ?>
                            <div class="swiper-slide breaking-news-slide">
                                <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-list-post'); ?>>
                                    <?php if (has_post_thumbnail() && ($enable_ticker_post_image = true)) { ?>
                                        <div class="entry-image">
                                            <figure class="featured-media featured-media-thumbnail has-box-shadow">
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
                                        <div class="newswave-entry-categories">
                                            <?php the_category(' '); ?>
                                        </div>

                                        <?php the_title( '<h3 class="entry-title entry-title-small"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                    </div>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="swiper-secondary-controls ticker-button-next">
                    <?php newswave_theme_svg('chevron-right'); ?>
                </div>
                <div class="swiper-secondary-controls ticker-button-prev">
                    <?php newswave_theme_svg('chevron-left'); ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    wp_reset_postdata();
endif;
