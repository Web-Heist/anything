<?php
/**
 * Displays Header Trending Tags
 *
 * @package Newswave
 */
$latest_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 50, 'post__not_in' => get_option("sticky_posts")));
$tag_lists = array();
if ($latest_post_query->have_posts()):
    while ($latest_post_query->have_posts()):
        $latest_post_query->the_post();
        $tags = get_the_tags(get_the_ID());
        if ($tags) {
            foreach ($tags as $tag) {
                if (!in_array($tag->term_id, $tag_lists)) {
                    $tag_lists[$tag->term_id] = $tag->count;
                }
            }
        }
    endwhile;
endif;
arsort($tag_lists);
$show_top_tagged_section = newswave_get_option('show_top_tagged_section');
$top_tagged_title = newswave_get_option('top_tagged_title');
$top_tagged_number = newswave_get_option('top_tagged_number');
if ($show_top_tagged_section) { ?>
    <section class="site-section trending-tags-section">
        <div class="wrapper">
            <div class="trending-tags-wrapper">
                <div class="trending-tags-icon">
                    <?php newswave_theme_svg('arrow-graph-up'); ?>
                </div>
                <?php if ($top_tagged_title) { ?>
                    <div class="trending-tags-title">
                        <header class="section-header site-section-header">
                            <h2 class="site-section-title alt-font"> <?php echo esc_html($top_tagged_title); ?></h2>
                        </header>
                    </div>
                <?php } ?>
                <div class="trending-tags-panel">
                    <?php
                    if ($tag_lists) {
                        $count = 1;
                        foreach ($tag_lists as $key => $value) {
                            $tag = get_tag($key);
                            ?>
                            <a href="<?php echo esc_url(get_tag_link($key)); ?>" class="trending-tags-link">
                                <?php echo '#' . esc_html($tag->name); ?>
                                
                            </a>
                            <?php
                            if ($count == $top_tagged_number) {
                                break;
                            }
                            $count++;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>