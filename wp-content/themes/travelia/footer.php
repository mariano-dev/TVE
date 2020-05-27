<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travelia
 */

?>
<!-- Footer -->
<footer class="footer">
	<!-- Footer Top -->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<!-- Single Widget -->
				<div class="col-lg-3 col-md-6 col-12">
					<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
						<?php dynamic_sidebar( 'footer-1' );?>
					<?php } ?>
				</div>
				<!--/ End Single Widget -->
				<!-- Single Widget -->
				<div class="col-lg-3 col-md-6 col-12">
					<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
						<?php dynamic_sidebar( 'footer-2' );?>
					<?php } ?>
				</div>
				<!--/ End Single Widget -->
				<!-- Single Widget -->
				<div class="col-lg-3 col-md-6 col-12">
					<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
						<?php dynamic_sidebar( 'footer-3' );?>
					<?php } ?>
				</div>
				<!--/ End Single Widget -->
				<!-- Single Widget -->
				<div class="col-lg-3 col-md-6 col-12">
					<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
						<?php dynamic_sidebar( 'footer-4' );?>
					<?php } ?>
				</div>
				<!--/ End Single Widget -->
			</div>
		</div>
	</div>
	<!--/ End Footer Top -->
	<!-- Footer Bottom -->
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bottom-inner">
						<div class="row">
							<div class="col-12">
								<!-- Copyright -->
								<div class="copyright"> 
									<p><?php esc_html_e('&copy; All Right Reserved ','travelia');  echo  esc_html(date('Y'));?></p>
								</div>
								<!--/ End Copyright -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Footer Bottom -->
</footer>
<!--/ End footer -->

<?php wp_footer(); ?>

</body>
</html>
