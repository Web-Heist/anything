<?php
/**
 * Displays Category Section
 *
 * @package Newswave
 */
$enable_category_section = newswave_get_option('enable_category_section');
$number_of_category = newswave_get_option('number_of_category');
$category_post_title = newswave_get_option('category_post_title');
if ($enable_category_section) {
    ?>
    <section class="site-section site-categories-section">
        <div class="wrapper">
            <div class="column-row">
                <?php
                for ($x = 1; $x <= $number_of_category; $x++) {
                    $c_category = get_theme_mod('select_featured_cat_' . $x);
                    if ($c_category) {
                        $cat_obj = get_category_by_slug($c_category);
                        $cat_name = isset($cat_obj->name) ? $cat_obj->name : '';
                        $cat_id = isset($cat_obj->term_id) ? $cat_obj->term_id : '';
                        $count = isset($cat_obj->count) ? $cat_obj->count : '';
                        $cat_link = get_category_link($cat_id);
                        $twp_term_image = get_term_meta($cat_id, 'twp-term-featured-image', true); ?>
                        <div class="column column-4 column-sm-12">
                            <div class="site-categories-panel">
                                <?php if (!empty($twp_term_image)) { ?>
                                    <a href="<?php echo esc_url($cat_link); ?>" class="">
                                        <img src="<?php echo esc_url($twp_term_image); ?>">
                                    </a>
                                <?php } ?>
                                <?php
                                if ($cat_name) { ?>
                                    <a href="<?php echo esc_url($cat_link); ?>" class="btn-readmore">
                                        <span><?php echo esc_html($cat_name); ?></span>
                                        <?php
                                        if ($count) { ?>
                                            <span><?php echo esc_html($count); ?></span>
                                        <?php } ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                    }
                } ?>
            </div>
        </div>
    </section>
<?php }