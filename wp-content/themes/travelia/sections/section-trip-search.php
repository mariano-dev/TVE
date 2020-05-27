<?php if(get_theme_mod('travelia_trip_search_enable')):
$trip_search_title = get_theme_mod( 'travelia_trip_search_title', __( 'Find Your Dream Trip', 'travelia' ) );
	?>
	<!-- Trip Search -->
	<section class="trip-main style2">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Trip Search -->
					<div class="trip-search">
						<h2><?php echo esc_html($trip_search_title);?></h2>
						<form method="POST" action="<?php echo esc_url(home_url('/'));?>" class="search">
							<input type="hidden" class="form-control" placeholder="<?php esc_attr_e('Search','travelia');?> ..." value="<?php echo get_search_query(); ?>" name="s" aria-label="Search">
							<!-- Form Destination -->
							<?php if(travelia_check_wp_engine_plugin_activation()):?>
								<div class="form-group">
									<?php
									$args_destinations = array(
										'taxonomy' => 'destination',
										'show_option_all'    => '',
										'show_option_none' => 'Choose desitnation',
										'class' => 'form-control',
										'name' => 'destination',
										'value_field' => 'slug',
										'id'      => 'destination',
										'selected' => '',
									);

									wp_dropdown_categories( $args_destinations );
									?>
								</div>
								<!--/ End Form Destination -->

								<!-- Form Activities -->
								<div class="form-group">
									
									<?php

									$args_activites = array(
										'taxonomy' => 'activities',
										'show_option_all'    => '',
										'show_option_none' => 'Choose activities',
										'class' => 'form-control',
										'name' => 'activities',
										'value_field' => 'slug',
										'id'      => 'activities',
										'selected' => '',
									);
									wp_dropdown_categories( $args_activites );
									?>
								</div>
							<?php endif;?>
							<!--/ End Form Activities -->
							<!-- Form Duration -->
							<div class="form-group duration">
								<select name="trip_duration" id="trip_duration" class="form-control">
									<option value="1"><?php esc_html_e( '1 Day', 'travelia' );?></option>
									<option value="2"><?php esc_html_e( '2 Day', 'travelia' );?></option>
									<option value="3"><?php esc_html_e( '3 Day', 'travelia' );?></option>
									<option value="7"><?php esc_html_e( '1 Week', 'travelia' );?></option>
									<option value="14"><?php esc_html_e( '2 Week', 'travelia' );?></option>
									<option value="21"><?php esc_html_e( '3 Week', 'travelia' );?></option>
									<option value="30"><?php esc_html_e( '1 Month', 'travelia' );?></option>
									<option value="60"><?php esc_html_e( '2 Month', 'travelia' );?></option>
								</select>
							</div>
							<!--/ End Form Duration -->

							<!-- Form Button -->
							<div class="form-group button">
								<button type="submit" class="btn"><?php echo esc_html__('Search','travelia');?></button>
							</div>
							<!--/ End Form Button -->
						</form>
					</div>
					<!--/ End Trip Search -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Trip Search -->
	<?php endif;?>