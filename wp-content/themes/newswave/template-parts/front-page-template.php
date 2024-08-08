<?php
/*
*Template Name: Homepage Template
*/
get_header();
?>
<?php if (is_active_sidebar('front-page-main-content-area') || is_active_sidebar('front-page-sidebar-area') || is_active_sidebar('front-page-full-content-area')) {  ?>
    <main id="site-content" role="main">
        <div class="wrapper">
            <?php if (is_active_sidebar('front-page-main-content-area')) : ?>
                <div id="primary" class="content-area theme-widgetarea theme-sticky-component">
                    <?php dynamic_sidebar('front-page-main-content-area'); ?>
                </div>
            <?php endif; ?>

            <?php if (is_active_sidebar('front-page-sidebar-area')) : ?>
                <aside id="secondary" class="widget-area theme-widgetarea theme-sticky-component">
                    <?php dynamic_sidebar('front-page-sidebar-area'); ?>
                </aside>
            <?php endif; ?>
        </div>
        <?php
        $enable_widget_separator_section = newswave_get_option('enable_widget_separator_section');
        if ($enable_widget_separator_section) {
            get_template_part('template-parts/front-page/widget_separator_with_image');
        } ?>

        <?php if (is_active_sidebar('front-page-full-content-area')) : ?>
            <section class="theme-frontpage-widgetarea theme-widgetarea theme-widgetarea-full">
                <?php dynamic_sidebar('front-page-full-content-area'); ?>
            </section>
        <?php endif; ?>

    </main>
<?php } ?>

<?php get_footer();