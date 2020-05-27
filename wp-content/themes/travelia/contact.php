<?php
/**
* Template Name: ContactPage
*/
get_header();?>

<section id="contact" class="section">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-12 col-sm-12">
				<div class="contact-details">
					<div class="contact-info">
						<div class="title">
							<?php
							$contact_title = get_theme_mod('travelia_contact_page_title');
							$queried_post = get_post($contact_title);
							?>
							<h2><?php echo esc_html($queried_post->post_title); ?></h2>
							<p><?php echo esc_html($queried_post->post_content); ?></p>
							<?php wp_reset_postdata(); ?>
						</div>
						
						<?php travelia_contact_items();?>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-md-12 col-sm-12">
				<div class="contact-head">
					<?php if (get_theme_mod('travelia_contact_form_shortcode')):
						echo do_shortcode(get_theme_mod('travelia_contact_form_shortcode'));
					endif; ?>	
				</div>
			</div>
		</div>

	</div>
</section>

<!-- Map Section -->
<div class="map-section">
	<div id="myMap">
		<?php if ( is_active_sidebar( 'google-map' ) ) { ?>
			<?php dynamic_sidebar( 'google-map' );?>
		<?php } ?>
	</div>
</div>
<!--/ End Map Section -->


<?php 

get_template_part( 'sections/section', 'clients' );

get_footer();