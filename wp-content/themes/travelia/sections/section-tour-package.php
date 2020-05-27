<?php if(get_theme_mod('travelia_tour_package_enable')):?>
	<!-- Popular Trips -->
	<section id="popular-trips" class="popular-trips section">
		<div class="container">
			<div class="row">
				<div class="col-12 wow fadeInLeft" data-wow-delay="0.4s">
					<div class="title-line center">
						<?php
						$tour_package_title = get_theme_mod('travelia_tour_package_page_title');
						$queried_post = get_post($tour_package_title);
						?>
						<h2><?php echo esc_html($queried_post->post_title); ?></h2>
						<p><?php echo esc_html($queried_post->post_content); ?></p>
						<?php wp_reset_postdata(); ?>
					</div>
				</div> 
			</div>
			<div class="row">
				<div class="col-12">
					<div class="trips-main">
						<!-- Trips Slider -->
						<div class="trips-slider">
							<?php
							$tour_package_count = get_theme_mod('travelia_tour_package_items_number',3);
							$tour_package_args = array(
								'post_type'         => 'trip',
								'posts_per_page'    => absint( $tour_package_count ),
								'post_status' => 'publish',
								'order'             => 'DESC'
							);        

							$tour_package_query = new WP_Query( $tour_package_args );
							?>     
							<?php
							if ( $tour_package_query->have_posts() ) {
								while ( $tour_package_query->have_posts() ) {
									$tour_package_query->the_post();?>
									<!-- Single Slider -->
									<div class="single-slider">
										<?php if(has_post_thumbnail()):?>
											<div class="trip-head">
												<?php the_post_thumbnail();?>
											</div>
										<?php endif;?>
										<div class="trip-details">
											<?php
											$meta     = get_post_meta( get_the_ID(), 'wp_travel_engine_setting', true ); 
											$currency = travelia_get_trip_currency(); ?>
											<div class="content">
												<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
												<p class="night"><i class="fa fa-clock-o"></i>
													<?php 
													if( ( isset( $meta['trip_duration'] ) && '' != $meta['trip_duration'] ) || ( isset( $meta['trip_duration_nights'] ) ) && '' != $meta['trip_duration_nights'] ){?>
														<?php
														if( $meta['trip_duration'] ) 
															/* translators: %s: Popular Trips Duration */ 
														printf( esc_html__( '%s Days', 'travelia' ), absint( $meta['trip_duration'] ));
														if( $meta['trip_duration_nights'] ) 
															/* translators: %s: Popular Trips Duration Nights */ 
														printf( esc_html__( ' - %s Nights', 'travelia' ), absint( $meta['trip_duration_nights'] ) ); 
														?>
													<?php }?>
												</p>
												<p><?php the_excerpt();?></p>
											</div>
											<div class="price">
												<a href="<?php the_permalink();?>" class="btn"><?php echo esc_html__('View More','travelia');?></a>
												<p><?php echo esc_html__('From','travelia');?><span><?php echo esc_html($currency);?><?php 
												if( isset( $meta['trip_prev_price'] ) && ! empty( $meta['trip_prev_price'] ) ){
													echo esc_html($meta['trip_prev_price']);
												}
												?>
											</div>

										</div>
									</div>
									<!--/ End Single Trips -->
								<?php  }

							} else {?>
								<div class="travelia-no-popular-trips-found"><?php esc_html_e( 'No Tour Package found', 'travelia' ); ?></div>
							<?php }
							wp_reset_postdata();?>
						</div>
						<!--/ End Trips Slider -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Popular Trips -->
	<?php endif;?>