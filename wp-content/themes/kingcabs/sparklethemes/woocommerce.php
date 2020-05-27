<?php
/**
 * Main Custom admin functions area
 *
 * @since SparklewpThemes
 *
 * @param Kingcabs
 *
*/

/**
 * Load Kingcabs woocommerce Action and Filter.
*/
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20 );
add_filter( 'woocommerce_show_page_title', '__return_false' );

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

/**
 * WooCommerce add content primary div function
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
if (!function_exists('kingcabs_woocommerce_output_content_wrapper')) {
    function kingcabs_woocommerce_output_content_wrapper(){ ?>
    	<div class="about-right blogpost-inner-box">
        <div class="container">
            <div class="row">
              <div class="col-md-9 col-sm-8 content-area">
        				<div id="primary" class="home-main-content">
        					<main id="main" class="site-main">
    <?php }
}
add_action( 'woocommerce_before_main_content', 'kingcabs_woocommerce_output_content_wrapper', 10 );

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
if (!function_exists('kingcabs_woocommerce_output_content_wrapper_end')) {
    function kingcabs_woocommerce_output_content_wrapper_end(){ ?>
                		</main>
                	</div>
                </div>

              	<?php get_sidebar('woocommerce'); ?>

            </div>
        </div>
      </div>
    <?php }
}
add_action( 'woocommerce_after_main_content', 'kingcabs_woocommerce_output_content_wrapper_end', 10 );
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


/**
 * Woo Commerce Number of row filter Function
*/
add_filter('loop_shop_columns', 'kingcabs_loop_columns');
if (!function_exists('kingcabs_loop_columns')) {
    function kingcabs_loop_columns() {
        return 3;
    }
}

add_action( 'body_class', 'kingcabs_woo_body_class');
if (!function_exists('kingcabs_woo_body_class')) {
    function kingcabs_woo_body_class( $class ) {
           $class[] = 'columns-'.intval(kingcabs_loop_columns());
           return $class;
    }
}

/**
 * WooCommerce display related product.
*/
if (!function_exists('kingcabs_related_products_args')) {
  function kingcabs_related_products_args( $args ) {
      $args['posts_per_page']   = 6;
      $args['columns']          = 3;
      return $args;
  }
}
add_filter( 'woocommerce_output_related_products_args', 'kingcabs_related_products_args' );

/**
 * WooCommerce display upsell product.
*/
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
if ( ! function_exists( 'kingcabs_woocommerce_upsell_display' ) ) {
  function kingcabs_woocommerce_upsell_display() {
      woocommerce_upsell_display( 6, 3 ); 
  }
}
add_action( 'woocommerce_after_single_product_summary', 'kingcabs_woocommerce_upsell_display', 15 );
