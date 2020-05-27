<?php if(get_theme_mod('travelia_slider_enable')) : ?>
	<!-- Hero Area Slider -->
	<section id="hero-area" class="hero-area overlay">
		<!-- Slider Area -->
		<div class="slider-active">
			<?php $k=1; 
			for ($i=1;$i<=4;$i++){
				$slider_page[$k]=get_theme_mod('travelia_slider_page_'.$i);
				$slider_button_1_title[$k]=get_theme_mod('travelia_slider_button_1_title_'.$i);
				$slider_button_1_url[$k]=get_theme_mod('travelia_slider_button_1_url_'.$i);
				$slider_button_2_title[$k]=get_theme_mod('travelia_slider_button_2_title_'.$i);
				$slider_button_2_url[$k]=get_theme_mod('travelia_slider_button_2_url_'.$i);
				$k=$k+1;
			}

			$args = array (
				'post_type' => 'page',
				'post_per_page' => $k,
				'posts_per_page'=>10,
				'post__in'         => ($slider_page) ? ($slider_page) : '',
				'orderby'           =>'post__in',
			);

			$sliderloop = new WP_Query($args);
			$j=1;

			if ($sliderloop->have_posts()) :  while ($sliderloop->have_posts()) : $sliderloop->the_post();?>
				<!-- Single Slider -->
				<?php $slider_img_url = get_the_post_thumbnail_url(get_the_ID($i),'business_portfolio_slider_thumb'); ?>
				<div class="single-slider overlay" style="background-image:url(<?php echo esc_url($slider_img_url); ?>)">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="hero-inner">
									<!-- Welcome Text -->
									<div class="welcome-text">
										<h1><?php the_title(); ?></h1>
										<?php the_content(); ?>
										<!-- Button -->
										<div class="button">
											<?php if($slider_button_1_title[$j]): ?>
												<a href="<?php echo esc_url($slider_button_1_url[$j]); ?>" class="btn"><?php echo esc_attr($slider_button_1_title[$j]); ?></a>
											<?php endif; ?>
											<?php if($slider_button_2_title[$j]): ?>
												<a href="<?php echo esc_url($slider_button_2_url[$j]); ?>" class="btn primary"><?php echo esc_attr($slider_button_2_title[$j]); ?></a>
											<?php endif; ?>
										</div>
										<!--/ End Button -->
									</div>
									<!--/ End Welcome Text -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $j=$j+1; endwhile;
				wp_reset_postdata();  
			endif; ?>
		</div>
		<!--/ End Slider Area -->
	</section>
	<!--/ End Hero Area Slider -->
	<?php endif;?>   