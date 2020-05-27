<?php if(get_theme_mod('travelia_popular_destination_enable')):?>
	<!-- Popular Destinations -->
	<section id="popular-destinations" class="popular-destinations section style2 "  data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="col-12 wow fadeInRight">
					<div class="title-line center">
						<?php
						$popular_destination_title = get_theme_mod('travelia_popular_destination_page_title');
						$queried_post = get_post($popular_destination_title);?>
						<h2><?php echo esc_html($queried_post->post_title); ?></h2>
						<p><?php echo esc_html($queried_post->post_content); ?></p>
						<?php wp_reset_postdata(); ?>
					</div>
				</div> 
			</div>
			<div class="row">
				<div class="col-12">
					<div class="destinations-slider">
						<!-- Single Slider --> 
						<?php 
						$t_destination_display_number = get_theme_mod( 'travelia_t_destination_number' );
						$t_destination_category_id = get_theme_mod( 'travelia_t_destination_category_id' );
						$args = array(
							'post_type' => 'trip',
							'tax_query' => array(
								array(
									'taxonomy' => 'destination',
									'field' => 'term_id',
									'terms' => $t_destination_category_id,
								),
							),
							'posts_per_page' => $t_destination_display_number
						);
						$tdestinationloop = new WP_Query($args);
						if ( $tdestinationloop->have_posts() ) :
							while ($tdestinationloop->have_posts()) : $tdestinationloop->the_post(); 
								?>
								<div class="single-slider">
									<?php if(has_post_thumbnail()): 
										the_post_thumbnail();
									endif;?>	
									<div class="content">
										<?php
										$meta     = get_post_meta( get_the_ID(), 'wp_travel_engine_setting', true ); 
										$currency = travelia_get_trip_currency(); ?>
										<p class="location"><?php the_title();?><span><?php 
										if( ( isset( $meta['trip_duration'] ) && '' != $meta['trip_duration'] ) || ( isset( $meta['trip_duration_nights'] ) ) && '' != $meta['trip_duration_nights'] ){?>
											<?php
											if( $meta['trip_duration'] ) 
												/* translators: %s: Popular Trips Duration */ 
											printf( esc_html__( '%s Days', 'travelia' ), absint( $meta['trip_duration'] ));
											?>
											<?php }?></span></p>
											<p class="price"><span><?php echo esc_html__('From','travelia');?> <?php echo esc_html($currency);?><?php 
											if( isset( $meta['trip_prev_price'] ) && ! empty( $meta['trip_prev_price'] ) ){
												echo esc_html($meta['trip_prev_price']);
											}?></span></p>
										</div>
									</div>
									<!-- /End Single Slider --> 
								<?php endwhile;
								wp_reset_postdata();
							endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Popular Destinations --> 
		<?php endif;?>