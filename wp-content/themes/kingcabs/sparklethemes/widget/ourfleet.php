<?php
/**
 * Our Fleet Services Widgets
 *
 * @since Kingcabs 1.0.1
 *
 * @param null
 *
 * @return array $kingcabs_fleet_column_number
 *
 */
if ( ! function_exists( 'kingcabs_fleet_column_number' ) ) :
    function kingcabs_fleet_column_number() {
        $kingcabs_fleet_column_number = array(
            2 => __( '2', 'kingcabs' ),
            3 => __( '3', 'kingcabs' )
        );

        return apply_filters( 'kingcabs_fleet_column_number', $kingcabs_fleet_column_number );
    }
endif;


/**
 * Class for adding features Section Widget
 *
 * @package  Sparkle Themes
 * @subpackage  Kingcabs
 * @since 1.0.1
 */

if ( ! class_exists( 'kingcabs_ourfleet' ) ) {

    class kingcabs_ourfleet extends WP_Widget {

        private function defaults(){

            $defaults = array(
                'fontawesome'  => '',
                'title'        => '',
                'subtitle'     => '',
                'fleetcategory' => 0,
                'column_number' => 2
            );

            return $defaults;
        }

        function __construct() {

            parent::__construct(

                'kingcabs_ourfleet',

                esc_html__('KC Our Fleet Section', 'kingcabs'),


                array( 'description' => esc_html__( 'A widget display fleet', 'kingcabs' ), )
            );

        }

        /**
         * Call To Action Widget Backend
        */
        public function form( $instance ) {

            $instance = wp_parse_args( (array) $instance, $this->defaults() );
            $title         =  esc_attr( $instance[ 'title' ] );
            $subtitle      = esc_attr( $instance[ 'subtitle' ] );
            $fontawesome   = esc_attr( $instance[ 'fontawesome' ] );
            $column_number = absint( $instance['column_number'] );
            $fleetcategory = !empty( $instance['fleetcategory'] ) ? $instance['fleetcategory'] : 1;

            ?>

                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Enter Section Title', 'kingcabs' ); ?>:</label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>

                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( 'fontawesome' ) ); ?>"><?php esc_html_e( 'Enter Font Awesome Class', 'kingcabs' ); ?>:</label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fontawesome' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fontawesome' ) ); ?>" type="text" value="<?php echo esc_attr( $fontawesome ); ?>" />
                    </br>
                    <small><?php esc_html_e('Example : (fa fa-automobile)','kingcabs'); ?><a class="button button-link sp-postid alignright" target="_blank" href="http://fontawesome.io/icons/"><?php esc_html_e('Font Awesome','kingcabs'); ?></a></small>
                </p>

                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>"><?php esc_html_e( 'Enter Section Sub Title', 'kingcabs' ); ?>:</label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'subtitle' ) ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>" />
                </p>


                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( 'fleetcategory' ) ); ?>"><?php esc_html_e( 'Select Multiple Fleet Category', 'kingcabs' ); ?>:</label>
                    </br>
                    <?php

                        $taxonomy  = 'category';
                        $args = array(
                            'taxonomy'     => $taxonomy,
                        );

                        $fleetcategory = get_categories( $args );

                        foreach ($fleetcategory as $category) {

                            $option    = '<input type="checkbox" id="' . esc_attr( $this->get_field_id( 'fleetcategory' ) ) . '[]" name="' . esc_attr( $this->get_field_name('fleetcategory') ) . '[]"';
                            
                            $selected  = empty( $instance['fleetcategory'] ) ? 0 : $instance['fleetcategory'];


                            $arrlength = count( $selected );

                            for ($count = 0; $count < $arrlength; $count++) {

                                if ($selected[$count] == $category->term_id) {

                                    $option = $option .= ' checked="checked"';
                                }
                            }

                            $option .= ' value="' . $category->term_id . '" />';

                            $option .= $category->name;

                            $option .= '<br />';

                            echo $option;
                        }
                    ?>
                </p>

                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>"><?php esc_html_e( 'Column Number', 'kingcabs' ); ?>:</label>
                    <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_number' ) ); ?>">
                        <?php
                            $kingcabs_fleet_column_number = kingcabs_fleet_column_number();
                            foreach ( $kingcabs_fleet_column_number as $key => $value ) {
                        ?>
                            <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $column_number ); ?>><?php echo esc_attr( $value ); ?></option>
                        
                        <?php } ?>
                    </select>
                </p>

            <?php
        }
        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {

            $instance = $old_instance;

            $instance[ 'title' ]        = sanitize_text_field( $new_instance[ 'title' ] );
            $instance[ 'subtitle' ]     = sanitize_text_field( $new_instance[ 'subtitle' ] );
            $instance[ 'fontawesome' ]  = sanitize_text_field( $new_instance[ 'fontawesome' ] );
            $instance['fleetcategory']  = wp_kses_post( $new_instance['fleetcategory'] );
            $instance['column_number']  = absint( $new_instance['column_number'] );

            return $instance;
        }
        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return void
         *
         */
        public function widget($args, $instance) {
            
            

            $instance = wp_parse_args( (array) $instance, $this->defaults() );
            
            $kingcabstitle      = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
            $kingcabssubtittle  = $instance['subtitle'];
            $kincabsicon        = $instance['fontawesome'];
            $fleetcategory      = $instance['fleetcategory'];
            $column_number      = absint( $instance['column_number'] );

            echo $args['before_widget']; 
        ?>
            
            <section id="gallery" class="kingcabs-widgets">
                <div class="container">
                    <div class="col-md-12">
                        <div class="row">
                            <?php
                                /**
                                 * Main Title Section
                                */
                                kincabs_main_title( $kingcabstitle, $kincabsicon, $kingcabssubtittle );

                                $kingcabs_fleet_button = get_theme_mod('kingcabs_fleet_button_title','Booking Now');
                                $kingcabs_fleet_buttonurl = get_theme_mod('kingcabs_fleet_button_url');
                            ?>

                            <div class="gallery-nav">
                                <?php
                                    if (!empty($fleetcategory) && !is_wp_error($fleetcategory)) {

                                        echo "<ul>";
                                            echo '<li class="active" data-filter="*">' . esc_html__('All', 'kingcabs') . '</li>';
                                            foreach ($fleetcategory as $key => $category) { 
                                                $term = get_term_by( 'id', $category, 'category');
                                                echo '<li data-filter=.' . esc_attr( $term->slug ) . '>' . esc_attr( $term->name ) . '</li>';
                                            }
                                        echo "</ul>";
                                    }
                                ?>
                            </div>

                            <div class="gallery-inner">
                                <div class="row">
                                    <div class="isotop-active">
                                        <?php
                                            $argsfleet = array(
                                                'post_type' => 'post',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy'  => 'category',
                                                        'field'     => 'id', 
                                                        'terms'     => $fleetcategory                                                                 
                                                    )),
                                                'posts_per_page' => -1
                                            );

                                           $i = 0;

                                            $query = new WP_Query($argsfleet);

                                            if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();


                                                if ( 2 == $column_number ) {
                                                    $features_col = "col-sm-6 col-xs-12";
                                                }elseif ( 3 == $column_number ) {
                                                    $features_col = "col-md-4 col-sm-6 col-xs-12";
                                                } else {
                                                    $features_col = "col-md-4 col-sm-6 col-xs-12";
                                                }

                                                global $post;

                                                $term_lists = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));

                                                $term_slugs = array();

                                                foreach ($term_lists as $term_list) {
                                                   $term_slugs[] = $term_list->slug;
                                                }

                                                $term_slugs = join(' ', $term_slugs);

                                            if ( has_post_thumbnail() ) :
                                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'kingcabs-normal-image', true);
                                        ?>
                                            <div class="<?php echo esc_attr( $term_slugs ); ?> <?php echo esc_attr( $features_col ); ?>">
                                                <div class="gallery-single">
                                                    <div class="gallery-box">
                                                        <div class="gallery-head">
                                                            <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title_attribute(); ?>">
                                                        </div>
                                                        <div class="gallery-footer">
                                                            <h4>
                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="category">
                                                            </h4>
                                                        </div>
                                                        <div class="cabbutton">
                                                            <a href="<?php the_permalink(); ?>" class="btn"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="gallery-content">
                                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                                                        <?php if( !empty( $kingcabs_fleet_button ) ){ ?>
                                                            <a href="<?php echo esc_url( $kingcabs_fleet_buttonurl ); ?>" class="btn btn-primary">
                                                                <?php echo esc_attr( $kingcabs_fleet_button ); ?>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; endwhile; endif; wp_reset_postdata(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- gallery end -->
        <?php
            echo $args['after_widget'];
        }
    } // Class kingcabs_ourfleet ends here
}
/**
 * Function to Register and load the widget
 *
 * @since 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'kingcabs_ourfleet' ) ) :

    function kingcabs_ourfleet() {

        register_widget( 'kingcabs_ourfleet' );

    }

endif;

add_action( 'widgets_init', 'kingcabs_ourfleet' );