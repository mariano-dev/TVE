<?php if(get_theme_mod('travelia_why_choose_enable')):?>
	<!-- Why Choose -->
	<section id="why-choose" class="why-choose section">
		<div class="container">
			<div class="row">
				<div class="col-12 wow zoomIn" data-wow-delay="0.4s">
					<div class="title-line center">
						<?php
						$why_choose_title = get_theme_mod('travelia_why_choose_page_title');
						$queried_post = get_post($why_choose_title);
						$image_url = get_the_post_thumbnail_url($why_choose_title);
						
						$vedio_url = get_theme_mod('travelia_why_choose_vedio_url');
						?>
						<h2><?php echo esc_html($queried_post->post_title); ?></h2>
						<p><?php echo esc_html($queried_post->post_content); ?></p>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-7 col-md-2 col-12">
					<div class="row">
						<!-- Loop start -->
						<?php travelia_why_choose_us_items();?>
						<!-- Loop End -->
					</div>
				</div>
				<div class="col-lg-5 col-md-2 col-12 wow fadeInRight" data-wow-delay="0.6s">
					<!-- Choose Single -->
					<div class="why-image overlay">
						<img src="<?php echo esc_url($image_url);?>" alt="#">
						<a href="<?php echo esc_url($vedio_url);?>" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
					</div>
					<?php wp_reset_postdata(); ?>
					<!--/ End Choose Single -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Why Choose -->
	<?php endif;?>