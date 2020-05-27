<?php
/**
 * Call To Action Section Widget
 *
 * @package Sparkle Themes
 * @subpackage  Kingcabs
 * @since 1.0.0
 */

if ( ! class_exists( 'Kingcabs_Calltoaction' ) ) {

    class Kingcabs_Calltoaction extends WP_Widget {

        private function defaults(){

            $defaults = array(
                'page_id'     => '',
                'cat_title'   => '',
                'cat_number'  => ''
            );

            return $defaults;
        }

        function __construct() {

            parent::__construct(

                'Kingcabs_Calltoaction',

                esc_html__('KC CAll To Action Section', 'kingcabs'),


                array( 'description' => esc_html__( 'A widget display business description with title and number', 'kingcabs' ), )
            );

        }

        /**
         * Call To Action Widget Backend
        */
        public function form( $instance ) {

            $instance = wp_parse_args( (array) $instance, $this->defaults() );

            $page_id    = absint( $instance[ 'page_id' ] );

            $cat_title  = esc_attr( $instance[ 'cat_title' ] );

            $cat_number = $instance[ 'cat_number' ];

            ?>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'page_id' ) ); ?>"><?php esc_html_e( 'Select Call To Action Page', 'kingcabs' ); ?>:</label>
                <br />
                <?php
                    /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
                    $args = array(
                        'selected'              => $page_id,
                        'name'                  => $this->get_field_name( 'page_id' ),
                        'id'                    => $this->get_field_id( 'page_id' ),
                        'class'                 => 'widefat',
                        'show_option_none'      => esc_html__('Select Page','kingcabs'),
                        'option_none_value'     => 0 // string
                    );
                    wp_dropdown_pages( $args );
                ?>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'cat_title' ) ); ?>"><?php esc_html_e( 'Call To Action Titile', 'kingcabs' ); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cat_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cat_title' ) ); ?>" type="text" value="<?php echo esc_attr( $cat_title ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'cat_number' ) ); ?>"><?php esc_html_e( 'Call To Action Number', 'kingcabs' ); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cat_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cat_number' ) ); ?>" type="text" value="<?php echo esc_attr( $cat_number ); ?>" />
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

            $instance[ 'page_id' ]    = absint( $new_instance[ 'page_id' ] );

            $instance[ 'cat_title' ]  = sanitize_text_field( $new_instance[ 'cat_title' ] );

            $instance[ 'cat_number' ] = sanitize_text_field( $new_instance[ 'cat_number' ] );

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
            
            $page_id = absint( $instance[ 'page_id' ] );

            $cat_title = esc_html( $instance[ 'cat_title' ] );

            $cat_number = esc_attr( $instance[ 'cat_number' ] );

            $phonenumber  = preg_replace("/[^0-9]/","",$cat_number);

            echo $args['before_widget']; ?>
                
                <?php

                if( !empty( $page_id ) ){

                    $cta = new WP_Query( array(
                        'page_id'       => $page_id,
                        'post_type'     => 'page'
                    ) );

                    while( $cta->have_posts() ) : $cta->the_post();

                    $cta_background_url = wp_get_attachment_url( get_post_thumbnail_id(), 'large' );
                ?>
                    <section class="kingcabs-widgets call-us" style="background: url(<?php echo esc_url( $cta_background_url ); ?>) no-repeat;">
                        <div class="overlay"></div>
                            <div class="container">
                                <div class="call-bx">
                                    <h2 class="call-title"><?php the_title(); ?></h2>
                                    <div class="call-bx-inner">
                                        <div class="call-bx-details">
                                            <p><?php echo esc_attr( wp_trim_words( get_the_content(), 250 ) ); ?></p>
                                        </div>

                                        <div class="phn-icon-circle">
                                            <a href="tel:<?php echo esc_attr( $phonenumber); ?>"><i class="fa fa-phone"></i></a>
                                        </div>

                                        <?php if($cat_title || $phonenumber){ ?>
                                            <div class="call-us-text">
                                                <?php if($cat_title){ ?>

                                                <h3><?php echo esc_attr( $cat_title ); ?></h3>

                                                <?php } if($phonenumber){ ?>
                                                <h2>
                                                    <a href="tel:<?php echo esc_attr( $phonenumber); ?>">

                                                        <?php echo esc_html( $cat_number ); ?>

                                                    </a>
                                                </h2>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                    </section>

                <?php endwhile; wp_reset_postdata(); } 
           
            echo $args['after_widget'];
        }
    } // Class Kingcabs_Calltoaction ends here
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
if ( ! function_exists( 'Kingcabs_Calltoaction' ) ) :

    function Kingcabs_Calltoaction() {

        register_widget( 'Kingcabs_Calltoaction' );

    }

endif;

add_action( 'widgets_init', 'Kingcabs_Calltoaction' );