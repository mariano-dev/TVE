<?php if(get_theme_mod('travelia_testimonials_enable')):?>
	<!-- Testimonials -->
	<section id="testimonials" class="testimonials overlay section wow fadeInUp" data-wow-delay="0.4s" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="testimonial-slider-two">
						<?php
						$i=1;
						for($k=1;$k<5;$k++){
							$testimonial[$i] = get_theme_mod('travelia_testimonial_page_'.$k);    
							$testimonialposition[$i] = get_theme_mod('travelia_testimonial_position_'.$k);
							$i=$i+1;     
						}
						$args = array (
							'post_type' => 'page',
							'posts_per_page' => $i,
							'post__in'      => $testimonial,
							'orderby'        =>'post__in',
						);
						$testimonialloop = new WP_Query($args);
						$k=1;
						if ($testimonialloop->have_posts()) :  while ($testimonialloop->have_posts()) : $testimonialloop->the_post();?>
							<!-- Single Slider -->
							<div class="single-slider">
								<div class="author">
									<?php if(has_post_thumbnail()): 
										the_post_thumbnail();  
									endif; ?>
									<h2><i class="fa fa-quote-left"></i><?php the_title();?><i class="fa fa-quote-right"></i><span><?php echo esc_html($testimonialposition[$k]); ?></span></h2>
								</div>
								<div class="t-content">	
									<?php the_content();?>
								</div>
							</div>
							<!--/ End Single Slider -->
							<?php  $k=$k+1; endwhile;
							wp_reset_postdata();  
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Testimonials -->
	<?php endif;?>