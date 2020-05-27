<?php if(get_theme_mod( 'travelia_blog_enable' )):?>
	<!-- Blog -->
	<section class="blog section">
		<div class="container">
			<div class="row">
				<div class="col-12 wow fadeInLeft">
					<div class="title-line center">
						<?php
						$blog_title = get_theme_mod('travelia_blog_page_title');
						$queried_post = get_post($blog_title);
						?>
						<h2><?php echo esc_html($queried_post->post_title); ?></h2>
						<p><?php echo esc_html($queried_post->post_content); ?></p>
						<?php wp_reset_postdata(); ?>
					</div>
				</div> 
			</div>
			<div class="row">
				<?php
				$blog_catId = get_theme_mod( 'travelia_blog_category_id');
				$blog_number = get_theme_mod('travelia_blog_number');
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => $blog_number,
					'post_status' => 'publish',
					'cat' => $blog_catId,

				);

				$blogloop = new WP_Query($args);

				while ($blogloop->have_posts()) : 
					$blogloop->the_post(); 
					?>
					<!-- Single Blog -->
					<div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.4s">
						<div class="single-news">
							<?php if(has_post_thumbnail()): ?>
								<div class="news-head">
									<?php the_post_thumbnail();?>
								</div>
							<?php endif;?>
							<div class="news-body">
								<div class="news-content">
									<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
									<div class="date-author">
										<p class="date"><i class="fa fa-calenders"></i><?php echo get_the_date( 'd F, Y'); ?> </p>
										<p class="author"><span>|</span><i class="fa fa-user"></i><?php travelia_posted_by();?></p>
									</div>
									<p class="text"><?php the_excerpt();?></p>
									<a href="<?php the_permalink();?>" class="btn"><?php esc_html_e('Read More','travelia'); ?></a>
								</div>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
				<?php endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
	<!-- End Blog -->
	<?php endif;?>