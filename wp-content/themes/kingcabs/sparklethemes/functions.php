<?php
/**
 * Main Custom admin functions area
 *
 * @since SparklewpThemes
 *
 * @param Kingcabs
 */


/**
 * Sets the Kingcabs Template Instead of front-page.
 */
function kingcabs_fp_template_set( $template ) {
  $kingcabs_set_original_fp = get_theme_mod( 'kingcabs_set_original_fp' ,false);
  if ( $kingcabs_set_original_fp ) {
    return is_home() ? '' : $template;
  } else {
    return '';
  }
}
add_filter( 'frontpage_template', 'kingcabs_fp_template_set' );


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function kingcabs_custom_excerpt_length( $length ) {
    if( is_admin() ){

    return $length;

    }elseif( is_front_page() ){

        return 24;

    }elseif( is_home() ){

        return 55;

    }else{

        return 55;

    }
}
add_filter( 'excerpt_length', 'kingcabs_custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function kingcabs_excerpt_more( $more ) {
    if(is_admin() ){

        return $more;

    }
    
    return '&period;&period;&period;';
}
add_filter( 'excerpt_more', 'kingcabs_excerpt_more' );


/**
 * WooCommerce Section Start Here
*/
if ( ! function_exists( 'kingcabs_is_woocommerce_activated' ) ) {

    function kingcabs_is_woocommerce_activated() {

        if ( class_exists( 'WooCommerce' ) ) { return true; } else { return false; }

    }
    
}

/**
 * Main Section Title Function Area
*/
if ( ! function_exists( 'kincabs_main_title' ) ) {

    function kincabs_main_title( $kingcabstitle, $kincabsicon, $kingcabssubtittle ) { ?>

        <?php if($kingcabstitle || $kincabsicon || $kingcabssubtittle){ ?>
           
            <div class="section-title text-center">  

                <?php if($kingcabstitle){ ?>

                    <h2><?php echo esc_html( $kingcabstitle ); ?></h2>

                <?php } ?>

                <?php if($kincabsicon){ ?>

                    <div class="after">

                        <span></span><i class="<?php echo esc_attr($kincabsicon); ?>"></i><span></span>

                    </div>

                <?php } ?>

                <?php if($kingcabssubtittle){ ?>

                    <div class="desc-text"><?php echo esc_html( $kingcabssubtittle ); ?></div>

                <?php } ?>
            </div>
        <?php } ?>
    
    <?php

    }
    
}



/**
 * Breadcumbs Function
*/

if( ! function_exists( 'kingcabs_footer_top_action' ) ) :

    function kingcabs_breadcumbs_action() {
     if( !is_front_page() ){ ?> 
     
        <div class="bread-cumb">
            <div class="container">
                <h3>
                    <?php 
                        if( is_category() || is_archive() ){

                            the_archive_title( '<span>', '</span>' );

                        }elseif( is_search() ){

                            /* translators: %s: search query. */
                            printf( esc_html__( 'Search Results for: %s', 'kingcabs' ), '<span>' . get_search_query() . '</span>' );

                        }elseif( is_404() ){

                            esc_html_e('404 Not Found','kingcabs');

                        }else{

                             the_title(); 
                        }
                    ?>
                </h3>
                <div id="breadcrumb">
                    <?php
                        $breadcrumb_args = array(
                            'container'   => 'div',
                            'show_browse' => false,
                        );

                        kingcabs_breadcrumb_trail( $breadcrumb_args );
                    ?>
                </div>
            </div>
        </div>

    <?php } } endif;

add_action( 'kingcabs_breadcumbs', 'kingcabs_breadcumbs_action', 10 );

/**
  * Footer Copyright Information
 */
if ( ! function_exists( 'kingcabs_footer_copyright' ) ){
    function kingcabs_footer_copyright() {
        $copyright = get_theme_mod( 'kingcabs_footer_buttom_copyright_setting' ); 
        if( !empty( $copyright ) ) { 
            echo apply_filters( 'kingcabs_copyright_text', wp_kses_post( $copyright ) . ' ' ); 
        } else { 
            echo esc_html( apply_filters( 'kingcabs_copyright_text', $content = esc_html__('Copyright  &copy; ','kingcabs') . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) .' - ' ) );
        }
        printf( 'WordPress Theme : By %1$s', '<a href=" ' . esc_url('https://sparklewpthemes.com/') . ' " rel="designer" target="_blank">'.esc_html__('Sparkle Themes','kingcabs').'</a>' );   
    }
}
add_action( 'kingcabs_copyright', 'kingcabs_footer_copyright', 5 );


/**
 * WooCommerce Section Start Here
*/
if ( ! function_exists( 'kingcabs_is_woocommerce_activated' ) ) {
    function kingcabs_is_woocommerce_activated() {
        if ( class_exists( 'WooCommerce' ) ) { return true; } else { return false; }
    }
}


/**
 * Schema type
*/
function kingcabs_html_tag_schema() {
    $schema     = 'http://schema.org/';
    $type       = 'WebPage';
    // Is single post
    if ( is_singular( 'post' ) ) {
        $type   = 'Article';
    }
    // Is author page
    elseif ( is_author() ) {
        $type   = 'ProfilePage';
    }
    // Is search results page
    elseif ( is_search() ) {
        $type   = 'SearchResultsPage';
    }
    echo 'itemscope="itemscope" itemtype="' . esc_attr( $schema ) . esc_attr( $type ) . '"';
}


/**
 * Page and Post Page Display Layout Metabox function
*/
add_action('add_meta_boxes', 'kingcabs_metabox_section');
if ( ! function_exists( 'kingcabs_metabox_section' ) ) {
    function kingcabs_metabox_section(){   
        add_meta_box('kingcabs_display_layout', 
            esc_html__( 'Display Layout Options', 'kingcabs' ), 
            'kingcabs_display_layout_callback', 
            array('page','post'), 
            'normal', 
            'high'
        );
    }
}

$kingcabs_page_layouts =array(
    'leftsidebar' => array(
        'value'     => 'leftsidebar',
        'label'     => esc_html__( 'Left Sidebar', 'kingcabs' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
    ),
    'rightsidebar' => array(
        'value'     => 'rightsidebar',
        'label'     => esc_html__( 'Right (Default)', 'kingcabs' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
    ),
     'nosidebar' => array(
        'value'     => 'nosidebar',
        'label'     => esc_html__( 'Full width', 'kingcabs' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar.png',
    )
);

/**
 * Function for Page layout meta box
*/
if ( ! function_exists( 'kingcabs_display_layout_callback' ) ) {
    function kingcabs_display_layout_callback(){
        global $post, $kingcabs_page_layouts;
        wp_nonce_field( basename( __FILE__ ), 'kingcabs_settings_nonce' ); ?>
        <table>
            <tr>
              <td>            
                <?php
                  $i = 0;  
                  foreach ($kingcabs_page_layouts as $field) {  
                  $kingcabs_page_metalayouts = esc_attr( get_post_meta( $post->ID, 'kingcabs_page_layouts', true ) ); 
                ?>            
                  <div class="radio-image-wrapper slidercat" id="slider-<?php echo intval( $i ); ?>" style="float:left; margin-right:30px;">
                    <label class="description">
                        <span>
                          <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                        </span></br>
                        <input type="radio" name="kingcabs_page_layouts" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( esc_html( $field['value'] ), 
                            $kingcabs_page_metalayouts ); if(empty($kingcabs_page_metalayouts) && esc_html( $field['value'] ) =='rightsidebar'){ echo "checked='checked'";  } ?>/>
                         <?php echo esc_html( $field['label'] ); ?>
                    </label>
                  </div>
                <?php  $i++; }  ?>
              </td>
            </tr>            
        </table>
    <?php
    }
}

/**
 * Save the custom metabox data
*/
if ( ! function_exists( 'kingcabs_save_page_settings' ) ) {
    function kingcabs_save_page_settings( $post_id ) { 
        global $kingcabs_page_layouts, $post;
         if ( !isset( $_POST[ 'kingcabs_settings_nonce' ] ) || !wp_verify_nonce( sanitize_key( $_POST[ 'kingcabs_settings_nonce' ] ) , basename( __FILE__ ) ) ) 
            return;
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
            return;        
        if (isset( $_POST['post_type'] ) && 'page' == $_POST['post_type']) {  
            if (!current_user_can( 'edit_page', $post_id ) )  
                return $post_id;  
        } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
                return $post_id;  
        }  

        foreach ($kingcabs_page_layouts as $field) {  
            $old = esc_attr( get_post_meta( $post_id, 'kingcabs_page_layouts', true) );
            if ( isset( $_POST['kingcabs_page_layouts']) ) { 
                $new = sanitize_text_field( wp_unslash( $_POST['kingcabs_page_layouts'] ) );
            }
            if ($new && $new != $old) {  
                update_post_meta($post_id, 'kingcabs_page_layouts', $new);  
            } elseif ('' == $new && $old) {  
                delete_post_meta($post_id,'kingcabs_page_layouts', $old);  
            } 
         } 
    }
}
add_action('save_post', 'kingcabs_save_page_settings');