<div class="header-bottom">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Main Menu -->
				<div class="main-menu">
					<nav class="navigation">
						<?php
						if ( has_nav_menu( 'menu-1' ) ) :
							wp_nav_menu( array(
								'theme_location'    => 'menu-1',
								'depth'             => 6,
								'menu_class'        => 'nav menu',
								'fallback_cb'       => 'travelia_wp_bootstrap_navwalker::fallback',
								'walker'            => new travelia_wp_bootstrap_navwalker(),
							));
							?>
							<?php else : ?>
								<ul class="nav menu">
									<li>
										<a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>"><?php esc_html_e('Add a menu','travelia'); ?></a>
									</li>
								</ul>
							<?php endif; ?>
						</nav>
					</div>
					<!--/ End Main Menu -->
					<!-- Search Form -->
					<div class="search-form">
						<form method="POST" action="<?php echo esc_url(home_url('/'));?>" class="form">
							<input type="text"  placeholder="<?php esc_attr_e('Search','travelia');?> ..." value="<?php echo get_search_query(); ?>" name="s" aria-label="Search">
							<!-- Form Button -->
							<button type="submit" id="searchsubmit">
								<i class="fa fa-search"></i>  
							</button>
							<!--/ End Form Button -->
						</form>
					</div>
					<!--/ End Search Form -->
				</div>
			</div>
		</div>
	</div>