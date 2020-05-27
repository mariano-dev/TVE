<?php
/**
 * Testimonials Widgets
 *
 * Class for adding features Section Widget
 *
 * @package  Sparkle Themes
 * @subpackage  Kingcabs
 * @since 1.0.1
 */
if ( ! class_exists( 'kingcabs_testimonials' ) ) {

	class kingcabs_testimonials extends WP_Widget {

		private $defaults = array(
			'title'			=> '',
			'subtitle'		=> '',
			'fontawesome'	=> '',
			'page_id'       => 0,
            'post_number'   => 8,
			'sp_all_page_items'=> 0
		);

		function __construct() {

			parent::__construct(

				/**
				 * Base ID of your widget
				*/
				'kingcabs_testimonials',

				/**
				 * Widget name will appear in UI
				*/
				esc_html__( 'KC Testimonials Section', 'kingcabs' ),

				/**
				 * Widget description
				*/
				array( 'description' => esc_html__( 'A Widget Display Testimonials Area', 'kingcabs' ), )
			);

			$this->sp_migrate_parent_page_to_repeater();
		}

		public function sp_migrate_parent_page_to_repeater() {
			
			if( !is_admin() ){
				return;
			}

			$all_instances = $this->get_settings();

			foreach ( $all_instances as $key => $instance ) {

				$parent_page_id = ( isset( $instance['page_id'] )? $instance['page_id'] : 0 );

				if( $parent_page_id == 0 ){
				    continue;
                }

				if ( 0 != $parent_page_id ) {

					$page_ids = array();

					$kingcabs_child_page_args = array(

						'post_parent'    => $parent_page_id,
						'posts_per_page' => -1,
						'post_type'      => 'page',
						'no_found_rows'  => true,
						'post_status'    => 'publish'
					);

					$slider_query = new WP_Query( $kingcabs_child_page_args );

					if ( ! $slider_query->have_posts() ) {

						$kingcabs_child_page_args = array(

							'page_id'        => $parent_page_id,
							'posts_per_page' => 1,
							'post_type'      => 'page',
							'no_found_rows'  => true,
							'post_status'    => 'publish'
						);

						$slider_query = new WP_Query( $kingcabs_child_page_args );
					}

					/**
					 * Start Here Loop
					*/
					if ( $slider_query->have_posts() ) :
						$i = 0;

						while ( $slider_query->have_posts() ):$slider_query->the_post();

							$page_ids[$i]['page_id'] = absint( get_the_ID() );

							$i++;

						endwhile;
						wp_reset_postdata();
					endif;

					$instance['sp_all_page_items'] = $page_ids;

					$instance['page_id'] = 0;

					$all_instances[$key] = $instance;

				}
			}

			$this->save_settings( $all_instances );
		}

		/**
		 * Widget Backend
		*/
		public function form( $instance ) {

			$instance = wp_parse_args( (array) $instance, $this->defaults );
			
			/**
			 * Set Default Values
			*/

            $title       =  esc_attr( $instance[ 'title' ] );
            $subtitle    =  esc_attr( $instance[ 'subtitle' ] );
            $fontawesome =  esc_attr( $instance[ 'fontawesome' ] );

			$page_id            = absint( $instance['page_id'] );
			$sp_all_page_items  = $instance['sp_all_page_items'];

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

            
		<?php if( $page_id != 0 ){ ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( 'page_id' ) ); ?>"><?php esc_html_e( 'Select Testimonials Pages', 'kingcabs' ); ?>:</label>
                    <br/>
                    <small><?php esc_html_e( 'Select Testimonials Pages', 'kingcabs' ); ?></small>
					<?php
						/* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
						$args = array(
							'selected'         => $page_id,
							'name'             => $this->get_field_name( 'page_id' ),
							'id'               => $this->get_field_id( 'page_id' ),
							'class'            => 'widefat',
							'show_option_none' => esc_html__( 'Select Testimonials Pages', 'kingcabs' ),
							'option_none_value'     => 0 // string
						);
						wp_dropdown_pages( $args );
					?>
                </p>

			<?php } else{ ?>

                <label><?php esc_html_e( 'Select Testimonials Pages', 'kingcabs' ); ?>:</label>
                <div class="sp-repeater">
					<?php
						$total_repeater = 0;

						if  (count($sp_all_page_items) > 0 && is_array($sp_all_page_items) ){

							foreach ($sp_all_page_items as $features){

								$repeater_id  = $this->get_field_id( 'sp_all_page_items') .$total_repeater.'page_id';

								$repeater_name  = $this->get_field_name( 'sp_all_page_items' ).'['.$total_repeater.']['.'page_id'.']';
							?>
	                            <div class="repeater-table">

	                                <div class="sp-repeater-top">
	                                    <div class="sp-repeater-title-action">
	                                        <button type="button" class="sp-repeater-action">
	                                            <span class="sp-toggle-indicator" aria-hidden="true"></span>
	                                        </button>
	                                    </div>
	                                    <div class="sp-repeater-title">
	                                        <h3><?php esc_html_e( 'Select Testimonials Page Item', 'kingcabs' )?><span class="in-sp-repeater-title"></span></h3>
	                                    </div>
	                                </div>

	                                <div class='sp-repeater-inside hidden'>
										<?php
											/* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
											$args = array(
												'selected'          => $features['page_id'],
												'name'              => $repeater_name,
												'id'                => $repeater_id,
												'class'             => 'widefat sp-select',
												'show_option_none'  => esc_html__( 'Select Testimonials Pages', 'kingcabs'),
												'option_none_value' => 0 // string
											);
											wp_dropdown_pages( $args );
										?>
	                                    <div class="sp-repeater-control-actions">
	                                        <button type="button" class="button-link button-link-delete sp-repeater-remove"><?php esc_html_e('Remove','kingcabs');?></button> |
	                                        <button type="button" class="button-link sp-repeater-close"><?php esc_html_e('Close','kingcabs');?></button>
	                                        <a class="button button-link sp-postid alignright" target="_blank" data-href="<?php echo esc_url( admin_url( 'post.php?post=POSTID&action=edit' ) ); ?>" href="<?php echo esc_url( admin_url( 'post.php?post='.$features['page_id'].'&action=edit' ) ); ?>"><?php esc_html_e('Full Edit','kingcabs'); ?></a>
	                                    </div>
	                                </div>
	                            </div>
							<?php
								$total_repeater = $total_repeater + 1;
							}
						}
						$coder_repeater_depth = 'coderRepeaterDepth_'.'0';

						$repeater_id  = $this->get_field_id( 'sp_all_page_items') .$coder_repeater_depth.'page_id';

						$repeater_name  = $this->get_field_name( 'sp_all_page_items' ).'['.$coder_repeater_depth.']['.'page_id'.']';
					?>
	                    <script type="text/html" class="sp-code-for-repeater">
	                        <div class="repeater-table">
	                            <div class="sp-repeater-top">
	                                <div class="sp-repeater-title-action">
	                                    <button type="button" class="sp-repeater-action">
	                                        <span class="sp-toggle-indicator" aria-hidden="true"></span>
	                                    </button>
	                                </div>
	                                <div class="sp-repeater-title">
	                                    <h3><?php esc_html_e( 'Testimonials Page Item', 'kingcabs' )?><span class="in-sp-repeater-title"></span></h3>
	                                </div>
	                            </div>
	                            <div class='sp-repeater-inside hidden'>
									<?php
										/* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
										$args = array(
											'selected'         => '',
											'name'             => $repeater_name,
											'id'               => $repeater_id,
											'class'            => 'widefat sp-select',
											'show_option_none' => esc_html__( 'Select Testimonials Pages', 'kingcabs'),
											'option_none_value'     => 0 // string
										);
										wp_dropdown_pages( $args );
									?>
	                                <div class="sp-repeater-control-actions">
	                                    <button type="button" class="button-link button-link-delete sp-repeater-remove"><?php esc_html_e('Remove','kingcabs');?></button> |
	                                    <button type="button" class="button-link sp-repeater-close"><?php esc_html_e('Close','kingcabs');?></button>
	                                    <a class="button button-link sp-postid alignright hidden" target="_blank" data-href="<?php echo esc_url( admin_url( 'post.php?post=POSTID&action=edit' ) ); ?>" href=""><?php esc_html_e('Full Edit','kingcabs'); ?></a>
	                                </div>
	                            </div>
	                        </div>

	                    </script>
					<?php
						echo '<input class="sp-total-repeater" type="hidden" value="'.wp_kses_post( $total_repeater ) .'">';
						$add_field = esc_html__('Testimonials Page Item', 'kingcabs');
						echo '<span class="button-primary sp-add-repeater" id="'.wp_kses_post( $coder_repeater_depth ).'">'.wp_kses_post( $add_field ).'</span><br/>';
					?>
                </div>

			<?php } 

			}

		/**
		 * Function to Updating widget replacing old instances with new
		 *
		 * @access public
		 * @since 1.0
		 *
		 * @param array $new_instance new arrays value
		 * @param array $old_instance old arrays value
		 *
		 * @return array
		 *
		 */
		public function update( $new_instance, $old_instance ) {

			$instance             = $old_instance;
            $instance[ 'title' ]  = sanitize_text_field( $new_instance[ 'title' ] );
            $instance[ 'subtitle' ]  = sanitize_text_field( $new_instance[ 'subtitle' ] );
            $instance[ 'fontawesome' ]  = sanitize_text_field( $new_instance[ 'fontawesome' ] );
			$instance['page_id']       = absint( $new_instance['page_id'] );
			$instance['sp_all_page_items']    = $new_instance['sp_all_page_items'];
			$page_ids = array();
			foreach ($new_instance['sp_all_page_items'] as $key=>$features ){
				$page_ids[$key]['page_id'] = absint( $features['page_id'] );
            }
			$instance['sp_all_page_items'] = $page_ids;

			return $instance;
		}

		/**
		 * Function to Creating widget front-end. This is where the action happens
		 *
		 * @access public
		 * @since 1.0.1
		 *
		 * @param array $args widget setting
		 * @param array $instance saved values
		 *
		 * @return void
		 *
		 */
		public function widget( $args, $instance ) {

			$instance    = wp_parse_args( (array) $instance, $this->defaults );

			$kingcabstitle      = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
            $kingcabssubtittle  = $instance['subtitle'];
			$kincabsicon        = $instance['fontawesome'];
			$page_id            =  absint( $instance['page_id'] );
			$sp_all_page_items  = $instance['sp_all_page_items'];

			echo $args['before_widget'];

		?>
			<section class="testimonials kingcabs-widgets testimonials-carousel">
			    <div class="container">
			        <?php
			            
			            /**
			             * Main Title Section
			            */

			            kincabs_main_title( $kingcabstitle, $kincabsicon, $kingcabssubtittle );
			        ?>
			        

			        <div class="owl-carousel kc-testimonials owl-theme">
			            <?php
							$kingcabs_child_page_args = array();

							$post_in = array();

							if  (count($sp_all_page_items) > 0 && is_array($sp_all_page_items) ){

								foreach ( $sp_all_page_items as $features ){

									if( isset( $features['page_id'] ) && !empty( $features['page_id'] ) ){

										$post_in[] = $features['page_id'];
									}
								}
							}
							if( !empty( $post_in )) :

	                            $kingcabs_child_page_args = array(
	                                    'post__in'         => $post_in,
	                                    'orderby'             => 'post__in',
	                                    'posts_per_page'      => count( $post_in ),
	                                    'post_type'           => 'page',
	                                    'no_found_rows'       => true,
	                                    'post_status'         => 'publish'
	                            );

							elseif( ! empty ( $page_id ) ):

								$kingcabs_child_page_args = array(
									'post_parent'    => $page_id,
									'posts_per_page' => $post_number,
									'post_type'      => 'page',
									'no_found_rows'  => true,
									'post_status'    => 'publish'
								);

								$features_query = new WP_Query( $kingcabs_child_page_args );

								if ( ! $features_query->have_posts() ) {

									$kingcabs_child_page_args = array(
										'page_id'        => $page_id,
										'posts_per_page' => 1,
										'post_type'      => 'page',
										'no_found_rows'  => true,
										'post_status'    => 'publish'
									);
								}

	                        endif;

	                        if( !empty( $kingcabs_child_page_args ) ){

		                        $features_query = new WP_Query( $kingcabs_child_page_args );

		                        if ( $features_query->have_posts() ): while ( $features_query->have_posts() ):$features_query->the_post();
		                        	
		                        $image_path = wp_get_attachment_image_src( get_post_thumbnail_id(), 'kingcabs-normal-image', true );
				        ?>
			                <div class="testimonial-item">
			                    
			                    <div class="testimonial-img">
			                        <?php if(has_post_thumbnail()){  the_post_thumbnail('thumbnail'); } ?>
			                    </div>

			                   <?php the_excerpt(); ?>

			                    <div class="author-content">
			                        <h3><?php the_title(); ?></h3>
			                    </div>

			                </div>
			            <?php endwhile; endif; wp_reset_postdata(); } ?>
			        </div>
			    </div>
			</section>
            
		<?php
			echo $args['after_widget'];
		}
	} // Class kingcabs_testimonials ends here
}

/**
 * Function to Register and load the widget
 *
 * @since 1.0.1
 *
 * @param null
 *
 * @return null
 *
 */
if ( ! function_exists( 'kingcabs_testimonials' ) ) :

	function kingcabs_testimonials() {
		register_widget( 'kingcabs_testimonials' );
	}

endif;
add_action( 'widgets_init', 'kingcabs_testimonials' );