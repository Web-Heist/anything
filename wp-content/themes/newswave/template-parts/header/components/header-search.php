<?php
/**
 * Displays Search
 *
 * @package Newswave
 */

?>

<div class="theme-search-panel">
    <div class="wrapper">
        <div id="theme-header-search" class="search-panel-wrapper">
            <?php
            get_search_form(
                array(
                    'aria_label' => __('Search for:', 'newswave'),
                )
            );
            ?>
            <button id="newswave-search-canvas-close" class="theme-button theme-button-transparent search-close">
                <span class="screen-reader-text">
                    <?php _e('Close search', 'newswave'); ?>
                </span>
                <?php newswave_theme_svg('close'); ?>
            </button><!-- .search-toggle -->

        </div>
    </div>
</div> <!-- theme-search-panel -->