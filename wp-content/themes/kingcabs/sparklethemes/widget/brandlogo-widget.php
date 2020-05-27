<?php
/**
 * Client/Brand Logo Section Widget
 *
 * @package Sparkle Themes
 * @subpackage  Kingcabs
 * @since 1.0.0
 */

if ( ! class_exists( 'kingcabs_brandlogo' ) ) {

    class kingcabs_brandlogo extends WP_Widget {

        private function defaults(){

            $defaults = array();

            return $defaults;
        }

        function __construct() {

            parent::__construct(

                'kingcabs_brandlogo',

                esc_html__('KC Brand/Client Logo Section', 'kingcabs'),


                array( 'description' => esc_html__( 'A widget display client/brand logo', 'kingcabs' ), )
            );

        }

        /**
         * Call To Action Widget Backend
        */
        public function form( $instance ) {

            $instance = wp_parse_args( (array) $instance, $this->defaults() );

            ?>

                <p class="kc-teammember">
                    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                        <a class="button kcdriver" target="_blank" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=kingcabs_client_logo_section' ) ); ?>">
                            <?php esc_html_e('Our Brand/Client Logo Settings','kingcabs'); ?>
                        </a>
                    </label></br>
                    <small><?php esc_html_e('Click on button and manage client/brand logo section area in customizer','kingcabs'); ?></small>
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
    
            echo $args['before_widget']; 

                /**
                 * Client/Brand Logo Section Area
                */
                
                get_template_part( 'sections/section', 'clients' );


            echo $args['after_widget'];
        }
    } // Class kingcabs_brandlogo ends here
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
if ( ! function_exists( 'kingcabs_brandlogo' ) ) :

    function kingcabs_brandlogo() {

        register_widget( 'kingcabs_brandlogo' );

    }

endif;

add_action( 'widgets_init', 'kingcabs_brandlogo' );