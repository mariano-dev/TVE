<?php if(get_theme_mod('travelia_cta_enable')):
$cta_title = get_theme_mod( 'travelia_cta_title', __( 'Let\'s go with us', 'travelia' ) );
$cta_subtitle = get_theme_mod( 'travelia_cta_subtitle', __( 'Start Your Journey With Us', 'travelia' ) );
$cta_description =get_theme_mod( 'travelia_cta_description', __( 'Necessitatibus enim corrupti ullam voluptatum provident deserunt natus reprehenderit, inventore, tempore aut neque cupiditate, aspernatur! Quibusdam aliquid dolor a culpa, officiis quisquam.', 'travelia' ) );
$cta_btn_text_1 = get_theme_mod( 'travelia_cta_button_1_text', __( 'Book your trip', 'travelia' ) );
$cta_btn_1_url = get_theme_mod('travelia_cta_button_url_1');
$cta_btn_text_2 = get_theme_mod( 'travelia_cta_button_2_text', __( 'Contact Us', 'travelia' ) );
$cta_btn_2_url = get_theme_mod('travelia_cta_button_url_2');
	?>
	<!-- Call To Action -->
	<section id="cta-style" class="cta-style" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="cta-text">
						<h2><span><?php echo esc_html($cta_title);?></span><?php echo esc_html($cta_subtitle);?></h2>
						<p><?php echo esc_html($cta_description);?></p>
						<div class="button wow zoomIn" data-wow-delay="1s">
							<a href="<?php echo esc_url($cta_btn_1_url);?>" class="text-1 btn"><?php echo esc_html($cta_btn_text_1);?></a>
							<a href="<?php echo esc_url($cta_btn_2_url);?>" class="text-2 btn primary"><?php echo esc_html($cta_btn_text_2);?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Call To Action -->
<?php endif;?>	