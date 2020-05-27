<?php
/**
* Header Top Section
* @package Travelia
*/
?>
<!-- Start Topbar -->
<div class="topbar">
	<div class="container">
		<div class="row">
			<?php 
			$travelia_top_header_left = get_theme_mod( 'travelia_top_header_left_section_enable', '1' );
			$travelia_top_header =get_theme_mod('travelia_top_header_social_links_enable','1');
			$top_header_opening =  get_theme_mod( 'top_header_opening_time', __( 'Mon -Fri: 9:00-19:00', 'travelia' ) );
			if($travelia_top_header_left):?>
				<div class="col-lg-6 col-md-6 col-12">
					<!-- Text -->
					<p><?php echo esc_html($top_header_opening);?></p>
					<!--/ End Text -->
				</div>
			<?php endif;?>	

			<?php if($travelia_top_header):?>
				<div class="col-lg-6 col-md-6 col-12">
					<!-- Social -->
					<ul class="social">
						<?php travelia_top_header_social_links();?>
					</ul>
					<!--/ End Social -->
				</div>
			<?php endif;?>
		</div>
	</div>
</div>
<!--/ End Topbar -->
