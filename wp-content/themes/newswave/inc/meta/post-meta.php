<?php
/**
* Sidebar Metabox.
*
* @package Newswave
*/
if( !function_exists( 'newswave_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function newswave_sanitize_sidebar_option_meta( $input ){

        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists('newswave_sanitize_meta_pagination') ):

    /** Sanitize Enable Disable Checkbox **/
    function newswave_sanitize_meta_pagination( $input ) {

        $valid_keys = array('global-layout','no-navigation','norma-navigation','ajax-next-post-load');
        if ( in_array( $input , $valid_keys ) ) {
            return $input;
        }
        return '';

    }

endif;

if( !function_exists( 'newswave_sanitize_post_layout_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function newswave_sanitize_post_layout_option_meta( $input ){

        $metabox_options = array( 'global-layout','layout-1','layout-2','layout-3' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;


if( !function_exists( 'newswave_sanitize_header_overlay_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function newswave_sanitize_header_overlay_option_meta( $input ){

        $metabox_options = array( 'global-layout','enable-overlay' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

add_action( 'add_meta_boxes', 'newswave_metabox' );

if( ! function_exists( 'newswave_metabox' ) ):


    function  newswave_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'newswave' ),
            'newswave_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'newswave' ),
            'newswave_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$newswave_page_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'newswave' ),
    'layout-2' => esc_html__( 'Banner Layout', 'newswave' ),
    'layout-3' => esc_html__( 'Default Layout', 'newswave' ),
);

$newswave_post_sidebar_fields = array(
    'global-sidebar' => array(
                    'id'        => 'post-global-sidebar',
                    'value' => 'global-sidebar',
                    'label' => esc_html__( 'Global sidebar', 'newswave' ),
                ),
    'right-sidebar' => array(
                    'id'        => 'post-left-sidebar',
                    'value' => 'right-sidebar',
                    'label' => esc_html__( 'Right sidebar', 'newswave' ),
                ),
    'left-sidebar' => array(
                    'id'        => 'post-right-sidebar',
                    'value'     => 'left-sidebar',
                    'label'     => esc_html__( 'Left sidebar', 'newswave' ),
                ),
    'no-sidebar' => array(
                    'id'        => 'post-no-sidebar',
                    'value'     => 'no-sidebar',
                    'label'     => esc_html__( 'No sidebar', 'newswave' ),
                ),
);

$newswave_post_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'newswave' ),
    'layout-2' => esc_html__( 'Banner Layout', 'newswave' ),
    'layout-3' => esc_html__( 'Default Layout', 'newswave' ),

);

$newswave_header_overlay_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'newswave' ),
    'enable-overlay' => esc_html__( 'Enable Header Overlay', 'newswave' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'newswave_post_metafield_callback' ) ):
    
    function newswave_post_metafield_callback() {
        global $post, $newswave_post_sidebar_fields, $newswave_post_layout_options,  $newswave_page_layout_options, $newswave_header_overlay_options;
        $post_type = get_post_type($post->ID);
        wp_nonce_field( basename( __FILE__ ), 'newswave_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-appearance"  class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('Appearance Settings', 'newswave'); ?>

                        </a>
                    </li>

                    <?php if ($post_type != 'page') { ?>
                        <li>
                            <a id="metabox-navbar-general" href="javascript:void(0)">

                                <?php esc_html_e('General Settings', 'newswave'); ?>

                            </a>
                        </li>
                    <?php } ?>


                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'newswave'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Sidebar Layout','newswave'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $newswave_post_sidebar = esc_html( get_post_meta( $post->ID, 'newswave_post_sidebar_option', true ) ); 
                            if( $newswave_post_sidebar == '' ){ $newswave_post_sidebar = 'global-sidebar'; }

                            foreach ( $newswave_post_sidebar_fields as $newswave_post_sidebar_field) { ?>

                                <label class="description">

                                    <input type="radio" name="newswave_post_sidebar_option" value="<?php echo esc_attr( $newswave_post_sidebar_field['value'] ); ?>" <?php if( $newswave_post_sidebar_field['value'] == $newswave_post_sidebar ){ echo "checked='checked'";} if( empty( $newswave_post_sidebar ) && $newswave_post_sidebar_field['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $newswave_post_sidebar_field['label'] ); ?>

                                </label>

                            <?php } ?>

                        </div>

                    </div>

                </div>


                <div id="metabox-navbar-appearance-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <?php if( $post_type == 'page' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Banner Layout','newswave'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $newswave_page_layout = esc_html( get_post_meta( $post->ID, 'newswave_page_layout', true ) ); 
                                if( $newswave_page_layout == '' ){ $newswave_page_layout = 'layout-1'; }

                                foreach ( $newswave_page_layout_options as $key => $newswave_page_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="newswave_page_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $newswave_page_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $newswave_page_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','newswave'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                <?php
                                $newswave_ed_header_overlay = esc_attr( get_post_meta( $post->ID, 'newswave_ed_header_overlay', true ) ); ?>

                                <input type="checkbox" id="newswave-header-overlay" name="newswave_ed_header_overlay" value="1" <?php if( $newswave_ed_header_overlay ){ echo "checked='checked'";} ?>/>

                                <label for="newswave-header-overlay"><?php esc_html_e( 'Enable Header Overlay','newswave' ); ?></label>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if( $post_type == 'post' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Title Layout','newswave'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $newswave_post_layout = esc_html( get_post_meta( $post->ID, 'newswave_post_layout', true ) ); 

                                foreach ( $newswave_post_layout_options as $key => $newswave_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="newswave_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $newswave_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $newswave_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','newswave'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $newswave_header_overlay = esc_html( get_post_meta( $post->ID, 'newswave_header_overlay', true ) ); 
                                if( $newswave_header_overlay == '' ){ $newswave_header_overlay = 'global-layout'; }

                                foreach ( $newswave_header_overlay_options as $key => $newswave_header_overlay_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="newswave_header_overlay" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $newswave_header_overlay ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $newswave_header_overlay_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                    <?php endif; ?>

                </div>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $newswave_ed_post_views = esc_html( get_post_meta( $post->ID, 'newswave_ed_post_views', true ) );
                    $newswave_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'newswave_ed_post_read_time', true ) );
                    $newswave_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'newswave_ed_post_like_dislike', true ) );
                    $newswave_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'newswave_ed_post_author_box', true ) );
                    $newswave_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'newswave_ed_post_social_share', true ) );
                    $newswave_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'newswave_ed_post_reaction', true ) );
                    $newswave_ed_post_rating = esc_html( get_post_meta( $post->ID, 'newswave_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','newswave'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="newswave-ed-post-views" name="newswave_ed_post_views" value="1" <?php if( $newswave_ed_post_views ){ echo "checked='checked'";} ?>/>
                                    <label for="newswave-ed-post-views"><?php esc_html_e( 'Disable Post Views','newswave' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="newswave-ed-post-read-time" name="newswave_ed_post_read_time" value="1" <?php if( $newswave_ed_post_read_time ){ echo "checked='checked'";} ?>/>
                                    <label for="newswave-ed-post-read-time"><?php esc_html_e( 'Disable Post Read Time','newswave' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="newswave-ed-post-like-dislike" name="newswave_ed_post_like_dislike" value="1" <?php if( $newswave_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                    <label for="newswave-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','newswave' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="newswave-ed-post-author-box" name="newswave_ed_post_author_box" value="1" <?php if( $newswave_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                    <label for="newswave-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','newswave' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="newswave-ed-post-social-share" name="newswave_ed_post_social_share" value="1" <?php if( $newswave_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                    <label for="newswave-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','newswave' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="newswave-ed-post-reaction" name="newswave_ed_post_reaction" value="1" <?php if( $newswave_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                    <label for="newswave-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','newswave' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="newswave-ed-post-rating" name="newswave_ed_post_rating" value="1" <?php if( $newswave_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                    <label for="newswave-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','newswave' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'newswave_save_post_meta' );

if( ! function_exists( 'newswave_save_post_meta' ) ):

    function newswave_save_post_meta( $post_id ) {

        global $post, $newswave_post_sidebar_fields, $newswave_post_layout_options, $newswave_header_overlay_options,  $newswave_page_layout_options;

        if ( !isset( $_POST[ 'newswave_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['newswave_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){

            return;

        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }


        foreach ( $newswave_post_sidebar_fields as $newswave_post_sidebar_field ) {  
            

                $old = esc_html( get_post_meta( $post_id, 'newswave_post_sidebar_option', true ) ); 
                $new = isset( $_POST['newswave_post_sidebar_option'] ) ? newswave_sanitize_sidebar_option_meta( wp_unslash( $_POST['newswave_post_sidebar_option'] ) ) : '';

                if ( $new && $new != $old ){

                    update_post_meta ( $post_id, 'newswave_post_sidebar_option', $new );

                }elseif( '' == $new && $old ) {

                    delete_post_meta( $post_id,'newswave_post_sidebar_option', $old );

                }

            
        }

        $twp_disable_ajax_load_next_post_old = esc_html( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 
        $twp_disable_ajax_load_next_post_new = isset( $_POST['twp_disable_ajax_load_next_post'] ) ? newswave_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) ) : '';

        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }


        foreach ( $newswave_post_layout_options as $newswave_post_layout_option ) {  
            
            $newswave_post_layout_old = esc_html( get_post_meta( $post_id, 'newswave_post_layout', true ) ); 
            $newswave_post_layout_new = isset( $_POST['newswave_post_layout'] ) ? newswave_sanitize_post_layout_option_meta( wp_unslash( $_POST['newswave_post_layout'] ) ) : '';

            if ( $newswave_post_layout_new && $newswave_post_layout_new != $newswave_post_layout_old ){

                update_post_meta ( $post_id, 'newswave_post_layout', $newswave_post_layout_new );

            }elseif( '' == $newswave_post_layout_new && $newswave_post_layout_old ) {

                delete_post_meta( $post_id,'newswave_post_layout', $newswave_post_layout_old );

            }
            
        }



        foreach ( $newswave_header_overlay_options as $newswave_header_overlay_option ) {  
            
            $newswave_header_overlay_old = esc_html( get_post_meta( $post_id, 'newswave_header_overlay', true ) ); 
            $newswave_header_overlay_new = isset( $_POST['newswave_header_overlay'] ) ? newswave_sanitize_header_overlay_option_meta( wp_unslash( $_POST['newswave_header_overlay'] ) ) : '';

            if ( $newswave_header_overlay_new && $newswave_header_overlay_new != $newswave_header_overlay_old ){

                update_post_meta ( $post_id, 'newswave_header_overlay', $newswave_header_overlay_new );

            }elseif( '' == $newswave_header_overlay_new && $newswave_header_overlay_old ) {

                delete_post_meta( $post_id,'newswave_header_overlay', $newswave_header_overlay_old );

            }
            
        }


        $newswave_ed_post_views_old = esc_html( get_post_meta( $post_id, 'newswave_ed_post_views', true ) ); 
        $newswave_ed_post_views_new = isset( $_POST['newswave_ed_post_views'] ) ? absint( wp_unslash( $_POST['newswave_ed_post_views'] ) ) : '';

        if ( $newswave_ed_post_views_new && $newswave_ed_post_views_new != $newswave_ed_post_views_old ){

            update_post_meta ( $post_id, 'newswave_ed_post_views', $newswave_ed_post_views_new );

        }elseif( '' == $newswave_ed_post_views_new && $newswave_ed_post_views_old ) {

            delete_post_meta( $post_id,'newswave_ed_post_views', $newswave_ed_post_views_old );

        }



        $newswave_ed_post_read_time_old = esc_html( get_post_meta( $post_id, 'newswave_ed_post_read_time', true ) ); 
        $newswave_ed_post_read_time_new = isset( $_POST['newswave_ed_post_read_time'] ) ? absint( wp_unslash( $_POST['newswave_ed_post_read_time'] ) ) : '';

        if ( $newswave_ed_post_read_time_new && $newswave_ed_post_read_time_new != $newswave_ed_post_read_time_old ){

            update_post_meta ( $post_id, 'newswave_ed_post_read_time', $newswave_ed_post_read_time_new );

        }elseif( '' == $newswave_ed_post_read_time_new && $newswave_ed_post_read_time_old ) {

            delete_post_meta( $post_id,'newswave_ed_post_read_time', $newswave_ed_post_read_time_old );

        }



        $newswave_ed_post_like_dislike_old = esc_html( get_post_meta( $post_id, 'newswave_ed_post_like_dislike', true ) ); 
        $newswave_ed_post_like_dislike_new = isset( $_POST['newswave_ed_post_like_dislike'] ) ? absint( wp_unslash( $_POST['newswave_ed_post_like_dislike'] ) ) : '';

        if ( $newswave_ed_post_like_dislike_new && $newswave_ed_post_like_dislike_new != $newswave_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'newswave_ed_post_like_dislike', $newswave_ed_post_like_dislike_new );

        }elseif( '' == $newswave_ed_post_like_dislike_new && $newswave_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'newswave_ed_post_like_dislike', $newswave_ed_post_like_dislike_old );

        }



        $newswave_ed_post_author_box_old = esc_html( get_post_meta( $post_id, 'newswave_ed_post_author_box', true ) ); 
        $newswave_ed_post_author_box_new = isset( $_POST['newswave_ed_post_author_box'] ) ? absint( wp_unslash( $_POST['newswave_ed_post_author_box'] ) ) : '';

        if ( $newswave_ed_post_author_box_new && $newswave_ed_post_author_box_new != $newswave_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'newswave_ed_post_author_box', $newswave_ed_post_author_box_new );

        }elseif( '' == $newswave_ed_post_author_box_new && $newswave_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'newswave_ed_post_author_box', $newswave_ed_post_author_box_old );

        }



        $newswave_ed_post_social_share_old = esc_html( get_post_meta( $post_id, 'newswave_ed_post_social_share', true ) ); 
        $newswave_ed_post_social_share_new = isset( $_POST['newswave_ed_post_social_share'] ) ? absint( wp_unslash( $_POST['newswave_ed_post_social_share'] ) ) : '';

        if ( $newswave_ed_post_social_share_new && $newswave_ed_post_social_share_new != $newswave_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'newswave_ed_post_social_share', $newswave_ed_post_social_share_new );

        }elseif( '' == $newswave_ed_post_social_share_new && $newswave_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'newswave_ed_post_social_share', $newswave_ed_post_social_share_old );

        }



        $newswave_ed_post_reaction_old = esc_html( get_post_meta( $post_id, 'newswave_ed_post_reaction', true ) ); 
        $newswave_ed_post_reaction_new = isset( $_POST['newswave_ed_post_reaction'] ) ? absint( wp_unslash( $_POST['newswave_ed_post_reaction'] ) ) : '';

        if ( $newswave_ed_post_reaction_new && $newswave_ed_post_reaction_new != $newswave_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'newswave_ed_post_reaction', $newswave_ed_post_reaction_new );

        }elseif( '' == $newswave_ed_post_reaction_new && $newswave_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'newswave_ed_post_reaction', $newswave_ed_post_reaction_old );

        }



        $newswave_ed_post_rating_old = esc_html( get_post_meta( $post_id, 'newswave_ed_post_rating', true ) ); 
        $newswave_ed_post_rating_new = isset( $_POST['newswave_ed_post_rating'] ) ? absint( wp_unslash( $_POST['newswave_ed_post_rating'] ) ) : '';

        if ( $newswave_ed_post_rating_new && $newswave_ed_post_rating_new != $newswave_ed_post_rating_old ){

            update_post_meta ( $post_id, 'newswave_ed_post_rating', $newswave_ed_post_rating_new );

        }elseif( '' == $newswave_ed_post_rating_new && $newswave_ed_post_rating_old ) {

            delete_post_meta( $post_id,'newswave_ed_post_rating', $newswave_ed_post_rating_old );

        }

        foreach ( $newswave_page_layout_options as $newswave_post_layout_option ) {  
        
            $newswave_page_layout_old = sanitize_text_field( get_post_meta( $post_id, 'newswave_page_layout', true ) ); 
            $newswave_page_layout_new = isset( $_POST['newswave_page_layout'] ) ? newswave_sanitize_post_layout_option_meta( wp_unslash( $_POST['newswave_page_layout'] ) ) : '';

            if ( $newswave_page_layout_new && $newswave_page_layout_new != $newswave_page_layout_old ){

                update_post_meta ( $post_id, 'newswave_page_layout', $newswave_page_layout_new );

            }elseif( '' == $newswave_page_layout_new && $newswave_page_layout_old ) {

                delete_post_meta( $post_id,'newswave_page_layout', $newswave_page_layout_old );

            }
            
        }

        $newswave_ed_header_overlay_old = absint( get_post_meta( $post_id, 'newswave_ed_header_overlay', true ) ); 
        $newswave_ed_header_overlay_new = isset( $_POST['newswave_ed_header_overlay'] ) ? absint( wp_unslash( $_POST['newswave_ed_header_overlay'] ) ) : '';

        if ( $newswave_ed_header_overlay_new && $newswave_ed_header_overlay_new != $newswave_ed_header_overlay_old ){

            update_post_meta ( $post_id, 'newswave_ed_header_overlay', $newswave_ed_header_overlay_new );

        }elseif( '' == $newswave_ed_header_overlay_new && $newswave_ed_header_overlay_old ) {

            delete_post_meta( $post_id,'newswave_ed_header_overlay', $newswave_ed_header_overlay_old );

        }

    }

endif;   