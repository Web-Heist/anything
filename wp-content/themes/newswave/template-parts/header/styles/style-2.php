<?php

$is_sticky = newswave_get_option('enable_sticky_menu');

$enable_dark_mode = newswave_get_option('enable_dark_mode');
$enable_dark_mode_switcher = newswave_get_option('enable_dark_mode_switcher');
$upload_header_add_image = newswave_get_option('upload_header_add_image');
$ad_header_banner_link = newswave_get_option('ad_header_banner_link');

$enable_search = newswave_get_option('enable_search_on_header');
?>
<div class="masthead-mid-navigation">
    <div class="wrapper">
        <div class="site-header-wrapper">
            <div class="site-header-left">
                <div class="masthead-middle-panel">
                    <?php get_template_part('template-parts/header/site-branding'); ?>
                </div>
            </div>
            <div class="site-header-right">
                <div class="masthead-header-banner">
                    <a href="<?php echo esc_url($ad_header_banner_link ); ?>" target="_blank">
                        <img src="<?php echo esc_url($upload_header_add_image ); ?>" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="masthead-main-navigation <?php echo ($is_sticky) ? 'has-sticky-header' : ''; ?>">
    <div class="wrapper">
        <div class="site-header-wrapper">
            <div class="site-header-left">
                <div id="site-navigation" class="main-navigation theme-primary-menu">
                    <?php
                    if (has_nav_menu('primary-menu')) {
                        ?>
                        <nav class="primary-menu-wrapper"
                             aria-label="<?php echo esc_attr_x('Primary', 'menu', 'newswave'); ?>">
                            <ul class="primary-menu reset-list-style">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'primary-menu'
                                    )
                                );
                                ?>
                            </ul>
                        </nav><!-- .primary-menu-wrapper -->
                        <?php
                    } else { ?>
                        <nav class="primary-menu-wrapper"
                             aria-label="<?php echo esc_attr_x('Primary', 'menu', 'newswave'); ?>">
                            <ul class="primary-menu reset-list-style">
                                <?php
                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                    )
                                );

                                ?>
                            </ul>
                        </nav><!-- .primary-menu-wrapper -->

                    <?php } ?>
                </div><!-- .main-navigation -->
            </div>

            <div class="site-header-right">
                <?php $blog_mini_cart = newswave_get_option('enable_mini_cart_header');
                if ($blog_mini_cart && class_exists('WooCommerce')) {
                    newswave_woocommerce_cart_count();
                } ?>

                <?php
                $enable_random_post = newswave_get_option('enable_random_post');
                if ($enable_random_post) {
                    $random_post_category = newswave_get_option('random_post_category');
                    $rand_posts_arg = array(
                        'posts_per_page' => 1,
                        'orderby' => 'rand'
                    );
                    if ($random_post_category) {
                        $rand_posts_arg['cat'] = absint($random_post_category);
                    }
                    $rand_posts = get_posts($rand_posts_arg);

                    if ($rand_posts) {
                        ?>
                        <a href="<?php echo esc_url(get_permalink($rand_posts[0]->ID)); ?>"
                           class="theme-button theme-button-transparent theme-button-shuffle">
                            <span class="screen-reader-text"><?php _e('Shuffle', 'newswave'); ?></span>
                            <?php newswave_theme_svg('shuffle'); ?>
                        </a>
                        <?php
                    }
                }
                ?>

                <button id="theme-toggle-offcanvas-button" class="hide-on-desktop theme-button theme-button-transparent theme-button-offcanvas" aria-expanded="false" aria-controls="theme-offcanvas-navigation">
                    <span class="screen-reader-text"><?php _e('Menu', 'newswave'); ?></span>
                    <span class="toggle-icon"><?php newswave_theme_svg('menu'); ?></span>
                </button>

                <?php if ($enable_dark_mode && $enable_dark_mode_switcher) : ?>
                    <button id="theme-toggle-mode-button" class="theme-button theme-button-transparent theme-button-colormode" title="<?php _e('Toggle light/dark mode', 'newswave'); ?>" aria-label="auto" aria-live="polite">
                        <span class="screen-reader-text"><?php _e('Switch color mode', 'newswave'); ?></span>
                        <span id="colormode-switch-area">
                            <span class="mode-icon-change"></span>
                            <span id="mode-icon-switch"></span>
                        </span>
                    </button>
                <?php endif; ?>

                <?php if ( $enable_search ) : ?>
                <button id="theme-toggle-search-button" class="theme-button theme-button-transparent theme-button-search" aria-expanded="false" aria-controls="theme-header-search">
                    <span class="screen-reader-text"><?php _e('Search', 'newswave'); ?></span>
                    <?php newswave_theme_svg('search'); ?>
                </button>
                <?php endif; ?>

            </div>
        </div>
    </div>

</div>